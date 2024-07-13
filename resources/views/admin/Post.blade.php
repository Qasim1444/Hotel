@extends('admin.adminpage')

@section('content')

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <style type="text/css">
        .ck-editor__editable_inline {
            height: 500px;

        }
    </style>



    <h1>Create Post</h1>

    <div style="background-color: white;color: black" class="card">
        <div class="card-header">
            <h4>Create Post</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('/admin/poststore') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input style="color: black;" type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description" id="editor" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select style="color: white;" name="status" class="form-control">
                        <option value="" disabled selected>Choose Option</option>
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Publish</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Draft</option>
                    </select>
                    @error('status')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select style="color: white;"  name="category" class="form-control">
                        <option value="" disabled selected>Choose Option</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file">
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    <select  style="background-color: #2A3038;color: white;" name="tags[]" class="form-control" multiple>
                        <option value="" disabled selected>Choose Option</option>
                        @if (count($tags) > 0)
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ (collect(old('tags'))->contains($tag->id)) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('tags')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('tags.*')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button style="background-color: #0078C2" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


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

@if(count($posts) > 0)
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Category</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{!! Str::limit($post->description, 50) !!}</td>
                <td>{{ $post->status == 1 ? 'Publish' : 'Draft' }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <img src="{{ asset('image/' .$post->image) }}" alt="Post Image" class="img-fluid" style="max-width: 100px;">
                </td>
                <td>
                    @foreach($post->tags as $tag)
                        {{ $tag->name }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-success btn-sm" href="{{ route('edit.post', $post->id) }}">Update</a>
                    <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this post?')" href="{{ route('delete.post', $post->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
<div class="alert alert-warning" role="alert">
    No posts found.
</div>
@endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(!empty(session('success')))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

@endsection
