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
	    
	    <article class="blog-post px-3 py-5 p-md-5">
		    <div class="container">
			    <header class="blog-post-header">
				    <h2 class="title mb-2">{{$blogPost->mainHead}}</h2>
				    <div class="meta mb-3"><span class="date">Published 3 months ago</span><span class="time">5 min read</span><span class="comment"><a href="#">4 comments</a></span></div>
			    </header>
			    
			    <div class="blog-post-body">
				    <figure class="blog-banner">
				    	@php if (!empty($blogPost->mainImage))
                        {
                        @endphp
				        <a href="{{url('/uploads/blogPost/'.$blogPost->mainImage)}}"><img class="img-fluid" src="{{url('/uploads/blogPost/'.$blogPost->mainImage)}}" alt="image"></a>
                        @php 
                        } else {
                        @endphp 
                        
                        @php
                        }
                        @endphp
				    </figure>
				    <p>{{$blogPost->body}}</p>
				    
				    <h3 class="mt-5 mb-3">{{$blogPost->codeHead}}</h3>
				    <p>{{$blogPost->codeBody}}</p>
				    <h3 class="mt-5 mb-3">{{$blogPost->typoHead}}</h3>
				    <p>{{$blogPost->typoBody}}</p>
					<h5 class="my-3">{{$blogPost->quoteHead}}</h5>
					<blockquote class="blockquote m-lg-5 py-3 pl-4 px-lg-5">
						<p class="mb-2">{{$blogPost->quoteBody}}</p>
						<footer class="blockquote-footer">{{$blogPost->quoteName}}</footer>
					</blockquote>
			    </div>
				    
			    <nav class="blog-nav nav nav-justified my-5">
				 
				</nav>
				
		    </div><!--//container-->
	    </article>
	    
@endsection