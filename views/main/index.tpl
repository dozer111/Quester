{extends file='../layout.tpl'}
{block name='head'}
    <script src="../web/js/upload.js"></script>
{/block}
{block name=body}
    <form id="questForm" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" required>
        <input type="text" name="text" required>
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