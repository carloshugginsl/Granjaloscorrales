@extends ('web.plantilla')
@section ('contenido')


<div class="hero-wrap hero-bread" style="background-image: url('web/images/10.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Inicio</a></span> <span>Mi cuenta</span></p>
            <h1 class="mb-0 bread">Mi cuenta</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="#" class="billing-form">
							<h3 class="mb-4 billing-heading">Datos Personales</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Nombre</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Apellido</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Dirección</label>
		            		<div class="select-wrap">
					<input type="text" class="form-control">
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Teléfono</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
					<label for="streetaddress">Correo eléctronico</label>
	                  <input type="text" class="form-control" placeholder="">
	                </div>
		            </div>
				*Para nosotros es importante que verifiques tus datos personales no olvides corregirlos y/o actualizarlos en caso de ser necesario. 


		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                </div>
			    <p><a href="#"class="btn btn-primary py-3 px-4">Actualizar datos</a></p>
			    
		            </div>



		            <div class="col-md-6">
	                <div class="form-group">
	                </div>
                </div>

                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										</div>
									</div>
                </div>
	            </div>
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Pedido Actual</h3>
	          			<p class="d-flex">
		    						<span>Número de pedido</span>
		    						<span>$20.60</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Fecha</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Estado del Pedido</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>$17.60</span>
		    					</p>
								</div>
	          	</div>
	         
									
									
									
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->




@endsection ('contenido')