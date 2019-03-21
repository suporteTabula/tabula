<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;

class AdminBlogController extends Controller
{
    public function index()
    {
    	$posts = BlogPost::get();
    	return view('admin.blog.index')->with('posts', $posts);
    }

    public function createPost()
    {
    	return 'ok';
    }
}