@extends('layouts.base')
@section('brand', 'Animal Profile')
@section('content')
	<div class="card" style="width: 15rem;">
	  <img src="{{ asset($animal->image) }}" width="150px" height="150px">
	  <div class="card-body">
	    <p class="card-text">
	      	{{$animal->name}}<br>
			Breed: {{$animal->breed}}<br>
			Gender: {{$animal->gender}}<br>
			Age: {{$animal->age}}	
	    </p>
	  </div>
	</div>
	<div>
		@comments(['model' => $animal])
	</div>
@endsection
