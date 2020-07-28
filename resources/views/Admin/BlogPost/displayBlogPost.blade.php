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
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
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
                                       <th>Main Head</th>
                                       <th>Small Description</th>
                                       <th>Small Image</th>
                                       <th>Main Description</th>
                                       <th>Main Image</th>
                                       <th>Code Head</th>
                                       <th>Code Description</th>
                                       <th>Code Example</th>
                                       <th>Typography Head</th>
                                       <th>Typography Description</th>
                                       <th>Quote Head</th>
                                       <th>Quote</th>
                                       <th>Quote By</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>{{$blogPost->mainHead}}</td>
                                       <td>{{$blogPost->smallBody}}</td>
                                       <td>@php if (!empty($blogPost->smallImage))
                                    		{
                                    		@endphp
                                    		<img src="{{url('/uploads/blogPost/'.$blogPost->smallImage)}}" style="height: 150px; width: 150px" >
                                    		@php 
                                    		} else {
                                    		@endphp 
                                    		
                                    		@php
                                    		}
                                    		@endphp
                                       </td>
                                       <td>{{$blogPost->body}}</td>
                                       <td>@php if (!empty($blogPost->mainImage))
                                          {
                                          @endphp
                                          <img src="{{url('/uploads/blogPost/'.$blogPost->mainImage)}}" style="height: 150px; width: 150px" >
                                          @php 
                                          } else {
                                          @endphp 
                                          
                                          @php
                                          }
                                          @endphp
                                       </td>
                                       <td>{{$blogPost->codeHead}}</td>
                                       <td>{{$blogPost->codeBody}}</td>
                                       <td>{{$blogPost->codeExample}}</td>
                                       <td>{{$blogPost->typoHead}}</td>
                                       <td>{{$blogPost->typoBody}}</td>
                                       <td>{{$blogPost->quoteHead}}</td>
                                       <td>{{$blogPost->quoteBody}}</td>
                                       <td>{{$blogPost->quoteName}}</td>
                                    </tr>
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