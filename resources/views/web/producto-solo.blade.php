@extends ('web.plantilla')
@section ('contenido')

@php($imagen_background = url('web/images/9.jpeg'))


<div class="hero-wrap hero-bread" style="background-image:url({{url('web/images/9.jpeg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Inicio</a></span> <span class="mr-2"><a href="/producto">Productos</a></span></p>
            <h1 class="mb-0 bread">Productos</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="{{url('/files/'.$aProductos[0]->imagen)}}" class="image-popup"><img src="{{url('/files/'.$aProductos[0]->imagen)}}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{$aProductos[0]->nombre}}</h3>
    				<div class="rating d-flex">
							
						</div>
    				<p class="price"><span>${{$aProductos[0]->precio}}</span></p>
    				<p>{{$aProductos[0]->descripcion}}
						</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	               
	                   </div>
		                   </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;">Precio x {{$aProductos[0]->unidad}}</p>
	          	</div>
          	</div>
		    @foreach($aProductos as $item)
		    <form method="POST">

		    <div class="rate-box">
						    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                               			    <input value="{{$item->idproducto}}" name="txtIdProducto" type="hidden"></input>
								    <input type="number" name="txtCantidad" class="txtCantidad" width="40" placeholder="Cantidad"></input>
                                			    <button type="submit">AGREGAR </button>

</div>
</form>
@endforeach						   

          	<p><a type= submit class="btn btn-black py-3 px-5">Agregar al carrito</a></p>
    			</div>
    		</div>
    	</div>
    </section>
@endsection ('contenido')

    <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>

