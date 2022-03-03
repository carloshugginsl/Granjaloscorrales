@extends ('web.plantilla')
@section ('contenido')

<div class="hero-wrap hero-bread" style="background-image: url('web/images/13.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/" style="color:black;">Inicio</a></span> <span style="color:black;">Carrito</span></p>
            <h1 class="mb-0 bread" style="color:black">Mi Carrito</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
                        <form method="POST">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Eliminar</th>
						        <th>Imagen</th>
						        <th>Producto</th>
						        <th>Precio Unitario</th>
						        <th>Cantidad</th>
							  <th>&nbsp;</th>

						      </tr>
						    </thead>
						    <tbody>
						    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
						    @foreach($aCarritos as $item)
						      <tr class="text-center">
						        <td class="product-remove"><a href="/carrito/eliminar/{{$item->idcarrito}}"><span class="ion-ios-trash"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url('/files/{{$item->imagen}}');"></div></td>
						        
						        <td class="product-name">
						        	<h3>{{$item->nombre_producto}}</h3>
						        	<p></p>
						        </td>
						        
						        <td class="price"></td>
						        
						        <td class="quantity">{{$item->cantidad}}</td>
					         
							  @endforeach

						      </tr>
						    </tbody>
						  </table>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/producto" class="btn btn-primary">Seguir comprando</a></p>

					  </div>
    			</div>
    		</div>
            
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                      <div class="cart-total mb-3">
    					<h3>Comentarios:</h3>
    					<p></p>
	              <div class="form-group">
	                <textarea name="txtComentarios" id="txtComentarios" class="form-control" cols="60" rows="20" type="text" class="form-control text-left px-3" placeholder="Añade un comentario"></textarea>

	              </div>
                    <div>
    				
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				
                        <p></p>
                    </div>
    				</div>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
				    <h3>Meto:</h3>
				    <select name="lstMetodo" id="lstMetodo" class="form-control" required>
                                                <option value disabled selected>Seleccionar</option>
                                                @foreach($aMetodos as $metodo)
                                                      <option value="{{$metodo->idmetodo}}">{{$metodo->nombre}}</option>
                                                @endforeach
                                                
                                          </select>
    					<h3>Modalidad de pago:</h3>
    					<select name="lstPago" id="lstPago" class="form-control" required>
                                                <option value disabled selected>Seleccionar</option>
                                                <option value="1">Efectivo</option>
                                                <option value="2">Mercado Pago</option>
                              </select>
    					
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>${{$total}}</span>
    					</p>

    				</div>
    				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary py-3 px-4 centr">FINALIZAR PEDIDO</button>
    			</div>
    		</form>
		</div>
			</div>
		</section>

		

    @endsection ('contenido')




                              

