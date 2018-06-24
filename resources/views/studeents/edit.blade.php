@extends('layouts.app')

@section('content')
    @include('inc.massages')
  <h3>Edit studeents</h3>

{!! Form::open(['action'=>['StudeentsController@update',$studeent->id],'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
   <div class="form-group">
       {{Form::label('name','Name')}}
        {{Form::text('name',$studeent->name,['class'=>'form-control','placeholder'=>'Name'])}}
   </div>
   <div class="form-group">
       {{Form::label('phone','Phone')}}
        {{Form::text('phone', $studeent->phone,['class'=>'form-control','placeholder'=>'Phone'])}}
   </div>
   <div class="form-group">
       {{Form::label('email','Email')}}
        {{Form::text('email',$studeent->email,['class'=>'form-control','placeholder'=>'Email'])}}
   </div>
   
   <div class="from-group">
     {{form::file('studeents_image')}}
   </div><hr>
            <h2>courses</h2>

            <hr>

            @if(count($courses)>0)
                @foreach($courses as $cours)
                    <div class="form-group">
                        @if(in_array($cours->id,$coursesedit))

                            <input name="courses[]" $courses null type="checkbox" value="{{$cours->id}}" checked>
                           
                            <label for="{{$cours->name}}"
                                   class="control-label coursesstudentslabel">{{$cours->name}}</label>

                        @else
                            <input name="courses[]" $courses null type="checkbox" value="{{$cours->id}}">
                            
                            <label for="{{$cours->name}}"
                                   class="control-label coursesstudentslabel">{{$cours->name}}</label>
                        @endif
                    </div>
                @endforeach
            @else
                <p>No Courses Found</p>
            @endif
   {{form::hidden('_method','PUT')}}
    {{form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
 