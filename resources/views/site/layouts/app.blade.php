<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFIA - @yield('title')</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- bootstrap -->

    <!-- font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;900&display=swap" rel="stylesheet">
    <!-- font -->

    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- slick slider -->

    <link rel="stylesheet" href="{{ asset("site/style/glider.min.css") }}">
    <link rel="stylesheet" href="{{ asset("site/style/style.css") }}">

    <link href="{{ asset("site/vendor/filler/css/jquery.filer.css") }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset("site/vendor/filler/css/themes/jquery.filer-dragdropbox-theme.css") }}" type="text/css" rel="stylesheet" />
</head>
<body>

<!-- yield: Content -->
@yield('content')
<!-- yield -->


<!-- partial: Footer -->
@include('site.layouts.partials.footer')
<!-- partial -->


<!-- bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- bootstrap -->

<!-- slider script -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- slider script -->

<script src="{{ asset("site/script/script.js") }}"></script>
<script src="{{ asset("site/script/glider.min.js") }}"></script>

<script src="{{ asset("site/vendor/filler/js/jquery.filer.min.js") }}"></script>
<script>
    new Glider(document.querySelector('.glider'),{
        slidesToScroll: 5,
        slidesToShow: 5,
        draggable: true,
        dots: '.dots',
    });

    new Glider(document.querySelector('.gliderWorks'), {
        slidesToShow: 2.5,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots'
    });

    $(document).ready(function() {
        $('#rr').filer();
    });
</script>

<!-- yield: customJS -->
@yield('customJS')
<!-- yield -->

</body>
</html>
