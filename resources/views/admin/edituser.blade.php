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
                <div class="card-header">USER EDIT</div>
                <div class="card-body">
                    <form method="post" action="{{route('update.user',$data->id)}}">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Name</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="name" class="form-control"
                                       value="{{ $data->name }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">email</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="email" class="form-control"
                                       value="{{ $data->email }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="phone" class="form-control"
                                       value="{{ $data->phone }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Address</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="address" class="form-control"
                                       value="{{ $data->address }}"/>
                            </div>
                        </div>

                </div>


                <div class="text-center">

                    <input type="submit" class="btn btn-primary" value="Edit User"/>
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
