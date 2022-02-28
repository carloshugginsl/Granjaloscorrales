@extends ('web.plantilla')
@section ('contenido')


    <!-- ======= Menu Section ======= -->
    <div class="hero-wrap hero-bread" style="background-image: url('web/images/7.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Inicio</a></span> <span>Productos</span></p>
            <h1 class="mb-0 bread">Productos</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    			
    			</div>
    		</div>
        


    		<div class="row">
        @foreach($aProductos as $item)
    			<div class="col-md-6 col-lg-3 ftco-animate">
          <form action="" method="post">

    				<div class="product">

    					<a href="{{ url('/producto-detalle/'. $item->idproducto)}}" class="img-prod"><img class="img-fluid" src="{{url('/files/'.$item->imagen)}}" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">{{$item->nombre}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale">${{$item->precio}}</span><span class="mr-2 price-dc">&nbsp;x&nbsp;{{$item->unidad}}</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                               			    <input value="{{$item->idproducto}}" name="txtIdProducto" type="hidden"></input>
	    							    <span><i class="ion-ios-cart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>

    				</form>
            </div>
    			</div>
    	@endforeach
    	</div>
    </section>

    @endsection ('contenido')

