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
                <div class="card-header">Menu EDIT</div>
                <div class="card-body">
                    <form method="post" action="{{url('updatemenu',$menu->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">title</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="title" class="form-control"
                                       value="{{ $menu->title }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Description</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="description" class="form-control"
                                       value="{{ $menu->description }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">price</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="price" class="form-control"
                                       value="{{ $menu->price }}"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-label-form">current Image</label>
                            <div class="col-sm-10">
                                <img height="100 px" width="200 px" src="image/{{$menu->image}}">
                                <input type="file" name="image"/>
                            </div>
                        </div>

                </div>


                <div class="text-center">

                    <input type="submit" class="btn btn-primary" value="Edit menu"/>
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
