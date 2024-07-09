<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg"
                                                                           alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            

            <ul class="navbar-nav navbar-nav-right">



                <li class="scroll-to-section">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <li style="background-color:black;">

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

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
            </button>
        </div>
    </nav>
</div>
