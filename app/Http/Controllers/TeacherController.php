<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('classroom')->latest()->get();

        return view('teachers.index', compact('teachers'));
    }
    //////////////////////////////////////
    public function create()
    {
        $classrooms = Classroom::orderBy('name')->get();

        return view('teachers.create', compact('classrooms'));
    }
    //////////////////////////////////////
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:teachers,email'],
            'phone' => ['required', 'string', 'max:20'],
            'specialization' => ['required', 'string', 'max:255'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
        ]);

        Teacher::create($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully.');
    }
    //////////////////////////////////////
    public function show(Teacher $teacher)
    {
        $teacher->load('classroom');

        return view('teachers.show', compact('teacher'));
    }
    //////////////////////////////////////
    public function edit(Teacher $teacher)
    {
        $classrooms = Classroom::orderBy('name')->get();

        return view('teachers.edit', compact('teacher', 'classrooms'));
    }
    //////////////////////////////////////
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:teachers,email,' . $teacher->id],
            'phone' => ['required', 'string', 'max:20'],
            'specialization' => ['required', 'string', 'max:255'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
        ]);

        $teacher->update($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }
    //////////////////////////////////////
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
