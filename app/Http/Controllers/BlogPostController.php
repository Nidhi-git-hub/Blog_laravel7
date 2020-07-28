<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\BlogPost;

class BlogPostController extends Controller
{
    public function addBlogPost(Request $request){
    	if($request->isMethod('post')){

            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $blogPost= new BlogPost;
            $blogPost->mainHead=$data['mainHead'];
            $blogPost->smallBody=$data['smallBody'];
            $blogPost->body=$data['body'];
            $blogPost->codeHead=$data['codeHead'];
            $blogPost->codeBody=$data['codeBody'];
            $blogPost->codeExample=$data['codeExample'];
            $blogPost->typoHead=$data['typoHead'];
            $blogPost->typoBody=$data['typoBody'];
            $blogPost->quoteHead=$data['quoteHead'];
            $blogPost->quoteBody=$data['quoteBody'];
            $blogPost->quoteName=$data['quoteName'];
            $blogPost->save();
            if($request->hasFile('smallImage')){
                $file=$request->file('smallImage');
                $filename='smallImage' . time().'.'.$file->getClientOriginalExtension();
                $file->move("uploads/blogPost",$filename);

                $blogPost->smallImage=$filename;
                $blogPost->save();
            }
            if($request->hasFile('mainImage')){
                $file1=$request->file('mainImage');
                $filename1='mainImage' . time().'.'.$file1->getClientOriginalExtension();
                $file1->move("uploads/blogPost",$filename1);

                $blogPost->mainImage=$filename1;
                $blogPost->save();
            }

            return redirect('/admin/view-blogPost')->with('flash_message_success','Your Blog Post is successfully added');
        }
    	return view('Admin.BlogPost.addBlogPost');
    }
    public function viewBlogPost(){
        $blogPost=BlogPost::all();
        return view('Admin.BlogPost.viewBlogPost',compact('blogPost'));
    }
    public function displayBlogPost($id){
    	$blogPost=BlogPost::find($id);
        return view('Admin.BlogPost.displayBlogPost',compact('blogPost'));
    }
    public function editBlogPost(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
             	
                $blogPost=BlogPost::find($request->id);
                $blogPost->mainHead=$data['mainHead'];
            	$blogPost->smallBody=$data['smallBody'];
            	$blogPost->body=$data['body'];
            	$blogPost->codeHead=$data['codeHead'];
            	$blogPost->codeBody=$data['codeBody'];
            	$blogPost->codeExample=$data['codeExample'];
            	$blogPost->typoHead=$data['typoHead'];
            	$blogPost->typoBody=$data['typoBody'];
            	$blogPost->quoteHead=$data['quoteHead'];
            	$blogPost->quoteBody=$data['quoteBody'];
            	$blogPost->quoteName=$data['quoteName'];
                $updated=$blogPost->save();

            if($request->hasFile('smallImage')){
                $file=$request->file('smallImage');
                $filename='smallImage' . time().'.'.$file->getClientOriginalExtension();
                $file->move("uploads/blogPost",$filename);

                $blogPost->smallImage=$filename;
                $blogPost->save();
            }
            if($request->hasFile('mainImage')){
                $file1=$request->file('mainImage');
                $filename1='mainImage' . time().'.'.$file1->getClientOriginalExtension();
                $file1->move("uploads/blogPost",$filename1);

                $blogPost->mainImage=$filename1;
                $blogPost->save();
            }
            
            return redirect('/admin/view-blogPost')->with('flash_message_success','Blog Post Detail has been updated');
        }
        $blogPost = BlogPost::where(['id'=>$id])->first();
        return view('Admin.BlogPost.editBlogPost',compact('blogPost'));
    }
    public function deleteBlogPost($id=null){
        BlogPost::where(['id'=>$id])->delete();
        Alert::success('Deleted successfully', 'Success Message');
        return redirect()->back();
    }
}
