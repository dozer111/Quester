{extends file='../layout.tpl'}
{block name="body"}
    <div class="inside">

    {*
    ===================================================================================================================
                                   Левая часть странички юзера
    ===================================================================================================================
    *}
    <div class="user__part_left">
        <img src="../../web/img/{$smarty.session.user['user_avatar']}" alt="{$smarty.session.user['user_login']}" class="user__avatar">
        <div class="user__preUserName">
        <h2 class="user__userName">{$smarty.session.user['user_login']}</h2>
        </div>

    </div>



     {*
     ===================================================================================================================
                                    Задания пользователя
     ===================================================================================================================
     *}
        {debug}
    <div class="user__part_right">
        {foreach $userQuestList['items'] as $soloQuest}

            <div class="user__quest_item">
                <div class="user__quest_item_left">
                <img src="../../web/img/{$soloQuest['quest_picture']}" alt="{$soloQuest['quest_title']}" class="user__quest_item_image">
                <a href="/quest/show/{$soloQuest['id']}" class="user__quest_item_title">{$soloQuest["quest_title"]}</a>
                <p class="user__quest_item_text">{$soloQuest['quest_text']}</p>

                {*
                --------------------------------------------------------------------------------------------------------
                                        Правый блок для отображения текущего статуса задания
                --------------------------------------------------------------------------------------------------------
                *}
                </div>
                <div class="user__quest_item_status_container">
                   {$imageName=''}
                  {if $soloQuest['quest_status']=='0'}{$imageName='statusWait.png'}
                      {elseif $soloQuest['quest_status']=='1'}{$imageName='statusOk.png'}
                      {elseif $soloQuest['quest_status']=='2'}{$imageName='statusChanged.png'}
                      {elseif $soloQuest['quest_status']=='3'}{$imageName='statusNo.png'}
                      {else} {$imageName='statusWait.png'}
                  {/if}
                    <img src="../../web/img/quest_status/{$imageName}" alt="" class="user__quest_item_status_picture">
                </div>

            </div>
        {/foreach}


        {*
        ===================================================================================================================
                                        Пагинация на страничке
        ===================================================================================================================
        *}
        <div class="user__pagination">
            <ul class="pagination_main_user">


                {$countOfPaginationButtnos=count($userQuestList['pageList']['list'])}
                {for $i=0 to $countOfPaginationButtnos-1}
                    {$pageNumber=$userQuestList['pageList']['list'][{$i}]}
                    {if $pageNumber==$userQuestList['currentPage']}
                        <a href="/user/index/{$pageNumber}"><button  class="pagination_link pagination_button_active" id="{$pageNumber}"> {$pageNumber} </button></a>
                    {else}
                        <a href="/user/index/{$pageNumber}">  <button  class="pagination_link" id="{$pageNumber}"> {$pageNumber} </button></a>
                    {/if}

                {/for}
            </ul>
        </div>
    </div>



    </div>
{/block}