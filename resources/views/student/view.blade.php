<form action="{{route('handleUpdateStudent',['id'=> $student->id])}}" method="POST">
	{{csrf_field()}}
	
	<label>Email</label>
	<input type="text" name="email" value="{{$student->email}}">
	<label>Nom</label>
	<input type="text" name="name" value="{{$student->name}}">
	<input type="hidden" name="idstudent">

	<label>Choisissez une classe</label>
	<select name="classroom">
		<option value="1">1</option>
    	<option value="2">2</option>
    	<option value="3">3</option>
    	<option value="3">4</option>
	</select>
	<button type="submit">Envoyer</button> 
</form>