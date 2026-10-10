<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('department');

        //nrollment No
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('student_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('enrollment', 'like', "%{$search}%");
            });
        }

        if ($request->filled('dept_id')) {
            $query->where('dept_id', $request->dept_id);
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        $students = $query->paginate(10)->withQueryString();
        $totalStudents = Student::count();
        $departments = Department::all();

        $overallAvg = Student::avg('avg') ?? 0;

        return view('students.index', compact('students', 'totalStudents', 'departments', 'overallAvg'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('students.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name'    => 'required|string|max:255',
            'dob'             => 'required|date',
            'gender'          => 'required|string',
            'enrollment_date' => 'required|date',
            'enrollment'      => 'required|string',
            'dept_id'         => 'required|exists:departments,dept_id',
            'avg'             => 'nullable|numeric|min:0|max:100',
            'description'     => 'nullable|string',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $departments = Department::all();

        return view('students.edit', compact('student', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'student_name'    => 'required|string|max:255',
            'dob'             => 'required|date',
            'gender'          => 'required|string',
            'enrollment_date' => 'required|date',
            'enrollment'      => 'required|string',
            'dept_id'         => 'required|exists:departments,dept_id',
            'avg'             => 'nullable|numeric|min:0|max:100',
            'description'     => 'nullable|string',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}