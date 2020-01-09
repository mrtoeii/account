<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB,Validator,Response,Image;
use PhpOption\Option;

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
        function getName() {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < 10; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            return $randomString;
        }
        $user = session()->get('user');
        // $this->validate( $request,[
        //     'type' => 'required',
        //     'date' => 'required',
        //     'list' => 'required',
        //     'amount' => 'required|numeric',
        //     'description' => 'required',
        //     // 'image' => 'min:0|mimes:jpeg,jpg,png,gif',
        // ]);
        $filename = 'no';
        $path = public_path('images/accounts/').$user['username'].'/';
        if(!is_dir($path)) //create the folder if it's not already exists
        {
          mkdir($path,0755,TRUE);
        }
        $arr_extension = array('png', 'jpg', 'jpeg', 'gif');
        if($request->hasFile('image')){
            // dd($request->image->path());
            $extension = $request->image->extension();
            if(!in_array($extension, $arr_extension)){
                return response()->json([
                    'status' =>500,
                    'type'=>'image',
                    'msg'=>'Invalid file extension. Only png, jpg, jpeg, gif'
                ]);
            }else{
                if(file_exists($path.$filename)) {
                    $filename = $request->file('image')->hashName();
                }else{
                    $filename = $request->file('image')->hashName();
                }
                // dd($request->file('image')->getClientOriginalExtension());
                // Image::make(request()->file('image'))->save($path.$filename);
            }
            
        }
        return response()->json(['status' =>200,'msg'=>'Success']);
        die;
        $user = session()->get('user');    
        $type = $request->input('type');
        $date = $request->input('date');
        $list = $request->input('list');
        $amount = $request->input('amount');
        $description = $request->input('description');
        $data = array(
            'type' => $type,
            'date' => $date,
            'list' => $list,
            'amount' => $amount,
            'description' => $description,
            'receipt'=>  $filename,
            'username'=>$user['username'],
            'remove_status'=>0,
            'created'=>date('Y-m-d H:i:s'),
        );
        if(DB::table('accounts')->insert($data)){
            return response()->json(['status' =>200,'msg'=>'Success']);
        }  
    }
    function testSession(){
        dd(session()->get('user'));
    }
}
