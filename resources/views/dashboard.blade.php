@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>You are logged in!</h3>
                    <a class="btn btn-primary" href="/posts/create">Create Artical</a>
                    <hr>
                    @if(count($posts)>0)
                    <table class="table">
                      <tr>
                        <th>title</th>
                        <th></th>
                        <th></th>
                      </tr>
                      @foreach($posts as $post)
                      <tr>
                        <td><a href="posts/{{$post->id}}">{{$post->title}}</a></td>
                        <td><a class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</a></td>
                        <td>
                          {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>"pull-right"])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                          {!!Form::close()!!}
                        </td>
                      </tr>
                    @endforeach
                    </table>
                  @else
                    <h3>You did not create any Artical </h3>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
