<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Student;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

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

    public function showUpdateStudent($id) 
    {
    	$student = student::find($id);
    	
    	if ($student) 
	    {
	    	$classroom =Classroom::all();    
	    	return view('student.view',['student'=>$student,'classroom'=>$classroom]);
	    	return back();
	    }
	    else {
	    	return 'erreur';
	    }
    }

    public function handleUpdateStudent($id) 

    {
    	/*
    	$data = Input::all();
    	$student = student::find($id);
    	$student->name = $data['name'];
    	$student->email = $data['email'];
kjn,knj 
jhg
j g
jh
g
    	$student->save();


		*/		

		$data = Input::all();
    	$student = Student::whereId($id)->update([
    		'email' => $data['email'],
    		'name' => $data['name']
    	]);

    	/*

    	$data = Input::all();
    	$student = DB::table('student')->where('id','=',$id)->update([
    		'email' => $data['email'],
    		'name' => $data['name']
    	]);
	*/



    }




}
