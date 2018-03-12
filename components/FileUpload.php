<?php
namespace components;

/**
 * Class FileUpload
 * @package components
 * =================================================================================
 * Компонент для загрузки файла на сервер
 * =================================================================================
 */

class FileUpload
{
    public function uploadFile(array $file ,array $type)
    {

        
        if(isset($file) && in_array($file['file']['type'],$type['fileMimes']) && is_uploaded_file($file['file']['tmp_name']))
        {
            $filePath='../web/img/';
            $fileName=md5(time($file['file']['name'])).'.'.pathinfo($file['file']['name'],PATHINFO_EXTENSION);
            $filePath=$filePath.$fileName;

            move_uploaded_file($file['file']['tmp_name'],$filePath);
            return $fileName;
        }
        else return $fileName='';
        
    }



}