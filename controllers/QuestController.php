<?php
namespace controllers;
use models\QuestModel;

class QuestController extends CoreController
{

    /**
     * ========================================================
     * Показать все новости с пагинацией
     * ========================================================
     */
    public function actionIndex()
    {
        # 1) узнаем текущую страничку
        $requestPage=(isset($this->getParams()[0]))?$this->getParams()[0]:1;
        $page=($number=intval($requestPage))?$number:1;


        # 2) берем новости для текущей странички
        $questModel=new QuestModel();
        $news=$questModel->getAllQuests($page);



        # 3) выводим новости (в $news уже есть максимальное к-во страниц)
        return $this->getSmarty()
                    ->display('quest/index.tpl',compact('news','page'));

    }


    /**
     * =======================================================================
     * Показать одно задание
     * =======================================================================
     */
    public function actionShow()
    {
        $questModel=new QuestModel();
        # 1) получаем номер записи
        $id=$this->getParams()[0];

        # 2) получаем задание
        $quest=$questModel->getQuestById($id);

        return $this->getSmarty()->display('quest/show.tpl',compact('quest'));


    }


}