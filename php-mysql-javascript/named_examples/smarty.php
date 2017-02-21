<?php // smarty.php
$path = $_SERVER['DOCUMENT_ROOT'];
require "$path/Smarty/Smarty.class.php";

$smarty = new Smarty();
$smarty->template_dir = "$path/temp/smarty/templates";
$smarty->compile_dir  = "$path/temp/smarty/templates_c";
$smarty->cache_dir    = "$path/temp/smarty/cache";
$smarty->config_dir   = "$path/temp/smarty/configs";

$smarty->assign('title', 'Test Web Page');
$smarty->display("$path/temp/index.tpl");
?>