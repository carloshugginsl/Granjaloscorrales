@extends ('web.plantilla')
@section ('contenido')
    <div class="hero-wrap hero-bread" style="background-image: url('web/images/3.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Inicio</a></span> <span>Contacto</span></p>
            <h1 class="mb-0 bread">Contactanos</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	
          </div>
          <div class="col-md-3 d-flex">
          
          </div>
          <div class="col-md-3 d-flex">
          
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nombre" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Correo" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Asunto" required>
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Escriba aquí un mensaje..."></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Enviar mensaje" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.487595817307!2d-58.70801548481335!3d-34.61711648045596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcbe44f7cc45d9%3A0x2cadc3485f34052c!2sGranja%20Los%20Corrales!5e0!3m2!1ses-419!2sar!4v1644946873697!5m2!1ses-419!2sar" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>          </div>
        </div>
      </div>
    </section>

@endsection ('contenido')
