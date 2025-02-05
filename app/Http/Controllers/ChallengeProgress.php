<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeProgress extends Controller
{
    public function index()
    {
        return view('challengeProgress');
    }
    public function upsertChallengeProgress(){
        $data = request()->all();
        
    }
}
