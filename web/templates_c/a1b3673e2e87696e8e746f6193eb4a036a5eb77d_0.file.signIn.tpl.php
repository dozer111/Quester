<?php
/* Smarty version 3.1.30, created on 2018-03-15 15:57:51
  from "F:\xampp\htdocs\views\auth\signIn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aaa89ef066156_53441368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1b3673e2e87696e8e746f6193eb4a036a5eb77d' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\auth\\signIn.tpl',
      1 => 1521025915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aaa89ef066156_53441368 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5695623165aaa89ef064815_04894088', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} */
class Block_5695623165aaa89ef064815_04894088 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form action="/auth/signIn" method="POST" id="signInForm">
        <input type="text" name="login" minlength="5" maxlength="24" id="signInLogin" ><br>
        <input type="email" name="email" minlength="7" maxlength="24" id="signInEmail" autocomplete="off"><br>
        <input type="password" name="password" autocomplete="new-password" minlength="5" maxlength="24" id="signInPassword"><br>

        <a href="/main" id="sing"> <button class="btn btn-success" id="signInS">Test </button></a>
    </form>
    <div id="result"></div>
<?php
}
}
/* {/block 'body'} */
}
