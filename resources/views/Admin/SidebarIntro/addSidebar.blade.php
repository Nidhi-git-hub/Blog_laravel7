@extends('Admin.layouts.master')
@section('title','Add Sidebar Inroduction')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-user"></i>
               </div>
               <div class="header-title">
                  <h1>Sidebar Inroduction</h1>
                  <small>Add Sidebar Inroduction</small>
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
                              <a class="btn btn-add " href="{{url('admin/view-sidebar')}}"> 
                              <i class="fa fa-list"></i>  View Sidebar Inroduction </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/admin/add-sidebar')}}" method="post" enctype="multipart/form-data">
                           	{{csrf_field()}}
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                              </div>
                              <div class="form-group">
                                 <label>Self Image</label>
                                 <input type="file" name="selfImage" id="selfImage">
                              </div>
                              <div class="form-group">
                                 <label>About Me</label>
                                 <input type="text" class="form-control" name="aboutme" id="aboutme" placeholder="Enter about yourself" maxlength="500" required>
                              </div>
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Sidebar">
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