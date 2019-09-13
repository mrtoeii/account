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
            echo 'Go to Dashboard';
        }else{
            echo 'Username or Password Incorrect';
        }


        // $userArr = array(
        //     'username'=>$username,
        //     'password'=>$password
        // );
        // session()->put('user',$userArr);
        // $session = session()->get('user');
        // dd($session);
        // echo "Username: ".$username.' , Password: '.$password ;
        // return view('auth.login');
        // if($username=='admin'&&$password=='admin'){
        //     return redirect('/dashboard');
        // }
    }
}
