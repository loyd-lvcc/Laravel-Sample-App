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
}