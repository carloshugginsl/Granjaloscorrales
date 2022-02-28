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
				    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Producto</th>
						        <th>Precio</th>
						        <th>Cantidad</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
						    @foreach($aCarritos as $item)
						      <tr class="text-center">
						        <td class="product-remove"><a href="/carrito/eliminar/{{$item->idcarrito}}"><span class="ion-ios-trash"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url('/files/{{$item->imagen}}');"></div></td>
						        
						        <td class="product-name">
						        	<h3>{{$item->nombre_producto}}</h3>
						        	<p></p>
						        </td>
						        
						        <td class="price">$4.90</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="{{$item->cantidad}}" min="1" max="100">
					          	</div>
					          </td>
						        
						        <td class="total">$4.90</td>
						      </tr><!-- END TR-->

						    </tbody>
						  </table>
						  @endforeach
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="checkout.html" class="btn btn-primary">Seguir comprando</a></p>

					  </div>
    			</div>
    		</div>
            
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                      <div class="cart-total mb-3">
    					<h3>Comentarios:</h3>
    					<p></p>
  						<form action="#" class="info">
	              <div class="form-group">
	                <textarea name="" id="" cols="60" rows="20" type="text" class="form-control text-left px-3" placeholder=""></textarea>
	              </div>
                    <div>
    				
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				
                        <p></p>
                    </div>
	            </form>
    				</div>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Modalidad de pago:</h3>
    					<select name="lstPago" id="lstPago" class="form-control" required>
                                                <option value disabled selected>Seleccionar</option>
                                                <option value="1">Efectivo</option>
                                                <option value="2">Mercado Pago</option>
                                          </select>
    					
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>${{$total}}</span>
    					</p>
    				</div>
    				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="checkout.html" class="btn btn-primary py-3 px-4">Finalizar pedido</a></p>
    			</div>
    		</form>
		</div>
			</div>
		</section>

		

    @endsection ('contenido')




                              

