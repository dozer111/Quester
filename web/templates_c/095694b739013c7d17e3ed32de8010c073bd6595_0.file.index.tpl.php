<?php
/* Smarty version 3.1.30, created on 2018-03-16 12:46:56
  from "F:\xampp\htdocs\views\user\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aabaeb039fe69_00655181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '095694b739013c7d17e3ed32de8010c073bd6595' => 
    array (
      0 => 'F:\\xampp\\htdocs\\views\\user\\index.tpl',
      1 => 1521200815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout.tpl' => 1,
  ),
),false)) {
function content_5aabaeb039fe69_00655181 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2886833365aabaeb039eee6_05291201', "body");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "body"} */
class Block_2886833365aabaeb039eee6_05291201 extends Smarty_Internal_Block
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



     
        <?php $_smarty_debug = new Smarty_Internal_Debug;
 $_smarty_debug->display_debug($_smarty_tpl);
unset($_smarty_debug);
?>
    <div class="user__part_right">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userQuestList']->value['items'], 'soloQuest');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['soloQuest']->value) {
?>

            <div class="user__quest_item">
                <div class="user__quest_item_left">
                <img src="../../web/img/<?php echo $_smarty_tpl->tpl_vars['soloQuest']->value['quest_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['soloQuest']->value['quest_title'];?>
" class="user__quest_item_image">
                <a href="/quest/show/<?php echo $_smarty_tpl->tpl_vars['soloQuest']->value['id'];?>
" class="user__quest_item_title"><?php echo $_smarty_tpl->tpl_vars['soloQuest']->value["quest_title"];?>
</a>
                <p class="user__quest_item_text"><?php echo $_smarty_tpl->tpl_vars['soloQuest']->value['quest_text'];?>
</p>

                
                </div>
                <div class="user__quest_item_status_container">
                   <?php $_smarty_tpl->_assignInScope('imageName', '');
?>
                  <?php if ($_smarty_tpl->tpl_vars['soloQuest']->value['quest_status'] == '0') {
$_smarty_tpl->_assignInScope('imageName', 'statusWait.png');
?>
                      <?php } elseif ($_smarty_tpl->tpl_vars['soloQuest']->value['quest_status'] == '1') {
$_smarty_tpl->_assignInScope('imageName', 'statusOk.png');
?>
                      <?php } elseif ($_smarty_tpl->tpl_vars['soloQuest']->value['quest_status'] == '2') {
$_smarty_tpl->_assignInScope('imageName', 'statusChanged.png');
?>
                      <?php } elseif ($_smarty_tpl->tpl_vars['soloQuest']->value['quest_status'] == '3') {
$_smarty_tpl->_assignInScope('imageName', 'statusNo.png');
?>
                      <?php } else { ?> <?php $_smarty_tpl->_assignInScope('imageName', 'statusWait.png');
?>
                  <?php }?>
                    <img src="../../web/img/quest_status/<?php echo $_smarty_tpl->tpl_vars['imageName']->value;?>
" alt="" class="user__quest_item_status_picture">
                </div>

            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>


    
    <div class="user__pagination">
        <ul class="pagination_main">


        <?php $_smarty_tpl->_assignInScope('countOfPaginationButtnos', count($_smarty_tpl->tpl_vars['userQuestList']->value['pageList']['list']));
?>
        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['countOfPaginationButtnos']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['countOfPaginationButtnos']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('pageNumber', $_smarty_tpl->tpl_vars['userQuestList']->value['pageList']['list'][$_prefixVariable1]);
?>
            <?php if ($_smarty_tpl->tpl_vars['pageNumber']->value == $_smarty_tpl->tpl_vars['userQuestList']->value['currentPage']) {?>
                <a href="/user/index/<?php echo $_smarty_tpl->tpl_vars['pageNumber']->value;?>
"><button  class="pagination_link pagination_button_active" id="<?php echo $_smarty_tpl->tpl_vars['pageNumber']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['pageNumber']->value;?>
 </button></a>
            <?php } else { ?>
                <a href="/user/index/<?php echo $_smarty_tpl->tpl_vars['pageNumber']->value;?>
">  <button  class="pagination_link" id="<?php echo $_smarty_tpl->tpl_vars['pageNumber']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['pageNumber']->value;?>
 </button></a>
            <?php }?>

        <?php }
}
?>

        </ul>
    </div>

    </div>
<?php
}
}
/* {/block "body"} */
}
