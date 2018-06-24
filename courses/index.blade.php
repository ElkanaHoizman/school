
@extends('layouts.app')

@section('content')

    <h1>School</h1>
  <br>

  <div class="container">     
    <div class="row">
       <div class="col-md-3 col-sm-3">
         
            <h2><span>Courses</span>
                <button class="glyphicon" data-toggle="modal" data-target="#createModal">&#x2b;</button>
            </h2><hr>
           
             @if(count($courses) > 0)
               @foreach($courses as $cours)
                  <ul class="list-group">
           
                 <li class="list-group-item">
                   <a href="/school/{{$cours->id}}">
                      {{$cours->name}}
                  </a>
                  <p>{{$cours->description}}</p>
                   <small>written on{{$cours->created_at}}</small>
                </li><br>
                
               </ul> 
               @endforeach 
                {{$courses->links()}}
          @else
          <p> no courses found</p>

          @endif
        </div>
      
        {{--  <div class="col-md-3 col-sm-3">
            <h2> <span>Studeents</span>
                 <button class="glyphicon" data-toggle="modal" data-target="#createModalStudeents">&#x2b;</button>
            </h2><hr>
           
             @if(count($studeents) > 0)
               @foreach($studeents as $studeent)
                  <ul class="list-group">
           
                 <li class="list-group-item">
                   <a href="/school/{{$studeent->id}}">
                      {{$studeent->name}}
                  </a>
                  <p>{{$studeent->phone}}</p>
                   <p>{{$studeent->email}}</p>
                    <p>{{$studeent->Courses}}</p>
                   <small>written on{{$studeent->created_at}}</small>
                </li><br>
                
               </ul> 
               @endforeach 
                {{$studeents->links()}}
          @else
          <p> no courses found</p>

          @endif
        </div>  --}}

<!-- Modal create courses-->
  <div class="modal fade" id="createModal" role="dialog">
    {{--  <div class="modal-dialog">  --}}
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
       
        <div class="modal-body">
          
            @include('school.courses.create')
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      
    </div>
  </div>


 <!-- Modal create Studeents-->
  <div class="modal fade" id="createModalStudeents" role="dialog">
    {{--  <div class="modal-dialog">  --}}
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
       
        <div class="modal-body">
          
            {{--  @include('school.studeents.create')  --}}
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      
    </div>
  </div>


 

@endsection