{extends file='../layout.tpl'}
{block name='head'}
    <script src="../web/js/upload.js"></script>
    <script type="text/javascript" src="../web/markitup/jquery.markitup.js"></script>
    <script type="text/javascript" src="../web/markitup/sets/default/set.js"></script>
    <link rel="stylesheet" type="text/css" href="../web/markitup/skins/markitup/style.css" />
    <link rel="stylesheet" type="text/css" href="../web/markitup/sets/default/style.css" />
{/block}
{block name=body}
    <script type="text/javascript" >
        $(document).ready(function() {
            $("textarea").markItUp(mySettings);
        });
    </script>

    <form id="questForm" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" required>
        <textarea name="text"></textarea>
        <input type="file" name="file" id="quest_file" >
        {*
        |========================================================
        |Пробрасываем значение id юзера для активации задания,
        |или 0, если это был не зарегистрированный юзер
        |========================================================
        *}
        {if isset($smarty.session.user)}
            <input type="text" hidden name="userLogin" value="{$smarty.session.user['id']}">
            {else}
            <input type="text" hidden name="userLogin" value="0">
            <input type="email" name="userData" >
        {/if}
        <input type="submit">
    </form>
    <div class="quest_status"></div>
{/block}