{extends file='../layout.tpl'}
{block name=body}
    <form action="/auth/login" method="POST">
        <input type="text" name="login"><br>
        <input type="password" autocomplete="new-password" name="password"><br>
        <a href="/auth/login"><button class="btn btn-success" >Login</button></a>
    </form>
{/block}