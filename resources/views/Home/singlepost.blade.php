<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="assets/css/variables.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->

            </a>


            <div class="position-relative">
                <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
                <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
                <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

                <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
                <i class="bi bi-list mobile-nav-toggle"></i>

                <!-- ======= Search Form ======= -->
                <div class="search-form-wrap js-search-form-wrap">
                    <form action="search-result.html" class="search-form">
                        <span class="icon bi-search"></span>
                        <input type="text" placeholder="Search" class="form-control">
                        <button class="btn js-search-close"><span class="bi-x"></span></button>
                    </form>
                </div><!-- End Search Form -->

            </div>

        </div>

    </header><!-- End Header -->

    <main id="main">

        <section class="single-post-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 post-content" data-aos="fade-up">

                        <!-- ======= Single Post Content ======= -->
                        <div class="single-post">

                            <h1 class="mb-5">{{ $posts->title }}</h1>


                            <figure class="my-4">
                                <img src="{{ asset('image/' . $posts->image) }}" class="img-fluid w-75 h-75" alt="Post Image">

                                <p>{!! $posts->description !!} </p>

                        </div><!-- End Single Post Content -->



                        <!-- ======= Comments Form ======= -->
                        <h2>{{ $posts->title }}</h2>

                <h4>Add comment</h4>

                <form method="post" action="{{ route('comments.store'   ) }}">

                    @csrf
                        <div class="row justify-content-center mt-5">

                            <div class="col-lg-12">

                                <div class="row">

                                    <div class="col-12 mb-3">
                                        <input type="hidden" name="post_id" value="{{ $posts->id }}" />

                                        <textarea class="form-control" id="comment-message" name="body" placeholder="Enter your name" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" value="Post comment">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        <!-- End Comments Form -->
                        @include('commentsDisplay', ['comments' => $posts->comments, 'post_id' => $posts->id])
                    </div>
                    <div class="col-md-3">
                        <!-- ======= Sidebar ======= -->
                        <div class="aside-block">

                            <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-popular" type="button" role="tab"
                                        aria-controls="pills-popular" aria-selected="true">Popular</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-trending" type="button" role="tab"
                                        aria-controls="pills-trending" aria-selected="false">Trending</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-latest" type="button" role="tab"
                                        aria-controls="pills-latest" aria-selected="false">Latest</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                @foreach ($post as $posts)
                                    <!-- Popular -->
                                    <div class="tab-pane fade show active" id="pills-popular" role="tabpanel"
                                        aria-labelledby="pills-popular-tab">
                                        <div class="post-entry-1 border-bottom">

                                            <h2 class="mb-2"><a
                                                    href="#">{{ Str::limit($posts->title, 20) }}</a></h2>
                                            <span class="author mb-3 d-block">Jenny Wilson</span>
                                        </div>


                                    </div> <!-- End Popular -->
                                @endforeach
                                @foreach ($post as $posts)
                                    <!-- Trending -->
                                    <div class="tab-pane fade" id="pills-trending" role="tabpanel"
                                        aria-labelledby="pills-trending-tab">
                                        <div class="post-entry-1 border-bottom">

                                            <h2 class="mb-2"><a
                                                    href="#">{{ Str::limit($posts->title, 20) }}</a></h2>

                                        </div>


                                    </div> <!-- End Trending -->
                                @endforeach
                                @foreach ($post as $posts)
                                    <!-- Latest -->
                                    <div class="tab-pane fade" id="pills-latest" role="tabpanel"
                                        aria-labelledby="pills-latest-tab">
                                        <div class="post-entry-1 border-bottom">

                                            <h2 class="mb-2"><a
                                                    href="#">{{ Str::limit($posts->title, 20) }}</a></h2>

                                        </div>


                                    </div> <!-- End Latest -->
                                @endforeach
                            </div>
                        </div>

                        @foreach ($categories as $categorie)
                            <div class="aside-block">
                                <h3 class="aside-title">Categories</h3>
                                <ul class="aside-links list-unstyled">
                                    <li><a ><i class="bi bi-chevron-right"></i>
                                            {{ $categorie->name }}</a></li>

                                </ul>
                            </div><!-- End Categories -->
                        @endforeach
                        @foreach ($tags as $tag)
                            <div class="aside-block">
                                <h3 class="aside-title">Tags</h3>
                                <ul class="aside-tags list-unstyled">
                                    <li><a > {{ $tag->name }}</a></li>




                                </ul>
                            </div><!-- End Tags -->
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->




    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
