<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function checklogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        // $hashed = Hash::make($password);
        // echo $hashed;
        // $validatedData = $request->validate([
        //     'username' => 'required',
        //     'password' => 'required'
        // ]);

        $user = DB::table('auth')
                    ->where('username', $username)
                    ->first();

        if($user && Hash::check($password,$user->password)){
            // echo 'Go to Dashboard';
            $userArr = array(
                'username'=>$user->username,
                'fname'=>$user->fname,
                'lname'=>$user->lname,
                'role'=>$user->role,
            );
            session()->put('user',$userArr);
            return redirect('/dashboard');


        }else{
            echo 'Username or Password Incorrect';
        }
    }
    public function logout(Request $req){
        $req->session()->flush();
        return  redirect('/');
    }
}
