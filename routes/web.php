<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


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





// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// })->middleware(['auth']);

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']) 
    ->middleware(['auth']) -> name('posts.create');

Route::get('/posts', [PostController::class, 'index']) ->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show']) -> name('posts.show');
Route::get('/profile/showPostsComments/{id}', [ProfileController::class, 'showPostsAndComments']) ->name('profile.showPostsAndComments');

Route::post('/posts/store', [PostController::class, 'store']) 
    ->middleware(['auth']) -> name('posts.store');

Route::get('/posts/edit/{id}', [PostController::class, 'edit']) 
    ->middleware(['auth']) ->name('posts.edit');
    
Route::patch('/posts/update/{id}', [PostController::class, 'update']) 
    ->middleware(['auth']) ->name('posts.update');

// Route::delete('/postImages/delete/{id}', [PostImageController::class, 'delete']) ->name('postImages.delete');

Route::post('/comments/store', [CommentController::class, 'store']) -> name('comments.store');







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
