<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if($user = Auth::user()){
         switch($user->level){
            case '1':
             return redirect()->intended('/');
             break;
            case '2';
             return redirect()->intended('pembelian');
             break;
         }
       }
         return view('auth.login');
     }
}
