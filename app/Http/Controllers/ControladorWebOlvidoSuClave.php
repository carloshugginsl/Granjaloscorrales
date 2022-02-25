<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Entidades\Cliente;

class ControladorWebOlvidoSuClave extends Controller
{
    public function index(){
          $msg = '';
            return view("web.olvido-su-clave", compact('msg'));
    }

    public function recuperarClave(Request $request){
      
      $titulo ="Recupero de clave";
      $correo  = $request->input('txtCorreo');

      $$entidadcorreo = new Cliente;
      if ($correo->obtenerPorMail($correo)){

                  $mail = new PHPMailer(true);
                  $mail->SMTPDebug = 0;
                  $mail->isSMTP();
                  $mail->Host = env('MAIL_HOST');
                  $mail->SMTPAuth = true;
                  $mail->Username = env('MAIL_USERNAME');
                  $mail->Password = env('MAIL_PASSWORD');
                  $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                  $mail->Port = env('MAIL_PORT');



                  //Destinatarios
                  $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')); //Dirección desde
                  $mail->addAddress($correo); //Dirección para
                  $mail->addReplyTo($replyTo); //Dirección de reply no-reply


                  //Contenido del mail
                  $mail->isHTML(true);
                  $mail->Subject = 'Recuperacion de clave';
                  $mail->Body = 'Su nueva clave es: ' . rand(1000,9999);
                  //$mail->send();

                  $msg = 'Hemos enviado un mensaje a su correo';
                  return view("web.olvido-su-clave", compact('titulo', 'msg'));
            } else{
                  $msg= 'El cliente no existe';
                  return view("web.olvido-su-clave", compact('titulo', 'msg'));
            }
      }
}
