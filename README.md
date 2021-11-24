## SUBSCRIPTION PLATFORM

## STEPS:
- Clone the repo.
- Create .env file and paste .env.example in it (Please put suitable email configuration).
- Run: composer install
- Run: php artisan key:generate
- Run: php artisan migrate
- Run: php artisan db:seed --class=UsersTableSeeder
- Run: php artisan db:seed --class=WebsitesTableSeeder
- Run: php artisan serve
- In another terminal tab run: php artisan queue:work
- import laravel task.postman_collection from the root folder in the postman.
- use the "Subscripu user for website" end point to subscripe some users in some websites (withh  VALIDATION).
- use the "Create New Post" end point to store new post in specific website.
- check your sent folder in mail that you put in .env