<?php
function get_mysql($biao) {
    $mysql=array ('mysql'=>'数据库地址（默认localhost）','name'=>'数据库名称','password'=>'数据库密码');
    return $mysql[$biao];
}
function get_mysql_options($biao) {
    $conn=new mysqli(get_mysql("mysql"),get_mysql("name"),get_mysql("password"),get_mysql("name"));
	$sql="SELECT * FROM options WHERE name='$biao'";
	$result=$conn->query ($sql);
    $row=$result->fetch_assoc ();
	return $row["value"];
}
function get_require_function($name) {
    require_once(Root_Path."/require/".$name.".php");
    echo "\n";
}
function get_require_content($name) {
    require_once(Root_Path."/content/".$name.".php");
    echo "\n";
}
function get_static_css ($name) {
    return '<link href="//'.$_SERVER['HTTP_HOST'].'/static/css/'.$name.'.css" rel="stylesheet">'."\n";
}
function get_static_js ($name) {
    return '<script src="//'.$_SERVER['HTTP_HOST'].'/static/js/'.$name.'.js"></script>'."\n";
}
?>