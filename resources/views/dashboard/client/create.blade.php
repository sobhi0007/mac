
@extends('layouts.employee')

@section('content')
 <div class="container bg-white p-4">
   <div class="row mb-4">
      <div class="col-8">
         <div class="display-4">CREATE CLIENT</div>
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url()->previous()}}" class="btn btn-sm btn-danger text-light">Back</a>
      </div>
   </div>
   <div class=" my-3 ">
    <form method="POST" action="{{url('dashboard/clients/')}}" enctype="multipart/form-data">
       @csrf
       @method('POST')
       <div class="row">
          <div class="col-6 my-2"> 
             <label for="name">Name</label>
             <input  type="text" class="rounded @error('name') is-invalid  @enderror form-control form-control-sm" id="name" name="name" value="{{ old('name') }}">
          @error('name')
             <small class="fw-bold   text-danger">{{ $message }}</small>
          @enderror
          </div>
          <div class="col-6 my-2"> 
            <label for="phone">Phone</label>
            <input  type="text" class="  rounded @error('phone') is-invalid  @enderror form-control form-control-sm" id="phone" name="phone" value="{{ old('phone') }}">
         @error('phone')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>

          <div class="col-6 my-2"> 
             <label for="email">Email</label>
             <input  type="email" class="rounded @error('email') is-invalid @enderror form-control form-control-sm" id="email" name="email" value="{{ old('email') }}">
          @error('email')
             <small class="fw-bold   text-danger">{{ $message }}</small>
          @enderror
          </div>
         </div>
         <div class="row">
            <div class="col-6 my-2"> 
            <label for="working_days">Working days</label>
            <input  type="text" class="rounded @error('working_days') is-invalid @enderror form-control form-control-sm" id="working_days" name="working_days" value="{{ old('working_days') }}">
            @error('working_days')
             <small class="fw-bold   text-danger">{{ $message }}</small>
            @enderror
         </div>
         <div class="col-6 my-2"> 
            <label for="holiday">Holidays</label>
            <input  type="text" class="rounded @error('holiday') is-invalid @enderror form-control form-control-sm" id="holiday" name="holiday" value="{{ old('holiday') }}">
            @error('holiday')
              <small class="fw-bold   text-danger">{{ $message }}</small>
            @enderror
         </div>
          <div class="col-12 my-2"> 
            <label for="commercial_register">Commercial Register</label>
            <input  type="file" class="rounded @error('commercial_register') is-invalid @enderror form-control form-control-sm" id="commercial_register" name="commercial_register" >
         @error('commercial_register')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>

         <div class="col-12 my-2"> 
            <label for="tax_card">Tax Card</label>
            <input  type="file" class="rounded @error('tax_card') is-invalid @enderror form-control form-control-sm" id="tax_card" name="tax_card" >
         @error('tax_card')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>
       </div>
       <div class="text-end">
          <button type="submit" class="btn btn-primary btn-sm text-light my-2 ">Submit</button>
       </div>
       
     </form>
</div>
@endsection