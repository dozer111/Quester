<?php
namespace controllers;
use components\Pagination;
use models\QuestModel;

class QuestController extends CoreController
{

    /**
     * ========================================================
     * Показать все новости с пагинацией
     * ========================================================
     */
    public function actionIndex()
    {
        # 1) узнаем текущую страничку
        $requestPage=(isset($this->getParams()[0]))?$this->getParams()[0]:1;
        $page=($number=intval($requestPage))?$number:1;

        # 2) берем новости для текущей странички (при условии, что никаких фильтров не задано)
        $questModel=new QuestModel();
        $news=$questModel->getAllQuests($page);

        # 2.1 берем задания, в которых присутствует фильтр
        /**
         * Виды фильтров
         * date ==> ASC/DESC
         * userName ==> DESC
         * @mail ==> DESC
         * Status ==> DESC
         */






        # 3) выводим новости (в $news уже есть максимальное к-во страниц)
        return $this->getSmarty()
                    ->display('quest/index.tpl',compact('news','page'));

    }


    /**
     * Метод, который идёт чисто для AJAX загрузки фильтрованных данных
     *
     */
    public function actionGetfilterdata()
    {
        $page=$_POST['page'];
        # если на вход пришла только страница
        /**
         * =========================================================================================================
         * =========================================================================================================
         *                              Важно:
         * Сортировка имеет 3 параметра:
         * filter1 ==> сортировка по емаилу
         * filter2 ==> сортировка по пользователю
         * filter3 ==> сортировка по дате !!!!!!!!!!!!!!!!!!!!!
         * Сортировка по дате может иметь такие значения (всего 5 вариантов)
         * -------------------------------|При получении данных с questChange.js эти 3 будут приняты как первичные
         * no                             |сортировка по всем записям
         * email                          |сортировка по значению выбранного email
         * id                             |сортировка по значению выбранного id пользователя
         * -------------------------------|
         * -------------------------------|Вторичные варианты сортировки, применяются как дополнение к 3 предыдущим
         * ASC                            |
         * DESC                           | Дальше в прим 1 будет длительная проверка на значение, потому что
         * -------------------------------| в метод getItemsWithDeepPagination должно передатся только корректное значение ордера
         * =========================================================================================================
         * =========================================================================================================
         */
        if($_POST['filter1']=='false' && $_POST['filter2']=='false' ) {
            $requestArray=['where'=>'quest_activation_status=1','leftJoin'=>['colums'=>['`user`.`user_login`'],'table'=>'user',
                'on'=>'`quest`.`quest_author`=`user`.`id`']];
           // прим 1
            if($_POST['filter3']!='false' && $_POST['filter3']!='email' && $_POST['filter3']!='id' )
                $quests = Pagination::getItemsWithDeepPagination('quest', $page,$requestArray,$_POST['filter3'],4);
            else $quests = Pagination::getItemsWithDeepPagination('quest', $page,$requestArray,'DESC',4);


            $quests['pages']=Pagination::getButtons($page,$quests['maxPages']);
            $quests['currentPage']=$page;
            $quests['currentFilter']='no';
            echo json_encode($quests);
        }
        # делаем выборку по фильру @mail
        elseif($_POST['filter1']!='false')
        {
            $test=trim($_POST['filter1']);
            $requestArray=['where'=>"quest_email='".$test."'"];
            $requestArray['andWhere']=['quest_activation_status=1'];

            if($_POST['filter3']!='false' && $_POST['filter3']!='email' && $_POST['filter3']!='id')
                $quests = Pagination::getItemsWithDeepPagination('quest', $page,$requestArray,$_POST['filter3'],4);
            else $quests = Pagination::getItemsWithDeepPagination('quest', $page,$requestArray,'DESC',4);


            $quests['pages']=Pagination::getButtons($page,$quests['maxPages']);
            $quests['currentPage']=$page;
            $quests['currentFilter']='email';
            echo json_encode($quests);
        }


        elseif ($_POST['filter2']!='false')
        {
            $requestArray=['where'=>"quest_author='".$_POST['filter2']."'"];
            if($_POST['filter3']!='false' && $_POST['filter3']!='email' && $_POST['filter3']!='id' )
                $quests = Pagination::getItemsWithDeepPagination('quest', $page,$requestArray,$_POST['filter3'],4);
            else $quests = Pagination::getItemsWithDeepPagination('quest', $page,$requestArray,'DESC',4);
            $quests['pages']=Pagination::getButtons($page,$quests['maxPages']);
            $quests['currentPage']=$page;
            $quests['currentFilter']='id';
            echo json_encode($quests);
        }

        else
            echo "DIE ERROR";

    }








    /**
     * =======================================================================
     * Показать одно задание
     * =======================================================================
     */
    public function actionShow()
    {
        $questModel=new QuestModel();
        # 1) получаем номер записи
        $id=$this->getParams()[0];

        # 2) получаем задание
        $quest=$questModel->getQuestById($id);

        return $this->getSmarty()->display('quest/show.tpl',compact('quest'));


    }


}