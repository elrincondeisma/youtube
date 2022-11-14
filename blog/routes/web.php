<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
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
// RUTAS PUBLICAS
Route::get('/', function () {
    return view('allPosts', [
        'posts' => Post::where('active', true)->get()
    ]);
});



// RUTAS PRIVADAS
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'view'])->name('posts.view');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');


require __DIR__.'/auth.php';
