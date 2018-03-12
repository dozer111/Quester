<?php
/* Smarty version 3.1.30, created on 2018-03-12 17:34:55
  from "C:\xampp\htdocs\views\main\test.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa6ac2f6af260_59707191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34333db5d825b7e800883a0d72d344c0d79844db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\views\\main\\test.tpl',
      1 => 1520872493,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../letterLayout.tpl' => 1,
  ),
),false)) {
function content_5aa6ac2f6af260_59707191 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12713584425aa6ac2f6ae022_34818641', "text");
?>


<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../letterLayout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "text"} */
class Block_12713584425aa6ac2f6ae022_34818641 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1 align="center">User activation key</h1>
    <h1> hello user your id is ====== <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 </h1>
    <img width="400px" src="http://informat.in.ua/images/Paint.Paint_9B19/4_fraktal3608ab310dc594c738706a02f4962899f.jpg" alt="">
    <img  width="400px" src="http://localhost/../../web/img/2.jpg" alt="">

   
    <p style="color:red;font-size: 40px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid explicabo in inventore ipsam nesciunt omnis ratione sit!
        Ab alias enim eveniet nemo officiis possimus, provident sapiente soluta ullam. Consequuntur, soluta.</p>

<?php
}
}
/* {/block "text"} */
}
