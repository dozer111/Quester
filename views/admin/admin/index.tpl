{extends file="../../layout.tpl"}
{block name='head'}
    <script src="/../web/js/admin.js"></script>
    <script src="/../web/js/upload.js"></script>
{/block}
{block name=body}

    <div class="quest_wrapper">



        {*
        ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Popup блок для редактирования задания
        ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        *}
        <div class="popup">
            <div class="popup_bg"></div>
            <div class="form">
                <form enctype="multipart/form-data" method="POST" id="adminForm">
                    <input type="text" name="title" id="admin_redact_title">
                    <textarea name="text" id="admin_redact_text"></textarea>
                    <img src="" alt="" class="form_picture" id="admin_redact_picture">
                    <input type="file" name="file" value="">
                    <input type="hidden" name="id" value="" id="forAdminId">
                    <input type="hidden" name="status" value="2" id="forAdminStatus">
                    <input type="hidden" name="userID" id="forAdminUserId">
                    <button type="submit" class="btn btn-success btn-75">Изменить и отправить</button>
                </form>
            </div>
        </div>



        <div class="quest_container">
            {*
            ==================================================================================
            Если на данной странице ввобще есть в наличии хоть какие-то новости, то выводим их
            ==================================================================================
            *}
            {if (!empty($getQuests['items']))}
                {foreach $getQuests['items'] as $key=>$item}
                    <div class="quest_element">
                        {if !empty($item['quest_picture'])}
                            <img id="img{$item['id']}" class="quest_picture_short" src="../../../web/img/{$item['quest_picture']}" alt="{$item['quest_title']}">
                        {/if}
                        <a id="title{$item['id']}" href="/admin/admin/show/{$item['id']}">{$item['quest_title']}</a>
                        <h2 >{$item['quest_email']}</h2>
                        <h3 >{$item['user_login']}</h3>
                        <p  id="userID{$item['id']}"> {$item['quest_author']}</p>
                        <p id="text{$item['id']}">{$item['quest_text']}</p>
                        <div class="quest_admin_btn">
                            <button  value="{$item['id']}" class="btn btn-success btn-admin btn-100">Одобрить</button>
                            <button   value="{$item['id']}" class="btn btn-warning btn-admin btn-50">Редактировать</button>
                            <button value="{$item['id']}" class="btn btn-danger btn-admin btn-0">Не принять</button>
                        </div>
                    </div>
                {/foreach}

                {* Тут лучше или обработчик, или редиррект, если успею до дедлайна, поменяю*}
            {else}
                <h1>На данной странице невостей нет. Перейдите пока на другую</h1>
                <div class="beforeMega"><a href="/"><button class="megaButton">Домой</button></a></div>
            {/if}
        </div>



        <div class="pagination_container ">
            <ul class="pagination_main">
                {if ($page<3)}
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/1">1</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/2">2</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/3">3</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/7">..</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/{$getQuests['maxPages']}">
                            {$getQuests['maxPages']}</a></li>
                {elseif ($page<=$getQuests['maxPages']-3)}
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/{$page-1}">{$page-1}</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/{$page}">{$page}</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/{$page+1}">{$page+1}</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/{$page+3}">..</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/{$getQuests['maxPages']}">
                            {$getQuests['maxPages']}</a></li>
                {else}
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/1">1</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/{$page-3}">...</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/{$getQuests['maxPages']-2}">{$getQuests['maxPages']-2}</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/{$getQuests['maxPages']-1}">{$getQuests['maxPages']-1}</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/{$getQuests['maxPages']}">
                            {$getQuests['maxPages']}</a></li>
                {/if}
            </ul>
        </div>

    </div>
{/block}