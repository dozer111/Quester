<?php
namespace components;
use libs\PHPMailer\src\PHPMailer;
use libs\PHPMailer\src\Exception;
/**
 * Class Mailer
 * @package components
 * ======================================================================================
 * Компонент для отправки почты
 * ======================================================================================
 */

class Mailer
{
  public function sendMail($email){
      $mail=new PHPMailer();
      $mail->isSMTP();
      $mail->SMTPAuth=true;
      $mail->SMTPSecure='ssl';
      $mail->Host='smtp.gmail.com';
      $mail->Port='465';
      $mail->isHTML();
      $mail->Username='alkhonko@gmail.com';
      $mail->Password='jakirothebest123';
      $mail->SetFrom('alkhonko@gmail.com');
      $mail->Subject='Test letter';
      $mail->Body=file_get_contents('../mail/UserActivation.tpl');
      $mail->addAddress($email);
      return (bool)$mail->send();

  }

}