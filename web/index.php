<?php
# подключаем Smarty
require_once "../libs/smarty/libs/Smarty.class.php";
$smarty=new Smarty();
$smarty->setTemplateDir('../views');
# подключаем сессию
require_once '../config/Session.php';
$session=new Session();
# подключаем автолоадер
require_once "../config/autoload.php";


# 1) получаем запрос и парсим его
$requestString=ltrim($_SERVER['REQUEST_URI'],'/');
$requestArray=explode("/",$requestString);
# 2) определяем  контроллер и екшн + дефолтные
$controller=array_shift($requestArray);
$controller=(!empty($controller))?'controllers\\'.ucfirst($controller).'Controller'
    :'controllers\\MainController';

# 2.1) админка

if (strpos($controller,'Admin') && isset($_SESSION['user']) && $_SESSION['user']['user_status']==1 )
{
    $subController=array_shift($requestArray);
    $subController=(!empty($subController))?ucfirst($subController).'Controller':'AdminController';
    $controller='controllers\\Admin\\'.$subController;
}



$action=array_shift($requestArray);
$action=(!empty($action))?'action'.ucfirst($action):'actionIndex';
$params=$requestArray;
# 3) Обработка ошибок
if(!file_exists('../'.$controller.'.php')   )
{

    $controller = 'controllers\\ErrorController';
    $action = "actionIndex";
    $params[0]='Controller not found';

}
if(!method_exists(new $controller,$action))
{
    $controller = 'controllers\\ErrorController';
    $action = "actionIndex";
    $params[0]='Action was not found';
}



$app= new $controller();
$app->$action();