<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class App extends Controller
{
    public function index(){
        return "anasayfa";
    }
    public function hakkimizda(){
        return "hakkimizda";
    }
}
