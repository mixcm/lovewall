<?php
function get_mysql($biao) {
    $conf = array(
        'mysql'=>'mysql.coding.io:3306',//数据库配置
		'name'=>'user-PUNwYskfJx',
		'password'=>'M;bA?nhJ:eX!/--]Tu2H',
		'dbname'=>'db-jnXWJH4KAs',
    );
    return $conf[$biao];
}

//这里设置了dbname为lovewall 本来这里是name 和数据库用户名相同了 以后还得把下面的数据库连接分离出来单独封装
function get_mysql_options($biao) {
    $conn=new mysqli(get_mysql("mysql"),get_mysql("name"),get_mysql("password"),get_mysql("dbname"));
    $conn->query("SET NAMES UTF8");
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
    if(file_exists(Root_Path."/content/".$name.".php")){
        require_once(Root_Path."/content/".$name.".php");
    }else{
        require_once(Root_Path."/content/pages/404.php");
    }
    echo "\n";
}
function get_static_css ($name) {
    return '<link href="//'.$_SERVER['HTTP_HOST'].'/lovewall/static/css/'.$name.'.css" rel="stylesheet">'."\n";
}
function get_static_js ($name) {
    return '<script src="//'.$_SERVER['HTTP_HOST'].'/lovewall/static/js/'.$name.'.js"></script>'."\n";
}
?>