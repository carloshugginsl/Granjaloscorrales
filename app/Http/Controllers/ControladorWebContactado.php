<?php

namespace App\Http\Controllers;

class ControladorWebContactado extends Controller
{
    public function index()
    {
            return view("web.contactado");
    }

    public function enviar (request $request)
    {

        $nombre = $request->nombre;
        $correo = $request->correo;
        $telefono = $request->telefono;
        $mensaje = $request->mensaje;

        $mail = new PHPMailer (true);
        $mail->SMTPDeug = 0;
        $mail->isSMTP();
        $mail->Host = env('MAIL_HOST');
        $mail->SMTPauth = true;
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->Port = env('MAIL_PORT');

        $mail->setFrom($correo, $nombre); //Direccion desde
        $mail->addAddress('carloshuggins531@gmail.com');


        //Contenido del  mail
        $mail->isHTML(true);
        $mail->telefono =  $telefono;
        $mail->Body = $mensaje;
        $mail->send();

        return view("web.contactado");

    }
}
