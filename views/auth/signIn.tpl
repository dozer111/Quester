{extends file='../layout.tpl'}
{block name=body}
    <form action="/auth/signIn" method="POST" id="signInForm">
        <input type="text" name="login" minlength="5" maxlength="24" id="signInLogin" ><br>
        <input type="email" name="email" minlength="7" maxlength="24" id="signInEmail" autocomplete="off"><br>
        <input type="password" name="password" autocomplete="new-password" minlength="5" maxlength="24" id="signInPassword"><br>

        <a href="/main" id="sing"> <button class="btn btn-success" id="signInS">Test </button></a>
    </form>
    <div id="result"></div>
{/block}