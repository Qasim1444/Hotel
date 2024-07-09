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
                <div class="card-header">Order EDIT</div>
                <div class="card-body">
                    <form method="post" action="{{ url('updateorder', $order->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">FoodName</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="foodname" class="form-control"
                                       value="{{ $order->foodname }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">Price</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="price" class="form-control"
                                       value="{{ $order->price }}"/>
                            </div>
                        </div>

                        <!-- ... (previous code) ... -->

                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">quantity</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="quantity" class="form-control"
                                       value="{{ $order->quantity }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">name</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="name" class="form-control"
                                       value="{{ $order->name }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">phone</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="phone" class="form-control"
                                       value="{{ $order->phone }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-label-form">address</label>
                            <div class="col-sm-10">
                                <input type="text" style="color:black;" name="address" class="form-control"
                                       value="{{ $order->address }}"/>
                            </div>
                        </div>

                        <!-- ... (remaining code) ... -->


                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Edit order"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@include('admin.header')
@include('admin.adminjavascript')
</body>
</html>
