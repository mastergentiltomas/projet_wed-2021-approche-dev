<?php
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
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

// ROUTE VOYAGER----------------------------------------
// Route::get('/', function(){
//   return view('template.index');
// })->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


 // ROUTES POSTS----------------------------------------
Route::resource('posts', 'PostsController');
Route::get('/', [PostsController::class, 'index'])->name('posts.index');

Route::get('/{post}/{slug}.html',[PostsController::class, 'show'])
    ->where(['post'=> '[1-9][0-9]*',
             'slug'=> '[a-z0-9][a-z0-9\-]*'])
    ->name('posts.show');

// ROUTES CONTACT ----------------------------------------
Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');



// VIEW COMPOSER ----------------------------------------
View::composer('tags.index', function($view){
    $view->with('tags', App\Models\Tag::All());
});

View::composer('categories.index', function($view){
    $view->with('categories', App\Models\Category::All());
});

// ROUTE MOREPOSTS ----------------------------------------
Route::get('/ajax/morePosts', 'App\Http\Controllers\PostsController@morePosts')->name('posts.morePosts');
