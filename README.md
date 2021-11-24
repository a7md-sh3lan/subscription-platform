## SUBSCRIPTION PLATFORM

## STEPS:
1- Clone the repo.
2- Create .env file and paste .env.example in it (Please put suitable email configuration).
3- Run: composer install
4- Run: php artisan key:generate
5- Run: php artisan migrate
6- Run: php artisan db:seed --class=UsersTableSeeder
7- Run: php artisan db:seed --class=WebsitesTableSeeder
8- Run: php artisan serve
9- In another terminal tab run: php artisan queue:work
10- import laravel task.postman_collection from the root folder in the postman.
11- use the "Subscripu user for website" end point to subscripe some users in some websites (withh  VALIDATION).
12- use the "Create New Post" end point to store new post in specific website.
13- check your sent folder in mail.
