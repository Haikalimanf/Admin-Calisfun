<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Challenge;
use App\Models\UserProgress;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil jumlah total dari masing-masing tabel
        $totalUsers = User::count();
        $totalCourses = Course::count();
        $totalChallenges = Challenge::count();

        // Hitung jumlah user yang ada di UserProgress
        $totalActiveUsers = UserProgress::distinct('user_id')->count('user_id');

        return view('dashboard', compact('totalUsers', 'totalCourses', 'totalChallenges', 'totalActiveUsers'));
    }
}
