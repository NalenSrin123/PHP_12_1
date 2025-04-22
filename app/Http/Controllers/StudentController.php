<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function listStudent(){
        $students=Student::query()
                            ->orderBy('id','DESC')
                            ->get();
        return view('studentList',compact('students'));
    }
    public function addStudentSubmit(Request $request)
        {
    // Validate the request
    $input = $request->validate([
        'name' => 'required',
        'gender' => 'required',
        'age' => 'required|numeric',
        'address' => 'required',
        'province' => 'required',
        'profile' => 'required|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Handle file upload
    if ($request->hasFile('profile')) {
        $file = $request->file('profile');
        $fileName = time() . '_' . $file->getClientOriginalName(); // Unique filename
        $path = 'uploads/'; // Directory inside public
        $file->move(public_path($path), $fileName); // Move file to 'public/uploads/'

        // Store only the relative path in the database
        $input['profile'] = $path . $fileName;
    }

    // Insert into the database
    $result = Student::create($input);
    if ($result->exists) {
        return redirect('/');
    }
}
    public function deleteStudent(Request $request){
        $id=$request->input('hide_id');
        $delete=Student::query()->where('id',$id)->delete();
        return redirect('/');
    }
    public function editStudent(Student $student){

        return view('edit-student',compact('student'));
    }
    public function editStudentSubmit(Request $request,Student $student)
    {
        $input=$request->only(['name','age','gender','address','province']);
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Unique filename
            $path = 'uploads/'; // Directory inside public
            $file->move(public_path($path), $fileName); // Move file to 'public/uploads/'

            // Store only the relative path in the database
            $input['profile'] = $path . $fileName;
        }else{
            $input['profile']=$request->input('old_image');
        }
        $student->update($input);
        return redirect('/')->with('success','Student updated successfully');




    }



}
