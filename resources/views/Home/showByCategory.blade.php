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

    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center mt-5 pt-5">
                <div class="section-heading">

                    <h1 class="mt-5 font-weight-bold display-4">Posts in {{ $category->name }}</h1>
                </div>
            </div>
        </div>

        <div class="row">
                    </div>
    </div>
    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col">




                <section id="gallery">
                    <div class="container">
                      <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-lg-4 mb-4">
                          <div class="card">
                              <img  class="post-image" src="{{ asset('image/' . $post->image) }}" alt="Post Image" class="card-img-top">

                            <div class="card-body">
                              <h5 class="card-title">{{ Str::limit($post->title, 20) }}</h5>

                              <a href="{{ url('post/' . $post->id) }}" class="btn btn-outline-success btn-sm">Read More</a>

                            </div>
                          </div>
                        </div>
                          @endforeach
                      </div>
                    </div>
                  </section>
            </div>




        </div>
    </div>








        @include('Home.js')

</body>

</html>
