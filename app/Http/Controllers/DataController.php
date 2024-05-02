<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
       $menu = Menu::get();
       $data['count_menu'] = $menu->count();

       return view('data')->with($data);
    }
}
