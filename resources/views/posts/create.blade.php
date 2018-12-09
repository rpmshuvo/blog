@extends('layouts.app')
@section('content')
<h1>Artical</h1>
{!! Form::open(['action'=>'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="from-group">
      {{Form::Label('title','Title')}}
      {{Form::Text('title','',['class'=>'form-control','Placeholder'=>'Title'])}}
    </div>
    <div class="from-group">
      {{Form::Label('body','Body')}}
      {{Form::Textarea('body','',['class'=>'form-control','Placeholder'=>'Body'])}}
    </div>
    <br>
    <div class="form-group">
      {{Form::file('cover_image')}}
    </div>
    <br>
    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
