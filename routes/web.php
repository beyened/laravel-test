<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
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
//
//Route::get('/', function () {
//    return view('welcome');
//});

//Route with  controller
//Route::get('/post/{id}', [postController::class, 'index']);

//Route::resource('post', postController::class);
//
//Route::get('contact',[postController::class,'contact']);
//
//Route::get('post/{id}/{name}',[postController::class,'show_post']);
//

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


/*
|--------------------------------------------------------------------------
| DATABASE RAW SQL Queries
|--------------------------------------------------------------------------
*/
//
//Route::get('/insert', function (){
//   DB::insert('insert into posts (title, body) values (?, ?)', ['PHP with Laravel', 'Laravel is the bst that has happened to PHP']);
//});
//
//Route::get('/read', function(){
//  $result = DB::select('select * from posts where id= ?',[1]);
//  foreach ($result as $item){
//      echo $item->title;
//      echo $item->body;
//  }
//
//});
//
//Route::get('/readAll', function(){
//    $result = DB::select('select * from posts');
//
////    var_dump($result);
////    return $result;
//
//    foreach ($result as $item){
//        echo $item->title." ";
//        echo $item->body."</br>";
//    }
//
//});
//
//Route::get('update', function(){
//
//    $result = DB::update('update posts set title = ? Where id = ?',['Updatated Title Now', 1]);
//    if ($result){
//        echo "Updated";
//    }else{
//        echo "Error on Update";
//    }
//});
//
//Route::get('delete', function(){
//   $result = DB::delete('delete from posts where id = ?',[1]);
//   if($result){
//       echo "Deleted";
//   }else{
//       echo "Error on Delete";
//   }
//});


/*
|--------------------------------------------------------------------------
| DATABASE Eloquent ORM SQL Queries
|--------------------------------------------------------------------------
*/

Route::get('/read', function(){
   $posts = Post::all();
   foreach ($posts as $post){
       echo $post->title;
   }
});

Route::get('/find', function(){
    $posts = Post::find(3);

//    if(is_null($posts)){
//        return abort(404);
//    }

    echo $posts->title;
    dd($posts);

});

Route::get('/findwhere', function (){
    $posts = Post::where('id',3)->orderBy('id', 'desc')->take(1)->get();
    foreach ($posts as $post){
        echo $post->title;
    }
});

Route::get('/findmore', function (){
    $posts = Post::findOrFail(1);
    return $posts;

//    $posts = Post::where('id', '<', 50)->firstOrFail();
//    return $posts;

});

Route::get('/basicinsert', function (){
   $post = new Post;
   $post->title = "New Title";
   $post->body = "Wow ORM is cool";

   $post->save();
});

Route::get('/basicupdate', function (){
    $post = Post::find(3);

    $post->title = "New Title 2";
    $post->body = "Wow ORM is cool 2";

    $post->save();
});

Route::get('/create', function(){
   Post::create(['title'=>'The Create methond', 'body'=>'learn PHP']);
});

//Based on two constraints
Route::get('/update', function (){
    Post::where('id', 4)->where('title', 'New Title')->update(['title'=>'NEW PHP Title', 'body'=>'New PHP Title 4']);
});

Route::get('/delete', function (){
    $post = Post::find(2);
    $post->delete();
});

Route::get('/delete2', function (){

//    Post::destroy([4,5]);

    Post::where('id', '<', 50)->delete();

});

Route::get('/softdelete', function (){
    Post::find(5)->delete();

});

//Route::get('/findsoftdeleted', function (){
//    $posts = DB::select('select * from posts where deleted_at IS NOT NULL');
//
//    foreach ($posts as $post){
//        echo $post->title;
//    }
//});

Route::get('/readsoftdelete', function (){
//    $post = Post::find(2);
//    return $post;

//    $posts = Post::withTrashed()->where('id',1)->get();
//    foreach ($posts as $post){
//        echo $post->title;
//    }

    $posts = Post::onlyTrashed()->get();
    foreach ($posts as $post){
        echo $post->title;
    }

//    return $posts;

});


Route::get('/restore', function (){
    Post::withTrashed()->where(['id' => 1, 'is_admin' => 0])->restore();
});

Route::get('/forcedelete', function (){
   Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
});








