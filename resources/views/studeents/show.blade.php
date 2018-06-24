
@extends('layouts.app')

@section('content')
@include('inc.aside_school')

<div class="col-md-3 ">
</div>
<div class="col-md-3 ">
  
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"> Delete</button>
      
      <a href="/studeents/{{$studeent->id}}/edit" class="btn btn-success float-right" >Edit</a>
      <h1>{{$studeent->name}}</h1><hr>
      <p>{{$studeent->phone}}</p><br>
      <p>{{$studeent->email}}</p><br>
      <img style="width:150px" height="150px" src="/storage/studeents_images/{{$studeent->studeents_image}}">
      <hr>
        <small>eritten on{{$studeent->created_at}}</small>  
      <hr> 
        <h3><b>Courses</b></h3>
      <hr>
      @if(count($studeent->courses)>0)
              @foreach ($studeent->courses as $cours )
              <div class="studeents_cours">
              <span class="label label-default"> {{$cours->name}}</span>
              </div><br>
              @endforeach
            @else
              <p>No students Found</p>
          @endif

</div>
@endsection

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
            {!!Form::open(['action'=>['StudeentsController@destroy' ,$studeent->id], 'method' =>'POST','class' =>'pull-right'])!!}
            {{form::hidden('_method','DELETE')}}
            {{form::submit('Delete',['class'=>'btn btn-danger  float-right'])}}
          {!! Form::close() !!}
        </div>
                     
      </div>
    </div>
  </div>







