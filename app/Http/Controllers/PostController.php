<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Post;
use App\Models\User;

use DB;

class PostController extends Controller
{
    public function index(Request $request) {
        // $token = $request->get('token');
        // $user = User::where('token', $token)->first();
        // if (!$user) {
        //     return response()->json(['error' => 'Not allowed']);
        // }
        
        $posts = Post::with('user')->get(); // select * from posts
        return response()->json(['data' => $posts]);
    }

    public function test(Request $request) {
        DB::enableQueryLog();
        $posts = Post::get(); // select * from posts limit 1;

        // dd(DB::getQueryLog());
        dd($posts->toJSON());
    }

    public function posts(Request $request, User $user) {
        $posts = Post::where('user_id', $user->id)->get();
        dd($posts->toArray());
    }

    public function store(Request $request, User $user) {
        $userPost = $request->get('post');

        Post::create([
            'user_id' => $user->id,
            'post' => $userPost
        ]);

        dd('done');
    }

    public function update(Request $request, User $user, Post $post) {
        $newPost = $request->get('post');

        $post->post = $newPost;
        $post->save();
        dd('done');
    }

    public function destroy(Request $request, User $user, Post $post) {
       $post->delete();
       dd('done');
    }
}