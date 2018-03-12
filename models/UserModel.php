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

    public function createUser($login,$email,$password,$userActivationHash)
    {
        # 1 регистрируем уникального пользователя
        if($this->userExists($login))return false;
        $db=DB::getInstance();
        $password=password_hash($password,PASSWORD_DEFAULT);

        $query="INSERT INTO `user` (`user_login`,`user_email`,`user_password`,
        `user_activation_hash`) 
        VALUES('".$login."','".$email."','".$password."','".$userActivationHash."')";

        return(bool)$db->query($query);
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


    public function activateUserFromMail($hash)
    {
        $db=DB::getInstance();
        #1 находим незарегистрированного юзвера с тами хешом
        $userActivate=$db->query("SELECT `user`.`id` FROM `user` 
        WHERE `user`.`user_activation_hash`='".$hash."' 
        AND `user`.`user_activation_status`=0  LIMIT 1")->fetch_assoc();
        #2 регистрируем
        $regResult=$db->query('UPDATE `user` SET `user_activation_status`=1 
          WHERE `id`='.$userActivate['id']);
        return (bool)$regResult;

    }




}