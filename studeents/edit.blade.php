@extends('layouts.app')

@section('content')
    {{--  @include('inc.massages')  --}}
  {{--  <h3>Edit studeents</h3>

{!! Form::open(['action'=>['StudeentsController@update',$studeent->id],'method' =>'POST']) !!}
   <div class="form-group">
       {{Form::label('name','Name')}}
        {{Form::text('name',$studeent->name,['class'=>'form-control','placeholder'=>'Name'])}}
   </div>
   <div class="form-group">
       {{Form::label('phone','Phone')}}
        {{Form::text('phone','',['class'=>'form-control','placeholder'=>'Phone'])}}
   </div>
   <div class="form-group">
       {{Form::label('email','Email')}}
        {{Form::text('email','',['class'=>'form-control','placeholder'=>'Email'])}}
   </div>
   <div class="form-group">
       {{Form::label('Courses','Courses')}}
        {{Form::text('Courses','',['class'=>'form-control','placeholder'=>'Courses'])}}
   </div>
   <div class="from-group">
     {{form::file('cover_image')}}
   </div><hr>
   {{form::hidden('_method','PUT')}}
    {{form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  --}}

@endsection
 