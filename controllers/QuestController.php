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

        if($_POST['filter1']=='false' && $_POST['filter2']=='false' && $_POST['filter3']=='false') {
            $requestArray=['where'=>'quest_activation_status=1'];
            $quests = Pagination::getItemsWithDeepPagination('quest', $page,$requestArray,'DESC',4);
            $quests['pages']=Pagination::getButtons($page,$quests['maxPages']);
            $quests['currentPage']=$page;
            echo json_encode($quests);
        }
        # делаем выборку по фильру @mail
        elseif($_POST['filter1']!='false')
        {
            $test=trim($_POST['filter1']);
            $requestArray=['where'=>"quest_email='".$test."'"];
            $requestArray['andWhere']=['quest_activation_status=1'];

            $quests=Pagination::getItemsWithDeepPagination('quest',$page,$requestArray,'DESC',4);
            $quests['pages']=Pagination::getButtons($page,$quests['maxPages']);
            $quests['currentPage']=$page;
            echo json_encode($quests);
        }


        elseif ($_POST['filter2']!='false')
        {
            $requestArray=['where'=>"quest_author='".$_POST['filter2']."'"];
            $quests=Pagination::getItemsWithDeepPagination('quest',$page,$requestArray,'DESC',4);
            $quests['pages']=Pagination::getButtons($page,$quests['maxPages']);
            $quests['currentPage']=$page;
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