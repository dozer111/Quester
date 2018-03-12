<?php
/* Smarty version 3.1.30, created on 2018-03-08 22:45:50
  from "C:\xampp\htdocs\views\quest\show.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa1af0e395203_16371249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8966e1a6c6a55cc53fb74e9305f64ebf0bcb9d02' => 
    array (
      0 => 'C:\\xampp\\htdocs\\views\\quest\\show.tpl',
      1 => 1520545549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aa1af0e395203_16371249 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10772935285aa1af0e3940d1_37619348', "body");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "body"} */
class Block_10772935285aa1af0e3940d1_37619348 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="quest_wrapper">
        <?php if ((!empty($_smarty_tpl->tpl_vars['quest']->value['quest_picture']))) {?>
            <img class="quest_picture" src="../../web/img/<?php echo $_smarty_tpl->tpl_vars['quest']->value['quest_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['quest']->value['quest_title'];?>
">
        <?php }?>
        <h1><?php echo $_smarty_tpl->tpl_vars['quest']->value['quest_title'];?>
</h1>
        <p><?php echo $_smarty_tpl->tpl_vars['quest']->value['quest_text'];?>
</p>

        <h3>
            <?php echo $_smarty_tpl->tpl_vars['quest']->value['login'];?>

            <?php if (($_smarty_tpl->tpl_vars['quest']->value['quest_author'] == 0)) {?>
                <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['quest']) ? $_smarty_tpl->tpl_vars['quest']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['login'] = 'guest';
$_smarty_tpl->_assignInScope('quest', $_tmp_array);
?>
                <?php echo $_smarty_tpl->tpl_vars['quest']->value['login'];?>

            <?php }?>

            <br>
        <?php echo $_smarty_tpl->tpl_vars['quest']->value['quest_email'];?>

        </h3>

    </div>
    <?php $_smarty_debug = new Smarty_Internal_Debug;
 $_smarty_debug->display_debug($_smarty_tpl);
unset($_smarty_debug);
}
}
/* {/block "body"} */
}
