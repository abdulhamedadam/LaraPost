<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserPOSTController extends Controller
{
    public function show(User $user,Post $post){

   $posts=$user->posts()->with(['user','likes'])->latest()->paginate(20);
        return view('users.posts.show',[
            'user'=>$user,
            'posts'=>$posts
          ]);

    }

}