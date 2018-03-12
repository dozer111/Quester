<?php
/* Smarty version 3.1.30, created on 2018-03-12 19:44:09
  from "C:\xampp\htdocs\views\main\activate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa6ca79c84695_53649713',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c44c113e314623db21d0722a764fa1bede8f6c0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\views\\main\\activate.tpl',
      1 => 1520880048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aa6ca79c84695_53649713 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15119706785aa6ca79c82a82_04931460', "body");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "body"} */
class Block_15119706785aa6ca79c82a82_04931460 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>
        <?php if ($_smarty_tpl->tpl_vars['activationStatus']->value == true && !$_smarty_tpl->tpl_vars['type']->value) {?>
        Ваше задание прошло активацию, ожидайте подтверждение от модератора
        <?php } elseif (!$_smarty_tpl->tpl_vars['type']->value && !'activationStatus') {?>
            Ваше задание не активировано, напишите модератору для
            решения проблемы
         <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == true) {?>
            Ваша учетная запись успешно активирована
            <?php } else { ?>
            Возникли непредвиденные проблемы при активации вашей учетной записи.
            Обратитесь к модераторам для решения проблемы
        <?php }?>
    </h1>
<?php
}
}
/* {/block "body"} */
}
