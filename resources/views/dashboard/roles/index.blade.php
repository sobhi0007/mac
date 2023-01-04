@extends('layouts.employee')
@section('content')
<div class="container bg-white p-4">
    <div class="col-lg-12 margin-tb">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">   
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row mb-4">
        <div class="col-8">
            <div class="display-5">RULES & PERMISSIONS MANAGMENT</div>
            <div class="line-shape bg-primary"></div>
        </div>
        @can('role-create')
            <div class="col-4 text-end">
                 <a href="{{url('dashboard/roles/create')}}" class="btn btn-sm btn-primary text-light">Add role</a>
            </div>
        @endcan
     </div>

<div class="table-responsive">
    <table class="table table-hover">
     <thead class="bg-light text-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
     </thead>    
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <form action="{{url('dashboard/roles/'.$role->id)}}" method="POST">
                    @csrf
                    @method('Delete')
                    <a href="{{url('dashboard/roles/'.$role->id.'/edit')}}" class="btn btn-primary btn-rounded text-light btn-icon pt-2"><i class="  mdi mdi-pencil"></i></a>
                    <a href="{{url('dashboard/roles/'.$role->id)}}" class="btn btn-info btn-rounded text-light btn-icon pt-2"><i class="  mdi mdi-eye"></i></a>
                    <button type="submit" value="Delete" class="btn btn-danger btn-rounded btn-icon  text-light"><i class="mdi  mdi-delete"></i> </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
{!! $roles->render() !!}
</div>
</div>
@endsection