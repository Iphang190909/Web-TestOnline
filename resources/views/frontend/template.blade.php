<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('') }}vendor/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('') }}vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('') }}vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}css/login/style.css">
    @stack('css')
  </head>
  <body style="">
  
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #AACBFF !important; position: fixed;" >
        <div class="container">
            <a class="navbar-brand p-2 "  href="index.html"><img class="d-inline-block" src="{{asset('images/profile/logo.png')}}" width="50" alt="logo"/></a>
            <div class="dropdown ml-auto">
            <a class="btn  text-800 order-1 order-lg-0 me-2" type="button" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-circle-user fa-lg"></i></a><span class="">{{ ucwords(Auth::user()->name)}}</span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Profile</a>
                <form action="{{route('logout')}}" method="post" >
                    @csrf
                    <button class="dropdown-item" type="submit">
                        <span class="" style="color: red">Logout</span>
                    </button>
                </form>
              </div>
            </div>
    </nav>

    <section>
        <div class="container-fluid d-flex mt-sm-5" style="height:95vh;" >
            @yield('content')
        </div>
    <section>

    
    

    </body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="{{ asset('') }}vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('') }}js/main.js"></script>
    @stack('js')
</html>