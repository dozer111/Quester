<?php
/* Smarty version 3.1.30, created on 2018-03-16 13:45:14
  from "F:\xampp\htdocs\views\quest\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aabbc5aae77b6_18044240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de815d26e459162243795360bb57a6355e64f7ed' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\quest\\index.tpl',
      1 => 1521204314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aabbc5aae77b6_18044240 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8818079655aabbc5aae5779_99553608', "head");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_249581485aabbc5aae7140_53238708', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "head"} */
class Block_8818079655aabbc5aae5779_99553608 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="/../web/js/questChange.js"><?php echo '</script'; ?>
>

<?php
}
}
/* {/block "head"} */
/* {block 'body'} */
class Block_249581485aabbc5aae7140_53238708 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

 <div class="quest_wrapper">




<div class="quest_filter">
        <ul class="quest__filter_ul">
            <li><button class="btn btn-primary filter_date_desc" >С конца</button></li>
            <li><button class="btn btn-primary filter_date_asc" >С начала</button></li>

        </ul>


</div>











<div class="quest_container">




        <div class="quest_element">


        </div>


    




</div>



    <div class="pagination_container ">
        <ul class="pagination_main">
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/1">1</a></li>
        </ul>
    </div>
<div class="pagination_link_a"></div>
 </div>
    <div class="page_number" ttt="1">no</div>
    <?php
}
}
/* {/block 'body'} */
}
