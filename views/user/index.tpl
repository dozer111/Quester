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
        {foreach $userQuestList as $soloQuest}
            <div class="user__quest_item">
                <img src="../../web/img/{$soloQuest['quest_picture']}" alt="{$soloQuest['quest_title']}" class="user__quest_item_image">
                <h2 class="user__quest_item_title">{$soloQuest["quest_title"]}</h2>
                <p class="user__quest_item_text">{$soloQuest['quest_text']}</p>

                {*
                --------------------------------------------------------------------------------------------------------
                                        Правый блок для отображения текущего статуса задания
                --------------------------------------------------------------------------------------------------------
                *}
                <div class="user__quest_item_status_container">
                   {$imageName=''}
                    {switch $soloQuest['quest_status']}
                    {case '0'}
                        {$imageName='statusWait.png'}
                    {/case}
                    {case '1'}
                        {$imageName='statusOk.png'}
                    {/case}
                    {case '2'}
                        {$imageName='statusChanged.png'}
                    {/case}
                    {case '3'}
                        {$imageName='statusNo.png'}
                    {/case}
                    {default}
                        {$imageName='statusWait.png'}
                    {/switch}
                </div>
                <img src="../../web/img/quest_status/{$imageName}" alt="" class="user__quest_item_image">
            </div>
        {/foreach}
    </div>

    {*
    ===================================================================================================================
                                    Пагинация на страничке
    ===================================================================================================================
    *}
    <div class="user__pagination">

    </div>

    </div>
{/block}