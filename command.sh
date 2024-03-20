php artisan [serve, migrate, make : [migration, model]];
php -S localhost:8000 -t public;
php artisan migrate;
php artisan migrate : refresh;
php artisan rollback; 
php artisan db:seed
php artisan make factory #Créer un fichier de création de valeur d'une table automatiquement
composer require barryvdh/laravel-debugbar --dev
php artisan ide-helper:models -M
composer create-project --prefer-dist laravel/laravel nom-du-projet
php artisan make:command MakeViewCommand // créer une commande pour créer des vues