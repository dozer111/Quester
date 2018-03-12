{extends file='../layout.tpl'}
{block name="body"}
    <pre>
    {var_dump($smarty.session.user)}
    </pre>

{/block}