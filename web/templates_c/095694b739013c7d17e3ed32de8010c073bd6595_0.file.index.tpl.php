<?php
/* Smarty version 3.1.30, created on 2018-03-15 17:15:02
  from "F:\xampp\htdocs\views\user\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aaa9c06c1ca69_12865750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '095694b739013c7d17e3ed32de8010c073bd6595' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\user\\index.tpl',
      1 => 1521130500,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aaa9c06c1ca69_12865750 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20006526905aaa9c06c1c0e5_69137248', "body");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "body"} */
class Block_20006526905aaa9c06c1c0e5_69137248 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="inside">

    
    <div class="user__part_left">
        <img src="../../web/img/<?php echo $_SESSION['user']['user_avatar'];?>
" alt="<?php echo $_SESSION['user']['user_login'];?>
" class="user__avatar">
        <div class="user__preUserName">
        <h2 class="user__userName"><?php echo $_SESSION['user']['user_login'];?>
</h2>
        </div>

    </div>



     
    <div class="user__part_right">

        <div class="user__quest_item">

        </div>
        
    </div>

    
    <div class="user__pagination">

    </div>

    </div>
<?php
}
}
/* {/block "body"} */
}
