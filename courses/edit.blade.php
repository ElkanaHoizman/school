@extends('layouts.app')

@section('content')
    {{--  @include('inc.massages')  --}}
  <h3>Edit Courses</h3>

{!! Form::open(['action'=>['coursesController@update',$cours->id],'method' =>'POST']) !!}
   <div class="form-group">
       {{Form::label('name','Name')}}
        {{Form::text('name',$cours->name,['class'=>'form-control','placeholder'=>'Name'])}}
   </div>
   <div class="form-group">
       {{Form::label('description','Description')}}
        {{Form::textarea('description',$cours->description,[ 'id'=> 'article-ckeditor' ,'class'=>'form-control','placeholder'=>'Description Text'])}}
   </div> 
   <div class="from-group">
     {{form::file('cover_image')}}
   </div><hr>
   {{form::hidden('_method','PUT')}}
    {{form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection