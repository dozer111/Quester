<?php
namespace models;
use components\DB;
use components\Stab;
class TestModel
{
    public function getModels()
    {
        $db=DB::getInstance();
        $res=$db->query('SHOW TABLES')->fetch_all(MYSQLI_ASSOC);
        die(var_dump($res));

    }

}