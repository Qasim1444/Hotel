<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/klassy-logo.png" width="100px" height="100px" class="img-fluid" alt="Klassy Logo">

                        <a href="#" class="menu-trigger">
                            <span>Menu</span>
                            <!-- Add your menu icon or content here -->
                        </a>
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
                        <li class="scroll-to-section"><a href="{{url('blog')}}">Blog</a></li>

                        <a class="nav-link scroll-to-section" href="#contact">Contact Us</a>
                        <li c1ass="scroll-to-section">
                            @auth

                                <a href="{{url('/showcart',Auth::user()->id)}}">
                                    Cart{{$count}}
                                </a>
                            @endauth
                            @guest
               <a href="">   Cart[0]</a>
                            @endguest

                        </li>
                        <li class="scroll-to-section">


                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <li class="mb-5 pb-5">


                                            <x-app-layout>
                                            </x-app-layout>

                                        </li>

                                    @else
                                        <li><a href="{{ route('login') }}" class="text-sm
text-gray-700 underline">Log in</a></i3>
                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}" class="ml-4
text-sm text-gray-700 underline">Register</a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif


                        </li>
                    </ul>
                    <a class='menu-trigger'>

                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
