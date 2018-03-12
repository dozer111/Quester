<?php
/* Smarty version 3.1.30, created on 2018-03-12 21:47:36
  from "C:\xampp\htdocs\views\user\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa6e76832ae72_38394916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7578e0496afa5d05e3d1250c9a8fb80f1caaa2dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\views\\user\\index.tpl',
      1 => 1520887655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aa6e76832ae72_38394916 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7398436405aa6e7683296f2_98171590', "body");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "body"} */
class Block_7398436405aa6e7683296f2_98171590 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <pre>
    <?php echo var_dump($_SESSION['user']);?>

    </pre>

<?php
}
}
/* {/block "body"} */
}
