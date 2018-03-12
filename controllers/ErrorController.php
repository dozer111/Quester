<?php
namespace controllers;
use components\Stab;

class ErrorController extends CoreController
{


    public function actionIndex($class=0,$method=0)
    {
        Stab::getMethod(__CLASS__,__METHOD__);
        echo "<h1>".$this->getParams()[0];
    }

}