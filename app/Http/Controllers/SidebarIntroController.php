<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\SidebarIntro;

class SidebarIntroController extends Controller
{
    public function viewSidebar(){
        $sidebar=SidebarIntro::all();
        return view('Admin.SidebarIntro.viewSidebar',compact('sidebar'));
    }
    public function addSidebar(Request $request){
    	if($request->isMethod('post')){

            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $sidebar= new SidebarIntro;
            $sidebar->name=$data['name'];
            $sidebar->aboutme=$data['aboutme'];
            $sidebar->save();
            if($request->hasFile('selfImage')){
                $file=$request->file('selfImage');
                $filename='selfImage' . $sidebar->id.'.'.$file->getClientOriginalExtension();
                $file->move("uploads",$filename);

                $sidebar->selfImage=$filename;
                $sidebar->save();
            }

            return redirect('/admin/view-sidebar')->with('flash_message_success','Your About is successfully added');
        }
    	return view('Admin.SidebarIntro.addSidebar');
    }
    public function editSidebar(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
             if($request->hasFile('selfImage')){
                
                $sidebar=SidebarIntro::find($request->id);
                $sidebar->name=$data['name'];
                $sidebar->aboutme=$data['aboutme'];
                $updated=$sidebar->save();

                $file=$request->file('selfImage');
                $filename='selfImage' . $sidebar->id.'.'.$file->getClientOriginalExtension();
                $file->move("uploads",$filename);

                $sidebar->selfImage=$filename;
                $updated=$sidebar->save();
            }else{
                $sidebar=SidebarIntro::find($request->id);
                $sidebar->name=$data['name'];
                $sidebar->aboutme=$data['aboutme'];
                $updated=$sidebar->save();
            }
            return redirect('/admin/view-sidebar')->with('flash_message_success','Sidebar has been updated');
        }
        $sidebar = SidebarIntro::where(['id'=>$id])->first();
        return view('Admin.SidebarIntro.editSidebar',compact('sidebar'));
    }
    public function deleteSidebar($id=null){
        SidebarIntro::where(['id'=>$id])->delete();
        Alert::success('Deleted successfully', 'Success Message');
        return redirect()->back();
    }
}
