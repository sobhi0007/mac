
@extends('layouts.employee')

@section('content')
<div class="container bg-white p-4">
    <div class="row mb-4">
       <div class="col-8">
          <div class="display-4"> CLIENT {{$client->name}}</div>
          <div class="line-shape bg-primary"></div>
       </div>
       <div class="col-4 text-end">
        <a href="{{url()->previous()}}" class="btn btn-sm btn-danger text-light">Back</a>
       </div>
    </div>
    <div class="row">
        <div class="col-3 ">
            <span class="lead text-secondary">  Name : </span> {{$client->name}}
        </div>
        <div class="col-4 ">
            <span class="lead text-secondary">  Email : </span> {{$client->email}}
        </div>
        <div class="col-5 ">
            <span class="lead text-secondary">  Phone : </span> {{$client->phone}}
        </div>
        <div class="col-12 mt-4">
            <span class="lead text-secondary">  Working days : </span> {{$client->working_days}}
        </div>
        <div class="col-12 mt-4">
            <span class="lead text-secondary">  Holidays : </span> {{$client->holiday}}
        </div>
        <div class="col-12 mt-4">
            <div class="lead text-secondary">  Tax Card : </div> 
            <img src="{{asset($client->tax_card)}}" alt="" srcset="">
        </div>
        <div class="col-12 mt-4">
            <div class="lead text-secondary">  Tax Card : </div> 
          
        <iframe
        src="{{asset($client->commercial_register)}}"
        frameBorder="0"
        scrolling="auto"
        height="100%"
        width="100%"
        ></iframe>
        </div>
    </div>
</div>    
@endsection