@extends('Admin.layouts.master')
@section('title','Edit About')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>About Us</h1>
                  <small>Edit About</small>
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
                              <a class="btn btn-add " href="{{url('admin/view-about')}}"> 
                              <i class="fa fa-list"></i>  View About </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/admin/edit-about/'.$aboutDetails->id)}}" method="post" enctype="multipart/form-data">
                           	{{csrf_field()}}
                              <div class="form-group">
                                 <label>Heading</label>
                                 <input type="text" class="form-control" name="head" id="head" value="{{$aboutDetails->head}}">
                              </div>
                              <div class="form-group">
                                 <label>Image</label>
                                 <img src="{{url('/uploads/about/'.$aboutDetails->image)}}" style="height: 150px;width: 150px">
                                 <input type="file" name="image" id="image" value="{{asset($aboutDetails->image)}}">
                              </div>
                              <div class="form-group">
                                 <label>Body</label>
                                 <input type="text" class="form-control" name="body" id="body" value="{{$aboutDetails->body}}" maxlength="500" required>
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Edit About">
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