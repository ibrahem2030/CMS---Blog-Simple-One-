@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Create Category</div>
                <div class="card-body">
                    <form method="POST" action="{{route('user.store')}}" >
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter the Name">
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter the Email">
                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                      </div>

                      <button class="btn btn-primary" type="submit">Save</button>        
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
