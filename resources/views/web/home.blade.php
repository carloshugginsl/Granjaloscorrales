@extends ('web.plantilla')
@section ('contenido')


    <!-- END nav -->

    <section id="home-section"  class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(web/images/11.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">100% alimentos de campo y orgánicos</h1>
	              <h2 class="subheading mb-4">100% alimentos de campo y orgánicos</h2>
	              <p><a href="/producto" class="btn btn-primary">Comprar</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(web/images/2.jpeg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">Servimos productos frescos y de calidad</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="#" class="btn btn-primary">Comprar</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
        
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Delivery</h3>
                <span>En pedidos superiores $5000*<br>
			    Consultanos las zonas	</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Siempre frescos</h3>
                <span>Pollo de campo</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Calidad superior</h3>
                <span>Productos de calidad</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">¿Tienes dudas?</h3>
                <span>Contactanos a través de los medios</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading"></span>
            <h2 class="mb-4">PROMOCIONES</h2>
            <p>¡Aprovecha nuestras promos de oferta!</p>
          </div>
        </div>   		
    	</div>

    	<div class="container">
    		<div class="row">
		    @foreach($array_promociones as $item)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="{{ url('/promocion-detalle/'. $item->idpromocion)}}" class="img-prod"><img class="img-fluid" src="{{url('/files/'.$item->imagen)}}" alt="Colorlib Template" width="400" height="400">
    						<span class="status">{{$item->accion}}</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href=>{{$item->nombre}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale">${{$item->precio}}</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							
    							</div>
    						</div>
    				</div>
    			   </div>
			</div>
		   @endforeach
		</div>
    	  </div>
    	</div>	    
    </section>
		
		




		

		
   
  @endsection

