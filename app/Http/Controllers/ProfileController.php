<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    public function index()
    {   $auth = Auth::user();

        return view('profile',compact('auth'));
    }
    public function update(Request $request){
        $request->validate(['username' => 'required|string|max:255']);
        if($request->password){
            $request->validate(['password' => 'string|min:8']);
            $user->password = Hash::make($request->password);
        }
        $auth = Auth::user();
        $user = User::where('id', $auth->id)->first();
        $user->username = $request->username;
        
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->age = $request->age;
        $user->position = $request->position;
        $user->area = $request->area;
        $user->hotel_type = $request->hotel_type;      
        $user->status = $request->status;
        $user->work_length = $request->work_length;
        $user->hotel_worker_num = $request->hotel_worker_num;
        $user->hotel_adr = $request->hotel_adr;
        
        if($request->status === '在職'){
            $user->work_title = $request->work_title;
        }else{
            $user->work_title = $request->status;
        }
        $user->save();
        return redirect('/home')->with('profileUpdate', true);


    }
}
