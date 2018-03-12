<?php
namespace components;
use libs\PHPMailer\src\PHPMailer;
use libs\PHPMailer\src\Exception;
/**
 * Class Mailer
 * @package components
 * @param $email
 * @param $id == ID пользователя/задания
 * @param $type == тип письма (userActivation для отправки активации пользователю,
 * всё остальное -- активация задания)
 * ======================================================================================
 * Компонент для отправки почты
 * ======================================================================================
 */

class Mailer
{

  public function sendMail($email,$id,$type,$hash=0){
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
      #$mail->Body=file_get_contents('../mail/UserActivation.tpl');
      $mail->Body=$this->setHtmlText($type,$hash);

      $mail->addAddress($email);
      return (bool)$mail->send();

  }

    /**
     * @param $type
     * @param $hash
     * @return string
     * ==============================================================================
     * Метод для создания Html письма
     * ==============================================================================
     */
  public function setHtmlText($type,$hash)
  {
        if($type=='userActivation')
            return $file=file_get_contents('http://localhost/main/confirm/user/'.$hash);
        else
            return $file=file_get_contents('http://localhost/main/confirm/quest/'.$hash);
  }



}