<h1>Users</h1><br>
  
  <div class="container">     
    <div class="row">
       <div class="col-md-6 col-lg-6 ">
         
            <h2><span>Users</span>&nbsp;&nbsp;
                <button class="btn btn-info btn-lg"data-toggle="modal" data-target="#createModal">&#x2b;</button>
            </h2><hr>
             @if(count($Users_manager)>0 )
                   @foreach($Users_manager as $Users_manag)
                      <ul class="list-group">
                        <li class="list-group-item">
                            <div class="col-md-12 col-sm-12">
                                <img style="width:35%" src="/storage/Users_images/{{$Users_manag->Users_image}}">
                                <a href="/Users/{{$Users_manag->id}}">{{$Users_manag->name}}</a>
                                <p ><b>Phone:</b>&nbsp;{{$Users_manag->phone}}<br>
                                    <b>Email:</b>&nbsp;{{$Users_manag->email}}<br>
                                    <b>Role:</b>&nbsp;{{$Users_manag->role}}<br>
                                <small>written on{{$Users_manag->created_at}}</small></p>
                            </div>
                        </li>
                      </ul><br> 
                  @endforeach 
                  
              
            @else
              <p> no  Users found</p>
            @endif
        </div>
            
        
        

         <!-- Modal create users-->
  <div class="modal fade" id="createModal" role="dialog">
    {{--  <div class="modal-dialog">  --}}
    <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
       
        <div class="modal-body">
          
            @include('auth.register')
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        
      </div>
      
    </div>
  </div>











