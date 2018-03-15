<?php
/* Smarty version 3.1.30, created on 2018-03-15 15:49:38
  from "F:\xampp\htdocs\views\main\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aaa8802abd8e3_75787779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76d31a52e915be8e5224ca04fcc1aacb58d4f06f' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\main\\index.tpl',
      1 => 1521114798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aaa8802abd8e3_75787779 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3223340275aaa8802935c12_86095098', 'head');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11264912755aaa8802ab82b3_30821293', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'} */
class Block_3223340275aaa8802935c12_86095098 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="../web/js/upload.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="../web/markitup/jquery.markitup.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="../web/markitup/sets/default/set.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" type="text/css" href="../web/markitup/skins/markitup/style.css" />
    <link rel="stylesheet" type="text/css" href="../web/markitup/sets/default/style.css" />
<?php
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_11264912755aaa8802ab82b3_30821293 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript" >
        $(document).ready(function() {
            $("textarea").markItUp(mySettings);
        });
    <?php echo '</script'; ?>
>

    <form id="questForm" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" required>
        <textarea name="text"></textarea>
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
