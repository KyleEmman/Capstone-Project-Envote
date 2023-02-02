<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('admin.students', [
            'heading' => 'Students',
            'students' => Student::latest()->filter(request(['search','campus', 'program','year', 'q']))->paginate(request()->rows ? request()->rows : 8),
        ]);
    }
}
