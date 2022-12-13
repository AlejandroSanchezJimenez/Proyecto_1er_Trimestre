<?php
use PHPMailer\PHPMailer\PHPMailer;
class enviaDiploma
{
  static function enviaDiploma($correo,$tipo)
  {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    // cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 587;
    // introducir usuario de google
    $mail->Username   = "asajiradio@gmail.com";
    // introducir clave
    $mail->Password   = "hwpufjieakkcjeqp";
    $mail->SetFrom('asajiradio@gmail.com', 'Asaji-Radio');
    // asunto
    $mail->Subject    = utf8_decode("Enhorabuena, ¡aquí está tu diploma!");
    // cuerpo
  
    $mail->MsgHTML(file_get_contents("Helpers\correoDiploma.php"));
    // adjuntos
    $mail->addAttachment("Helpers\Media\Diploma$tipo.pdf");
    // destinatario
    $address = $correo;
    $mail->AddAddress($address, "Yo");
    // enviar
    $resul = $mail->Send();
    if (!$resul) {
      echo "Error" . $mail->ErrorInfo;
    } else {
      
    }
  }
}