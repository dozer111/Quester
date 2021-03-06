<?php


class Session
{
    public function __construct()
    {
        if(isset($_COOKIE['session_id']))
        {
            session_id($_COOKIE['session_id']);
            session_start();
        }
        else
        {
            session_start();
            setcookie('session_id',session_id());
        }

    }


    public function getSession($key,$default=null)
    {

        return (isset($_SESSION[$key]))?$_SESSION[$key]:$default;
    }


    public function setSession($key,$value)
    {
        if(!$key)return false;
        setcookie($key,$value);
        $_SESSION[$key]=$value;
        return true;
    }


    public function destroySession()
    {
        return session_destroy();
    }





}