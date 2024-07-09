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
                <div class="card-header">chief EDIT</div>
                <div class="card-body">
                    <form method="post" action="{{url('updatechief',$chief->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Name</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="name" class="form-control"
                                       value="{{ $chief->name }}"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Specialty</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="Specialty" class="form-control"
                                       value="{{ $chief->price }}"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-label-form">current Image</label>
                            <div class="col-sm-10">
                                <img height="100 px" width="200 px" src="image/{{$chief->image}}">
                                <input type="file" name="image"/>
                            </div>
                        </div>

                </div>


                <div class="text-center">

                    <input type="submit" class="btn btn-primary" value="Edit Chief"/>
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
