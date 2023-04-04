<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;
class UserController extends Controller
{

   

    public function register(){
        return view ('user.register');
    }

    public function store(Request $req){
        //dd($req);
        $validated=$req->validate([
            "name"=>['required','min:4'],
            "email"=>['required','email', Rule::unique('users','email'),],
            "password"=>'required|confirmed|min:6'
        ]);

        $validated['password']=Hash::make($validated['password']);
        $user=User::create($validated);

        return redirect("/users")->with("registered", "User added");

    }

    public function show()
    {
        $data = DB::table("users")->get();
        return view('user.showUser',['users'=>$data]);
    } 


    public function login(){
        return view ('user.login');
    }

    public function process(Request $req){
        $validated = $req->validate([
            "email"=>['required', 'email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($validated)){
            $req->session()->regenerate();

            return redirect("/");
        }
            else{
            return redirect("/login")-> with('fail', 'No record found');
        }


    }

   

    

    public function logout(Request $req){
        auth()->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('login')-> with('successLogout', 'Succesfully Logged-Out');
    }
    
    public function delete($id){
        $deleteUser = DB::table('users')
        ->where('id', $id)
        ->delete();
        return redirect('/')-> with('success', 'A record has been deleted!');
    }
   
} 

