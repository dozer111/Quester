<?php
namespace components;
/**
 * Class db
 * ===========================================
 * Singletone для подключения БД
 * ===========================================
 */


class DB
{
    private static $db;
    const DB_HOST='localhost';
    const DB_USERNAME='root';
    const DB_PASS='';
    const DB_DATABASE='quester';



    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        if(!self::$db)
        {

            $db=new \mysqli(self::DB_HOST,self::DB_USERNAME,self::DB_PASS,self::DB_DATABASE);
            if($err=$db->connect_error)throw new Exception($err);
            return self::$db=$db;
        }
        return self::$db;
    }


}


