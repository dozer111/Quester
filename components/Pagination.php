<?php
namespace components;
/**
 * Class Pagination
 * @package components
 * ===========================================================
 * Класс хелпер для пагинации
 * ===========================================================
 */

class Pagination
{
    /**
     * @param $table
     * @param $page
     * @param string $order
     * @param int $limit
     * ==================================================
     * Просто вывести несколько позиций в заданной таблице
     * с пагинацией
     * ==================================================
     *
     */
        public static function getItemsWithPagination($table,$page,$order='DESC',$limit=15)
        {
            $db=DB::getInstance();
            $offset=($page-1)*$limit;
            # 1) count всех записей

            $count=$db->query('SELECT COUNT(*) as count FROM `'.$table."`")->fetch_assoc();
            # 2) выборка конкретных значений
            $itemsQuery="SELECT * FROM `".$table."` ORDER BY `id` ".$order." LIMIT ".$limit." OFFSET ".$offset;

            $items=$db->query($itemsQuery)->fetch_all(MYSQLI_ASSOC);
            # 3) максимальное число страниц
            $maxPages=ceil($count['count']/$limit);
            # 4) финальный массив для return
            $res=['count'=>$count['count'],'maxPages'=>$maxPages,'items'=>$items];
            return $res;
        }


    /**
     * @param $table
     * @param $page
     * @param array $params
     * @param string $order
     * @param int $limit
     * ========================================================================================
     * Метод для более глубокой работы с запросом к БД
     * ***********              ВАЖНО               ***************************************
     *$params ==> массив, в котором ожидаются такие значения:
     *  where
     *  orWhere
     *  andWhere
     *  order ==> определяет столбец таблицы, по которому произвести сортировку
     *  leftJoin
     * ========================================================================================
     * ========================================================================================
     *                          Пример использования функции:
     $requestArray=[];
     $requestArray['where']='quest_activation_status =1';
     $requestArray['andWhere']=['quest_status = 0'];
     $requestArray['leftJoin']=['colums'=>['`user`.`user_login`'],'table'=>'user',
     'on'=>'`quest`.`quest_author`=`user`.`id`'];
     */
        public static function getItemsWithDeepPagination($table,$page,array $params=[],$order='DESC',$limit=15)
        {
            # 1) Создаем запрос и все необходимые значения
            $offset=($page-1)*$limit;
            $itemsQuery="SELECT * FROM `".$table."`";

            if(isset($params['leftJoin']))
            {
                $itemsQuery="SELECT `".$table."`.*,";
                foreach ($params['leftJoin']['colums'] as $column)
                {
                    $itemsQuery.=$column.', ';
                }
                $itemsQuery=rtrim($itemsQuery,', ');

                $itemsQuery.=' FROM '.$table." LEFT JOIN ".$params['leftJoin']['table'].
                    " ON ".$params['leftJoin']['on'];

            }


            $countQuery="SELECT COUNT(*) as count FROM `".$table."`";
            $suffix='';
            # 1.1 усложняем запрос
            if(isset($params['where'])) $suffix.=' WHERE '.$params['where']." ";
            if(isset($params['andWhere']))
            {
                foreach ($params['andWhere'] as $query1)
                    $suffix.= " AND  ".$query1.' ';
            }
            if(isset($params['orWhere']))
            {

                foreach ($params['andWhere'] as $query2)
                    $suffix.= " OR  ".$query2.' ';
            }
            $orderColumn=(isset($params['order']))?$params['order']:'id';
            $countQuery=$countQuery.$suffix;
            $suffix.="ORDER BY `".$orderColumn."` ".$order." LIMIT ".$limit." OFFSET ".$offset;

            # 2 получаем необходимые значения
            $db=DB::getInstance();
            $result=[];

            // отладка sql запроса к БД
            #die(var_dump($itemsQuery.$suffix));



            $result['items']=$db->query($itemsQuery.$suffix)->fetch_all(MYSQLI_ASSOC);
            $count=$db->query($countQuery)->fetch_assoc();
            #echo "<pre>";
            #die(print_r($db->query("SELECT * FROM quest
            #WHERE quest_status=1 AND quest_activation_status=1")->fetch_all()));
            $maxPages=ceil($count['count']/$limit);
            $result['count']=$count;
            $result['maxPages']=$maxPages;

            return $result;

        }


    /**
     * @param $currentPage
     * @param $maxPageSize
     * @return array
     * =====================================================================================================
     * Метод, возвращает массив со страницами для их дальнейшей отрисовки
     * =====================================================================================================
     */
        public static  function getButtons($currentPage,$maxPageSize)
        {


            // страницы пагинации
            $pageList=[];
            /**
             * Логика пагинации
             */
            if($maxPageSize<5)
            {
                for ($i=$maxPageSize;$i>0;$i--)
                {
                    $pageList['list'][]=$i;
                }
            }
            else
            {
                if($currentPage<=3)
                {
                    $pageList['list']=[1,2,3,4];
                    $pageList['list'][]=$maxPageSize;
                }
                elseif($currentPage>3 && $currentPage<$maxPageSize-2 )
                {   $pageList['list'][]=1;
                    for ($i=$currentPage-2;$i<=$currentPage;$i++)
                    {
                        $pageList['list'][]=$i;
                    }
                    $pageList['list'][]=$currentPage+1;
                    $pageList['list'][]=$maxPageSize;
                }
                else
                {
                    $pageList['list'][]=1;
                    $pageList['list'][]=$maxPageSize-3;
                    $pageList['list'][]=$maxPageSize-2;
                    $pageList['list'][]=$maxPageSize-1;
                    $pageList['list'][]=$maxPageSize;
                }
            }
            return $pageList;
        }






}