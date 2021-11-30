<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aset</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{url('aset')}}/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('aset')}}/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand">Landing Page</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ url('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ url('register') }}">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>Welcome To Aset</h1>
                <p class="lead">Website untuk kebutuhan tugas akhir</p>
                <p>The Rabbanians</p>
                <a class="btn btn-warning" href="{{ url('home') }}">Lanjut</a>
<div data-countdown="2016/01/01"></div>
<div data-countdown="2017/01/01"></div>
<div data-countdown="2018/01/01"></div>
<div data-countdown="2019/01/01"></div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{url('style')}}/js/scripts.js"></script>
    </body>
    <script>
        $('[data-countdown]').each(function() {
         var $this = $(this), finalDate = $(this).data('countdown');
         $this.countdown(finalDate, function(event) {
           $this.html(event.strftime('%D days %H:%M:%S'));
         });
      });
      </script>
</html>