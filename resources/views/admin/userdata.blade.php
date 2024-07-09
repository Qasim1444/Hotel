<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.admincss');
</head>
<body>
<div class="container-scroller">

    @include('admin.sidebar');

    <div class="main-panel">
        <div class="content-wrapper">
            <table>

                <tr align="center" style="background-color: black;">

                    <th style="padding: 10px;font-size: 20px;color: white;">Name</th>
                    <th style="padding: 10px;font-size: 20px;color: white;"> Email</th>
                    <th style="padding: 10px;font-size: 20px;color: white;">phone</th>

                    <th style="padding: 10px;font-size: 20px;color: white;">Address</th>
                    <th style="padding: 10px;font-size: 20px;color: white;">Update/Delete</th>


                </tr>

                @foreach($data as $row)

                    <tr align="center" style="background-color:skyblue;">

                        <td style="padding: 10px;color: white;">  {{$row->name}}</td>
                        <td style="padding: 10px;color: white;">{{$row->email }}</td>
                        <td style="padding: 10px;color: white;">{{$row->phone }}</td>
                        <td style="padding: 10px;color: white;">{{$row->address}}</td>


                        <td><a href="{{route('edit.user',$row->id)}}" class="btn btn-success">Update</a><a
                            @if($row->usertype=="1")
                                <a href="" class="btn btn-danger">Not Allow to Delete</a>
                            @else

                                <a href="{{route('delete.user',$row->id)}}" class="btn btn-danger">Delete</a>
                            @endif
                        </td>


                    </tr>

                @endforeach

            </table>


        </div>
    </div>


    @include('admin.header');


    @include('admin.adminjavascript');
</div>
</body>
</html>
