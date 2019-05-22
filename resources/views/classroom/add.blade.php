<form action="{{route('handleAddClassroom')}}" method="POST">
	{{csrf_field()}}
	<label>Titre</label>
	<input type="text" name="title">
	<label>Photo</label>
	<input type="text" name="photo">
	<button type="submit">Envoyer</button>		
</form>
