 @include('inc.massages')
  <h3>create Courses</h3>
{!! Form::open(['action' => 'coursesController@store','method' =>'POST', 'enctype'=>'multipart/form-data']) !!}
   <div class="form-group">
       {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
   </div>
   <div class="form-group">
       {{Form::label('description','Description')}}
        {{Form::textarea('description','',[ 'id'=> 'article-ckeditor' ,'class'=>'form-control','placeholder'=>'Description Text'])}}
   </div> 
   <div class="from-group">
     {{form::file('coursas_image')}}
   </div><hr>
    {{form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
