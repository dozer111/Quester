<?php
/* Smarty version 3.1.30, created on 2018-03-16 07:34:45
  from "F:\xampp\htdocs\views\admin\admin\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aab6585ae9361_27018660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf97b568a771d58171dc9b585fb9fdc68aba7509' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\admin\\admin\\index.tpl',
      1 => 1521025915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../layout.tpl' => 1,
  ),
),false)) {
function content_5aab6585ae9361_27018660 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6940414155aab6585ab80c0_49540945', 'head');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19316514245aab6585ae84b8_64486213', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'} */
class Block_6940414155aab6585ab80c0_49540945 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="/../web/js/admin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/../web/js/upload.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_19316514245aab6585ae84b8_64486213 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="quest_wrapper">



        
        <div class="popup">
            <div class="popup_bg"></div>
            <div class="form">
                <form enctype="multipart/form-data" method="POST" id="adminForm">
                    <input type="text" name="title" id="admin_redact_title">
                    <textarea name="text" id="admin_redact_text"></textarea>
                    <img src="" alt="" class="form_picture" id="admin_redact_picture">
                    <input type="file" name="file" value="">
                    <input type="hidden" name="id" value="" id="forAdminId">
                    <input type="hidden" name="status" value="2" id="forAdminStatus">
                    <input type="hidden" name="userID" id="forAdminUserId">
                    <button type="submit" class="btn btn-success btn-75">Изменить и отправить</button>
                </form>
            </div>
        </div>

<?php $_smarty_debug = new Smarty_Internal_Debug;
 $_smarty_debug->display_debug($_smarty_tpl);
unset($_smarty_debug);
?>

        <div class="quest_container">
            
            <?php if ((!empty($_smarty_tpl->tpl_vars['getQuests']->value['items']))) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['getQuests']->value['items'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <div class="quest_element">
                        <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['quest_picture'])) {?>
                            <img id="img<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="quest_picture_short" src="../../../web/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['quest_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['quest_title'];?>
">
                        <?php }?>
                        <a id="title<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="/admin/admin/show/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['quest_title'];?>
</a>
                        <h2 ><?php echo $_smarty_tpl->tpl_vars['item']->value['quest_email'];?>
</h2>
                        <h3 ><?php echo $_smarty_tpl->tpl_vars['item']->value['user_login'];?>
</h3>
                        <p  id="userID<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['item']->value['quest_author'];?>
</p>
                        <p id="text<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['quest_text'];?>
</p>
                        <div class="quest_admin_btn">
                            <button  value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-success btn-admin btn-100">Одобрить</button>
                            <button   value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-warning btn-admin btn-50">Редактировать</button>
                            <button value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-danger btn-admin btn-0">Не принять</button>
                        </div>
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
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/1">1</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/2">2</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/3">3</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/7">..</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/<?php echo $_smarty_tpl->tpl_vars['getQuests']->value['maxPages'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['getQuests']->value['maxPages'];?>
</a></li>
                <?php } elseif (($_smarty_tpl->tpl_vars['page']->value <= $_smarty_tpl->tpl_vars['getQuests']->value['maxPages']-3)) {?>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/<?php echo $_smarty_tpl->tpl_vars['page']->value+3;?>
">..</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/<?php echo $_smarty_tpl->tpl_vars['getQuests']->value['maxPages'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['getQuests']->value['maxPages'];?>
</a></li>
                <?php } else { ?>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/1">1</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/<?php echo $_smarty_tpl->tpl_vars['page']->value-3;?>
">...</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/<?php echo $_smarty_tpl->tpl_vars['getQuests']->value['maxPages']-2;?>
"><?php echo $_smarty_tpl->tpl_vars['getQuests']->value['maxPages']-2;?>
</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/<?php echo $_smarty_tpl->tpl_vars['getQuests']->value['maxPages']-1;?>
"><?php echo $_smarty_tpl->tpl_vars['getQuests']->value['maxPages']-1;?>
</a></li>
                    <li class="pagination_item"><a class="pagination_link" href="/admin/admin/index/<?php echo $_smarty_tpl->tpl_vars['getQuests']->value['maxPages'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['getQuests']->value['maxPages'];?>
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
