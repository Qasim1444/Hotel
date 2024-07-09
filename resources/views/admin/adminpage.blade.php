<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller ">

        @include('admin.sidebar')


        <div class="main-panel">

@yield('content')

        </div>
    </div>

        @include('admin.header')
        <!-- container-scroller -->
        @include('admin.adminjavascript')
        <!-- plugins:js -->
</body>

</html>
