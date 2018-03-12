<?php
namespace controllers;
/**
 *============================================================
 * Контроллер для
 * 1) регистрации   |
 * 2) авторизации   |Пользователя
 * 3) смены пароля  |
 *============================================================
 */
use models\forms\SignInForm;
use models\UserModel;
use components\Mailer;

class AuthController extends CoreController
{
    private $login;
    private $email;
    private $password;

    /**
     * Метод полностью занимается приемом и обработкой данных.
     * В зависимости от того, под каким типом запроса к нему приходят,
     * выполняет перенаправление на страницу или начинает валидацию и
     * приём данных
     */
    public function actionSignIn()
    {

        if($_SERVER['REQUEST_METHOD']=='GET')
        {
            $smarty=$this->getSmarty();
            return $smarty->display('auth/signIn.tpl');
        }
        # 1) Получаем данные с формы
        $login=$_POST['login'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        # 2) Записываем пользователя
        $userModel=new UserModel();
        $userActivationHash=md5(time());
        if($userModel->createUser($login,$email,$password,$userActivationHash))
            $newUser=$userModel->getUser($login);
        $this->getSession()->setSession('user',$newUser);



        # 3) посылаем письмо с подтверждением активации
        $mailer=new Mailer();
        $sendMailToUserActivate=$mailer->sendMail($email,$newUser['id'],'userActivation',$userActivationHash);


        if($sendMailToUserActivate!=true)die(var_dump($sendMailToUserActivate));

        if(!empty($newUser) && $sendMailToUserActivate==true)
             header('location:/main/index/OK');
        else
            header('location:/main/index/ERROR');


    }

    public function actionPreSignIn()
    {

        $login=$_POST['login'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        # 2) вызываем модель для валидации
        $validateForm=new SignInForm($login,$email,$password);
        $res=json_encode($validateForm->validateFormData());
        echo $res;
    }


    public function actionLogin()
    {
        if($_SERVER['REQUEST_METHOD']=='GET' )return $this->getSmarty()->display('auth/login.tpl');
        $login=$_POST['login'];
        $pass=$_POST['password'];
        $userModel=new UserModel();
        $user=$userModel->loginUser($login,$pass);
        $set=$this->getSession()->setSession('user',$user);
        header('location:/');
    }
    public function actionLogout()
    {
        $this->getSession()->destroySession();
        header('location:/');
    }

}