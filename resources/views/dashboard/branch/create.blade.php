
@extends('layouts.employee')

@section('content')
 <div class="container bg-white p-4">
   <div class="row mb-4">
      <div class="col-8">
         <div class="display-4">CREATE BRANCH</div>
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url()->previous()}}" class="btn btn-sm btn-danger text-light">Back</a>
      </div>
   </div>
   <div class=" my-3 ">
    <form method="POST" action="{{url('dashboard/branches/')}}" enctype="multipart/form-data">
       @csrf
       @method('POST')
       <div class="row">
           <div class="col-12 my-2"> 
               <select class="form-select @error('country') is-invalid  @enderror" aria-label="Default select example" name="country" >
                   <option value="">Select Country</option>
                    @foreach ($countries as $country)
                      <option value="{{$country->id}}" >{{$country->name}}</option>
                   @endforeach
               </select>
               @error('country')
                 <small class="fw-bold   text-danger">{{ $message }}</small>
               @enderror   
            </div>
       <div class="text-end">
          <button type="submit" class="btn btn-primary btn-sm text-light my-2 ">Submit</button>
       </div>
     </form>
</div>
@endsection