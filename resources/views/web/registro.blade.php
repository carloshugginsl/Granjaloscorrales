@extends ('web.plantilla')
@section ('contenido')

<div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-0 bread">Registrate</h1>
          </div>



<section class="ftco-section">
      

<div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form method="POST" class="billing-form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
							<h3 class="mb-4 billing-heading">Datos Personales</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Nombre</label>
	                  <input type="text" name="txtNombre" class="form-control" id="nombre" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Apellido</label>
	                  <input type="text" name="txtApellido" class="form-control" id="apellido" placeholder="">
	                </div>
                </div>
                        <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Teléfono</label>
	                  <input type="text" name=txtTelefono class="form-control" placeholder="">
	                </div>
		            </div>
                        <div class="col-md-6">
		            	<div class="form-group">
					<label for="streetaddress">Correo eléctronico</label>
	                  <input type="text" name="txtCorreo" class="form-control" placeholder="">
	                </div>
		            </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Dirección</label>
		            		<div class="select-wrap">
					<input type="text" name="txtDomicilio" class="form-control">
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Contraseña</label>
	                  <input type="password" name="txtClave" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                </div>
		            </div>
				*Las contraseñas son sensibles a mayúsculas y minúsculas y deberán tener entre 6 - 20 caracteres.


		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                </div>
			    <button type="submit" class="btn btn-primary py-3 px-4">Registrarse</button>
			    
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
	          			<img src="web/images/logo.jpg" width="300px" height="300px" alt="">
								</div>
	          	</div>
	         
									
									
									
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
    </section> 


@endsection ('contenido')
