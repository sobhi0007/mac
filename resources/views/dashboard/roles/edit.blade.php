@extends('layouts.employee')
@section('content')
<div class="container bg-white p-4">
  
    <div class="row mb-4">
        <div class="col-8">
            <div class="display-4">EDIT ROLE</div>
            <div class="line-shape bg-primary"></div>
        </div>
            <div class="col-4 text-end">
                <a class="btn btn-danger text-light btn-sm" href="{{ route('roles.index') }}"> Back</a>
            </div>
     </div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <div class="row">
            @foreach($permission as $value)
            <div class="col-3 my-2">
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            </div>
            <br/>
            @endforeach
        </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-end">
        <button type="submit" class="btn btn-primary btn-sm text-light">Submit</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
