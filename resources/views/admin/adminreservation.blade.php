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
                            <div class="card-header">Add reservationdata</div>
                            <div class="card-body">
                                <form pl-5 ml-5 method="post" action="{{ url('addreservation') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label class="col-sm-2  col-md-4 col-label-form">name</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="text" style="background-color: white;color:black;" name="name"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4  col-label-form">email</label>
                                        <div class="col-sm-10 col-md-8   ">
                                            <input type="text" style="background-color: white;color:black;" name="email"
                                                   class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4 col-label-form">Phone</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="text" style="background-color: white;color:black;" name="phone"
                                                   class="form-control"/>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label class="col-sm-2  col-md-4 col-label-form">guest</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="text" style="background-color: white;color:black;" name="guest"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4  col-label-form">date</label>
                                        <div class="col-sm-10 col-md-8   ">
                                            <input type="date" style="background-color: white;color:black;" name="date"
                                                   class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4 col-label-form">time</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="time" style="background-color: white;color:black;" name="time"
                                                   class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-md-4 col-label-form">message</label>
                                        <div class="col-sm-10 col-md-8">
                                            <input type="text" style="background-color: white;color:black;"
                                                   name="message" class="form-control"/>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary" value="Add Reservations"/>
                                    </div>
                                </form>
                                <table>
                                    <tr>
                                        <th style="padding:30px">Name</th>
                                        <th style="padding:30px">Email</th>
                                        <th style="padding:30px">Phone</th>
                                        <th style="padding:30px">Guest</th>
                                        <th style="padding:30px">Date</th>
                                        <th style="padding:30px">Time</th>
                                        <th style="padding:30px">Message</th>

                                        <th style="padding:30px">update</th>
                                        <th style="padding:30px">Delete</th>
                                    </tr>
                                    @foreach($reservation as $col)
                                        <tr>

                                            <td style="padding:30px">{{$col->name}}</td>
                                            <td style="padding:30px">{{$col->email}}</td>
                                            <td style="padding:30px">{{$col->phone}}</td>
                                            <td style="padding:30px">{{$col->guest}}</td>
                                            <td style="padding:30px">{{$col->date}}</td>
                                            <td style="padding:30px">{{$col->time}}</td>
                                            <td style="padding:30px">{{$col->message}}</td>

                                            <td><a class="btn btn-success"
                                                   href="{{route('edit.reservation',$col->id)}}">Update</a></td>
                                            <td><a class="btn btn-danger"
                                                   onclick="return confirm('are you sure remove this Menu')"
                                                   href="{{url('destroyreservation',$col->id)}}">Delete</a></td>

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
