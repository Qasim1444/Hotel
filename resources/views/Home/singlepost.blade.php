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


    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" width="100px" height="100px" class="img-fluid"
                                alt="Klassy Logo">
                        </a>
                        <a href="#" class="menu-trigger">
                            <span>Menu</span>
                            <!-- Add your menu icon or content here -->
                        </a>
                        <!-- ***** Logo End ***** -->

                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                            -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="scroll-to-section"><a href="{{ url('blog') }}">Blog</a></li>
                            <li class="scroll-to-section"><a href="#contact">Contact Us</a></li>
                            <li class="scroll-to-section">
                                @auth
                                    <div class="d-flex align-items-center">
                                        <a href="{{ url('/showcart', Auth::user()->id) }}"
                                            class="badge bg-primary d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                            </svg>
                                            <span class="badge bg-light text-dark">{{ $count }}</span>
                                        </a>
                                    </div>


                                @endauth
                            </li>
                            <li class="scroll-to-section">
                                @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        @auth
                                <li>
                                    <x-app-layout></x-app-layout>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}"
                                            class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                                @endif
                            @endauth
                </div>
                @endif
                </li>
                </ul>
                <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
        </div>
    </header>

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


                <h1 class="mb-5">{{ $posts->title }}</h1>
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
