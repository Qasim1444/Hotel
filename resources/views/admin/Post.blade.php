@extends('admin.adminpage')

@section('content')


                            <h1>Create Post</h1>

                            <form method="post" action="{{ url('/admin/poststore') }}" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group">
                                    <labe1>Title</labe1>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                           placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <labe1>Description</labe1>
                                    <textarea type="text" name="description" value="{{ old('Description') }}"
                                              class="form-control"
                                              placeholder="Description"> </textarea>
                                </div>
                                <div class="form—group">
                                    <label>status</label>
                                    <select name="status" class="form-control">
                                        <option value="" disabled selected></option>
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category" class="form-control">
                                        <option value="" disabled selected>Choose 0ption</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control-file">
                                </div>


                                <div c1ass="form-group">
                                    <div class="form-group">
                                        <label>Tags</label>
                                        <select name="tags[]" class="form-control" multiple>
                                            <option value="" disabled selected>Choose Option</option>
                                            @if (count($tags) > 0)
                                                @foreach ($tags as $tag)
                                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>

                            </form>


                                        @if(count($posts) > 0)
                                            <table class="table">
                                                <thead>
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
                                                        <td>{{ Str::limit($post->description, 50) }}</td>

                                                        <td>{{ $post->status == 1 ? 'Publish' : 'Draft' }}</td>
                                                        <td>{{ $post->category->name }}</td>
                                                        <td>
                                                            <!-- Debugging: Output the image path -->

                                                            <img src="{{ asset('image/' .$post->image) }}" alt="Post Image" style="max-width: 100px;">
                                                        </td>

                                                        <td>
                                                            @foreach($post->tags as $tag)
                                                                {{ $tag->name }},
                                                            @endforeach
                                                        </td>

                                                        <td>  <a class="btn btn-success" href="{{route('edit.post',$post->id)}}">Update</a>

                                                            <a class="btn btn-danger"
                                                               onclick="return confirm('are you sure remove this post')"
                                                               href="{{route('delete.post',$post->id)}}">Delete</a> </td>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <p>No posts found.</p>
                                        @endif


            @endsection()

