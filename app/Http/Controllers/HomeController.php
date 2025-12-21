<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class HomeController extends Controller
{
  public function index()
  {
      return view('home');
  }

  public function welcome(){
      return view('welcome');
  }

  public function upload(Request $request){
    $student = new student;
    $student->name=$request->name;
    $student->email=$request->email;
    $image = $request->file;

    if($image)
    {
      $imagename = time().'.'.$image-> getClientOriginalExtension();
      $request->file->move('student', $imagename);
      $student->image=$imagename;
    }

    $student->save();
    return redirect()->back(); 
  }

  public function view(){
    $data = student::all();
    return view('display', compact('data'));
  }

  public function delete($id){
    $data = student::find($id);
    $data->delete();
    return redirect()->back();
  }

  public function search(Request $request){
    $search = $request->search;
    $data = student::where('name', 'Like', '%'.$search.'%')->orWhere('email', 'Like', '%'.$search.'%')->get();

    return view('display', compact('data'));
  }

  public function update_view($id){
    $student = student::find($id);
    return view('update_page', compact('student'));
  }

  public function update(request $request, $id){
    $student=student::find($id);
    $student->name=$request->name;
    $student->email=$request->email;
    $image=$request->file;
    if($image)
    {
      $imagename=time().'.'.$image->getClientOriginalExtension();
      $request->file->move('student', $imagename);
      $student -> image = $imagename;

    }
    
    $student->save();

    return redirect()->back();
  }
}
