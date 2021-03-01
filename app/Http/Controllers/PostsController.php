<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View;
use Illuminate\Http\Request;


/*pour récupérer des données get ou post je dois faire un "use illuminate\Http\Request;"*/

class PostsController extends Controller
{
    public function index (){
        $posts = Post::orderBy('created_at', 'DESC')->take(5)->get();
        return view('posts.index', compact('posts'));
    }

    public function show(int $id){
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function morePosts(Request $request){
      $posts=Post::orderBy('created_at', 'DESC')->take(5)->offset($request->get('offset'))->get();
    return view('posts.morePosts', compact('posts'));

}
}
