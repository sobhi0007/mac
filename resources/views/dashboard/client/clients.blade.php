
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
        
         <div class="display-4">Client</div>
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url('dashboard/clients/create')}}" class="btn btn-sm btn-primary text-light">Add client</a>
      </div>
   </div>
  
<div class="table-responsive">
  

  <table class="table table-hover">
   <thead class="bg-light text-dark">
     <tr>
       <th scope="col">Name</th>
       <th scope="col">Email</th>
       <th scope="col">phone</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
  
    @forelse ($clients as $client)
    <tr>
      <td>{{$client->name}}</td>
      <td>{{$client->email}}</td>
      <td>{{$client->phone}}</td>
      <td>


        <form action="{{url('dashboard/clients/'.$client->id)}}" method="POST">
          @csrf
          @method('Delete')
          <a href="{{url('dashboard/clients/'.$client->id.'/edit')}}" class="btn btn-primary btn-rounded text-light btn-icon pt-2"><i class="  mdi mdi-pencil"></i></a>
          <a href="{{url('dashboard/clients/'.$client->id)}}" class="btn btn-info btn-rounded text-light btn-icon pt-2"><i class="  mdi mdi-eye"></i></a>
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
 <div class="d-flex justify-content-center mt-3"> {{ $clients->links('pagination::bootstrap-4')}}</div>
 </div>
@endsection