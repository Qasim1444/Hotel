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
                            <div class="card-header">Add Menu data</div>
                            <div class="card-body">
                                <form pl-5 ml-5 method="post" action="{{ url('addmenu') }}"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label class="col-sm-2  col-md-4 col-label-form">Title</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="text" style="background-color: white;color:black;" name="title"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4  col-label-form">Details</label>
                                        <div class="col-sm-10 col-md-8   ">
                                            <input type="text" style="background-color: white;color:black;"
                                                   name="description" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4 col-label-form">Price</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="text" style="background-color: white;color:black;" name="price"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-sm-2 col-md-4 col-label-form">Image</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="file" name="image"/>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary" value="Add menu"/>
                                    </div>
                                </form>
                                <table>
                                    <tr>
                                        <th style="padding:30px">Title</th>
                                        <th style="padding:30px">Details</th>
                                        <th style="padding:30px">price</th>
                                        <th style="padding:30px">image</th>
                                        <th style="padding:30px">update</th>
                                        <th style="padding:30px">Delete</th>
                                    </tr>
                                    @foreach($menu as $col)
                                        <tr>

                                            <td style="padding:30px">{{$col->title}}</td>
                                            <td style="padding:30px">{{$col->description}}</td>
                                            <td style="padding:30px">{{$col->price}}</td>
                                            <td style="padding:30px"><img src="{{ asset('image/' . $col->image) }}"
                                                                          width="50"></td>
                                            <td><a class="btn btn-success"
                                                   href="{{route('edit.menu',$col->id)}}">Update</a></td>
                                            <td><a class="btn btn-danger"
                                                   onclick="return confirm('are you sure remove this Menu')"
                                                   href="{{url('destroymenu',$col->id)}}">Delete</a></td>

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
