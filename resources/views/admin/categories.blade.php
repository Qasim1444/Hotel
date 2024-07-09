@extends('admin.adminpage')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">Add data Tag</div>
                    <div class="card-body">

                        <form  method="post" action="{{url('/admin/addcategoriesstore')}}">
                            @csrf







                            <div class="row mb-3">
                                <label class="col-sm-2  col-md-4">Categories</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="text" style="color:black;" name="name"
                                           class="form-control"/>
                                </div>
                            </div>


                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="Add Categories"/>
                            </div>

                        </form>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Categories Data</div>
                                        <div class="card-body">
                                            <!-- Display existing loans in a table -->
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Categories</th>

                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($categories as $value)
                                                    <tr>
                                                        <td style="padding:30px">{{$value->id}}</td>
                                                        <td style="padding:30px">{{$value->name}}</td>
                                                        <td>  <a class="btn btn-success" href="{{route('edit.categories',$value->id)}}">Update</a>

                                                            <a class="btn btn-danger"
                                                               onclick="return confirm('are you sure remove this categories')"
                                                               href="{{route('delete.categories',$value->id)}}">Delete</a> </td>
                                                    </tr>

                                                @endforeach
                                                </tbody>
                                            </table>

                                            <!-- Add your form for adding new loans here -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>



@endsection

