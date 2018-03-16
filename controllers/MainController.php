<?php
namespace controllers;
use components\FileUpload;
use components\Stab;
use models\TestModel;
use models\QuestModel;
use models\UserModel as User;
use components\Mailer;
use models\UserModel;


class MainController extends CoreController
{
    public function actionIndex()
    {

        $smarty=$this->getSmarty();
        return $smarty->display('main/index.tpl');
    }

    /**
     * =======================================================
     * AJAX  Метод для создания заданий
     * =======================================================
     */
    public function actionCreate()
    {

        # 1) Создаем список с нужными типами файлов
        $fileTypes=['fileMimes'=>["image/jpeg","image/png", "image/gif"]];
        // 2 получаем значения формы
        $title=$_POST['title'];
        $text=$_POST['text'];
        // 2.1 если пользователь уже залогинен,
        // тогда в $User придет его ID, ИЛИ 0 +  в форме появится поле для почты
        $userLogin=$_POST['userLogin'];
        $userEmail=($userLogin==0)?$_POST['userData']:(new User())->getUser($userLogin,'id')['user_email'];


        // 3 дополнительно пробрасываем файл на  сервер
        $upload=new FileUpload();
        $fileName=$upload->uploadFile($_FILES,$fileTypes);



        // 4 Создаем задание
        $questModel=new QuestModel();
        $hash=md5(time());
        $mailer=new Mailer();
        $test=$mailer->sendMail($userEmail,$userLogin,'quest',$hash);

        $createQuest=$questModel->createQuest($title,$text,$fileName,$userEmail,$userLogin,$hash);
        $msg=((bool)$createQuest)?'Quest CREATE':'ERROR';
        echo $msg;
    }


    /**
     * @param $object ==> обьект активации
     * @param $id
     * ===================================================================================
     * AJAX действие для получения контента для письма при активации  юзера/задания
     * Сам запрос будет выглядеть:
     *
     *          siteName/main/confirm/user/md5Hash_строки_активации
     *
     * ===================================================================================
     */
    public function actionConfirm()
    {
       $object=$this->getParams()[0];
       $hash=$this->getParams()[1];
       switch ($object)
       {
           case 'user':
              return $this->getSmarty()
                  ->display('main/userConfirm.tpl',compact('object','hash'));
               break;
           case 'quest':
               return $this->getSmarty()
                   ->display('main/questConfirm.tpl',compact('object','hash'));
               break;
           default:
               header('Location:/error');
               break;
       }


    }

    /**
     * =======================================================================================
     * Действие, которое прямо отвечает за активацию задания
     * =======================================================================================
     */
    public function actionQuestactivate()
    {
        $hash=$this->getParams()[0];
        $questModel=new QuestModel();
        $activationStatus=$questModel->activateQuest($hash);
        return $this->getSmarty()
            ->display('main/activate.tpl',compact('activationStatus'));
    }

    /**
     * ===========================================================================================
     * Действие, которое отвечает за активацию пользователя
     * ===========================================================================================
     */
    public function actionUseractivate()
    {
        $hash=$this->getParams()[0];
        $userModel=new UserModel();
        $activationStatus=$userModel->activateUserFromMail($hash);
        # переменная , которая будет видоизменять текст с задания на пользователя
        // в ответном виде
        $type=true;
        return $this->getSmarty()->display('main/activate.tpl',compact('activationStatus','type'));
    }














    public function actionTest()
    {
      /* // пока что сделать его ajax для генерации html письма
        $id=$this->getParams()[0];

        $this->getSmarty()->display('main/test.tpl',compact('id'));*/

      // тестируем изменение размера
        $fileUpload=new FileUpload();
        $fileDir='../web/img/';
        $fileName1='2.jpg';
        $fileName2='3.jpg';
        $fileUpload->load($fileDir.$fileName1);
        $fileUpload->resize('500','400');
        $fileUpload->save($fileDir.$fileName2);




    }





}