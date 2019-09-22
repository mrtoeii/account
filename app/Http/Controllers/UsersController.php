<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    public function index(){
        // echo 'user.index';
        $users = DB::table('auth')->get();
        return view('user.index', ['users' => $users]);
    }
}
