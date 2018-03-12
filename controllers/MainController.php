<?php
namespace controllers;
use components\FileUpload;
use components\Stab;
use models\TestModel;
use models\QuestModel;
use models\UserModel as User;
use components\Mailer;


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
        // 2.1 если пользователь уже залогинен, тогда в $userData придет его ID,
        // иначе в форме появится поле для почты
        $userLogin=$_POST['userLogin'];
        $userEmail=($userLogin==0)?$_POST['userData']:(new User())->getUser($userLogin,'id')['user_email'];


        // 3 дополнительно пробрасываем файл на  сервер
        #$upload=new FileUpload();
        #$fileName=$upload->uploadFile($_FILES,$fileTypes);



        // 4 Создаем задание
        $questModel=new QuestModel();
        $mailer=new Mailer();
        $test=$mailer->sendMail($userEmail);
        die(var_dump($test));
        $createQuest=$questModel->createQuest($title,$text,$fileName,$userEmail,$userLogin);
        $msg=((bool)$createQuest)?'Quest CREATE':'ERROR';
        echo $msg;
    }



    public function actionTest()
    {
        $model=new TestModel();
        $model->getModels();
    }

}