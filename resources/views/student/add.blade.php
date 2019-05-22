<form action="{{route('handleAddStudent')}}" method="POST">
	{{csrf_field()}}
	
	<label>Email</label>
	<input type="text" name="email">
	<label>Nom</label>
	<input type="text" name="name">
	<label>Mot de passe</label>
	<input type="text" name="password">

	<label>Choisissez une classe</label>
	<select name="classroom">
		<option value="1">1</option>
    	<option value="2">2</option>
    	<option value="3">3</option>
    	<option value="3">4</option>
	</select>
	<button type="submit">Envoyer</button> 
</form>