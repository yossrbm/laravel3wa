<form action="{{route('showSearchStudent')}}" method="POST">
	{{csrf_field()}}
	<label>name</label>
	<input type="text" name="name">

</form>