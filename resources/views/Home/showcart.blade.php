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

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" width="100px" height="100px" class="img-fluid" alt="Klassy Logo">
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
                                    <a href="{{ url('/showcart', Auth::user()->id) }}" class="badge bg-primary d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
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
                                                <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
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


    <script src="https://js.stripe.com/v3/"></script>
    <div class="container my-5">
        <div class="table-responsive">
            <form action="{{ url('orderconfirm') }}" method="post">
                @csrf
                <table class="mt-5 py-5 my-5 pt-5 table table-bordered table-hover table-striped text-center">
                    <thead style="background-color:#FB5849;">
                        <tr style="color: white;">
                            <th scope="col">Food Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $totalAmount = 0;
                    @endphp

                    @foreach ($data as $item)
                        <tr>
                            <td>
                                <input type="text" name="foodname[]" value="{{ $item->title }}" hidden>
                                {{ $item->title }}
                            </td>
                            <td>
                                <input type="text" name="price[]" value="{{ $item->price }}" hidden>
                                ${{ $item->price }}
                            </td>
                            <td>
                                <input type="text" name="quantity[]" value="{{ $item->quantity }}" hidden>
                                {{ $item->quantity }}
                            </td>
                            <td>
                                <a href="{{ url('remove', $item->id) }}" class="btn btn-warning">Remove</a>
                            </td>
                        </tr>

                        @php
                            $totalAmount += $item->price * $item->quantity;
                        @endphp
                    @endforeach

                    <tr>
                        <td colspan="3" style="text-align: right;">Total Amount:</td>
                        <td>${{ $totalAmount }}</td>
                    </tr>

                    </tbody>
                   
                </table>

                <div class="d-flex flex-column align-items-center justify-content-center" >
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>
                    </div>
                    <div>
                        <button style="background-color:#FB5849;" type="submit" class="btn btn-primary">Pay Using Card</button>
                    </div>
                </div>


            </form>
        </div>
    </div>

    <!-- jQuery -->
    @include('Home.js')
</body>

</html>
