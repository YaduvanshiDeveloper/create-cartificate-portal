<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Course;
use Illuminate\Http\Request;
use Validator;
use log;
use Crypt;

class StudentController extends Controller
{
    public function index(){
        $student = Student::orderBy('id','DESC')->get();
        return view('Students.index',compact('student'));
    }
    public function createStudent(){
        $courses = Course::where('status',1)->get();
        return view('Students.create_student',compact('courses'));
    }

    public function saveStudent(Request $req)
    {
        
        $validated = Validator::make($req->all(),[
            'Reg_no'=>'required',
            'name'=>'required',
            'dob'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'emergency_phone'=>'required',
            'id_type'=>'required',
            'id_no'=>'required',
            'designaton'=>'required',
            'clg'=>'required',
            'clg_add'=>'required',
            'courses'=>'required',
            'trainer'=>'required',
            'total_fee'=>'required',
            'paid_amt'=>'required',
            'due_amt'=>'required',
            'reg_date'=>'required',
            'address'=>'required',
            'image'=>"required|image|max:8080",
           
        ]);
        if($validated->fails())
        
        {  
            return redirect()->back()->withErrors($validated);
        }
        try{
        $student = new student;
       
        $student->Reg_no = $req->Reg_no;
        $student->name = $req->name;
        $student->dob =  $req->dob;
        $student->email = $req->email;
        $student->phone = $req->phone;
        $student->emergency_phone = $req->emergency_phone;
        $student->id_type = $req->id_type;
        $student->id_no = $req->id_no;
        $student->designation = $req->designaton;
        $student->clg = $req->clg;
        $student->clg_add = $req->clg_add;
        $student->course =json_encode($req->courses);
        $student->trainer = $req->trainer;
        $student->total_fee = $req->total_fee;
        $student->paid_amt = $req->paid_amt;
        $student->due_amt = $req->due_amt;
        $student->reg_date = $req->reg_date;
        $student->address = $req->address;
       
        if($req->has('image')){
            $file_name  = time().mt_rand(0000,9999).'.'.$req->image->extension();
            $req->image->move(public_path('student_image'),$file_name);
            $student->image = $file_name;
        }
        
        $student->save(); 
        if($student)
        {
          
            return redirect('Manage/Student')->with('success','Student Addedd Successfully');
        }else{
            return redirect()->back()->with('error','Student Not Addedd Successfully');
        }
    }catch(\Exception $e){
        return redirect()->back()->with('error','Student Not Addedd  pleses contect admin');
    }
}
public function deletestudent(Request $request){
    try{

        $id = Crypt::decrypt($request->id);
        $data = Student::where('id',$id)->delete() ;
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

public function importstudent(){
    return view('Students.import_student');
}
}
