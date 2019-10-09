## About Lancers

Lancer is a simple

##installation step

- Clone the repo.
- cd Lancers-App.
- composer install
- copy .env.example to .env .
- Add the database details to the .env.
- php artisan key:generate
- php artisan config:cache
- php artisan migrate
- php artisan serve

##Add fill in subscription plans to table
- `php artisan subscriptions:table`

##Add countries, states and currencies to table
- `php artisan countriesandstates:table`
- `php artisan currencies:table`
