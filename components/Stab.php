<?php
namespace components;

/**
 * Компонент заглушка для методов в контроллерах
 */
class Stab
{

    public static function getMethod($class=__CLASS__,$method=__METHOD__)
    {
        echo "<h1>Class:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$class."<br>Method:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$method;
    }
}


