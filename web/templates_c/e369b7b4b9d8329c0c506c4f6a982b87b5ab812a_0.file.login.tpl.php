<?php
/* Smarty version 3.1.30, created on 2018-03-15 15:57:53
  from "F:\xampp\htdocs\views\auth\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aaa89f169eea7_01446347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e369b7b4b9d8329c0c506c4f6a982b87b5ab812a' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\auth\\login.tpl',
      1 => 1521025915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aaa89f169eea7_01446347 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12570402985aaa89f169e701_60582986', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} */
class Block_12570402985aaa89f169e701_60582986 extends Smarty_Internal_Block
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
