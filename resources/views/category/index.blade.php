@extends('layouts.app')

@section('content')
@if(count($categories) > 0)
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">create post in the category</th>
    </tr>
  </thead>
  <tbody>
  		
		@foreach($categories as $cat)

		    <tr>
		      <th scope="row">{{$cat->name}}</th>
		      <td>
		      	<a class="btn btn-success" href="{{route('category.edit', ['id' => $cat->id ])}}"> Edit
		      	</a>
		      </td>
		      <td>
		      	<a class="btn btn-danger" href="{{route('category.delete', ['id' => $cat->id ])}}"> Delete Category
		      	</a>
		      </td>
		      <td>
		      	<a class="btn btn-primary" href="{{route('post.create', ['id' => $cat->id ])}}"> Create Post
		      	</a>
		      </td>
		    </tr>
		@endforeach
	    
  </tbody>
</table>
@else 
	<div class="text-center">
		<div class="card-header alert alert-danger">The is No categories </div>
		<div class="card-body"> 
			<a class="btn btn-Primary" href="{{route('category.create')}}">Create Category</a>
		</div>
	</div>
@endif
@endsection