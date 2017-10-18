<?php
// 关闭报错
error_reporting(0);

// 声明根目录 
define("Root_Path",dirname(__FILE__));

// 是否匿名
define("Mous",$_GET["mous"]);

// 当前页数
define("Page",$_GET["page"]);

// 需载入的页面类型
define("Pages",$_GET["pages"]);

//引入数据库配置文件
$conf = include 'require/conf.php';

// 载入函数表
require_once("require/function.php");

//声明字符集
header("Content-type: text/html; charset=utf-8");

// 载入主体
require_once("content/index.php");
?>
