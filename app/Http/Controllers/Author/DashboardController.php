<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalposts = Post::where('created_by', Auth::user()->id)->count();
        $totalcomments = Comment::where('user_id', Auth::user()->id)->count();
        $pendingposts = Post::where('created_by',Auth::user()->id)->where('status','1')->count();
        $rejectedposts = Post::where('created_by',Auth::user()->id)->where('status','0')->count();
        $post = Post::where('created_by',Auth::user()->id)->get();
        return view('home', compact('totalposts','totalcomments','pendingposts','post'));
    }
}
