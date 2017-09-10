<?php
// 声明根目录 
define("Root_Path",dirname(__FILE__));

// 载入函数表
require_once("require/function.php");

// 是否匿名
define("Mous",$_GET["mous"]);

// 当前页数
define("Page",$_GET["page"]);

// 载入主体
require_once("content/index.php");
?>