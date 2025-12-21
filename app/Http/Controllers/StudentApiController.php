<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentApiController extends Controller
{
    // GET /api/students
    public function index() {
        return response()->json(Student::all());
    }

    // GET /api/students/{id}
    public function show($id) {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        return response()->json($student);
    }

    // POST /api/students
    public function store(Request $request) {
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;

        // Handle image upload
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('student'), $imagename);
            $student->image = $imagename;
        }

        $student->save();
        return response()->json($student, 201);
    }

    // PUT /api/students/{id}
    public function update(Request $request, $id) {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->name = $request->name;
        $student->email = $request->email;

        // Handle image upload
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('student'), $imagename);
            $student->image = $imagename;
        }

        $student->save();
        return response()->json($student);
    }

    // DELETE /api/students/{id}
    public function destroy($id) {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();
        return response()->json(['message' => 'Student deleted']);
    }

    // Optional: search API
    public function search(Request $request) {
        $query = $request->search;
        $students = Student::where('name', 'like', '%'.$query.'%')
                            ->orWhere('email', 'like', '%'.$query.'%')
                            ->get();
        return response()->json($students);
    }
}
