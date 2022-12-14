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
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="contents order-2 order-md-2">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Selamat Datang di <strong>Tes Online</strong></h3>
            <p class="mb-4">Login masukkan data diri anda</p>
            <form action="{{ route('LoginTest') }}" method="POST">
              @csrf
              <div class="form-group first">
                <label for="username">Alamat E-mail</label>
                <input type="text" class="form-control" placeholder="your-email@gmail.com" id="username" name="email">
              </div>
              <div class="form-group last mb-5">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" id="password"  name="password">
              </div>
              <input type="submit" value="Log In" class="btn btn-block btn-primary">
              <input type="submit" value="Masuk Dengan Google" class="btn btn-block btn-primary">
            </form>
            <div class="d-flex mt-5 justify-content-center ">
              <label class="control control--checkbox mb-0"><span class="caption">Tidak Punya Akun ?</span>
              <span class="ml-auto"><a href="{{ route('RegisterTest') }}" class="forgot-pass text-primary">Register</a></span> 
              </label>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="bg order-1 order-md-1" style="background-image: url('images/login.jpg');"></div>

  </div>
    
    

    <script src="{{ asset('') }}vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('') }}js/main.js"></script>
  </body>
</html>