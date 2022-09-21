<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

//Router with  controller
//Route::get('/post/{id}', [postController::class, 'index']);

//Route::resource('post', postController::class);

Route::get('contact',[postController::class,'contact']);

Route::get('post/{id}/{name}',[postController::class,'show_post']);
//
//Route::get('/contact', function(){
//    return "Contact";
//});
//
//Route::get('/post/{id}/{name}', function ($id, $name) {
//    return "This is id ".$id." name is ".$name;
//});
//
////Naming routes
//Route::get('admin/post/example',array('as'=>'admin.home',function(){
//    $url = route('admin.home');
//
//    return "this url is ".$url;
//}));
//
////Optional Parameters
//Route::get('user/{name?}', function ($name = null) {
//    return $name;
//});
