<?php


use Illuminate\Support\Facades\Route;
//linko il controller alla pagina delle route altrimenti non potrei importare la Route::resource
use App\Http\Controllers\ComicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/comics');
})->name('home');

// Route::get('/comics', function () {
//     // la funzione config('nomedelfilephpdentroallacartella.nomearrayspecifico') mi permette
//     // di esportare direttamente il file dentro alla pagina
//     //così da poterne sfruttare gli array associativi all'interno
//     $comics = config('comics.comics');
//     return view('/comics.index', compact('comics'));
// })->name('comics.index');

// Route::get('/comics/{id}', function ($id) {
//     $comics = config('comics.comics');
//     if($id >= 0 && $id < count($comics)) {
//         $comic = $comics[$id];
//         return view('comics.show', compact('comic'));
//     } else {
//         abort(404);
//     }
// })->name('comics.show');


// questa dicitura mi collega direttamente al controller con sistema CRUD
Route::resource('comics', ComicController::class);
