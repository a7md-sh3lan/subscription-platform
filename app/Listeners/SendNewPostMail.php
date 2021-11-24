<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\Website;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewPostMail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        //
        $post = $event->post;

        $website = Website::find($post->website_id);
        $subscripers = $website->users;

        $data = [
            'title' => $post->title,
            'url' => $website->url,
            'website' => $website->name,
            'body' => substr($website->body,0,150).'...',
        ];

        foreach($subscripers as $subscriper) {
            $data['name'] = $subscriper->name;
            $to = $subscriper->email;

            Mail::send('mails.new_post', $data, function($message) use ($to, $data)
                    {
                        $message->to($to)->subject("new Post on $data[website]");
                    });
        }
        
    }
}
