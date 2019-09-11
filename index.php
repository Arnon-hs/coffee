<?php
ini_set('display_errors',1);
error_reporting(E_ALL);


define('ROOT',dirname(__FILE___));
require_once(ROOT.'/component/router.php');

$router = new Router();
$router->run();

$string = '21-11-2015';

$pattern  = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
$replasement='Год $3, месяц $2, день $1';
echo preg_replace($pattern,$replasement,$string);
?>