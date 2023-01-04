
@extends('layouts.employee')

@section('content')
 <div class="container bg-white p-4">
   <div class="row mb-4">
      <div class="col-8">
         <div class="display-4">CREATE EMPLOYEE</div>
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url()->previous()}}" class="btn btn-sm btn-danger text-light">Back</a>
      </div>
   </div>
   <div class=" my-3 ">
    <form method="POST" action="{{url('dashboard/employees/')}}" enctype="multipart/form-data" >
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
        <div class="col-6 my-2"> 
            <label for="password">Password</label>
            <input  type="password" class="rounded @error('password') is-invalid @enderror form-control form-control-sm" id="password" name="password" value="{{ old('password') }}">
         @error('password')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>
         <div class="col-4 my-2"> 
            <select class="form-select @error('branch') is-invalid  @enderror" aria-label="Default select example" name="branch" >
                <option value="">Select branch</option>
                 @foreach ($branches as $branch)
                   <option value="{{$branch->id}}" {{$branch->id==old('branch')?'selected':''}}>{{$branch->country->name}}</option>
                @endforeach
            </select>
            @error('branch')
              <small class="fw-bold   text-danger">{{ $message }}</small>
            @enderror   
         </div>
         <div class="col-4 my-2"> 
            <select class="form-select @error('gender') is-invalid  @enderror" aria-label="Default select example" name="gender" >
                <option value="">Select gender</option>
                <option value="male" {{old('gender')=='Male'?'selected':''}}>Male</option>
                <option value="female" {{old('gender')=='Female'?'selected':''}}>Female</option>
            </select>
            @error('gender')
              <small class="fw-bold   text-danger">{{ $message }}</small>
            @enderror   
         </div>
         <div class="col-4 my-2"> 
            <select class="form-select @error('role') is-invalid  @enderror" aria-label="Default select example" name="role" >
                <option value="">Select role</option>
                 @foreach ($roles as $role)
                   <option value="{{$role->id}}" {{$role->id==old('role')?'selected':''}}>{{$role->name}}</option>
                @endforeach
            </select>
            @error('role')
              <small class="fw-bold   text-danger">{{ $message }}</small>
            @enderror   
         </div>
         <div class="col-12 my-2"> 
            <label for="image">Image</label>
            <input  type="file" class="rounded @error('image') is-invalid @enderror form-control form-control-sm" id="image" name="image" >
         @error('image')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>
       <div class="text-end">
          <button type="submit" class="btn btn-primary btn-sm text-light my-2 ">Submit</button>
       </div>
       
     </form>
</div>
@endsection