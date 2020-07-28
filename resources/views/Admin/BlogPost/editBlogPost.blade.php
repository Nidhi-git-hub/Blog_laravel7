@extends('Admin.layouts.master')
@section('title','Edit Blog Post')
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
                  <small>Edit Blog Post</small>
               </div>
            </section>
            <!-- Main content -->
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
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('admin/view-blogPost')}}"> 
                              <i class="fa fa-list"></i>  View Blog Post </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/admin/edit-blogPost/'.$blogPost->id)}}" method="post" enctype="multipart/form-data">
                           	{{csrf_field()}}
                              <div class="form-group">
                                 <label>Main Heading</label>
                                 <input type="text" class="form-control" name="mainHead" id="mainHead" value="{{$blogPost->mainHead}}">
                              </div>
                              <div class="form-group">
                                 <label>Small Image</label>
                                 <img src="{{url('/uploads/blogPost/'.$blogPost->smallImage)}}" style="height: 150px;width: 150px">
                                 <input type="file" name="smallImage" id="smallImage" value="{{asset($blogPost->smallImage)}}">
                              </div>
                              <div class="form-group">
                                 <label>Small Description</label>
                                 <input type="text" class="form-control" name="smallBody" id="smallBody" value="{{$blogPost->smallBody}}" maxlength="500">
                              </div>
                              <div class="form-group">
                                 <label>Main Image</label>
                                 <img src="{{url('/uploads/blogPost/'.$blogPost->mainImage)}}" style="height: 150px;width: 150px">
                                 <input type="file" name="mainImage" id="mainImage" value="{{asset($blogPost->mainImage)}}">
                              </div>
                              <div class="form-group">
                                 <label>Main Description</label>
                                 <input type="text" class="form-control" name="body" id="body" value="{{$blogPost->body}}" maxlength="500">
                              </div>
                              <div class="form-group">
                                 <label>Heading for code</label>
                                 <input type="text" class="form-control" name="codeHead" id="codeHead" value="{{$blogPost->codeHead}}">
                              </div>
                              <div class="form-group">
                                 <label>Code Description</label>
                                 <input type="text" class="form-control" name="codeBody" id="codeBody" value="{{$blogPost->codeBody}}" maxlength="500">
                              </div>
                              <div class="form-group">
                                 <label>Code Example</label>
                                 <input type="text" class="form-control" name="codeExample" id="codeExample" value="{{$blogPost->codeExample}}" maxlength="500">
                              </div>
                              <div class="form-group">
                                 <label>Head for typography</label>
                                 <input type="text" class="form-control" name="typoHead" id="typoHead" value="{{$blogPost->typoHead}}">
                              </div>
                              <div class="form-group">
                                 <label>Typography Description</label>
                                 <input type="text" class="form-control" name="typoBody" id="typoBody" value="{{$blogPost->typoBody}}" maxlength="500">
                              </div>
                              <div class="form-group">
                                 <label>Heading for Quote</label>
                                 <input type="text" class="form-control" name="quoteHead" id="quoteHead" value="{{$blogPost->quoteHead}}" maxlength="500">
                              </div>
                              <div class="form-group">
                                 <label>Quote</label>
                                 <input type="text" class="form-control" name="quoteBody" id="quoteBody" value="{{$blogPost->quoteBody}}" maxlength="500">
                              </div>
                              <div class="form-group">
                                 <label>Quote by</label>
                                 <input type="text" class="form-control" name="quoteName" id="quoteName" value="{{$blogPost->quoteName}}" maxlength="500">
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Edit Blogs">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->


@endsection