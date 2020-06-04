<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class BlogController extends Controller
{
    public function index(Posts $post)
    {
        //mengabil data berdasarakan data terbaru
        $data = $post->orderBy('created_at', 'desc')->paginate(4);
        return view('blog', compact('data'));
    }
}
