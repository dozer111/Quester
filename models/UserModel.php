<?php
namespace models;
use components\DB;
use components\Mailer;



class UserModel
{

    public function userExists($login)
    {
        $query="SELECT * FROM `user` WHERE `user_login`='".$login."'";
        $db=DB::getInstance();
        #die($query);
        #die(var_dump());
        return (bool)$db->query($query)->num_rows;

    }

    public function createUser($login,$email,$password)
    {
        # 1 регистрируем уникального пользователя
        if($this->userExists($login))return false;
        $db=DB::getInstance();
        $password=password_hash($password,PASSWORD_DEFAULT);
        $query="INSERT INTO `user` (`user_login`,`user_email`,`user_password`) 
        VALUES('".$login."','".$email."','".$password."')";


        # 2 отправляем на почту письмо с ссылкой на активацию
        $mailer=new Mailer();
        $to=$email;
        $title='SiteName 1432. User Activation';
        $message=$mailer->getHtml('UserActivation.tpl');
        $EOL = "\r\n"; // ограничитель строк
        $headers    = "MIME-Version: 1.0;" . $EOL . "";
        $headers   .= "Content-Type: text/html; charset=utf-8" . $EOL . "";
        $headers   .= "From: alkhonko@gmail.com\nReply-To: alkhonko@gmail.com\n";

        $result=$mailer->sendMail($to,$title,$message,$headers);
        die(var_dump($result));
       # $db->query($query);
        return (bool)$result;
    }

    public function loginUser($login,$password)
    {
        $user=$this->getUser($login);
        if(password_verify($password,$user['user_password']))
            return $user;
    }


    public function getUser($login,$column='user_login')
    {
        $db=DB::getInstance();
        $query="SELECT * FROM `user` WHERE `".$column."`='".$login."'";
        return $user=$db->query($query)->fetch_assoc();

    }




}