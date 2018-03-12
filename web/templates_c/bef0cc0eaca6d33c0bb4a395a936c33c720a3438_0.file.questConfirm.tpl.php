<?php
/* Smarty version 3.1.30, created on 2018-03-12 19:13:16
  from "C:\xampp\htdocs\views\main\questConfirm.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa6c33c01e723_48879740',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bef0cc0eaca6d33c0bb4a395a936c33c720a3438' => 
    array (
      0 => 'C:\\xampp\\htdocs\\views\\main\\questConfirm.tpl',
      1 => 1520877453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../letterLayout.tpl' => 1,
  ),
),false)) {
function content_5aa6c33c01e723_48879740 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17693558925aa6c33c01c0c4_41185234', "text");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../letterLayout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "text"} */
class Block_17693558925aa6c33c01c0c4_41185234 extends Smarty_Internal_Block
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
