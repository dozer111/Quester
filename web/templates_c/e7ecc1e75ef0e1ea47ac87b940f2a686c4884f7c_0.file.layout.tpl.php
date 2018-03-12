<?php
/* Smarty version 3.1.30, created on 2018-03-12 20:13:52
  from "C:\xampp\htdocs\views\layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa6d170670ce7_29357598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7ecc1e75ef0e1ea47ac87b940f2a686c4884f7c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\views\\layout.tpl',
      1 => 1520882030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa6d170670ce7_29357598 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" type="text/css" href="/../web/css/style.css">
    <?php echo '<script'; ?>
  src="/../web/js/script.js"><?php echo '</script'; ?>
>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8265711095aa6d1704bc749_12976262', 'head');
?>

</head>
<body>
<div class="wrapper">

    <div class="nav">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">

                    
                    <?php if (!isset($_SESSION['user'])) {?>
                        <li><a href="/auth/signIn">Sign In</a></li>
                    <li><a href="/auth/login">Login</a></li>
                    <?php } else { ?>

                        <li><a href="/user/index"><?php echo $_SESSION['user']['user_login'];?>
</a></li>
                        <li><a href="/auth/logout">Exit</a></li>
                        
                        <?php if ($_SESSION['user']['user_status'] == 1) {?>
                            <li><a href="/admin">Admin</a></li>
                        <?php }?>
                    <?php }?>
                    <li><a href="/quest/index">News</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="content">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4932208545aa6d17066b921_89782734', 'body');
?>

    </div>

    <div class="footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6282147895aa6d17066f844_04784152', 'footer');
?>

    </div>


</div>

</body>
</html><?php }
/* {block 'head'} */
class Block_8265711095aa6d1704bc749_12976262 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_4932208545aa6d17066b921_89782734 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'footer'} */
class Block_6282147895aa6d17066f844_04784152 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
}
