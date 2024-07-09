@extends('admin.adminpage')
<base href="/public">
@section('content')


<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="card-header">
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h1>Edit Post</h1>

                    <form method="post" action="{{ route('update.post', $posts->id) }}">
                        @csrf


                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ old('title', $posts->title) }}" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Description">{{ $posts->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="" disabled>Select Status</option>
                                <option value="1" {{ $posts->status == 1 ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ $posts->status == 0 ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="" disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $posts->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-2 col-label-form">current Image</label>
                            <div class="col-sm-10">
                                <img height="100 px" width="200 px" src="/image/{{$posts->image}}">
                                <input type="file" name="image"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tags[]" class="form-control" multiple>
                                <option value="" disabled>Select Tags</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $posts->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
