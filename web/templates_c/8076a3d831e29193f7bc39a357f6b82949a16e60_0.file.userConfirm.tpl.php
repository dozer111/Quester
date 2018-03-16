<?php
/* Smarty version 3.1.30, created on 2018-03-16 16:22:28
  from "F:\xampp\htdocs\views\main\userConfirm.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aabe134184e87_80357130',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8076a3d831e29193f7bc39a357f6b82949a16e60' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\main\\userConfirm.tpl',
      1 => 1521025915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../letterLayout.tpl' => 1,
  ),
),false)) {
function content_5aabe134184e87_80357130 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14556408025aabe1341847e5_97342086', 'text');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../letterLayout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'text'} */
class Block_14556408025aabe1341847e5_97342086 extends Smarty_Internal_Block
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
