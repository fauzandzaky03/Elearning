<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method untuk menampilkan data student
    public function index(){
        // tarik data student dari db
        $students = Student::all();

        // panggil view
        return view('admin.contents.student.index', [ 
                'students' => $students,


        ]);
    }
    public function create(){

        // data courses
        $courses = Courses::all();

        return view('admin.contents.student.create', [
                'courses' => $courses,
    ]);

        }
    public function store(Request $request)
    {
            // validasi data yang diterapkan 
            $request->validate([
                'name' => 'required',
                'nim' => 'required|numeric',
                'major' => 'required',
                'class' => 'required',
                'courses_id' => 'nullable',

            ]);

            student::create([
                'name' => $request->name,
                'nim' => $request->nim,
                'major' => $request->major,
                'class' => $request->class,
                'courses_id' => $request->courses_id,
            ]);

            return redirect('admin/student')->with('message', 'Data student berhasil ditambahkan!');  
    }

    // method untuk menampilkan edit 
    public function edit($id){

        //cari data berdarkan id
        $student = Student::find($id);

        // dapatkan data course
        $courses = Courses::all();

        // cari data berdasarkan id 
        $student = Student::find($id); //select * from students WHERE id = $id;

        return view('admin.contents.student.edit', [
            'student' => $student, 'courses' => $courses
        ]);
    }
    public function update($id, Request $request){
        $student = Student::find($id);

         // validasi data yang diterapkan 
         $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'courses_id' => 'nullable',


        ]);

        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'class' => $request->class,
            'courses_id' => $request->courses_id,

        ]);

        return redirect('admin/student')->with('message', 'Data student berhasil diedit!');

}

        public function destroy($id){
            $student = Student::find($id);

            // hapus
            $student->delete();

            return redirect('admin/student')->with('message', 'Data student berhasil diedit!');
        }

}


