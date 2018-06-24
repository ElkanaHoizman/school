  <h1>School</h1><br>
  
  <div class="container">     
    <div class="row">
       <div class="col-md-4 col-lg-3 ">
         
            <h2><span>Courses:{{count($courses)}}</span>&nbsp;&nbsp;
                <button class="btn btn-info btn-lg"data-toggle="modal" data-target="#createModal">&#x2b;</button>
            </h2><hr>
           
             @if(count($courses) > 0)
               @foreach($courses as $cours)
                  <ul class="list-group">
                     <li class="list-group-item">
                        <div class="col-md-12 col-sm-12">
                            <img style="width:35%" src="/storage/coursas_images/{{$cours->coursas_image}}">
                            <a href="/courses/{{$cours->id}}">{{$cours->name}}</a>
                            <p >{{$cours->description}}</p>
                            <small>written on{{$cours->created_at}}</small><br><br>
                        </div>
                     </li>
                  </ul><br> 
                @endforeach 
                {{--  {{$courses->links()}}  --}}
            @else
              <p> no courses found</p>
            @endif
        </div>    
        
           
         <div class="col-md-4 col-lg-3">
         
            <h2><span>Students:{{count($studeents)}}</span>&nbsp;&nbsp;
                <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#createModalStudeents">&#x2b;</button>
            </h2><hr>
           
             @if(count($studeents) > 0)
               @foreach($studeents as $studeent)
                  <ul class="list-group">
                     <li class="list-group-item">
                        <div class="col-md-12 col-sm-12">
                            <img style="width:35%" src="/storage/studeents_images/{{$studeent->studeents_image}}">
                            <a href="/studeents/{{$studeent->id}}">{{$studeent->name}}</a>
                            <p ><b>Phone:</b>&nbsp;{{$studeent->phone}}
                                <b>Email:</b>&nbsp;{{$studeent->email}}
                            <small>written on{{$studeent->created_at}}</small></p>
                        </div>
                     </li>
                  </ul><br> 
                @endforeach 
                {{--  {{$studeents->links()}}  --}}
            @else
              <p> no studeents found</p>
            @endif
        </div>

  <!-- Modal create courses-->
  <div class="modal fade" id="createModal" role="dialog">
    {{--  <div class="modal-dialog">  --}}
    <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
       
        <div class="modal-body">
          
            @include('coursas.create')
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
    <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
       
        <div class="modal-body">
          
            @include('studeents.create')
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      
    </div>
  </div>

