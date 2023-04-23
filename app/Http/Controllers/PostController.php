<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $posts=Post::get(); //all posts
        $posts=Post::latest()->with(['user','likes'])->paginate(6);
       return view('posts.index',['posts'=>$posts]);
    }

    public function show(Post $post)
    {
        return view('posts.showSinglePost',[
            'post'=>$post,
        ]);
    }

    //store post
    public function store(Request $request)
    {
       $this->validate($request,[
         'body'=>'required'
       ]);


    $request->user()->posts()->create([
        'user_id'=>auth()->user()->id,
        'body'=>$request->body
    ]);
   return back();
    }


    //delete posts
    public function delete(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }
}