<?php
/* Smarty version 3.1.30, created on 2018-03-14 12:14:12
  from "F:\xampp\htdocs\views\main\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa90404110dd3_97020548',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76d31a52e915be8e5224ca04fcc1aacb58d4f06f' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\main\\index.tpl',
      1 => 1521025915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aa90404110dd3_97020548 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20328617405aa90403e7de07_19993828', 'head');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11268605655aa9040408d685_58697807', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'} */
class Block_20328617405aa90403e7de07_19993828 extends Smarty_Internal_Block
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
class Block_11268605655aa9040408d685_58697807 extends Smarty_Internal_Block
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
