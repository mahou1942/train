<?php

include "./libs/Smarty.class.php";
define('SMARTY_ROOT', './libs/tpls');
$smarty = new Smarty();

$smarty -> template_dir = SMARTY_ROOT."/templates";
$smarty -> compile_dir = SMARTY_ROOT."/templates_c";
$smarty -> config_dir = SMARTY_ROOT."/configs";
$smarty -> cache_dir = SMARTY_ROOT."/cache";

$smarty->left_delimiter = '{';
$smarty->right_delimiter = '}';

?>
