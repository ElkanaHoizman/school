{{--  @extends('layouts.app')

@section('content')
    @include('inc.massages')  --}}
  <h3>Edit Users</h3>

{!! Form::open(['action'=>['UsersController@update',$Users->id],'method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
   <div class="form-group">
       {{Form::label('name','Name')}}
        {{Form::text('name',$Users->name,['class'=>'form-control','placeholder'=>'Name'])}}
   </div>
   <div class="form-group">
       {{Form::label('email','Email')}}
        {{Form::email('email',$Users->email,['class'=>'form-control','placeholder'=>'Email'])}}
   </div>
    <div class="form-group">
       {{Form::label('phone','phone')}}
        {{Form::text('phone',$Users->phone,['class'=>'form-control','placeholder'=>'phone'])}}
   </div>
  
         <div class="form-group">
            <p>{{$Users->role}}</p>
            <label>Role:</label> &nbsp;&nbsp;&nbsp;&nbsp;
         
            @if(Auth::user()->id==$Users->id && Auth::user()->role == "manager")
                <label for="manager" class="control-label">Manager</label>
                <input id="manager" name="role" type="radio" value="manager" checked>
            @elseif($Users->role=="owner")
                <label for="owner" class="control-label">Owner</label>
                <input id="owner" name="role" type="radio" value="owner" checked>
              @elseif($Users->role=="manager")
                <label for="manager" class="control-label">Manager:</label>
                <input id="manager" name="role" type="radio" value="manager" checked>
                &nbsp;    &nbsp;    &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                <label for="sales" class="control-label">Sales:</label>
                <input id="sales" name="role" type="radio" value="sales">
            @elseif($Users->role=="sales")
                <label for="manager" class="control-label">Manager:</label>
                <input id="manager" name="role" type="radio" value="manager">
                &nbsp;    &nbsp;    &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                <label for="sales" class="control-label">Sales:</label>
                <input id="sales" name="role" type="radio" value="sales" checked>
            @endif
        </div>
   <div class="from-group">
     {{form::file('Users_image')}}
   </div><hr>
    {{form::hidden('_method','PUT')}}
    {{form::submit('submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}   
              
           

{{--  @endsection  --}}
 