<?php
/* Smarty version 3.1.30, created on 2018-03-08 16:20:43
  from "C:\xampp\htdocs\views\auth\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa154cb4217e6_06347162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f178e2024adde334ef043406ac17ce1f6c6dbc83' => 
    array (
      0 => 'C:\\xampp\\htdocs\\views\\auth\\login.tpl',
      1 => 1520522442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aa154cb4217e6_06347162 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9830313775aa154cb4208b0_09788981', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} */
class Block_9830313775aa154cb4208b0_09788981 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form action="/auth/login" method="POST">
        <input type="text" name="login"><br>
        <input type="password" autocomplete="new-password" name="password"><br>
        <a href="/auth/login"><button class="btn btn-success" >Login</button></a>
    </form>
<?php
}
}
/* {/block 'body'} */
}
