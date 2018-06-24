
@extends('layouts.app')

@section('content')
@include('inc.Administration')
    <div class="col-md-3 ">
    </div>       
    <div class="col-md-3 ">
    <div class="alert alert-secondary">
        <strong>Total number of Users:&nbsp;&nbsp;</strong>{{count($Users)}}
    </div>
            
    </div>          
    

@endsection