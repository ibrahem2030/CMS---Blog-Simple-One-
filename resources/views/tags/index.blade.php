@extends('layouts.app')

@section('content')
@if(count($tags) > 0)
	<div class="card-header">Posts </div>
	<div class="card-body">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Image</th>
		      <th scope="col">Delete</th>
		      <th scope="col">Edit</th>
		    </tr>
		  </thead>
		  <tbody>
		
				@foreach($tags as $tag)

				    <tr>
				      <th scope="row">{{$tag->tag}}</th>
				      
				      <td>
				      	<a class="btn btn-danger" href="{{route('tag.delete', ['id' => $tag->id ])}}"> Delete tag
				      	</a>
				      </td>	  
				      <td>
				      	<a class="btn btn-Primary" href="{{route('tag.edit', ['id' => $tag->id ])}}"> Edit tag
				      	</a>
				      </td>	  
				    </tr>
				@endforeach    
		  </tbody>
		</table>
	</div>
@else 
	<div class="text-center">
		<div class="card-header alert alert-danger">The is No tags </div>
		<div class="card-body"> 
			<a class="btn btn-Primary" href="{{route('tag.create')}}">Create tag</a>
		</div>
	</div>
@endif
@endsection