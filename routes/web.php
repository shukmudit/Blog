<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
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

/* Static Pages are defined using view Static Method as below*/

Route::view('/', 'home.index')
    ->name('home.index');
Route::view('/contact', 'home.contact')
    ->name('home.contact');
/*
Route::get('/', function () {
    return view('home.index');
})->name('home.index');

Route::get('/contact',function(){
    return view('home.contact');
})->name('home.contact');

*/

Route::get('/posts/{id}', function ($id) {
    $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel'
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP'
        ]
    ];
    abort_if(!isset($posts[$id]), 404);
    return view('posts.show', ['post' => $posts[$id]]);
})->name('posts.show');


/* blog creation Create, read , update , delete, */
Route::get('/blog', function () {
    return view('Blog.blog');
});

//blog addition
Route::post('blog/add', [BlogController::class, 'blogAdd'])->name('store.blog');

//blog details
Route::get('/blogdetails', function () {
    $blogs = DB::table('blog')->orderBy('title', 'asc')->paginate(15);
    return view('Blog.blogdetails', compact('blogs'));
});

//blog details
Route::get('/blog/delete/{id}', [BlogController::class, 'delete']);

//blog edit
Route::get('/blog/edit/{id}', [BlogController::class, 'Edit']);

//blog update

Route::post('/blog/update/{id}', [BlogController::class, 'update']);



Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 20) {
    return 'Blog Post ' . $daysAgo . ' Days Ago';
})->name('posts.recent.index');