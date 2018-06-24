@extends('layouts.app')

@section('content')
<a href="/school" class='btn btn-primary'>go back</a><br><br>
  <h1>{{$studeent->name}}</h1>

<div>
    {{$studeent->phpne}}
    {{$studeent->email}}
    {{$studeent->Courses}}
</div>

<hr>
<small>eritten on{{$studeent->created_at}}</small>
<hr>
{{--  @if (!Auth::guest())
  @if (Auth::user()->id == $cours->user_id)  --}}
<a href="/school/{{$studeent->id}}/edit" class="btn btn-success">Edit</a><br><br>

{!!Form::open(['action'=>['StudeentsController@destroy' ,$studeent->id], 'method' =>'POST','class' =>'pull-right'])!!}
   {{form::hidden('_method','DELETE')}}
   {{form::submit('Delete',['class'=>'btn btn-danger'])}}
{!! Form::close() !!}
{{--  @endif
@endif  --}}
@endsection