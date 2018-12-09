@extends('layouts.app')
@section('content')

  <a href="{{ URL::previous() }}" class="btn btn-primary my-3">Go Back</a>
  <h1>{{$post->title}}</h1>
  <img style="width:100%;height:700px" src="/storage/cover_images/{{$post->cover_image}}">
  <div class="container">
    <p><h3>{{$post->body}}</h3></p>
  </div>
  <hr>
  <small>{{$post->created_at}} By {{$post->user->name}} </small>
  <br>
  @if(!Auth::guest())
    @if(Auth()->user()->id==$post->user_id)
      <div class="d-inline-block">
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary my-3">Edit</a>
      </div>
      <div class="d-inline-block">
        {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>"pull-right"])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
      </div>
    @endif
  @endif
  <div class="card py-4 px-4">
    <div class="row">
      <div class="col">
        {!! Form::open(['action'=>'CommentsController@store','method'=>'POST']) !!}
        <div class="from-group">
          {{Form::Label('comment','Comment')}}
          {{Form::Textarea('comment','',['class'=>'form-control','Placeholder'=>'place your comment here','maxlength'=>500])}}
          {{Form::hidden('post_id',$post->id)}}
        </div>
        <br>
        {{Form::submit('submit',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
      </div>
    </div>
    <!-- for sowing comments-->
    @if(!empty($comments))
      @foreach($comments as $comment)
        <br><br>
        <div class="card py-4 bg-secondary">
          <div class="row px-4">
            <div class="col-sm-12 col-md-12">
              <div class="border-10">
                <h6>{{$comment->user->name}}</h6>
                <h6>{{$comment->created_at->format('Y-m-d H:i')}}</h6>
                <h3>{{$comment->comment}}</h3>
              </div>
              <hr>
              @if(!Auth::guest())
                @if(Auth::user()->id==$comment->user_id)
                  <div class="d-inline-block">
                    <a href="#" class="btn btn-primary my-3">Edit</a>
                  </div>
                  <div class="d-inline-block">
                    {!!Form::open(['action'=>['CommentsController@destroy',$comment->id],'method'=>'POST','class'=>"pull-right"])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {!!Form::close()!!}
                  </div>
                @endif
              @endif
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>

@endsection
