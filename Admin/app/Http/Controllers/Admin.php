<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\room_type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Admin extends Controller
{
    public function vadmin_login(){
        return view('./admin_login');
    }
    public function admin_login(Request $request){
        $messages = [
            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
        ];
    
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return back()->withErrors(['notification' => 'Thông tin đăng nhập không chính xác'])->withInput();
        }
    }
    public function admin_logout(Request $request){
        Auth::logout();
        return redirect('./admin_login');
    }

    public function dashboard(Request $request){
        return view('./dashboard');
    }

    public function employee(){
        $data = DB::table('users')->select('*');
        $data = $data -> get();
        return view('./employee', compact('data'));
    }
    public function add_employee(){
        return view('./add_employee');
    }
    public function edit_employee(){
        return view('./edit_employee');
    }

    public function rooms(){
        return view('./rooms');
    }
    public function add_rooms(){
        return view('./add_rooms');
    }
    public function edit_rooms(){
        return view('./edit_rooms');
    }

    public function room_type(){
        $data = DB::table('room_type')->select('*');
        $data = $data -> get();
        return view('./room_type', compact('data'));
    }
    public function edit_room_type(){
        return view('./edit_room_type');
    }
    public function add_room_type(){
        return view('./add_room_type');
    }

    public function service(){
        $data = DB::table('service')->select('*');
        $data = $data -> get();
        return view('./services', compact('data'));
    }
    public function add_service(){
        return view('./add_service');
    }
    public function edit_service(){
        return view('./edit_service');
    }
    public function service_detail(){
        return view('./service_detail');
    }

    public function feedback(){
        $data = DB::table('feed_back')->select('*');
        $data = $data -> get();
        return view('./feedback', compact('data'));
    }

    public function booking(){
        return view('./booking');
    }
    public function booking_detail(){
        return view('./booking_detail');
    }
}
