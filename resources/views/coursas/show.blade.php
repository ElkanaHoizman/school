@extends('layouts.app')

@section('content')
@include('inc.aside_school')

<div class="col-md-3 ">
</div>
<div class="col-md-3 ">
           
        <h1>{{$cours->name}}</h1><hr>
        <p>{{$cours->description}}</p><br>
        <img style="width:150px" height="150px" src="/storage/coursas_images/{{$cours->coursas_image}}">
        <hr>
          <small>eritten on{{$cours->created_at}}</small>  
        <hr> 
        <h3><b>In this are&nbsp;{{$cours->studeents()->count()}}&nbsp; students</b></h3><hr>
          @if(count($cours->studeents)>0)
                  @foreach ($cours->studeents as $studeent )
                  <div class="studeents_cours">
                  <span class="label label-default"> {{$studeent->name}}</span>
                  </div><br>
                  @endforeach
                @else
                  <p>No students Found</p><br><hr> 
                  <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#DeleteModal"> Delete</button>
             @endif
              
       
          @if (Auth::user()->role=="owner"||Auth::user()->role=="manager")  
            <a href="/courses/{{$cours->id}}/edit" class="btn btn-success  float-right" data-toggle="modal" data-target="#EditModalcoursas">Edit</a><br><br><hr>
            
          @endif


@endsection
<!-- Modal Edit coursas-->
  <div class="modal fade" id="EditModalcoursas" role="dialog">
    {{--  <div class="modal-dialog">  --}}
    <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
       
        <div class="modal-body">
          
            @include('coursas.edit')
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      
    </div>
  </div>
 <!-- The Modal -->
  <div class="modal fade" id="DeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h3>Are you sure you want to delete?</h3>
           {!!Form::open(['action'=>['coursesController@destroy' ,$cours->id], 'method' =>'POST','class' =>'pull-right'])!!}
            {{form::hidden('_method','DELETE')}}
            {{form::submit('Delete',['class'=>'btn btn-danger float-right'])}}
          {!! Form::close() !!}
        </div>
                     
      </div>
    </div>
  </div>