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
                            <li class="scroll-to-section"><a href="/redirect#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="/redirect#about">About</a></li>
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
                            <li class="scroll-to-section"><a href="/redirect#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="/redirect#chefs">Chefs</a></li>
                            <li class="dropdown scroll-to-section">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/blog') }}">Latest Posts</a></li>
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ route('category.show', $category->name) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>


                                </ul>
                            </li>

                            <li class="scroll-to-section"><a href="/redirect#contact">Contact Us</a></li>
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
