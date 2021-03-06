<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Student;
use Illuminate\Support\Facades\Input;
use DB;
use Image;
use Auth;
use Carbon\Carbon;
use Validator;
use Session;

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
    	//dd($data);

    	$photo = 'photo-' . str_random(5) . time() . '.' . $data['photo']->getClientOriginalExtension();
            $fullImagePath = public_path('storage/classrooms/' . $photo);    //pour la créer a partir de la racine public image d'origine pour sa création 
            Image::make($data['photo']->getRealPath())->save($fullImagePath);
            $photoPath = 'storage/classrooms/' . $photo;    //on va stocker a partir du storage / enregistrement dans la bd / juste pour lire l'image

    	Classroom::create([
    		'title' => $data['title'],
    		'photo' => $photoPath
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

        $rules = [
        'name' => 'required',
        'email' => 'required | email'
        ];
        $messages = [
            'name.required' => 'Veulliez saisir votre nom',
            'email.required' =>'Veuillez saisir votre email',
            'email.required' => 'Votre email est invalide'
        ];

        $validation = Validator::make($data,$rules,$messages);
        if ($validation -> fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }

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
	    else 
        {
	    	return 'erreur';
	    }

    }

    public function showStudent($id)

    {
        $id=decryptageID($id);                         
    	$student = student::find($id);
    	return view('student.show',['student'=>$student]);

    }

    public function showUpdateStudent($id) 
    {
        /*if(!Auth::user()) 
        {
            return redirect(route('showClassroomList'));
        }*/

    	$student = student::find($id);
    	
    	if ($student) 
	    {
	    	$classroom =Classroom::all();    
	    	return view('student.view',['student'=>$student,'classroom'=>$classroom]);
	    	return back();
	    }
	    else 
        {
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

    public function showStudentLogin() 
    {
        return view('student.login');

    }

    public function handleStudentLogin() 
    {
        $data  = Input::all();
        $cred = [
            
            'email'=> $data['user_mail'],
            'password'=> $data['pssword']
        ];

        if (Auth::attempt($cred)) {

            Session::put([
                'message' => 'Connexion réussie',
            ]);

            return redirect(route('showAddClassroom'));
        }

       return back();

    }

    public function handleStudentLogout()

    {
        Auth::logout();
        return redirect(route('showClassroomList'));
    }


    public function showSearchStudent() 

    {
        return view('student.search');

    }

    public function handleSearchStudent() 

    {

        $data  = Input::all();
        //dd($data['name']);
        $student=Student::Where('name', 'like', '%' . $data['name'] . '%')->get();
        dd($student);
        //return back();
    }
/*
    public function handleStudentSearchDate()

    {
    
        $data=Input::all();
        $firstDate = Carbon::createFromFormat("Y-m-d", $data['firstDate']);
        $lastDate = Carbon::createFromFormat("Y-m-d", $data['lastDate']);
        $student=Student::WhereBetween('created_at', [$firstDate,$lastDate] )->get();
        dd($student);

    }

*/
}
