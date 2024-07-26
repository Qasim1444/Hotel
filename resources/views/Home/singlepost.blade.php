<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Classic Cafe - Restaurant</title>

    @include('Home.css')


</head>

<body>

@include('Home.header')

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-md-9 p-5">


                <h1 class="mb-5 mt-5">{{ $posts->title }}</h1>
                <figure class="my-4">
                    <img src="{{ asset('image/' . $posts->image) }}" class="img-fluid w-75 h-75" alt="Post Image">
                </figure>
                <p>{!! $posts->description !!}</p>
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <input type="hidden" name="post_id" value="{{ $posts->id }}" />
                                    <textarea class="form-control" id="comment-message" name="body" placeholder="Enter your name" cols="30"
                                        rows="10"></textarea>
                                </div>
                                <div class="col-12">
                                    <input style="background-color:#FB5849;" type="submit" class="btn btn-primary" value="Post comment">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @include('commentsDisplay', ['comments' => $posts->comments, 'post_id' => $posts->id])


            </div>
            <div class="col-md-3">
                <h1 class="mt-5 pt-5 text-primary">Categories</h1>
                <ul class="list-unstyled pt-3">
                    @foreach ($categories as $categorie)
                        <li class="mb-2">
                            <a href="#" class="text-dark text-decoration-none">{{ $categorie->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <h1 class="mt-5 text-primary">Tags</h1>
                <ul class="list-unstyled pt-3">
                    @foreach ($tags as $tag)
                        <li class="mb-2">
                            <a href="#" class="text-dark text-decoration-none">{{ $tag->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <h1 class="mt-5 text-primary">Recent Blogs</h1>
                <ul class="list-unstyled pt-3">
                    @foreach ($post as $posts)
                        <li class="mb-2">
                            <a href="#" class="text-dark text-decoration-none">{{ Str::limit($posts->title, 20) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <style>
                .col-md-3 h1 {
                    font-size: 1.5rem;
                    border-bottom: 2px solid #007bff;
                    padding-bottom: 10px;
                }
                .col-md-3 ul {
                    padding-left: 0;
                }
                .col-md-3 li {
                    margin-bottom: 10px;
                }
                .col-md-3 a {
                    transition: color 0.3s ease;
                }
                .col-md-3 a:hover {
                    color: #007bff;
                }
            </style>



        </div>





        @include('Home.js')

</body>

</html>
