

@extends('layouts.employee')

@section('content')
 <div class="container bg-white p-4">
  @if(session()->has('msg'))
  <div class="alert alert-success" role="alert">
      {{Session::get('msg')}}
  </div> 
  @endif 

      
  
   <div class="row mb-4">
      <div class="col-8">
        
         <div class="display-4">BRANCHES</div>
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url('dashboard/branches/create')}}" class="btn btn-sm btn-primary text-light">Add branch</a>
      </div>
   </div>
  
<div class="table-responsive">
  

  <table class="table table-hover">
   <thead class="bg-light text-dark">
     <tr>
       <th class="text-center" scope="col">Country Flag</th>
       <th class="text-center" scope="col">Country Name</th>
       <th class="text-center" scope="col">Total Employees</th>
       <th class="text-center" scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
  
    @forelse ($branches as $branch)
    <tr>
      <td class="text-center"><img class="border-none" src="{{ asset('vendor/blade-flags/country-'.$branch->country->code.'.svg') }}"/></td>
      <td class="text-center">{{$branch->country->name}}</td>
      <td class="text-center">{{$branch->employees->count()}}</td>
      <td class="text-center">


        <form action="{{url('dashboard/branches/'.$branch->id)}}" method="POST">
          @csrf
          @method('Delete')
          <a href="{{url('dashboard/branches/'.$branch->id.'/edit')}}" class="btn btn-primary btn-rounded text-light btn-icon pt-2"><i class="  mdi mdi-pencil"></i></a>
          <a href="{{url('dashboard/branches/'.$branch->id)}}" class="btn btn-info btn-rounded text-light btn-icon pt-2"><i class="  mdi mdi-eye"></i></a>
          <button type="submit" value="Delete" class="btn btn-danger btn-rounded btn-icon  text-light"><i class="mdi  mdi-delete"></i> </button>
        </form>
      </td>
    </tr>
    @empty
      </tbody>
      </table>
      
</div>
      <div class="text-center mt-3">
        <p>No records to show</p>
      </div>
    @endforelse

  
   
   </tbody>
 </table>
 
</div>
 <div class="d-flex justify-content-center mt-3"> {{ $branches->links('pagination::bootstrap-4')}}</div>
 </div>
 
@endsection
