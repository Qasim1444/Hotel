<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Classic Cafe - Restaurant</title>

    <style>

       .post-image {
            height: 400px; /* Adjust as needed */
            width: 100%;
            object-fit: cover; /* Ensures the image covers the entire area while maintaining aspect ratio */
        }

.carousel-img {
    max-height: 400px; /* Set your desired max height */
    object-fit: cover; /* Maintain aspect ratio and cover the entire area */
}


    </style>
    @include('Home.css')
</head>

<body>
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

   @include('Home.header')






 <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($post as $key => $posts)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($post as $key => $posts)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="d-block w-100 carousel-img" src="{{ asset('image/' . $posts->image) }}" alt="Slide {{ $key }}">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ Str::limit($posts->title, 20) }}</h5>
                    <p>{!! Str::limit($posts->description, 50) !!}</p>
                    <a href="{{ route('edit.post.home', ['title' => str_replace(' ', '-', $posts->title)]) }}" class="btn btn-success btn-sm">Read More</a>


                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>






</div>




<div class="row">
    <div class="col-md-9">
        <section id="gallery">
            <div class="container">
              <div class="row">
                  @foreach ($post as $posts)
                <div class="col-lg-4 mb-4">
                  <div class="card">
                      <img  class="post-image" src="{{ asset('image/' . $posts->image) }}" alt="Post Image" class="card-img-top">

                    <div class="card-body">
                      <h5 class="card-title">{{ Str::limit($posts->title, 20) }}</h5>

                      <a href=" {{ route('edit.post.home', ['title' => str_replace(' ', '-', $posts->title)]) }}" class="btn btn-success btn-sm">Read More</a>



                    </div>
                  </div>
                </div>
                  @endforeach
              </div>
            </div>
          </section>

    </div>
    <div class="col-md-3">
        <h1 class="mt-5 pt-5 text-primary">Categories</h1>
        <ul class="list-unstyled pt-3">
            @foreach ( $categories  as $category)
            <li>{{ $category->name }}</li> <!-- Adjust 'name' if your category model uses a different field -->
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












    <!-- jQuery -->
    @include('Home.js')
</body>

</html>
