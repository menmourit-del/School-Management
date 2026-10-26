<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::with('department')
            ->when($request->filled('search'), fn($q) => $q->where('student_name', 'like', '%' . $request->search . '%'))
            ->when($request->filled('department_id'), fn($q) => $q->where('department_id', $request->department_id))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $departments = Department::orderBy('department_name')->get();

        return view('students.index', compact('students', 'departments'));
    }

    public function create()
    {
        $departments = Department::orderBy('department_name')->get();
        return view('students.form', compact('departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'nullable|date|before:today',
            'enrollment_date' => 'required|date',
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id'
        ]);

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function edit(Student $student)
    {
        $departments = Department::orderBy('department_name')->get();
        return view('students.form', compact('student', 'departments'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'student_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'nullable|date|before:today',
            'enrollment_date' => 'required|date',
            'description' => 'nullable|string',
            'department_id' => 'required|exists:departments,id'
        ]);

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}