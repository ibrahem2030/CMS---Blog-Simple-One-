@extends('layouts.app')

@section('content')
@if(count($posts) > 0)
<div class="card-header">Posts Trashed</div>
<div class="card-body">
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Name</th>
	      <th scope="col">Image</th>
	      <th scope="col">Delete</th>
	      <th scope="col">Restore</th>
	    </tr>
	  </thead>
	  <tbody>
	  	
			@foreach($posts as $post)

			    <tr>
			      <th scope="row">{{$post->title}}</th>
			      <th scope="row">
			      	<img src="{{asset($post->file)}}" alt="{{$post->title}}" class="img-thumbnail" width="100px" height="100px">
			      </th>	
			      <td>
			      	<a class="btn btn-danger" href="{{route('post.hdelete', ['id' => $post->id ])}}"> Delete Post
			      	</a>
			      </td>	
			      <td>
			      	<a class="btn btn-primary" href="{{route('post.restore', ['id' => $post->id ])}}"> Restore Post
			      	</a>
			      </td>	  
			    </tr>
			@endforeach
	    
	  </tbody>
	</table>
</div>

@else 
	<div class="text-center">
		<div class="card-header alert alert-danger">The is No Trashed Posts </div>
		<div class="card-body"> 
			<div>
				<a class="btn btn-Primary" href="{{route('post.create')}}">Create One</a>
			</div>
			<div>
				<a class="btn btn-Primary" href="{{route('posts')}}">All Posts</a>
			</div>
		</div>
	</div>
@endif
@endsection