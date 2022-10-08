<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
    	$blog = Blog::get();
    	return view("pages.blog")->with('blog',$blog);
    }
   
}
