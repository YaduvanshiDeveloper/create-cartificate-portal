<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\registration;
use App\Http\Helper\paymentHelper;
use App\Models\Registrations;

class RegistrationsController extends Controller
{
    public function index()
    {
        return view('registration.index');
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'full_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'course_type'=>'required',
            'technology'=>'required',

            'semester'=>'required',
        ]);
        if($validated->fails())
        {
            return redirect()->back()->withErrors($validated);
        }

        $merchant_transaction_id = 'SFTLW'.mt_rand(10000000000,99999999999);

        $student_registration = new registration;
        $student_registration->full_name = $request->full_name;
        $student_registration->email = $request->email;
        $student_registration->phone = $request->phone;
        $student_registration->course_type = $request->course_type;
        $student_registration->technology = $request->technology;
        $student_registration->branch = $request->branch;
        $student_registration->semester = $request->semester;
        $student_registration->merchant_transaction_id = $merchant_transaction_id;
        $student_registration->save();
        if($student_registration){
            $payment = paymentHelper::MakePayment($merchant_transaction_id,1);
            return redirect($payment);
        }
    }

    public function Details()
    {
        $RegisterDetails = Registrations::get();
        return view('registration.RegisterDetails',compact('RegisterDetails'));
    }
}
