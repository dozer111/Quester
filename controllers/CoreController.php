<?php
namespace controllers;
/**
 * ================================================================
 * Класс-родитель для контроллеров
 * ================================================================
 */


abstract class CoreController
{
    private $params;
    private $smarty;
    private $session;

    public function __construct()
    {
        global $params;
        $this->params=$params;
        global $smarty;
        $this->smarty=$smarty;
        global $session;
        $this->session=$session;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getSmarty()
    {
        return $this->smarty;
    }

    public function getSession()
    {
        return $this->session;
    }





}