@extends('admin.adminpage')
@section('content')



<div class="container">
    <div class="row mb-3">
        <div class="col-sm-12">
            <h4 class="text-center">Add Tag</h4>
        </div>
    </div>
    <form method="post" action="{{ url('/admin/tagstore') }}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 ">Tag</label>
            <div class="col-sm-6 col-md-8">
                <input type="text" name="name" class="form-control" />
            </div>
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Add Tag" />
        </div>
    </form>
   
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tag</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tag as $value)
                <tr>
                    <td >{{ $value->id }}</td>
                    <td >{{ $value->name }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('edit.tag', $value->id) }}">Update</a>
                        <a class="btn btn-danger" onclick="return confirm('are you sure remove this LoanPlan')" href="{{ route('delete.tag', $value->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
