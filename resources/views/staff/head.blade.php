<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="logo/png" href="{{asset('assets/images/logos/logo.png')}}" />

  <!-- Core Css -->
  <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}" />

  <title>@yield('title')</title>
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}" />

  @stack('link')
</head>