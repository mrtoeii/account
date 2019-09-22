<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Validator,Response,File;
class AccountController extends Controller
{
    public function index(){
        return view('account.index');
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
            'list' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required',
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $type = $request->input('type');
            $list = $request->input('list');
            $amount = $request->input('amount');
            $description = $request->input('description');
            $image = '';
            if($_FILES['receipt']['size']==0 && $_FILES['receipt']['error']==4){
                $image='null';
            }else{
                echo '<pre>';
                print_r($_FILES);
                echo '</pre>';
                $image=getName(10);
            }
            $data = array(
                'type' => $type,
                'list' => $list,
                'amount' => $amount,
                'description' => $description,
                'receipt'=>$image
            );
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            return response()->json(['success' =>200]);
        }
    }
}
