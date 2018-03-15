<?php
namespace components;

/**
 * Class SubstText
 * @package components
 * ============================================================================================================
 * Компонент для обрезки строки до определенного значения
 * Применяется при:
 *  админка/список новостей --> отображение малой части теста задачи
 * ============================================================================================================
 */
class SubstText
{
    const SUBSTR_LENGTH=30;
    private $stringLength;


    /**
     * SubstText constructor.
     * @param int $stringLength
     * =========================================================================================================
     *      У нас есть дефолтное значение для обрезки, но, если что, мы его можем изменить
     * =========================================================================================================
     */
    public function  __construct($stringLength=0)
    {
        $this->stringLength=($stringLength==0)?self::SUBSTR_LENGTH:$stringLength;
    }



    public  function getSubStringFromOne($string)
    {

        return $res=mb_substr($string,0,$this->stringLength);
    }






    public function getSubStringFromArray($array)
    {
        $res=[];
        foreach ($array as $key=>$value)
        {
            $res[$key]=mb_substr($value,0,$this->stringLength);
        }
        return $res;
    }





}