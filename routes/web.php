<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $posts = Sheets::collection('posts') -> all();
    

    return view('posts.index', [
        'posts' => $posts
    ]);
});

Route::get('/post/{slug}', function($slug){


    $post = Sheets::collection('posts') -> all() -> where('slug', $slug) -> first();

    abort_if(is_null($post), 404);


    return view('posts.post', [
        'post' => $post
    ]);
});

Route::view('/test', 'app');

Route::get('/author/{author}', function($author){
    $posts = Sheets::collection('posts') -> all() -> filter(fn (Post $post) => $post->author == $author);

    abort_if(is_null($posts), 404);

    return view('authors.show', [
        'posts' => $posts,
        'authorName' => $posts->first()->authorName,
    ]);
});

Route::get('/tags/{tag}', function($tag){
    $posts = Sheets::collection('posts') -> all() -> filter(fn (Post $post) => in_array($tag, $post->tags ));

    abort_if(is_null($posts), 404);

    return view('tags.show', [
        'posts' => $posts,
        'tag' => $tag,
    ]);
});