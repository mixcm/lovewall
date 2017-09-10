<?php
// 声明根目录 
define("Root_Path",dirname(__FILE__));

// 载入函数表
require_once("require/function.php");

// 载入Ajax函数表
get_require_function ("ajax-function");

switch ($_GET["type"]){
	case  "show":
		insert_mysql_show ($_GET["sex"],$_GET["mous"],$_GET["say"],$_GET["name"],$_GET["qq"]);
		break ;
	default :
		echo "Wrong！";
}
?>