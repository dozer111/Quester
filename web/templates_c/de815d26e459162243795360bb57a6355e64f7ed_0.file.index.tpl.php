<?php
/* Smarty version 3.1.30, created on 2018-03-15 11:23:01
  from "F:\xampp\htdocs\views\quest\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aaa4985b18370_62097309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de815d26e459162243795360bb57a6355e64f7ed' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\quest\\index.tpl',
      1 => 1521109380,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aaa4985b18370_62097309 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15137241195aaa4985b15c16_47390510', "head");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11446812745aaa4985b17a48_79206970', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "head"} */
class Block_15137241195aaa4985b15c16_47390510 extends Smarty_Internal_Block
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
class Block_11446812745aaa4985b17a48_79206970 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

 <div class="quest_wrapper">




<div class="quest_filter">
    Отсортировать по:


        <ul class="">
            <li><button class="btn btn-primary" id="filter_date_asc" >С конца</button></li>
            <li><button class="btn btn-primary"  id="filter_date_desc" >С начала</button></li>

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
    <div class="page_number" ttt="1">

    </div>
    <pre>
    <div class="test">

    </div>
<?php
}
}
/* {/block 'body'} */
}
