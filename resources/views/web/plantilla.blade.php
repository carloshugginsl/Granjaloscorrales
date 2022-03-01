<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Granja Los Corrales</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="web/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="web/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="web/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('web/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('web/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ url('web/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('web/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('web/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ url('web/css/aos.css') }}">

    <link rel="stylesheet" href="{{ url('web/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ url('web/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ url('web/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ url('web/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('web/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ url('web/css/style.css') }}">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class=></span></div>
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class=></span></div>
						    
					    </div>
					    
					    <div class="col-md-5 pr-4 d-flex topper align-items-right text-lg-right">
              <div class="icon mr-2 d-flex justify-content-center align-items">

              </div>
              @if(Session::get("idCliente") !="") <a href="/logout">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text">Cerrar sesión&nbsp;|</span></a>&nbsp;<a href="/cambiar-clave"><span class="text">Cambiar clave</span></a>@else&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/login"><span class="text">Iniciar sesión</span></a>@endif
                
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">    

        
        <div class="logo"><a href="/"><img src="{{ asset('web/images/logo.jpg') }}" alt=""></a></div><a class="navbar-brand" href="/">&nbsp;&nbsp;&nbsp;&nbsp;Granja Los Corrales</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="/producto" class="nav-link">Productos</a></li>
	          <li class="nav-item"><a href="/nosotros" class="nav-link">Nosotros</a></li>
            @if(Session::get("idCliente") !="")
	          <li class="nav-item"><a href="/mi-cuenta" class="nav-link">Mi perfil</a></li>
            @endif

	          <li class="nav-item cta cta-colored"><a href="/carrito" class="nav-link"><span class="icon-shopping_cart"></span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>

  @yield ('contenido')

  <!-- ======= Footer ======= -->
  <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="col-md-12 text-center">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Granja Los Corrales</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-center float-lft mt-12">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/granjaloscorrales/"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
      </div>
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>
      <body>
      <a href="https://wa.me/5491167378349?text=" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>	
      </body>


    </footer>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="{{ url('web/js/jquery.min.js') }}"></script>
  <script src="{{ url('web/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ url('web/js/popper.min.js') }}"></script>
  <script src="{{ url('web/js/bootstrap.min.js') }}"></script>
  <script src="{{ url('web/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ url('web/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ url('web/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ url('web/js/owl.carousel.min.js') }}"></script>
  <script src="{{ url('web/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ url('web/js/aos.js') }}"></script>
  <script src="{{ url('web/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ url('web/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ url('web/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ url('web/js/google-map.js') }}"></script>
  <script src="{{ url('web/js/main.js') }}"></script>
    
  </body>
</html>



