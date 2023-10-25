<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentControler extends Controller
{
    public function index()
    {

        //dd(Student::query()->get());
        return view('student.index', [
            'students' => Student::get(),

        ]);
    }

    public function create() 
    {
        return view('student.create');
        
    }

    public function store(Request $request)
     {

      $this->validate($request, [
        'name' => ['required', 'min:3'],
        'address' => ['required', 'min:10'],
        'phone_number' => ['required', 'numeric'],
        'class' => ['required'],
     ]);

        //dd($request->all());

      Student::query()->create([
         'name' => $request->nama,
         'address' => $request->address,
         'phone_number' => $request->phone_number,
         'class' => $request->class,
      ]);
    
      session()->flash('success', 'Data Berhasil Ditambahkan.');
      
      return redirect()->route('student.index');

     }

    public function edit($id)
    {
        //dd($id);
        $student = Student::find($id);

        return view('student.edit', [
            'student' => $student,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'name' => ['required', 'min:3'],
        'address' => ['required', 'min:4'],
        'phone_number' => ['required', 'numeric'],
        'class' => ['required'],
     ]);
     
        $student = student::find($id);

        $student->name = $request->get('name');
        $student->address = $request->get('address');
        $student->phone_number = $request->get('phone_number');
        $student->class = $request->get('class');

            $student->save();

        // session()->flash('success', 'Data Berhasil Diperbarui.');
            
       
        return redirect()->route('student.index')->withSuccess('Data Diperbarui.');
    } 
        
   public function destroy($id)
   { 
    $student = Student::find($id);

    $student ->delete();



    return redirect()->route('student.index')->withDanger('Data Berhasil Dihapus.');

   }  
}

