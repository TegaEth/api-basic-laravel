<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //listing out all the students in the database
        return response()->json(Student::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:80',
            'email' => 'required|email|unique:students,email',
            'gender' => 'required|in:male,female,other'
        ]);

        Student::create($data);
        return response()->json([
            'message' => 'Student created successfully',
        "status" => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return response()->json([
            "status" => true,
            "message" => "Student retrieved successfully",
            "data" => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}