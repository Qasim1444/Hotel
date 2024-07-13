@extends('admin.adminpage')
<base href="/public">
@section('content')

<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<style type="text/css">
    .ck-editor__editable_inline {
        height: 500px;
    }
</style>

<div style="background-color: white;color: black" class="card">
    <div class="card-header">
        <h4>Create Post</h4>
    </div>
    <div class="card-body">


                    <h1>Edit Post</h1>

                    <form method="post" action="{{ route('update.post', $posts->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Title</label>
                            <input style="color: black;" type="text" name="title" value="{{ old('title', $posts->title) }}" class="form-control" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="description" id="editor" class="form-control" placeholder="Description">{{ $posts->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select style="color: white" name="status" class="form-control">
                                <option value="" disabled>Select Status</option>
                                <option value="1" {{ $posts->status == 1 ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ $posts->status == 0 ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select style="color: white" name="category" class="form-control">
                                <option value="" disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $posts->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-2 col-label-form">Current Image</label>
                            <div class="col-sm-10">
                                <img height="100 px" width="200 px" src="/image/{{$posts->image}}">
                                <input type="file" name="image"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tags</label>
                            <select style="background-color: #2A3038;color: white;" name="tags[]" class="form-control" multiple>
                                <option value="" disabled>Select Tags</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $posts->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div></div></div>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#editor'), {
                                ckfinder: {
                                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                                }
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>



    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif



@endsection
