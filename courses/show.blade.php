@extends('layouts.app')

@section('content')
<a href="/school" class='btn btn-primary'>go back</a><br><br>
  <h1>{{$cours->name}}</h1>

<div>
    {{$cours->description}}
</div>
<hr>
<small>eritten on{{$cours->created_at}}</small>
<hr>
{{--  @if (!Auth::guest())
  @if (Auth::user()->id == $cours->user_id)  --}}
<a href="/school/{{$cours->id}}/edit" class="btn btn-success">Edit</a><br><br>

{!!Form::open(['action'=>['coursesController@destroy' ,$cours->id], 'method' =>'POST','class' =>'pull-right'])!!}
   {{form::hidden('_method','DELETE')}}
   {{form::submit('Delete',['class'=>'btn btn-danger'])}}
{!! Form::close() !!}
{{--  @endif
@endif  --}}
@endsection