@extends('layouts.app')

@section('content')
@if(count($users) > 0)
	<div class="card-header">Users </div>
	<div class="card-body">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Avatar</th>
		      <th scope="col">Delete</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Role</th>
		    </tr>
		  </thead>
		  <tbody>
		
				@foreach($users as $user)

				    <tr>
				      <th scope="row">{{$user->name}}</th>
				      <th scope="row">
				      	<img src="https://www.pngarts.com/files/3/Boy-Avatar-PNG-Image.png" alt="{{$user->name}}" class="img-thumbnail" width="75px" height="75px" style="border-radius: 50%">
				      </th>	
				      <td>
				      	<a class="btn btn-danger" href="{{route('user.delete', ['id' => $user->id ])}}"> Delete user
				      	</a>
				      </td>	  
				      <td>
				      	<a class="btn btn-primary" href="{{route('user.edit', ['id' => $user->id ])}}"> Edit user
				      	</a>
				      </td>	 
				      <td>
				      	@if($user->admin)
				      		Admin : 
				      		<a class="btn btn-success" href="{{route('user.admin', ['id' => $user->id ])}}"> Make User
				      		</a>
				      	@else
				      		User : 
				      		<a class="btn btn-success" href="{{route('user.admin', ['id' => $user->id ])}}"> Make Admin
				      		</a>
				      	@endif
				      </td>

				    </tr>
				@endforeach    
		  </tbody>
		</table>
	</div>
@else 
	<div class="text-center">
		<div class="card-header alert alert-danger">The is No users </div>
		<div class="card-body"> 
			<a class="btn btn-Primary" href="{{route('user.create')}}">Create user</a>
		</div>
	</div>
@endif
@endsection