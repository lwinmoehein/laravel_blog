## Laravel Blog ##

### .env setup ###
- add your agolia api keys
- add your database credentials

### composer setup ###
- run composer install
- run php artisan key:generate
- run php artisan storage:link
- run php artisan migrate
- run php artisan scout:import "App\Article"
- run php artisan db:seed --class=UserSeeder
- run php artisan db:seed
