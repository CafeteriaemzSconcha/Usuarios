<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Usuarios.</title>

    <!-- Bootstrap core CSS -->
    {!!Html::style('vendor/bootstrap/css/bootstrap.min.css')!!}
    
    <!-- Custom fonts for this template -->
    {!!Html::style('vendor/fontawesome-free/css/all.min.css')!!}
    {!!Html::style('https://fonts.googleapis.com/css?family=Montserrat:400,700')!!}
    {!!Html::style('https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic')!!}
    
    <!-- Plugin CSS -->
    {!!Html::style('vendor/magnific-popup/magnific-popup.css')!!}

    <!-- Custom styles for this template -->
    {!!Html::style('css/freelancer.min.css')!!}

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Emz coffee & tea</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Cafetería Emz 2018</small>
      </div>
    </div>
    </footer>

    

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Bootstrap core JavaScript -->
    {!!Html::script('vendor/jquery/jquery.min.js')!!}
    {!!Html::script('vendor/bootstrap/js/bootstrap.bundle.min.js')!!}

    <!-- Plugin JavaScript -->
    {!!Html::script('vendor/jquery-easing/jquery.easing.min.js')!!}
    {!!Html::script('vendor/magnific-popup/jquery.magnific-popup.min.js')!!}

    <!-- Contact Form JavaScript -->
    {!!Html::script('js/jqBootstrapValidation.js')!!}
    {!!Html::script('js/contact_me.js')!!}

    <!-- Custom scripts for this template -->
    {!!Html::script('js/freelancer.min.js')!!}

    {!!Html::script('js/Vue.min.js')!!}

  </body>
</html>