{extends file='../letterLayout.tpl'}
{block name="text"}
    <h1 style="font-size: 40px;" align="center">Активация задания</h1>
    <p style="font-size: 30px;">Дорогой пользователь, Вы сделали заявку на регистрацию задания <br>
        Для активации задания перейдите по этой ссылке: <br>

        <a style="horiz-align:center;font-size: 50px; color:red"
           href="http://localhost/main/questactivate/{$hash}" >Активация</a>

    </p>

{/block}