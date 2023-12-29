<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

INSTALLATION <br>
-composer install (install dependencies)<br>
-cp .env.example .env (generate env)<br>
-php artisan key:generate (generate key untuk env)<br>
-php artisan migrate (up table dari migration, ingat sebelum menjalankan modif file env dengan sql masing")<br>
-php artisan passport:install (install passport key)<br>
-php artisan db:seed (run seeder agar bisa login sesuai user yang ada dipostman)<br>
-php artisan test (menjalankan unit test)

FILE YANG SUDAH DI MODIF <br>
-appcontroller <br>
-app/model <br>
-routes/api <br>
-database/factory <br>
-database/migration <br>
-test/feature
