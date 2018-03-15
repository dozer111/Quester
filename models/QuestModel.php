<?php
namespace models;
use components\DB;
use components\Pagination;

class QuestModel
{
    const QUEST_LIMIT=4;


    /**
     * @param $title
     * @param $text
     * @param $picture
     * @param $email
     * @param int $author
     * @return bool
     * =========================================================================================
     * Создание неактивной
     *                      Задачи, если автор активирован/неактивирован(или гость)
     *          активной
     *
     *
     * работает в паре с $this->activateQuest(){}
     * =========================================================================================
     */
    public function createQuest($title,$text,$picture,$email,$author,$hash)
    {
        $db=DB::getInstance();
        # hash-код для дальнейшей активации задания, если $author=0

        // строка запроса, если польователь -- гость
        $inactiveUserQuery="INSERT INTO `quest` (`quest_title`,`quest_text`,
        `quest_picture`,`quest_email`,
            `quest_author`,`quest_activation_code`) VALUES('".$title."','".$text."','".$picture."',
        '".$email."', '".$author."','".$hash."')";


        // строка запроса, если пользователь -- зарегистрированный
        $activeUserQuery="INSERT INTO `quest` 
        (`quest_title`,`quest_text`,`quest_picture`,`quest_email`,
        `quest_author`,`quest_activation_status`) 
        VALUES('".$title."','".$text."','".$picture."',
        '".$email."', ".$author.", 1 )";

        $query=($author==0)?$inactiveUserQuery:$activeUserQuery;



        return (bool)$db->query($query);
    }

    /**
     * @param $id
     * @return bool|\mysqli_result
     * ====================================================================================
     * Активация задания через MainController -> actionIndex ->actionCreate
     * ====================================================================================
     */
    public function activateQuest($hash)
    {
        $db=DB::getInstance();
        $getIdFromHash="SELECT `quest`.`id` FROM `quest` WHERE `quest_activation_code`='".$hash."' LIMIT 1";
        $select=$db->query($getIdFromHash)->fetch_assoc();
        if($select!=null)
        $query="UPDATE `quest` SET `quest_activation_status`=1 WHERE `id`=".$select['id'];
        return (bool)$db->query($query);
    }

    public function deleteQuest(){}

    /**
     * @param $id
     * @return array
     * =======================================================
     * Метод для отображения одной записи
     * =======================================================
     *
     */
    public function getQuestById($id)
    {
        $db=DB::getInstance();
        $query='SELECT `quest`.*,`user`.`user_login` as login 
        FROM `quest` 
        LEFT JOIN `user`
        ON `quest`.`quest_author`=`user`.`id`
        WHERE `quest`.`id`='.$id." LIMIT 1";


        return $quest=$db->query($query)->fetch_assoc();
    }

    /**
     * @param int $page
     * @return array
     * ====================================================================================
     * Метод, который возвращает одобренные задания
     * Используется для главного списка заданий в questController --> actionIndex
     * ====================================================================================
     */
    public function getAllQuests($page=1)
    {
        $params=['where'=>'quest_activation_status=1'];
        $params['leftJoin']=['colums'=>['`user`.`user_login`'],'table'=>'user',
            'on'=>'`quest`.`quest_author`=`user`.`id`'];
        return $quests=Pagination::getItemsWithDeepPagination
        ('quest',$page,$params,'DESC',self::QUEST_LIMIT);

    }

    /**
     * ==================================================================================
     * Метод для админки, возвращает все записи, которые прошли авторизацию
     * НО не поверенные админом
     * ==================================================================================
     */
    public function getAllInactiveQuests($page)
    {


        # 1) получаем все новости, которые прошли авторизацию, но ещё не одобрены
        $requestArray=[];
        $requestArray['where']='quest_activation_status =1';
        $requestArray['andWhere']=['quest_status = 0'];
        $requestArray['leftJoin']=['colums'=>['`user`.`user_login`'],'table'=>'user',
            'on'=>'`quest`.`quest_author`=`user`.`id`'];
        $getQuests=Pagination::getItemsWithDeepPagination
            ('quest',$page,$requestArray,'DESC',self::QUEST_LIMIT);
        return $getQuests;
    }

    /**
     * @param $userId
     * @param bool $type ==> переменная, которая в дальнейшем планируется для установки фильтра(например 1== админ подтвердил
     * 2 == админ отредактировал и подтвердил 3 == админ отказал, false == все записи вместе)
     * @return array
     * ================================================================================================================
     * Метод для userController --> actionIndex()
     * Возвращает список абсолютно всех записей для данного пользователя, которые он лично создавал
     * ================================================================================================================
     */
    public function getQuestListByUser($userId,$page,$type=false)
    {
        $paramsList=['where'=>'quest_author='.$userId];
        $questList=Pagination::getItemsWithDeepPagination('quest',$page,$paramsList,'DESC',5);

        return $questList;

    }











//=============================================================================================================
// Update методов 2:
// updateQuest == предназначен для изменения задания со стороны пользователя
// answerQuest == изменения записи задания со стороны администратора
//==============================================================================================================

    public function updateQuest(){}

    /**
     * @param $id
     * @param $status == ответ модератора
                1:подтвердить
                2:внесены изменения
                3: не подтверждено
     * @param array $change == массив, который используется, если у нас ответ 2, и нужно
     показать, что именно изменено
     Имеет 2 значения
     'title' ==> если был изменен заголовок
     'text' ==> если был изменен текст
     'image' ==> если поменяли картинку
     * @return string
     * ======================================================================================
     *
     * ======================================================================================
     */
    public function answerQuest($id,$status,array $change=[])
    {
        #1 получаем запись
        $quest=$this->getQuestById($id);

        //2 меняем статус
        $quest['quest_status']=$status;


        //3 если нужно, меняем некоторые значения
        if($quest['quest_status']==2)
        {
            $quest['quest_title']=(isset($change['title']))?$change['title']:$quest['quest_title'];
            $quest['quest_text']=(isset($change['text']))?$change['text']:$quest['quest_text'];
            $quest['quest_picture']=(isset($change['image']))?$change['image']:$quest['quest_picture'];

        }

        // 4  делаем сам запрос
        $update='UPDATE `quest` SET ';
        foreach ($quest as $key => $value)
        {
            if($key!='id' && $key !='login') $update.=" `".$key."`='".$value."', ";
        }
        $update=rtrim($update,', ');
        $update.=' WHERE `id`='.$quest['id'];
        $db=DB::getInstance();

        return (bool)$db->query($update);
    }


    public function getFilterQuests(array $params=[])
    {
        /**
         * Пример реализации массива
         * $params[fields]=[date,dozer111,test@test.test];
         */
        $result=[];


    }




}