<h2>Bienvenue, {{Auth::user()->name}} {{Auth::user()->created_at->diffForHumans(now())}}</h2>
<form action="{{route('handleAddClassroom')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
	<label>Titre</label>
	<input type="text" name="title">
	<label>Photo</label>
	<input type="file" name="photo">
	<button type="submit">Envoyer</button>
	<a href="{{route('handleStudentLogout')}}" name="c" >deconnexion</a>
			
</form>

@if(Session::has('message'))
	<div>
		{{session('message')}}
		{{session::forget('message')}}
	</div>
@endif


