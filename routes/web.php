<?php

use App\Models\Photo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;

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
//
//Route::get('/read', function(){
//   $posts = Post::all();
//   foreach ($posts as $post){
//       echo $post->title;
//   }
//});
//
//Route::get('/find', function(){
//    $posts = Post::find(3);
//
////    if(is_null($posts)){
////        return abort(404);
////    }
//
//    echo $posts->title;
//    dd($posts);
//
//});
//
//Route::get('/findwhere', function (){
//    $posts = Post::where('id',3)->orderBy('id', 'desc')->take(1)->get();
//    foreach ($posts as $post){
//        echo $post->title;
//    }
//});
//
//Route::get('/findmore', function (){
//    $posts = Post::findOrFail(1);
//    return $posts;
//
////    $posts = Post::where('id', '<', 50)->firstOrFail();
////    return $posts;
//
//});
//
//Route::get('/basicinsert', function (){
//   $post = new Post;
//   $post->title = "New Title";
//   $post->body = "Wow ORM is cool";
//
//   $post->save();
//});
//
//Route::get('/basicupdate', function (){
//    $post = Post::find(3);
//
//    $post->title = "New Title 2";
//    $post->body = "Wow ORM is cool 2";
//
//    $post->save();
//});
//
Route::get('/create', function(){
   Post::create(['title'=>'Post Test', 'body'=>'Tested by learn PHP']);
   Photo::create(['path'=>'image1.jpg', 'imageable_type'=>'App\Models\User', 'imageable_id'=>1]);
   Photo::create(['path'=>'image2.jpg', 'imageable_type'=>'App\Models\Post', 'imageable_id'=>1]);
   User::create(['name'=>'Beyene Dabi', 'email'=>'bey@gmail.com', 'password'=>'123', 'country_id'=>1]);
   User::create(['name'=>'Desta Dabi', 'email'=>'des@gmail.com', 'password'=>'123', 'country_id'=>2]);
});
//
////Based on two constraints
//Route::get('/update', function (){
//    Post::where('id', 4)->where('title', 'New Title')->update(['title'=>'NEW PHP Title', 'body'=>'New PHP Title 4']);
//});
//
//Route::get('/delete', function (){
//    $post = Post::find(2);
//    $post->delete();
//});
//
//Route::get('/delete2', function (){
//
////    Post::destroy([4,5]);
//
//    Post::where('id', '<', 50)->delete();
//
//});
//
//Route::get('/softdelete', function (){
//    Post::find(5)->delete();
//
//});
//
////Route::get('/findsoftdeleted', function (){
////    $posts = DB::select('select * from posts where deleted_at IS NOT NULL');
////
////    foreach ($posts as $post){
////        echo $post->title;
////    }
////});
//
//Route::get('/readsoftdelete', function (){
////    $post = Post::find(2);
////    return $post;
//
////    $posts = Post::withTrashed()->where('id',1)->get();
////    foreach ($posts as $post){
////        echo $post->title;
////    }
//
//    $posts = Post::onlyTrashed()->get();
//    foreach ($posts as $post){
//        echo $post->title;
//    }
//
////    return $posts;
//
//});
//
//
//Route::get('/restore', function (){
//    Post::withTrashed()->where(['id' => 1, 'is_admin' => 0])->restore();
//});
//
//Route::get('/forcedelete', function (){
//   Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
//});


/*
|--------------------------------------------------------------------------
| DATABASE Eloquent Relationship
|--------------------------------------------------------------------------
*/


//// One-to-One relationship
//
//Route::get('/user/{id}/post', function ($id){
//
//    return User::find($id)->post->body;
//
//});
//
//// Inverse One-to-One relationship
//Route::get('/post/{id}/user', function ($id){
//
//    return Post::find($id)->user->email;
//
//});

// One-to-Many relationship
Route::get('/posts', function (){

    $user = User::find(1);
//    dd($user->posts);
    foreach ($user->posts as $post){
        echo $post->title."</br>";
    }
});

// Many-to-Many relationship
Route::get('/user/{id}/role', function ($id){
    $user = User::find($id);
    foreach ($user->roles as $role){
     echo $role->name;
    }

//    $user = User::find($id)->roles()->orderBy('id', 'asc')->get();
//    return $user;

});

Route::get('/role/{id}/user', function ($id){
    $role = Role::find($id);
    foreach ($role->users as $user){
        echo $user->name;
    }
});

// Accessing the intermediate table / pivot
Route::get('/user/pivot', function (){
    $user = User::find(1);

    foreach ($user->roles as $role){
        echo $role->pivot->created_at;
    }
});

Route::get('/user/country', function (){

    $country = Country::find(4);
    foreach ($country->posts as $post){
        return $post->title;
    }

});

// Polymorphic Relations

Route::get('user/photos', function (){

    $user = User::find(1);
//    $photos = $user->photos;
//    return $photos;
////    $upvotescount = $album->upvotes->count();

    foreach ($user->photos as $photo){
        return $photo;
    }

});








