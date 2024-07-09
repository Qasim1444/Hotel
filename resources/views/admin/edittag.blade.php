@extends('admin.adminpage')
<base href="/public">
@section('content')



                        <form  method="post" action="{{route('update.tag',$tag->id)}}">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2  col-md-4">Tag</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="text" style="color:black;" name="name"
                                           value="{{ $tag->name}}"     class="form-control"/>
                                </div>
                            </div>


                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="update Tag"/>
                            </div>

                        </form>





@endsection

