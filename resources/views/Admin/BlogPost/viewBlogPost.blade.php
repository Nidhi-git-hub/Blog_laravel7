@extends('Admin.layouts.master')
@section('title','View Blog Post')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-file-text-o"></i>
               </div>
               <div class="header-title">
                  <h1>Blog Post</h1>
                  <small>View Blog Post</small>
               </div>
            </section>

            @if(Session::has('flash_message_error'))
            <div class="alert alert-sm alert-danger alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-sm alert-success alert-block" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
            @endif
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="{{url('admin/view-blogPost')}}">
                                 <h4>View Blog Post</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('admin/add-blogPost')}}"> <i class="fa fa-plus"></i> Add Blog Post
                                 </a>  
                              </div>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>ID</th>
                                       <th>Head</th>
                                       <th>Body</th>
                                       <th>Image</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@foreach($blogPost as $blogPosts)
                                    <tr>
                                       <td>{{$blogPosts->id}}</td>
                                       <td>{{$blogPosts->mainHead}}</td>
                                       <td>{{$blogPosts->smallBody}}</td>
                                       <td>@php if (!empty($blogPosts->smallImage))
                                    		{
                                    		@endphp
                                    		<img src="{{url('/uploads/blogPost/'.$blogPosts->smallImage)}}" style="height: 150px; width: 150px" >
                                    		@php 
                                    		} else {
                                    		@endphp 
                                    		
                                    		@php
                                    		}
                                    		@endphp
                                       </td>
                                       <td>
                                          <a href="{{url('/admin/display-all-blogPost/'.$blogPosts->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-address-book-o"></i></a>
                                          <a href="{{url('/admin/edit-blogPost/'.$blogPosts->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                          <a href="{{url('/admin/delete-blogPost/'.$blogPosts->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->

@endsection