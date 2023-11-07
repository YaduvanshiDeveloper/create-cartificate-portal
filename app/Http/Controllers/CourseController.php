<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\Course;
use log;
use Crypt;

 
class CourseController extends Controller
{
    public function index(){
        $courses = Course::orderBy('id','DESC') ->paginate(4);
        return view('Course.index',compact('courses'));
    }
    public function createCourse(){
        return view('Course.create_course'); 
    }
    public function store(Request $req)
    {
        $validated = Validator::make($req->all(),[
            'course_name'=>'required',
            'duration'=>'required',
            'fee'=>'required',
            'file'=>"required|image|max:2048",
            'trainer'=>"required",
        ]);
        if($validated->fails())
        {
            return redirect()->back()->withErrors($validated);
        }
        $courses = new Course;
        $courses->course_name = $req->course_name;
        $courses->duration = $req->duration;
        $courses->fee = $req->fee;
        $courses->trainer = $req->trainer;
        if($req->has('file')){
            $file_name  = $req->course_name.time().mt_rand(0000,9999).'.'.$req->file->extension();
            $req->file->move(public_path('course_image'),$file_name);
            $courses->image = $file_name;
        }
        $courses->save();
        if($courses)
        {
            return redirect('Manage/Course')->with('success','Course Addedd Successfully');
        }else{
            return redirect()->back()->with('error','Course Not Addedd Successfully');
        }


    }
    public function deletecourse(Request $request){
        try{
  
            $id = Crypt::decrypt($request->id);
            $data = Course::where('id',$id)->delete() ;
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

    public function Coursetype(){
        return view('Course.course_type'); 
    }

   
}
