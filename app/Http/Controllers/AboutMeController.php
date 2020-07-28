<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\AboutMe;

class AboutMeController extends Controller
{
    public function addAbout(Request $request){
    	if($request->isMethod('post')){

            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $about= new AboutMe;
            $about->head=$data['head'];
            $about->body=$data['body'];
            $about->save();
            if($request->hasFile('image')){
                $file=$request->file('image');
                $filename='image' . $about->id.'.'.$file->getClientOriginalExtension();
                $file->move("uploads/about",$filename);

                $about->image=$filename;
                $about->save();
            }

            return redirect('/admin/view-about')->with('flash_message_success','Your About is successfully added');
        }
    	return view('Admin.AboutMe.addAbout');
    }
    public function viewAbout(){
        $about=AboutMe::all();
        return view('Admin.AboutMe.viewAbout',compact('about'));
    }
    public function editAbout(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
             if($request->hasFile('image')){
                
                $about=AboutMe::find($request->id);
                $about->head=$data['head'];
                $about->body=$data['body'];
                $updated=$about->save();

                $file=$request->file('image');
                $filename='image' . $about->id.'.'.$file->getClientOriginalExtension();
                $file->move("uploads/about",$filename);

                $about->image=$filename;
                $updated=$about->save();
            }else{
                $about=AboutMe::find($request->id);
                $about->head=$data['head'];
                $about->body=$data['body'];
                $updated=$about->save();
            }
            return redirect('/admin/view-about')->with('flash_message_success','About Detail has been updated');
        }
        $aboutDetails = AboutMe::where(['id'=>$id])->first();
        return view('Admin.AboutMe.editAbout',compact('aboutDetails'));
    }
    public function deleteAbout($id=null){
        AboutMe::where(['id'=>$id])->delete();
        Alert::success('Deleted successfully', 'Success Message');
        return redirect()->back();
    }
}
