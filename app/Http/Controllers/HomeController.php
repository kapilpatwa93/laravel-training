<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Validator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showRegister()
    {
        return view('register');
//        dd("register here");

    }

    public function doRegister(Request $request)
    {

        try {
            $data = $request->all();
            $validator = $this->validate($request, [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|max:255|min:8',
                'confirm' => 'required|same:password'
            ]);

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = strtolower($request->email);
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                $request->session()->flash('register_success', 'User Registered Successfully!!');
                return response()->redirectToRoute('show_login');
            } else {
                $request->session()->flash('register_failed', 'Something went wrong,Please try again');
                return back()->withInput($data);
            }
//        dd($validator);

        } catch (Exception $e) {
            //dd($e);
            return back();
        }
    }

    public function showLogin(Request $request)
    {
        try{
            return view('login');
        }catch(\Exception $ex){
            dd($ex);
        }

    }

    public function doLogin(Request $request)
    {
        try{

            $validator = $this->validate($request,[
                'email'=>'required|email|max:255',
                'password'=>'required|max:255'
            ]);

            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return response()->redirectToRoute('task.index');
            }else{

                return back()->withErrors(['login_failed'=>'Invalid Credentials!! Please try again.']);
            }
            

        }catch(\Exception $ex){

            return back();//->withError(['general_error'=>'Something went wrong! Please try again']);
        }

    }
    public function logout(Request $request){
        Auth::logout();

        return redirect()->route('show_login');
    }
    public function home(Request $request){
        dd("home");

    }
    public function emailCheck(Request $request){
        $count = User::where('email','=',$request->email)->count();
        if($count > 0){
            return response()->json(['success'=>true,'email_exist'=>true]);
        }else{
            return response()->json(['success'=>true,'email_exist'=>false]);
        }
    }
}
