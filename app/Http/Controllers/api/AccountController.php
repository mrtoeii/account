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
        dd($request->all());
        // dd($request->input('receipt'));
        // dd($_FILES);

    }
}
