@extends('admin.adminpage')
<base href="/public">
@section('content')



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">update data categories</div>
                    <div class="card-body">

                        <form method="post" action="{{route('update.categories',$categories->id)}}">
                            @csrf


                            <div class="row mb-3">
                                <label class="col-sm-2  col-md-4">Categories</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="text" style="color:black;" name="name"
                                           value="{{ $categories->name}}"    class="form-control"/>
                                </div>
                            </div>


                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="update Categories"/>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

@endsection

