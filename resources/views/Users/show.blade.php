@extends('layouts.app')

@section('content')
      @include('inc.Administrationshow')
          <div class="col-md-5 ">
          </div>
          <div class="col-md-3 ">
                
                @if (Auth::user()->role == 'owner' && Auth::user()->id !==$Users->id && Auth::user()->role == 'owner'|| Auth::user()->role == 'manager' && Auth::user()->id !==$Users->id && Auth::user()->role == 'manager')
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"> Delete</button>
                @endif  
                  <a  href="/Users/{{$Users->id}}/edit" class="btn btn-success float-right" data-toggle="modal" data-target="#EditModalcoursas">Edit</a><br><br>
                  <h1>{{$Users->name}}</h1><hr>
                  <p>{{$Users->email}}</p><br>
                  <p>{{$Users->role}}</p><br>
                  <img style="width:150px" height="150px" src="/storage/Users_images/{{$Users->Users_image}}">
                
          </div>
@endsection
<!-- Modal Edit Users-->
  <div class="modal fade" id="EditModalcoursas" role="dialog">
    {{--  <div class="modal-dialog">  --}}
    <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
       
        <div class="modal-body">
          
            @include('Users.edit')
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      
    </div>
  </div>


<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <h3>Are you sure you want to delete?</h3>
           {!!Form::open(['action'=>['UsersController@destroy' ,$Users->id], 'method' =>'POST','class' =>'pull-right'])!!}
              {{form::hidden('_method','DELETE')}}
             {{form::submit('Delete',['class'=>'btn btn-danger'])}}
          {!! Form::close() !!}
        </div>
                     
      </div>
    </div>
  </div>
