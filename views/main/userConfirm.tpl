{extends file='../letterLayout.tpl'}
{block name='text'}
    <h1 style="font-size: 40px;" align="center">Активация пользователя</h1>
    <p style="font-size: 30px;">Дорогой пользователь, активируйте свой профиль<br>
    Для подтверждения профиля, и активации, перейдите по этой ссылке: <br>

        <a style="horiz-align:center;font-size: 50px; color:red" href="http://localhost/main/useractivate/{$hash}" >Активация</a>

    </p>

{/block}