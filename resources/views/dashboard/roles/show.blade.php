@extends('layouts.employee')
@section('content')
<div class="container bg-white p-4">
    <div class="row mb-4">
        <div class="col-8">
            <div class="display-4">ROLE PERMISSIONS</div>
            <div class="line-shape bg-primary"></div>
        </div>
            <div class="col-4 text-end">
                <a class="btn btn-danger text-light btn-sm" href="{{ route('roles.index') }}"> Back</a>
            </div>
     </div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong class="d-block">Permissions:</strong>
            <div class="row">
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <div class="col-3 my-2">{{ $v->name }}</div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection