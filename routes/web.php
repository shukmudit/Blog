<?php

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

/* Static Pages are defined using view Static Method as below*/
Route::view('/','home.index')
        ->name('home.index');
Route::view('/contact','home.contact')
        ->name('home.contact');
/*
Route::get('/', function () {
    return view('home.index');
})->name('home.index');

Route::get('/contact',function(){
    return view('home.contact');
})->name('home.contact');

*/

Route::get('/posts/{id}',function($id){
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
    abort_if(!isset($posts[$id]),404); 
    return view('posts.show',['post'=>$posts[$id]]);
})->name('posts.show');

Route::get('/recent-posts/{days_ago?}',function($daysAgo=20){
    return 'Blog Post '.$daysAgo.' Days Ago';
})->name('posts.recent.index');
