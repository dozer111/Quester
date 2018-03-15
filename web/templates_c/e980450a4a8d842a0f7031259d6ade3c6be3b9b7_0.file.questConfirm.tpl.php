<?php
/* Smarty version 3.1.30, created on 2018-03-15 12:10:37
  from "F:\xampp\htdocs\views\main\questConfirm.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aaa54ad934509_09327969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e980450a4a8d842a0f7031259d6ade3c6be3b9b7' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\main\\questConfirm.tpl',
      1 => 1521025915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../letterLayout.tpl' => 1,
  ),
),false)) {
function content_5aaa54ad934509_09327969 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9984285255aaa54ad9334e5_86987027', "text");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../letterLayout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "text"} */
class Block_9984285255aaa54ad9334e5_86987027 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1 style="font-size: 40px;" align="center">Активация задания</h1>
    <p style="font-size: 30px;">Дорогой пользователь, Вы сделали заявку на регистрацию задания <br>
        Для активации задания перейдите по этой ссылке: <br>

        <a style="horiz-align:center;font-size: 50px; color:red"
           href="http://localhost/main/questactivate/<?php echo $_smarty_tpl->tpl_vars['hash']->value;?>
" >Активация</a>

    </p>

<?php
}
}
/* {/block "text"} */
}
