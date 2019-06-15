@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Create Tag</div>
                <div class="card-body">
                    <form method="POST" action="{{route('tag.store')}}" >
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="tag" placeholder="Enter the tag Name">
                      </div>
                      <button class="btn btn-primary" type="submit">Create</button>        
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
