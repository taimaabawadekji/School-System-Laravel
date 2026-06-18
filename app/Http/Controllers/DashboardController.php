<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'classrooms' => Classroom::count(),
            'students' => Student::count(),
            'teachers' => Teacher::count(),
        ];

        $recentClassrooms = Classroom::withCount(['students', 'teachers'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'recentClassrooms'));
    }
}
