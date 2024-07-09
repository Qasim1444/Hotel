<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.admincss')
</head>
<body>
<div class="container-scroller ">

    @include('admin.sidebar')


    <div class="main-panel">

        <div class="content-wrapper">
            @if($errors->any())

                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach
                    </ul>
                </div>

            @endif

            @if(session()->has('message'))
                <div class="alert alert-success">


                    {{session()->get('message')}}
                </div>
            @endif
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header">Add order data</div>
                            <div class="card-body">
                                <form pl-5 ml-5 method="post" action="{{ url('addorder') }}"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label class="col-sm-2  col-md-4 col-label-form">FoodName</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="text" style="background-color: white;color:black;" name="foodname"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4  col-label-form">price</label>
                                        <div class="col-sm-10 col-md-8   ">
                                            <input type="text" style="background-color: white;color:black;"
                                                   name="price" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4  col-label-form">quantity</label>
                                        <div class="col-sm-10 col-md-8   ">
                                            <input type="text" style="background-color: white;color:black;"
                                                   name="quantity" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4  col-label-form">name</label>
                                        <div class="col-sm-10 col-md-8   ">
                                            <input type="text" style="background-color: white;color:black;"
                                                   name="name" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4  col-label-form">Phone</label>
                                        <div class="col-sm-10 col-md-8   ">
                                            <input type="text" style="background-color: white;color:black;"
                                                   name="phone" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4  col-label-form">Address</label>
                                        <div class="col-sm-10 col-md-8   ">
                                            <input type="text" style="background-color: white;color:black;"
                                                   name="address" class="form-control"/>
                                        </div>
                                    </div>




                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary" value="Add Order"/>
                                    </div>
                                </form>

                                <div class="container">
                                    <h1>Customer Orders</h1>

                                    <form action="{{ url('/search') }}" method="get">
                                        @csrf
                                        <input type="text" name="search" style="color: blue;">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </form>
                                </div>

                                <table>
                                    <tr>
                                        <th style="padding:30px">FoodName</th>
                                        <th style="padding:30px">Price</th>
                                        <th style="padding:30px">quantity</th>
                                        <th style="padding:30px">name</th>
                                        <th style="padding:30px">phone</th>
                                        <th style="padding:30px">address</th>
                                        <th style="padding:30px">total</th>
                                        <th style="padding:30px">update</th>
                                        <th style="padding:30px">Delete</th>

                                    </tr>
                                    @foreach($order as $col)
                                        <tr>
                                            <td style="padding:30px">{{$col->foodname}}</td>
                                            <td style="padding:30px">{{$col->price}}</td>
                                            <td style="padding:30px">{{$col->quantity}}</td>
                                            <td style="padding:30px">{{$col->name}}</td>
                                            <td style="padding:30px">{{$col->phone}}</td>
                                            <td style="padding:30px">{{$col->address}}</td>
                                            <td style="padding:30px">{{$col->price * $col->quantity}}</td>
                                            <td><a class="btn btn-success" href="{{route('edit.order',$col->id)}}">Update</a>
                                            </td>
                                            <td><a class="btn btn-danger"
                                                   onclick="return confirm('are you sure remove this Menu')"
                                                   href="{{url('destroyorder',$col->id)}}">Delete</a></td>

                                        </tr>
                                    @endforeach
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.header')
    <!-- container-scroller -->
    @include('admin.adminjavascript')
    <!-- plugins:js -->
</body>
</html>
