
@extends('layouts.employee')

@section('content')
 <div class="container bg-white p-4">
   <div class="row mb-4">
      <div class="col-8">
         <div class="display-4">EMPLOYEE</div>
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url()->previous()}}" class="btn btn-sm btn-danger text-light">Back</a>
      </div>
   </div>
  <div class="row">
    <div class="col-lg-3 col-md-4 col-sm-12 col-12 text-center text-md-start">
          <img src="{{asset($employee->image)}}" class="shadow border" width="200px">
    </div>
    <div class="col-lg-9 col-md-8 col-sm-12 col-12">
        <div class="row">
            <div class="col-6">
                <ul class="list-star">
                    <li><span class="text-secondary fw-bold">Name:   </span>{{$employee->name}} </li>
                    <li><span class="text-secondary fw-bold">Gender: </span>{{$employee->gender}}  <i class="mdi mdi-gender-{{$employee->gender}} text-primary"></i></li>
                    <li><span class="text-secondary fw-bold">Phone:  </span>{{$employee->phone}}</li>
                    <li><span class="text-secondary fw-bold">Email:  </span>{{$employee->email}} </li>

                  </ul>
            </div>
            <div class="col-6">
                <ul class="list-star">
                     <li><span class="text-secondary fw-bold">Role: </span>{{$employee->role}} </li>
                    <li><span class="text-secondary fw-bold">Branch: </span> <img class="border-none" src="http://127.0.0.1:8000/vendor/blade-flags/country-{{$branch->code}}.svg" style="width:25px"> {{$branch->name}}</li>
                  </ul>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection