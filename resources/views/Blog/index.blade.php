@extends('Blog.layouts.master')
@section('content')
    @foreach($sidebar as $sidebars)
    <header class="header text-center">	    
	    <h1 class="blog-name pt-lg-4 mb-0"><a href="index.html">{{$sidebars->name}}</a></h1>
        
	    <nav class="navbar navbar-expand-lg navbar-dark" >
           
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navigation" class="collapse navbar-collapse flex-column" >
				<div class="profile-section pt-3 pt-lg-0">
					@php if (!empty($sidebars->selfImage))
                    {
                    @endphp
				    <img class="profile-image mb-3 rounded-circle mx-auto" src="{{url('/uploads/'.$sidebars->selfImage)}}" alt="image" >
                    @php 
                    } else {
                    @endphp 
                    
                    @php
                    }
                    @endphp
					<div class="bio mb-3">{{$sidebars->aboutme}}<br><a href="{{url('/about-me')}}">Find out more about me</a></div><!--//bio-->
					<ul class="social-list list-inline py-3 mx-auto">
			            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
			            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
			            <li class="list-inline-item"><a href="#"><i class="fab fa-github-alt fa-fw"></i></a></li>
			            <li class="list-inline-item"><a href="#"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
			            <li class="list-inline-item"><a href="#"><i class="fab fa-codepen fa-fw"></i></a></li>
			        </ul><!--//social-list-->
			        <hr> 
				</div><!--//profile-section-->
				
				<ul class="navbar-nav flex-column text-left">
					<li class="nav-item">
					    <a class="nav-link" href="{{url('/')}}"><i class="fas fa-home fa-fw mr-2"></i>Blog Home</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" href="{{url('/')}}"><i class="fas fa-bookmark fa-fw mr-2"></i>Blog Post</a>
					</li>
					<li class="nav-item">
					    <a class="nav-link" href="{{url('/about-me')}}"><i class="fas fa-user fa-fw mr-2"></i>About Me</a>
					</li>
				</ul>
				
				<div class="my-2 my-md-3">
				    <a class="btn btn-primary" href="{{url('/about-me')}}" target="_blank">Get in Touch</a>
				</div>
			</div>
		</nav>
    </header>
    @endforeach
    
    <div class="main-wrapper">
	    <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">DevBlog - A Blog Template Made For Developers</h2>
			    <div class="intro">Welcome to my blog. Subscribe and get my latest blog post in your inbox.</div>
			    <form class="signup-form form-inline justify-content-center pt-3">
                    <div class="form-group">
                        <label class="sr-only" for="semail">Your email</label>
                        <input type="email" id="semail" name="semail1" class="form-control mr-md-1 semail" placeholder="Enter email">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
		    </div><!--//container-->
	    </section>
	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
		    	@foreach($blogPost as $blogPosts)
			    <div class="item mb-5">
				    <div class="media">
				    	@php if (!empty($blogPosts->smallImage))
                        {
                        @endphp
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="{{url('/uploads/blogPost/'.$blogPosts->smallImage)}}" alt="image">
                        @php 
                        } else {
                        @endphp 
                        
                        @php
                        }
                        @endphp
					    <div class="media-body">
						    <h3 class="title mb-1"><a href="blog-post.html">{{$blogPosts->mainHead}}</a></h3>
						    <div class="meta mb-1"><span class="date">Published 2 days ago</span><span class="time">5 min read</span><span class="comment"><a href="#">8 comments</a></span></div>
						    <div class="intro">{{$blogPosts->smallBody}}</div>
						    <a class="more-link" href="{{url('/blogPost/'.$blogPosts->id)}}">Read more &rarr;</a>
					    </div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
			    @endforeach
			    
			    <nav class="blog-nav nav nav-justified my-5">
				  
				</nav>
				
		    </div>
	    </section>

@endsection