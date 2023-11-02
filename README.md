PHP 8.1 needed

1. composer install
2. php artisan migrate
3. php artisan db:seed
4. php artisan serve

3 endpoints:
1. POST http://127.0.0.1:8000/api/user
2. POST http://mindento/api/delegation
      {
         user_id: 2
         start: 2023-08-06 09:00:00
         end: 2023-08-08 08:00:00
         country_code: PL
     }
3. GET http://127.0.0.1:8000/api/delegation/index/2
      
