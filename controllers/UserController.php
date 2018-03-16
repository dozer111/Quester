<?php
namespace controllers;
use components\Pagination;
use models\QuestModel;
use components\SubstText;

/**
 * Class UserController
 * @package controllers
 * =============================================================================================
 * Класс для
 * 1) отображения странички пользователя
 * 2) Возможности писать записи со своей странички
 * =============================================================================================
 */
class UserController extends CoreController
{
    /**
     * =========================================================================================
     * Персональная страничка пользователя
     *+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
     * В случае, если чеоловек будет сюда стучатся, И он не зарегистрированный,
     * вынести огромную кнопку домой
     * =========================================================================================
     */
    public function actionIndex()
    {
        //1 получить страницу
        $page=(isset($this->getParams()[0]))?$this->getParams()[0]:1;

        $userId=$this->getSession()->getSession('user')['id'];
        $questModel=new QuestModel();
        //2 получить список новостей юзера
        $userQuestList=$questModel->getQuestListByUser($userId,$page);

        //3 панель пагинации
        $userQuestList['pageList']=Pagination::getButtons($page,$userQuestList['maxPages']);
        $userQuestList['currentPage']=$page;



        return $this->getSmarty()->display('user/index.tpl',compact('userQuestList'));
    }

    /**
     * ==========================================================================================
     * Посмотреть страничку другого пользователя
     * ==========================================================================================
     */
    public function actionShow(){}




}