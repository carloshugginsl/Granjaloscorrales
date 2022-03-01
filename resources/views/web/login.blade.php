@extends ('web.plantilla')
@section ('contenido')

<div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-0 bread">Iniciar sesión</h1>
          </div>

<section class="ftco-section2">

<div class="container">
        <div class="row justify-content-center">
          <div  class="col-5">
          <div class="col-sm-12 ftco-animate">
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
                <form method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
	                <div class="form-group">
	                	<label for="firstname">Correo</label>
	                  <input type="text" name="txtCorreo" class="form-control" placeholder="" require>
	                </div>
	              </div>
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Contraseña</label>
	                  <input type="password" name="txtClave" class="form-control" placeholder="" require>
	                </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary py-3 px-4 centr">Ingresar</button>
                  <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¿No ténes cuenta? <a href="/registro">Registrate acá </a></h2>
                  <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/olvido-su-clave">¿Olvidó su clave?</a></h2>     
                </div> 
                </div>
                </div>
                </form>
 
		            </div>   
                
</section>

@endsection ('contenido')
