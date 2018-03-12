<?php
namespace controllers\admin;
use controllers\CoreController;
use components\Pagination;
use models\QuestModel;
use components\FileUpload;




class AdminController extends CoreController
{
    public function actionIndex()
    {
        # 0 получение текущей странички
        $requestPage=(isset($this->getParams()[0]))?$this->getParams()[0]:1;
        $page=($number=intval($requestPage))?$number:1;

        $questModel=new QuestModel();
        $getQuests=$questModel->getAllInactiveQuests($page);

        return $this->getSmarty()->display('admin/admin/index.tpl',compact('getQuests','page'));
    }


    /**
     * =================================================================================
     * AJAX метод для редактирования записи задания
     * =================================================================================
     */
    public function actionChange()
    {
        $questModel=new QuestModel();
        #1 Узнаем первые необходимые параметры для всех 3х кнопок
        $id=$_POST['id'];
        $status=$_POST['status'];
        // Массив для кнопки редактировать
        $fileType=['fileMimes'=>["image/jpeg","image/png", "image/gif"]];


        // если кнопка редактировать
        if($status==2)
        {

            $title=$_POST['title'];
            $text=$_POST['text'];


            // массив с доп значениями для QuestModel->answerQuest --> $change
            $changeArray=['title'=>$title,'text'=>$text];
            # если был дополнительно загружен файл
            if($_FILES['file']['error']==0)
            {
                $upload= new FileUpload();
                $fileName=$upload->uploadFile($_FILES,$fileType);
                $changeArray['image']=$fileName;
            }


            $questChange=$questModel->answerQuest($id,$status,$changeArray);
            echo ($questChange==true)?'Quest 500 CHANGED':"QUEST 500 ERROR";
        }

        // для кнопок Утвердить и Отклонить
        else
        {

            $result=$questModel->answerQuest($id,$status);
            echo ($result==true)?'QUEST '.$status.' CHANGED':'Quest '.$status.' Error';
        }



    }

}