<?php
/* Smarty version 3.1.30, created on 2018-03-12 19:43:37
  from "C:\xampp\htdocs\views\main\userConfirm.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa6ca5931b8d6_57308107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ae664e1c27b020269e8b63c9589c9913cba578b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\views\\main\\userConfirm.tpl',
      1 => 1520879967,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../letterLayout.tpl' => 1,
  ),
),false)) {
function content_5aa6ca5931b8d6_57308107 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7421522465aa6ca5931a9a4_53523584', 'text');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../letterLayout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'text'} */
class Block_7421522465aa6ca5931a9a4_53523584 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1 style="font-size: 40px;" align="center">Активация пользователя</h1>
    <p style="font-size: 30px;">Дорогой пользователь, активируйте свой профиль<br>
    Для подтверждения профиля, и активации, перейдите по этой ссылке: <br>

        <a style="horiz-align:center;font-size: 50px; color:red" href="http://localhost/main/useractivate/<?php echo $_smarty_tpl->tpl_vars['hash']->value;?>
" >Активация</a>

    </p>

<?php
}
}
/* {/block 'text'} */
}
