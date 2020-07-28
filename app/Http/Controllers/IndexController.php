<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SidebarIntro;
use App\BlogPost;
use App\AboutMe;

class IndexController extends Controller
{
    public function index(){
    	$sidebar = SidebarIntro::all();
    	$blogPost = BlogPost::all();
    	return view('Blog.index')->with(compact('sidebar','blogPost'));
    }
    public function blogPosts($id){
    	$sidebar = SidebarIntro::all();
    	$blogPost=BlogPost::find($id);
    	return view('Blog.blogPost',compact('sidebar','blogPost'));
    }
    public function aboutMe(){
    	$sidebar = SidebarIntro::all();
    	$about=AboutMe::all();
    	return view('Blog.aboutMe',compact('sidebar','about'));
    }

}
