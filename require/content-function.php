<?php
function  do_html_head ($title){
	if ($title!=""){
		echo '<title>'.$title.' - '.get_mysql_options ("title").'</title>'."\n";
	}else {
		echo '<title>'.get_mysql_options ("title").'</title>'."\n";
	}
	echo '        <meta charset="utf-8">'."\n";
	echo '        <meta name="description" content="'.get_mysql_options ("description").'">'."\n";
	echo '        <meta name="keywords" content="'.get_mysql_options ("keywords").'">'."\n";
	echo '        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">'."\n";
	echo '        <link rel="shortcut icon" href="//'.$_SERVER['HTTP_HOST'].'/static/favicon.ico">'."\n";
	echo '        <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">'."\n";
}
function  do_html_footer (){
	/* 请不要更改此处内容 */
	echo '<div class="copyright container">&copy; '
	/* 请不要更改此处内容 */
	.date("Y")
	/* 请不要更改此处内容 */
	.' <a href="//'.$_SERVER['HTTP_HOST'].'">'.get_mysql_options("title").'</a>'
	/* 请不要更改此处内容 */
	.' Powered By '
	/* 请不要更改此处内容 */
	.'<a href="https://github.com/mixcm/lovewall" target="_blank">觅思树洞</a>'
	/* 请不要更改此处内容 */
	.'</div>';
	/* 请不要更改此处内容 */
	echo "\n";
	/* 请不要更改此处内容 */
}
function  do_html_content ($page,$mous){
	$conn=new mysqli(get_mysql ("mysql"),get_mysql ("name"),get_mysql ("password"),get_mysql ("dbname"));
	$conn->query("SET NAMES UTF8");//防止乱码
	if($page==""){
	    $limit=0;
	}else{
	    $limit=$page*9-9;
	}
	if ($mous==""){
	    $sql="SELECT * FROM contents ORDER BY date DESC LIMIT $limit,9";
	    $result=$conn->query ($sql);
		while ($row=$result->fetch_assoc ()){
			if ($row["sex"]==0){
				echo '<div class="item">';
			}
			elseif ($row["sex"]==1){
				echo '<div class="item boy">';
			}
			elseif ($row["sex"]==2){
				echo '<div class="item girl">';
			}
			echo '<article>'.$row["text"].'</article>';
			echo '<div class="author">';
			if ($row["mous"]==0){
				echo '<img class="avatar" src="//q1.qlogo.cn/g?b=qq&nk='.$row["qq"].'&s=100">';
				echo '<p class="name">'.$row["name"].'</p>';
			}else {
				echo '<img class="avatar" src="/static/img/mous.jpg">';
				echo '<p class="name">匿名</p>';
			}
			echo '<p class="date">'.date("n月j日 H:i",$row["date"]).'</p>';
			echo '</div>';
			echo '</div>';
		}
	}
	else {
	    $sql="SELECT * FROM contents WHERE mous=$mous ORDER BY date DESC LIMIT $limit,9";
	    $result=$conn->query ($sql);
		while ($row=$result->fetch_assoc ()){
			if ($row["sex"]==0){
				echo '<div class="item">';
			}
			elseif ($row["sex"]==1){
				echo '<div class="item boy">';
			}
			elseif ($row["sex"]==2){
				echo '<div class="item girl">';
			}
			echo '<article>'.$row["text"].'</article>';
			echo '<div class="author">';
			if ($row["mous"]==0){
				echo '<img class="avatar" src="//q1.qlogo.cn/g?b=qq&nk='.$row["qq"].'&s=100">';
				echo '<p class="name">'.$row["name"].'</p>';
			}else {
				echo '<img class="avatar" src="/static/img/mous.jpg">';
				echo '<p class="name">匿名</p>';
			}
			echo '<p class="date">'.date("n月j日 H:i",$row["date"]).'</p>';
			echo '</div>';
			echo '</div>';
		}
	}
}
function  do_html_pages ($page,$mous){
    if($page==""){
        $page=1;
    }
    if($mous!=""){
        $mouss='/'.$mous;
    }
    
    // 计算全部页数
	$conn=new mysqli(get_mysql ("mysql"),get_mysql ("name"),get_mysql ("password"),get_mysql ("dbname"));
	$x=0;
	if ($mous==""){
	    $sql="SELECT * FROM contents";
	    $result=$conn->query ($sql);
		while ($row=$result->fetch_assoc ()){
		    $x+=1;
		}
	}
	else {
	    $sql="SELECT * FROM contents WHERE mous=$mous";
	    $result=$conn->query ($sql);
		while ($row=$result->fetch_assoc ()){
			$x+=1;
		}
	}
	$allpages=ceil($x/9);
	
	// 上一页
	if($page == 1){
		$lastpage = $allpages;
	}else{
	    $lastpage = $page -1;
	}
    echo '<a href="/mous'.$mouss.'/page/'.$lastpage.'">上一页</a>';
	
	$page_2 = $page-2;
	$page_1 = $page-1;
    $page_3 = $page+1;
	$page_4 = $page+2;
	$page_rest = $allpages - $page;
    
    // 前两页
    if($page > 2){
		echo '<a href="/mous'.$mouss.'/page/'.$page_2.'">'.$page_2.'</a>';
	}
	if($page > 1){
		echo '<a href="/mous'.$mouss.'/page/'.$page_1.'">'.$page_1.'</a>';
	}
	
	// 当前页面
	echo '<a class="active">'.$page.'</a>';
	
	// 后两页
	if($page_rest > 0){
		echo '<a href="/mous'.$mouss.'/page/'.$page_3.'">'.$page_3.'</a>';
	}
	if($page_rest > 1){
		echo '<a href="/mous'.$mouss.'/page/'.$page_4.'">'.$page_4.'</a>';
	}
	
	// 下一页
	if($page == $allpages){
		$nextpage = 1;
	}else{
		$nextpage = $page +1;
	}
	echo '<a href="/mous'.$mouss.'/page/'.$nextpage.'">下一页</a>';
}
?>