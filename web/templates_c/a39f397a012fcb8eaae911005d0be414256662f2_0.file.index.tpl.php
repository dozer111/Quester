<?php
/* Smarty version 3.1.30, created on 2018-03-09 18:28:02
  from "C:\xampp\htdocs\views\quest\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa2c422dcd356_17320803',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a39f397a012fcb8eaae911005d0be414256662f2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\views\\quest\\index.tpl',
      1 => 1520616481,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aa2c422dcd356_17320803 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_388050625aa2c422dcbb01_06348736', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} */
class Block_388050625aa2c422dcbb01_06348736 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

 <div class="quest_wrapper">
<div class="quest_container">
    <?php $_smarty_debug = new Smarty_Internal_Debug;
 $_smarty_debug->display_debug($_smarty_tpl);
unset($_smarty_debug);
?>

<?php if ((!empty($_smarty_tpl->tpl_vars['news']->value['items']))) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['news']->value['items'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
        <div class="quest_element">
            <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['quest_picture'])) {?>
                <img class="quest_picture_short" src="../../web/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['quest_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['quest_title'];?>
">
            <?php }?>
            <a href="/quest/show/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><h1><?php echo $_smarty_tpl->tpl_vars['item']->value['quest_title'];?>
</h1></a>
            <h2><?php echo $_smarty_tpl->tpl_vars['item']->value['quest_email'];?>
</h2>
            <p><?php echo $_smarty_tpl->tpl_vars['item']->value['quest_text'];?>
</p>

        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    
    <?php } else { ?>
    <h1>На данной странице невостей нет. Перейдите пока на другую</h1>
    <div class="beforeMega"><a href="/"><button class="megaButton">Домой</button></a></div>
<?php }?>
</div>



    <div class="pagination_container ">
        <ul class="pagination_main">
            <?php if (($_smarty_tpl->tpl_vars['page']->value < 3)) {?>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/1">1</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/2">2</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/3">3</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/7">..</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/<?php echo $_smarty_tpl->tpl_vars['news']->value['maxPages'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['news']->value['maxPages'];?>
</a></li>
            <?php } elseif (($_smarty_tpl->tpl_vars['page']->value <= $_smarty_tpl->tpl_vars['news']->value['maxPages']-3)) {?>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/<?php echo $_smarty_tpl->tpl_vars['page']->value+3;?>
">..</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/<?php echo $_smarty_tpl->tpl_vars['news']->value['maxPages'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['news']->value['maxPages'];?>
</a></li>
             <?php } else { ?>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/1">1</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/<?php echo $_smarty_tpl->tpl_vars['page']->value-3;?>
">...</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/<?php echo $_smarty_tpl->tpl_vars['news']->value['maxPages']-2;?>
"><?php echo $_smarty_tpl->tpl_vars['news']->value['maxPages']-2;?>
</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/<?php echo $_smarty_tpl->tpl_vars['news']->value['maxPages']-1;?>
"><?php echo $_smarty_tpl->tpl_vars['news']->value['maxPages']-1;?>
</a></li>
                <li class="pagination_item"><a class="pagination_link" href="/quest/index/<?php echo $_smarty_tpl->tpl_vars['news']->value['maxPages'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['news']->value['maxPages'];?>
</a></li>
            <?php }?>
        </ul>
    </div>

 </div>
<?php
}
}
/* {/block 'body'} */
}
