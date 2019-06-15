@extends('layouts.app')

@section('content')
<div class="container">
@if(count($categories) > 0)

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label>title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter the Title">
                      </div>
                     <div class="form-group">
                        <label for="exampleFormControlSelect1">Category select</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                          @foreach($categories as $category)
                            @if($parent_cat !== null)
                              @if($parent_cat->id == $category->id)
                               
                               <option value="{{$category->id}}" selected>{{$category->name}}</option>
                              @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                              @endif 
                            @else 
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div> 

                      @if(count($tags) !== 0)
                      <div class="form-check">
                        @foreach($tags as $tag)
                          
                            <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}" >
                            <label class="form-check-label" >{{$tag->tag}}</label>     
                            <br>
                        @endforeach
                      </div>
                      @endif
                      <hr>


                      <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control"  name="content" placeholder="Enter Content" cols="8" rows="8"> </textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Image</label>
                        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                      </div>  
                      <button class="btn btn-primary" type="submit">Save</button>        
                    </form>
                </div>

            </div>

        </div>
    </div>
@else 
  <div class="text-center">
    <div class="card-header alert alert-danger">The is No Categories To Create Post </div>
    <div class="card-body"> 
      <a class="btn btn-Primary" href="{{route('category.create')}}">Create Category</a>
    </div>
  </div>
@endif
</div>
@endsection
