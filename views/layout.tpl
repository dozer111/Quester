<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/../web/css/style.css">
    <script  src="/../web/js/script.js"></script>
    {block name='head'}{/block}
</head>
<body>
<div class="wrapper">

    <div class="nav">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">

                    {*
                    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                      Блок для переключения вкладок для авторизированных/неавторизированных
                      пользователей
                    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                    *}
                    {if !isset($smarty.session.user)}
                        <li><a href="/auth/signIn">Sign In</a></li>
                    <li><a href="/auth/login">Login</a></li>
                    {else}

                        <li><a href="/user/index">{$smarty.session.user['user_login']}</a></li>
                        <li><a href="/auth/logout">Exit</a></li>
                        {*
                        ***********************************************************************
                            Админка
                        ***********************************************************************
                        *}
                        {if $smarty.session.user['user_status']==1}
                            <li><a href="/admin">Admin</a></li>
                        {/if}
                    {/if}
                    <li><a href="/quest/index">News</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="content">
        {block name=body}{/block}
    </div>

    <div class="footer">
        {block name=footer}{/block}
    </div>


</div>

</body>
</html>