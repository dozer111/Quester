<?php


namespace controllers;


class DaysideController extends CoreController
{

    public function actionIndex()
    {
        return $this->getSmarty()->display('dayside/index.tpl');
    }


}