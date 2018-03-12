<?php
namespace models;
use components\DB;
use components\Pagination;

class QuestModel
{
    const QUEST_LIMIT=4;




    public function createQuest($title,$text,$picture,$email,$author=0)
    {
        $db=DB::getInstance();
        $query="INSERT INTO `quest` (`quest_title`,`quest_text`,`quest_picture`,`quest_email`,
    `quest_author`) VALUES('".$title."','".$text."','".$picture."',
        '".$email."', '".$author."')";
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

    public function getAllQuests($page=1)
    {
        return $quests=Pagination::getItemsWithPagination
        ('quest',$page,'DESC',self::QUEST_LIMIT);

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


}