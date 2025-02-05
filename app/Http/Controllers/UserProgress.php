<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProgress extends Controller
{
    public function index()
    {
        return view('user-progress');
    }
    public function setCourse(){
        return view('set-course');
    }
    public function refillHearts(){
        return view('refill-hearts');
    }
}
