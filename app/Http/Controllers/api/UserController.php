<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

   

    public function store(Request $request)
    {
        $User = new User;
            $User->name = $request->name;
            $User->email = $request->email;
            $User->password = Hash::make($request->password);
            $User->save();
            return response()->json(['status'=>true,'data'=>[],'msg'=>'Scusess']);
       
    }
    public function login(Request $req)
    {
        $credentials = $req->only(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['status'=>false,'data'=>[],'msg'=>'invelid credentials']);
        }
        $new_token = $this->respondWithToken($token);
        $data =[];
        $data_user = auth('api')->user();
        $data['name']= $data_user->name;
        $data['email']= $data_user->email;
        $data['token']= $new_token->original;

        return response()->json(['status'=>true,'data'=>$data,'msg'=>'login Scusessful']);

    }
    protected function respondWithToken($token)
    {
        return response()->json( 
            $token,
           
        );
    }

    public function update(Request $req){
        $User = auth('api')->user();
        
        $data = User::findorfail($user->id);
        $data->name =$req->name;
        $data->email =$req->email;
        if($req->has('password')){
            $data->password = \Hash::make[$req->password];
        }
    }
}
