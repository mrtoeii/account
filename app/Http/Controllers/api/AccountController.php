<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class AccountController extends Controller
{
    public function index(){
        $accounts = DB::table('accounts')
        ->where('remove_status','0')
        ->paginate(5);
        return response()->json($accounts);
    }
    public function store(Request $request)
    {
      
        $user = session()->get('user');
        $data = array(
            'type' => $request->input('type'),
            'date' => $request->input('date'),
            'list' => $request->input('list'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            // 'username'=>$user['username'],
            'status'=>0,
            'created'=>date('Y-m-d H:i:s'),
        );
        // dd(session()->get('user'));
        dd(session('user') );
        // dd($request->input('receipt'));
        // dd($_FILES);

    }
}
