<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function signIn(){
        $data=array('user_name'=>'udarachama','password'=>'123');

        if (Auth::attempt($data)){

            return redirect('home');

        }else{
            return redirect('index');
        }
    }

    public function registration(Request $request){
        $req = $request->only('name','email','user_name','password');

        $table = new User();

        $table->name = $req['name'];
        $table->user_name = $req['user_name'];
        $table->email = $req['email'];
        $table->password = bcrypt($req['password']);

        if($table->save()){
            echo 'success';
        }


    }
}
