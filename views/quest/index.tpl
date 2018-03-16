{extends file="../layout.tpl"}
{block name="head"}
    <script src="/../web/js/questChange.js"></script>

{/block}
{block name=body}
 <div class="quest_wrapper">


{*
============================================================================================
Блок, в котором размещаются фильтры новостей
============================================================================================
*}

<div class="quest_filter">
        <ul class="quest__filter_ul">
            <li><button class="btn btn-primary filter_date_desc" >С конца</button></li>
            <li><button class="btn btn-primary filter_date_asc" >С начала</button></li>

        </ul>


</div>











<div class="quest_container">

{*
==================================================================================
Если на данной странице ввобще есть в наличии хоть какие-то новости, то выводим их
==================================================================================
*}


        <div class="quest_element">


        </div>


    {* Тут лучше или обработчик, или редиррект, если успею до дедлайна, поменяю*}
{*

    <h1>На данной странице невостей нет. Перейдите пока на другую</h1>
    <div class="beforeMega"><a href="/"><button class="megaButton">Домой</button></a></div>
*}



</div>



    <div class="pagination_container ">
        <ul class="pagination_main">
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/1">1</a></li>
        </ul>
    </div>
<div class="pagination_link_a"></div>
 </div>
    <div class="page_number" ttt="1">no</div>
    {*
    <pre>
    <div class="test">

    </div>
*}{/block}