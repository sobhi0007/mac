@extends('layouts.employee')
@section('content')

<div class="container bg-white p-4">
    <div class="row mb-4">
        <div class="col-8">
            <div class="display-4">CREATE NEW ROLE</div>
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
{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="row">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <div class="col-3 my-2">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</div>
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