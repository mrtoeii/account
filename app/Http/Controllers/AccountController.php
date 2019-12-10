<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Validator,Response;
class AccountController extends Controller
{
    public function index(){
        return view('account.index');
    }

    // public function index(){
    //     $accounts = DB::table('accounts')->paginate(5);
    //     return view('account.index', [
    //         'accounts' => $accounts,
    //         'perPage' => $accounts->perPage(),
    //         'currentPage' => $accounts->currentPage()
    //     ]);
    // }
    public function fetch_data(Request $request){
        if($request->ajax()){
            $accounts = DB::table('accounts')->paginate(5);
            return view('account.list', [
                'accounts' => $accounts,
                'perPage' => $accounts->perPage(),
                'currentPage' => $accounts->currentPage(),
            ]);
        }
    }

    function Insert(Request $request){
        function getName($n) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            return $randomString;
        }
        $rules = array(
            'type' => 'required',
            'date' => 'required',
            'list' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required',
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $user = session()->get('user');

            $type = $request->input('type');
            $date = $request->input('date');
            $list = $request->input('list');
            $amount = $request->input('amount');
            $description = $request->input('description');
            $image = '';
            if($_FILES['receipt']['size']==0 && $_FILES['receipt']['error']==4){
                $image='null';
            }else{
                // echo '<pre>';
                // print_r($_FILES);
                // echo '</pre>';
                $image=getName(10);
            }
            $data = array(
                'type' => $type,
                'date' => $date,
                'list' => $list,
                'amount' => $amount,
                'description' => $description,
                'receipt'=>$image,
                'username'=>$user['username'],
                'status'=>0,
                'created'=>date('d-m-Y H:i:s'),
                'updated'=>'no',
            );

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            DB::table('accounts')->insert($data);
            return response()->json(['success' =>200]);
        }
    }
}
