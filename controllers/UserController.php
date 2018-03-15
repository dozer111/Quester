<?php
namespace controllers;
use models\QuestModel;


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
     * =========================================================================================
     */
    public function actionIndex()
    {
        $page=(isset($this->getParams()[0]))?$this->getParams()[0]:1;
        $userId=$this->getSession()->getSession('user')['id'];
        $questModel=new QuestModel();
        $userQuestList=$questModel->getQuestListByUser($userId,$page);

        return $this->getSmarty()->display('user/index.tpl',compact('userQuestList'));
    }

    /**
     * ==========================================================================================
     * Посмотреть страничку другого пользователя
     * ==========================================================================================
     */
    public function actionShow(){}




}