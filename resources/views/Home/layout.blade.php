<!DOCTYPE html>
<html lang="en">

<head>

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

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
@include('Home.header')
<!-- ***** Header Area End ***** -->


<!-- ***** Main Banner Area Start ***** -->
@include('Home.mainbanner')
<!-- ***** Main Banner Area End ***** -->

<!-- ***** About Area Starts ***** -->
@include('Home.about')
<!-- ***** About Area Ends ***** -->

<!-- ***** Menu Area Starts ***** -->
@include('Home.food')
<!-- ***** Menu Area Ends ***** -->

<!-- ***** Chefs Area Starts ***** -->
@include('Home.chief')
<!-- ***** Chefs Area Ends ***** -->

<!-- ***** Reservation Us Area Starts ***** -->
@include('Home.Reservation')
<!-- ***** Reservation Area Ends ***** -->

<!-- ***** Menu Area Starts ***** -->
@include('Home.manuarea')
<!-- ***** Chefs Area Ends ***** -->

<!-- ***** Footer Start ***** -->


<!-- jQuery -->

@include('Home.js')
<script>

    $(function () {
        var selectedClass = "";
        $("p").click(function () {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut();
            setTimeout(function () {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });

</script>
</body>
</html>
