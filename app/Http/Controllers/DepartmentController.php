<?php
namespace App\Http\Controllers;
use App\Models\Department; use Illuminate\Http\Request;
class DepartmentController extends Controller {
 public function index(){ $departments=Department::withCount('students')->orderBy('department_name')->get(); return view('departments.index',compact('departments')); }
 public function store(Request $request){ $data=$request->validate(['department_name'=>'required|string|max:255|unique:departments,department_name','manager_name'=>'nullable|string|max:255','location'=>'nullable|string|max:255','description'=>'nullable|string']); Department::create($data); return redirect()->route('departments.index')->with('success','Department added successfully.'); }
 public function destroy(Department $department){ if($department->students()->exists()) return back()->with('error','Cannot delete a department that still has students.'); $department->delete(); return back()->with('success','Department deleted successfully.'); }
}
