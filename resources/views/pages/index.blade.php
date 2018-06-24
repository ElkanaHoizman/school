 @extends('layouts.app')

@section('content')

  @include('inc.aside_school')
      <div class="col-md-1 col-lg-3">
      </div>
      <div class="col-md-3 col-lg-3 ">
          <div class="alert alert-primary">
             <strong>Total number of courses:&nbsp;&nbsp;</strong>{{count($courses)}}
          </div><br>
          <div class="alert alert-secondary">
            <strong>Total number of students:&nbsp;&nbsp;</strong>{{count($studeents)}}
          </div>  
        
      </div>



@endsection  
