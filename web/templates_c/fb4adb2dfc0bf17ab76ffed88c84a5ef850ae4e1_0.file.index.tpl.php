<?php
/* Smarty version 3.1.30, created on 2018-03-09 16:57:26
  from "C:\xampp\htdocs\views\main\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa2aee67bfa55_54826792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb4adb2dfc0bf17ab76ffed88c84a5ef850ae4e1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\views\\main\\index.tpl',
      1 => 1520610737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aa2aee67bfa55_54826792 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8738253795aa2aee6798404_13682082', 'head');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4580586125aa2aee67be090_77096564', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'} */
class Block_8738253795aa2aee6798404_13682082 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="../web/js/upload.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_4580586125aa2aee67be090_77096564 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form id="questForm" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" required>
        <input type="text" name="text" required>
        <input type="file" name="file" id="quest_file" >
        <?php if (isset($_SESSION['user'])) {?>
            <input type="text" hidden name="userLogin" value="<?php echo $_SESSION['user']['id'];?>
">
            <?php } else { ?>
            <input type="text" hidden name="userLogin" value="0">
            <input type="email" name="userData" >
        <?php }?>
        <input type="submit">
    </form>
    <div class="quest_status"></div>
<?php
}
}
/* {/block 'body'} */
}
