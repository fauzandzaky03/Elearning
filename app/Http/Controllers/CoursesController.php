<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // method untuk menampilkan data student
    public function index(){
        // tarik data student dari db
        $courses = Courses::all();

        // panggil view
        return view('admin.contents.courses.index', [ 
                'courses' => $courses,


        ]);
    }
    public function create(){
        return view('admin.contents.courses.create');
        }
    public function store(Request $request)
    {
            // validasi data yang diterapkan 
            $request->validate([
                'nama' => 'required',
                'category' => 'required',
                'desc' => 'required',
            
            ]);

            courses::create([
                'nama' => $request->nama,
                'category' => $request->category,
                'desc' => $request->desc,
            ]);

            return redirect('admin/courses')->with('message', 'Data courses berhasil ditambahkan!');  
    }

     // method untuk menampilkan edit 
     public function edit($id){
        // cari data berdasarkan id 
        $courses = Courses::find($id); //select * from students WHERE id = $id;

        return view('admin.contents.courses.edit', [
            'courses' => $courses 
        ]);
    }
    public function update($id, Request $request){
        $courses = Courses::find($id);

         // validasi data yang diterapkan 
         $request->validate([
            'nama' => 'required',
            'category' => 'required',
            'desc' => 'required',

        ]);

        $courses->update([
            'nama' => $request->nama,
            'category' => $request->category,
            'desc' => $request->desc,

        ]);

        return redirect('admin/courses')->with('message', 'Data courses berhasil diedit!');
    }
        public function destroy($id){
        $courses = Courses::find($id);

        // hapus
        $courses->delete();

        return redirect('admin/courses')->with('message', 'Data courses berhasil diedit!');
    }
}
