<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * 1. 
     */
    public function index(Request $request)
    {
        $query = Department::query();

        if ($request->filled('search')) {
            $query->where('dept_name', 'like', '%' . $request->search . '%');
        }
        $departments = $query->paginate(10);
        return view('departments.index', compact('departments'));
    }

    /**
     * 2.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * 3. 
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dept_name' => 'required|string|max:255|unique:departments,dept_name',
            'manager_id' => 'nullable|integer',
            'location_id' => 'nullable|integer',
        ]);

        Department::create($validated);

        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }
    /**
     * 4. 
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    /**
     * 5. 
     */
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $validated = $request->validate([
            'dept_name' => 'required|string|max:255|unique:departments,dept_name,' . $id . ',dept_id',
            'manager_id' => 'nullable|integer',
            'location_id' => 'nullable|integer',
        ]);

        $department->update($validated);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully!');
    }

    /**
     * 6. 
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully!');
    }
}