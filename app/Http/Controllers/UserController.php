<?php

namespace App\Http\Controllers;

use App\Models\WebsiteUser;
use Illuminate\Http\Request;
use App\Http\Resources\Subscription as SubscriptionResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends Controller
{
    //

    public function subscripe(Request $request) {
        $input = $request->all();

        Validator::extend('uniqueSubscription', function ($attribute, $value, $parameters, $validator) {
            $count = DB::table('websites_users')->where('user_id', $value)
                                        ->where('website_id', $parameters[0])
                                        ->count();
        
            return $count === 0;
        });
   
        $validator = Validator::make($input, [
            'user_id' => "required|exists:users,id|uniqueSubscription:{$request['website_id']}",
            'website_id' => "required|exists:websites,id",
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $subscription = WebsiteUser::create($input);
   
        return $this->sendResponse(new SubscriptionResource($subscription), 'Subscriped successfully.');
    }
}
