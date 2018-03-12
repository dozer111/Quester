<?php
namespace models\forms;
/**
 *====================================================
 * Модель для валидации данных при регистрации
 *====================================================
 */

class SignInForm
{
    private $login;
    private $email;
    # пароли будут сверятся на стороне пользователя
    private $password;

    # параметры для валидации данных на стороне сервера
    const MIN_LOGIN_LENGTH=5;
    const MIN_EMAIL_LENGTH=5;
    const MIN_PASSWORD_LENGTH=5;
    const MAX_LOGIN_LENGTH=24;
    const MAX_EMAIL_LENGTH=24;
    const MAX_PASSWORD_LENGTH=24;
    # стандартный ответ при провале валидации
    const LOGIN_ERROR_MIN='Логин должен состоять из '.self::MIN_LOGIN_LENGTH.'+ символов';
    const EMAIL_ERROR_MIN='Электронная почта должна состоять из '.self::MAX_EMAIL_LENGTH.'+ символов';
    const PASSWORD_ERROR_MIN='Пароль должен состоять из '.self::MIN_PASSWORD_LENGTH.'+ символов';
    const LOGIN_ERROR_MAX='Максимальная длина логина: '.self::MAX_LOGIN_LENGTH.' символов';
    const EMAIL_ERROR_MAX='Максимальная длина электронной почты: '.self::MAX_EMAIL_LENGTH.' символов';
    const PASSWORD_ERROR_MAX='Максимальная длина пароля: '.self::MAX_PASSWORD_LENGTH.' символов';



    public function __construct($login,$email,$password)
    {
        $this->login=htmlspecialchars(trim($login));
        $this->email=htmlspecialchars(trim($email));
        $this->password=htmlspecialchars(trim($password));
    }


   # метод для проброса AJAX запроса на валидацию
    public function validateFormData()
    {

        $loginMessage='';
        $emailMessage='';
        $passwordMessage='';
        $loginMessage=(mb_strlen($this->login)<self::MIN_LOGIN_LENGTH)?self::LOGIN_ERROR_MIN:$loginMessage;
        $loginMessage=(mb_strlen($this->login)>self::MAX_LOGIN_LENGTH)?self::LOGIN_ERROR_MAX:$loginMessage;
        $emailMessage=(mb_strlen($this->email)<self::MIN_EMAIL_LENGTH)?self::EMAIL_ERROR_MIN:$emailMessage;
        $emailMessage=(mb_strlen($this->email)>self::MAX_EMAIL_LENGTH)?self::EMAIL_ERROR_MAX:$emailMessage;
        $passwordMessage=(mb_strlen($this->password)<self::MIN_PASSWORD_LENGTH)?self::PASSWORD_ERROR_MIN:$passwordMessage;
        $passwordMessage=(mb_strlen($this->password)>self::MAX_PASSWORD_LENGTH)?self::PASSWORD_ERROR_MAX:$passwordMessage;

        $resultArray=[];
        if($loginMessage!=='')$resultArray['login']=$loginMessage;
        if($emailMessage!=='')$resultArray['email']=$emailMessage;
        if($passwordMessage!=='')$resultArray['password']=$passwordMessage;
        $resultArray['error']=(empty($resultArray['login']) && empty($resultArray['email']) && empty($resultArray['password']))
            ?false:true;
        return json_encode($resultArray);


    }

    public function returnFormData()
    {

    }


}