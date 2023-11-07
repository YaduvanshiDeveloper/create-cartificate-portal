<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\Course;
use Illuminate\Http\Request;
use Validator;
use log;
use Crypt;

class StaffController extends Controller
{
    public function index(){
        $staff = Staff::orderBy('id','DESC')->get();
        return view('Staff.index',compact('staff'));
    }
    public function addstaff(){
        $courses = Course::where('status',1)->get();
        return view('Staff.add_staff',compact('courses'));
    }

    public function savestaff(Request $req)
    {
        $validated = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'qualification'=>'required',
            'courses'=>'required',
            'age'=>'required',
            'address'=>'required',
            'image'=>"required|image|max:8048",
           
        ]);
        if($validated->fails())
        {  
            
            return redirect()->back()->withErrors($validated);
        }
        try{
        $staff = new staff;
        $staff->name = $req->name;
        $staff->email = $req->email;
        $staff->phone = $req->phone;
        $staff->course =json_encode($req->courses);
        $staff->qualification = $req->qualification;
        $staff->age = $req->age;
        $staff->address = $req->address;
       
        if($req->has('image')){
            $file_name  = time().mt_rand(0000,9999).'.'.$req->image->extension();
            $req->image->move(public_path('staff_image'),$file_name);
            $staff->image = $file_name;
        }
        $staff->save(); 
        if($staff)
        {
            return redirect('Manage/Staff')->with('success','Staff Addedd Successfully');
        }else{
            return redirect()->back()->with('error','Staff Not Addedd Successfully');
        }
    }catch(\Exception $e){
        return redirect()->back()->with('error','Staff Not Addedd  pleses contect admin');
    }
}

public function deletestaff(Request $request){
    try{

        $id = Crypt::decrypt($request->id);
        $data = Staff::where('id',$id)->delete() ;
        if($data){
            echo 'true';
        }else{
            echo 'false';
        }
    }catch(\Exception $e){

        Log::info($e->getMassage());
        echo 'false';
    }
}
public function editstaff($id){

    try{
        $courses = Course::where('status',1)->get();
    $data = Staff::findorfail(Crypt::decrypt($id));
        if($data)
        {
            return view('Staff.edit_staff',compact('data'),compact('courses'));
        }else{
            return redirect('Manage/Staff')->with('error','Failed to Find data');
        }
        }catch(\Exception $e)
        {
            return redirect('Manage/Staff')->with('error','Something Went wrong Contact Admin'.$e->getMessage());
        }

  }

  public function Update(Request $request)
  {
      $validated = Validator::make($request->all(),[
          'name'=>'required',
          'email'=>'required',
          'phone'=>'required',
          'qualification'=>'required',
          'courses:*'=>'required',
          'age'=>'required',
          'address'=>'required',


      ]);
      if($validated->fails())
      {

          return redirect()->back()->withErrors($validated)->withInput();
      }
      // try{
      $id = \Crypt::decrypt($request->token);
      $staff =  Staff::where('id',$id)->first();

      $staff->name = $request->name;
      $staff->email = $request->email;
      $staff->phone = $request->phone;
      $staff->qualification = $request->qualification;
      $staff->course = json_encode($request->courses);
      $staff->age = $request->age;
      $staff->address = $request->address;
      if($request->has('image'))
      {
          $file_name = time().'_'.mt_rand(0000,9999).$request->image->extension();
          $request->image->move(public_path('staff_images'),$file_name);
          $staff->image = $file_name;
      }
      $staff->save();
      if($staff){
          return redirect('Manage/Staff')->with('success','Staff Updated SuccessFully');
      }else{
          return redirect()->back()->with('error','Something Went Wrong');
      }
  // }catch(\Exception $e){
  //     return redirect()->back()->with('error','Something Went Wrong please Contact Admin');
  // }
  }

}
