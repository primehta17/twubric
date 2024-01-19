STEPS


1. git clone https://github.com/primehta17/twubric.git
2. cd twubric
3. composer install
4. create database teamiedemo

5. copy .env.example and rename it .env
6. Add Database Credential like yours in .env
7. add this  in .env change accordingly -
TWITTER_CLIENT_ID=
TWITTER_CLIENT_SECRET=


TWITTER_CONSUMER_KEY=
TWITTER_CONSUMER_SECRET=
TWITTER_ACCESS_TOKEN=
TWITTER_ACCESS_TOKEN_SECRET=
8. DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=teamiedemo DB_USERNAME=root DB_PASSWORD=

9. migrate tables - php artisan migrate

10. Run Project inside that directory - php artisan serve

11. php artisan key:generate
12. in config/services.php  add  accordingly 'twitter' => [ 'redirect' => 'https://ac9d-106-51-162-130.ngrok-free.app/callback', ]  i am using ngrok

13. Open in Browser
14. http://localhost:8000 or https://ac9d-106-51-162-130.ngrok-free.app  
