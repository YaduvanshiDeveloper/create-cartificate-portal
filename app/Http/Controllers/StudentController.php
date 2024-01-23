<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Course;
use Illuminate\Http\Request;
use Validator;
use log;
use Crypt;
use App\Models\Cartificates;
use Carbon\Carbon;
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
        $student->course =$req->courses;
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

public function editstudent($id){

    try{
        $courses = Course::where('status',1)->get();
    $data = Student::findorfail(Crypt::decrypt($id));
        if($data)
        {
            return view('Students.edit_student',compact('data'),compact('courses'));
        }else{
            return redirect('Manage/Student')->with('error','Failed to Find data');
        }
        }catch(\Exception $e)
        {
            return redirect('Manage/Student')->with('error','Something Went wrong Contact Admin'.$e->getMessage());
        }

  }

  public function Update(Request $request)
  {
      $validated = Validator::make($request->all(),[
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

          return redirect()->back()->withErrors($validated)->withInput();
      }
      // try{
      $id = \Crypt::decrypt($request->token);
      $student =  Student::where('id',$id)->first();

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
      if($request->has('image'))
      {
          $file_name = time().'_'.mt_rand(0000,9999).$request->image->extension();
          $request->image->move(public_path('student_image'),$file_name);
          $student->image = $file_name;
      }
      $student->save();
      if($student){
          return redirect('Manage/Student')->with('success','Staff Updated SuccessFully');
      }else{
          return redirect()->back()->with('error','Something Went Wrong');
      }
    
  // }catch(\Exception $e){
  //     return redirect()->back()->with('error','Something Went Wrong please Contact Admin');
  // }
  }

public function importstudent(){
    return view('Students.importstudent');
}

public function GenerateCertificate(Request $request)
    {
        // try{
        $student = $request->students;
       
        $result = array_filter($student, fn ($value) => !is_null($value));
       
        $result = Student::whereIn('id',$student)->where('is_completed','2')->get();
        foreach($result as $data)
        {

            $check_certificate = Cartificates::where('student_id',$data->id)->where('course',$data->course)->first();
            if($check_certificate){
                continue;
            }else{
                $course = Course::findorFail($data->course);

                $create_certificates = new Cartificates;
                $create_certificates->certificate_id = $data->reg_no.'-'.Carbon::parse($data->reg_date)->format('d').Carbon::parse($data->reg_date)->format('m').Carbon::parse($data->reg_date)->format('y');
                $create_certificates->course_start = $data->reg_date;
                $create_certificates->course_end = Carbon::parse($data->reg_date)->addDays(substr($course->duration,0,2))->format('Y-m-d');
                $create_certificates->course_type = $course->type??1;
                $create_certificates->course = $data->course;
                $create_certificates->student_id= $data->id;
                $create_certificates->issue_date = Carbon::now()->format('Y-m-d');
                $create_certificates->save();

            }
        }
        return true;
    // }catch(\Exception $e)
    // {
    //     return redirect()->back()->with('error','Something Went Wrong');
    // }
}

    public function MarkCourseCompleted(Request $request)
    {
        try{
           
            $student = $request->students;
       
            $result = array_filter($student, fn ($value) => !is_null($value));
            $mark_complete = Student::whereIn('id',$student)->update(['is_completed'=>'2']);
            return true;
        }catch(\Exception $e)
        {
            return false;
        }
    }
}

