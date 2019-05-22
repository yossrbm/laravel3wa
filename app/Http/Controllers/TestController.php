<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Student;
use Illuminate\Support\Facades\Input;

class TestController extends Controller
{

    public function showClassroomList() 
    {
    	$classrooms = Classroom::all();
    	//$classrooms = classroom::find(5);
    	//dd($classrooms->title);
    	//dd($classrooms);
    	return view('welcome',['classrooms'=> $classrooms]);
    }

    public function showAddClassroom() 
    {
    	return view('classroom.add');

    }

    public function handleAddClassroom() 
    {

    	$data = Input::all();
    	Classroom::create([
    		'title' => $data['title'],
    		'photo' => $data['photo']
    	]);

    	//return back();
    	return redirect(route('showClassroomList'));
    }



    public function showAddStudent()

    {
    	return view('student.add');
    }

    public function handleAddStudent() 

    {
    	$data = Input::all();
    	Student::create([

    		'email' => $data['email'],
    		'name' => $data['name'],
    		'password' => bcrypt($data['password']),
    		'classroom_id' => $data['classroom']
    	]);
    	return back();
    }


    public function handleDeleteStudent($id)

    {
    	$student = student::find($id);
    	if ($student) 
	    {
	    	$student->delete();
	    	return 'succes';	
	    }
	    else {
	    	return 'erreur';
	    }

    }

    public function showStudent($id)

    {
    	$student = student::find($id);
    	return view('student.show',['student'=>$student]);

    }



}
