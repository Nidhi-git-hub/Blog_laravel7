//Upload About Image
            if($request->hasfile('about_image')){
            	echo $img_tmp = Input::file('aboutImage');
            	if($img_tmp->isValid()){
            		//image path code
            		$extention = $img_tmp->getClientOriginalExtention();
            		$filename = rand(111,99999).'.'.$extention;
            		$img_path = 'uploads/about/'.$filename;

            		//Image Resize
            		Image::make($img_tmp)->resize(500,500)->save($img_tmp);
            		$about->aboutImage = $filename;
            	}
        	}
        	//Upload Project Image
            if($request->hasfile('project_image')){
            	echo $img_tmp1 = Input::file('projectImage');
            	if($img_tmp1->isValid()){
            		//image path code
            		$extention1 = $img_tmp1->getClientOriginalExtention();
            		$filename1 = rand(111,99999).'.'.$extention1;
            		$img_path1 = 'uploads/about/'.$filename1;

            		//Image Resize
            		Image::make($img_tmp1)->resize(500,500)->save($img_tmp1);
            		$about->projectImage = $filename1;
            	}
        	}

             if($request->hasFile('smallImage')){
                $file=$request->file('smallImage');
                $filename='smallImage' . $blogPost->id.'.'.$file->getClientOriginalExtension();
                $file->move("uploads/blogPost",$filename);

                $blogPost->smallImage=$filename;
                $blogPost->save();
            }
            if($request->hasFile('mainImage')){
                $file1=$request->file('mainImage');
                $filename1='mainImage' . $blogPost->id.'.'.$file1->getClientOriginalExtension();
                $file1->move("uploads/blogPost",$filename1);

                $blogPost->mainImage=$filename1;
                $blogPost->save();
            }

            $file=$request->file('smallImage');
                $filename='smallImage' . $blogPost->id.'.'.$file->getClientOriginalExtension();
                $file->move("uploads/blogPost",$filename);
                $blogPost->smallImage=$filename;
                $updated=$blogPost->save();

                $file1=$request->file('mainImage');
                $filename1='mainImage' . $blogPost->id.'.'.$file1->getClientOriginalExtension();
                $file1->move("uploads/blogPost",$filename1);
                $blogPost->mainImage=$filename1;
                $updated=$blogPost->save();


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
            // echo "<pre>";print_r($data);die;z
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
                $filename='smallImage' . $blogPost->id.'.'.$file->getClientOriginalExtension();
                $file->move("uploads/blogPost",$filename);

                $blogPost->smallImage=$filename;
                $blogPost->save();
            }
            if($request->hasFile('mainImage')){
                $file1=$request->file('mainImage');
                $filename1='mainImage' . $blogPost->id.'.'.$file1->getClientOriginalExtension();
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
             if($request->hasFile('smallImage') && $request->hasFile('mainImage')){

                $file=$request->file('smallImage');
            $filename='smallImage' . $blogPost->id.'.'.$request->smallImage->extension();
            $file->move("upload/blogPost",$filename);

            $file1=$request->file('mainImage');
            $filename1='mainImage' . $blogPost->id.'.'.$request->mainImage->extension();
            $file1->move("upload/blogPost",$filenam1);
                
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

                $file=$request->file('smallImage');
                $filename='smallImage' . $blogPost->id.'.'.$file->getClientOriginalExtension();
                $file->move("uploads/blogPost",$filename);
                $blogPost->smallImage=$filename;
                $updated=$blogPost->save();

                $file1=$request->file('mainImage');
                $filename1='mainImage' . $blogPost->id.'.'.$file1->getClientOriginalExtension();
                $file1->move("uploads/blogPost",$filename1);
                $blogPost->mainImage=$filename1;
                $updated=$blogPost->save();

            }else{
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
            }
            return redirect('/admin/view-blogPost')->with('flash_message_success','Blog Post Detail has been updated');
        }
        $blogPost = BlogPost::where(['id'=>$id])->first();
        return view('Admin.BlogPost.editBlogPost',compact('blogPost'));
    }
}
