<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installazione Laravel

```bash
cd your parent_folder_path

composer create-project --prefer-dist laravel/laravel:^9.2 your_project_name_here

cd your_project_name_here

code . -r

php artisan serve

ctrl + c

```
## Configurazione Laravel
```bash
composer require pacificdev/laravel_9_preset

php artisan preset:ui bootstrap

npm install

npm install --save @fortawesome/fontawesome-free

#in vite config aggiungo agli alias
'~@fortawesome': path.resolve(__dirname, 'node_modules/@fortawesome'),

#copio la cartella dei webfont e se voglio la rinomino

#installo dbal per migration e seeder
composer require doctrine/dbal:^3.3


#comandi git

git init
git add .
git commit -m "first commit"
git branch -M main
git remote add origin your_git_url 
git push -u origin main


```
## Clono progetto da github 

```bash
# copio file .env.example e lo rinomino in .env

composer install

php artisan key:generate

npm install

# creo il database da phpmyadmin

# inserisco i dati per il collegamento al db in env

-------------

# metodo CRUD (sezione resource controller sulla pagina di laravel)


# creo un model e relativi resources-controller-migration-seeder
php artisan make:model Comic -rcms
# aggiungo a routes>web in cima, il link al file controller
use App\Http\Controllers\NomeController;
# aggiungo le rotte in routes>web
Route::resource('cartelladellepagineinviews', NomeController::class);

# e se volessi solo il controller?
# creo controller coi nuovi metodi CRUD 
php artisan make:controller NomeController --resources


# controllo le routes per capire se il CRUD è ben impostato
# (è importante pure per esaminare i nomi delle route oltre che metodi con cui i dati vengono inviati!)
php artisan route:list --except-vendor

---------------

# altrimenti

#creo migration es.
php artisan make:migration create_nome_tabella_table
php artisan make:migration update_users_table --table=users
php artisan make:migration add_phone_number_to_users_table

#lanciare migration
php artisan migrate

#revert migration
php artisan migrate:rollback

#creare il model (necessario per salvare dati su db con seeder)
php artisan make:model Nome

#popolare il db  es. (ricordati che il seeder è sempre in singolare es ComicTableSeeder)
php artisan make:seeder UsersTableSeeder

php artisan db:seed --class=UsersTableSeeder

# preparo le rotte file web.php es. 
Route::get('/books', [BookController::class, 'index'])->name('books.index');

# creo controller
php artisan make:controller NomeController

# aggiungo a routes>web in cima, il link al file controller
use App\Http\Controllers\NomeController;
# preparo le rotte file web.php es. 
Route::get('/books', [BookController::class, 'index'])->name('books.index');

# controllo le routes per capire se le rotte sono ben impostate
# (è importante pure per esaminare i nomi delle route oltre che metodi con cui i dati vengono inviati!)
php artisan route:list --except-vendor


# creo le views relative

```
