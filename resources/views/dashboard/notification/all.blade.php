
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
                <div class="display-4">Notifications</div>
                <div class="line-shape bg-primary"></div>
            </div>
            <div class="col-4 text-end">
            <a href="{{url('dashboard')}}" class="btn btn-sm btn-danger text-light">back</a>
            </div>
        </div>
        <div class="text-end"> <a href="{{url('dashboard/mark-all-as-read')}}" >Mark all as read</a></div>
        @forelse ($notifications as $notification)   
        <a href="{{url('dashboard/employees/'.$notification->data['employee_id'])}}" class="text-decoration-none my-2 ">
            <div class=" container dropdown-notification border border-light shadow my-2">
                <div class="row">
                    <div class=" col-lg-1 col-md-1 col-2-sm col-12" >
                        <div class="item-thumbnail   py-3">
                            <div class="item-icon  ">
                            <i class="mdi {{$notification->data['bg_color']}} px-3 rounded-circle {{$notification->data['icon']}}  display-4 p-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-10  col-md-10  col-9-sm col-10">
                        <div class="item-content py-3">
                            <div class="font-weight-normal ">{{$notification->data['title']}} </div>
                            <p class="font-weight-light small-text mb-0 text-muted">
                            {{$notification->created_at->diffForHumans()}}
                            </p>
                        </div>
                    </div>
                    @if ($notification->unread())
                    <div class="col-lg-1  col-md-1  col-1-sm col-1 pt-4"> <i class=" mdi mdi-checkbox-blank-circle text-primary"></i></div>
                    @endif
                </div>
            </div>
        </a>
        @empty
        <div class="text-center my-3"><span>No Notifications Yet</span></div>
        @endforelse
        <div class="d-flex justify-content-end">
            {{ $notifications->links('pagination::bootstrap-4')}}
        </div>
      
@endsection