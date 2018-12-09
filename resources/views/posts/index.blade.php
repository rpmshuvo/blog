@extends('layouts.app')
@section('content')
<h1>articles</h1>
  @if(count($posts)>0)
    @foreach ($posts as $post)
      <div class="card ">
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <img style="width:100%;height:200px" src="/storage/cover_images/{{$post->cover_image}}" alt="cover_image">
          </div>
          <div class="col-sm-8 col-md-8">
            <h1><a href="posts/{{$post->id}}">{{$post->title}}</a></h1>
            <small>written at {{$post->created_at}} By {{$post->user->name}}</small>
          </div>

        </div>
      </div>
      <br>
    @endforeach
  @else
    <h1>no post fount</h1>
  @endif

@endsection
