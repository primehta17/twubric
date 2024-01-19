STEPS


1. git clone https://github.com/primehta17/twubric.git
2. cd twubric
3. composer install
4. create database teamiedemo

5. copy .env.example and rename it .env
6. Add Database Credential like yours in .env
7. add this  in .env change accordingly -
TWITTER_CLIENT_ID=26NdKBb7D5eeMCbKbhabMa0Bd
TWITTER_CLIENT_SECRET=Z33byo0J9QRsm2xTmugFTsyEgBJFPxUywiVDYeHAp6jcAO1OhD


TWITTER_CONSUMER_KEY=26NdKBb7D5eeMCbKbhabMa0Bd
TWITTER_CONSUMER_SECRET=Z33byo0J9QRsm2xTmugFTsyEgBJFPxUywiVDYeHAp6jcAO1OhD
TWITTER_ACCESS_TOKEN=1747146633853497344-VI8gmk5HwoD1oO6b1juihQlrNTA7ED
TWITTER_ACCESS_TOKEN_SECRET=fBGYRKHqk2JZfLIqlWCEoFsqQtlzraKlAaW4HiuV4iclH
8. DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=teamiedemo DB_USERNAME=root DB_PASSWORD=

9. migrate tables - php artisan migrate

10. Run Project inside that directory - php artisan serve

11. php artisan key:generate
12. in config/services.php  add  accordingly 'twitter' => [ 'redirect' => 'https://ac9d-106-51-162-130.ngrok-free.app/callback', ]  i am using ngrok

13. Open in Browser
14. http://localhost:8000 or https://ac9d-106-51-162-130.ngrok-free.app  
