<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.admincss')
</head>
<body>
<div class="container-scroller">

    @include('admin.sidebar')

    @if($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>

    @endif

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">Reservation EDIT</div>
                <div class="card-body">
                    <form method="post" action="{{url('updatereservation',$reservation->id)}}">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Name</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="name" class="form-control"
                                       value="{{ $reservation->name }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Email</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="email" class="form-control"
                                       value="{{ $reservation->email }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="phone" class="form-control"
                                       value="{{ $reservation->phone }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Guest</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="guest" class="form-control"
                                       value="{{ $reservation->guest }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Date</label>
                            <div class="col-sm-10">
                                <input type="date" style="color:black;" name="date" class="form-control"
                                       value="{{ $reservation->date }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Time</label>
                            <div class="col-sm-10">
                                <input type="time" style="color:black;" name="time" class="form-control"
                                       value="{{ $reservation->time }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Message</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="message" class="form-control"
                                       value="{{ $reservation->message }}"/>
                            </div>
                        </div>


                </div>


                <div class="text-center">

                    <input type="submit" class="btn btn-primary" value="Edit reservation"/>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if(session()->has('message'))

    <div class="alert alert-success">
        {{session()->get('message')}}

    </div>

@endif

@include('admin.header')



@include('admin.adminjavascript')
<!-- plugins:js -->
</body>
</html>
