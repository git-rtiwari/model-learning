# Configuration
```
cp .env.example .env
```

### Run the below command after setting-up database
```shell
php artisan key:generate
php artisan migrate
php artisan db:seed --class=StateContriesSeeder
```
