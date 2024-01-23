<?php

namespace App\Http\Controllers;
use Validator;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;
use App\Imports\CartificateImport;
use App\Models\Cartificates;
use App\Models\Student;
use Crypt;
use Session;

class CartificatesController extends Controller
{
    public function index(){
        $cartificates = Cartificates::get();
       
        return view('Cartificates.index',compact('cartificates'));
    }
    public function ImportPage()
    {
        return view('Cartificates.import');
    }
    public function import(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'file'=>'required',
        ]);
        if($validated->fails())
        {
            return redirect()->back()->withErrors($validated);
        }
        if($request->has('file'))
        {
            $file_name = Carbon::now()->format('d-m-Y').'-'.mt_rand(1111,9999).'.'.$request->file->extension();
            $path = $request->file->move(public_path('uploadedExcel'),$file_name);
            Excel::import(new CartificateImport,$path);
        }else{

        }
    }
    public function blockstatus($id){
        $id = \Crypt::decrypt($id);
        if($cartificates->status==1){
            $cartificates->status = 2;
        }else{
            $cartificates->status = 1;
        }

        $cartificates = Cartificates::where('id',$id)->first();
        $cartificates->status = 2;
        $cartificates->save();
        if($cartificates){
            return redirect()->back()->with('success','Blocked Successfully');
        }
        else{
            return redirect()->back()->with('error','Unable to Block'); 
        }
       
    }

    public function viewCertificate($id)
    {  
        $id = \Crypt::decrypt($id);
        $student = Cartificates::where('id',$id)->first();
        return view('Cartificates.certificateCard',compact('student'));
    }

    public function verify(Request $request)
    {
        
        $student_verify = Student::where('reg_no',$request->student_id)->first();
       
        if($student_verify)
        {
            $student = Cartificates::where('student_id',$student_verify->id)
            ->where('certificate_id',$request->certificate_id)->first();
        //    dd($student);
            if($student)
            {
                
                return view('Cartificates.certificateCard',compact('student'));
            }else{
                return redirect()->back()->with('error','Student Id not Found in Records');
            }
        }
        else{
            return redirect()->back()->with('error','Student Id not Found in Records');
        }
}
    
public function data_fathcing()
{  
    $cartificates = Cartificates::all();
    return response()->json(['status'=>true,'data'=>$cartificates,'msg'=>'Scusess']);
}




}
