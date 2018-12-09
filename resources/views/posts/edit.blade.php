@extends('layouts.app')
@section('content')
<h1>Edit Artical</h1>
{!! Form::open(['action'=>['PostsController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="from-group">
      {{Form::Label('title','Title')}}
      {{Form::Text('title',$post->title,['class'=>'form-control','Placeholder'=>'Title'])}}
    </div>
    <div class="from-group">
      {{Form::Label('body','Body')}}
      {{Form::Textarea('body',$post->body,['class'=>'form-control','Placeholder'=>'Body'])}}
    </div>
    <div class="form-group">
            {{Form::file('cover_image')}}
    </div>
    <br>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
