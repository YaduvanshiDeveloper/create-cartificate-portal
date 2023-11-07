<?php

namespace App\Http\Controllers;
use Validator;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;
use App\Imports\CartificateImport;


class CartificatesController extends Controller
{
    public function index(){
        return view('Cartificates.index');
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
}
