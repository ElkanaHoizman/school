  {{--  @extends('layouts.app')

@section('content')    --}}
  
    
   @include('inc.massages')
  <h3>create studeents</h3>
{!! Form::open(['action' => 'StudeentsController@store','method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
   <div class="form-group">
       {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
   </div>
   <div class="form-group">
       {{Form::label('phone','Phone')}}
        {{Form::text('phone','',['class'=>'form-control','placeholder'=>'Phone'])}}
   </div>
   <div class="form-group">
       {{Form::label('email','Email')}}
        {{Form::text('email','',['class'=>'form-control','placeholder'=>'Email'])}}
   </div>
    <h2>courses</h2>
        <hr>
        @if(count($courses)>0)
            @foreach($courses as $cours)
                <div class="form-group">
                    <input name="courses[]" type="checkbox" value="{{$cours->id}}">
                    <label for="{{$cours->name}}" class="control-label coursesstudentslabel">{{$cours->name}}</label>
                    
                    &nbsp;&nbsp;&nbsp;
                    <small> course exist since: {{$cours->created_at}}</small>
                    <hr>
                </div>


            @endforeach
        @else
            <p> No Courses Found</p>
        @endif

  
   <div class="from-group">
     {{form::file('studeents_image')}}
   </div><hr>
    {{form::submit('submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}


  
{{--  @endsection  --}}
