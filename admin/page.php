<?php 
//分页的函数
function news($pageNum = 1, $pageSize = 3)
{
    $array = array();
    $coon = mysqli_connect("localhost", "root",'');
    mysqli_select_db($coon, "lovewall");
    mysqli_set_charset($coon, "utf8");
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from contents limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($coon, $rs);
    while ($obj = mysqli_fetch_object($r)) {
        $array[] = $obj;
    }
    mysqli_close($coon,"lovewall");
    return $array;
}
 
//显示总页数的函数
function allNews()
{
    $coon = mysqli_connect("localhost", "root",'');
    mysqli_select_db($coon, "lovewall");
    mysqli_set_charset($coon, "utf8");
    $rs = "select count(*) num from contents"; //可以显示出总页数
    $r = mysqli_query($coon, $rs);
    $obj = mysqli_fetch_object($r);
    mysqli_close($coon,"lovewall");
    return $obj->num;
}
 ?>