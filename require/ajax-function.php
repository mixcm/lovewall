<?php
function  get_client_ip (){
	if (getenv('HTTP_CLIENT_IP')){
		$ip=getenv('HTTP_CLIENT_IP');
	}elseif (getenv('HTTP_X_FORWARDED_FOR')){
		$ip=getenv('HTTP_X_FORWARDED_FOR');
	}elseif (getenv('HTTP_X_FORWARDED')){
		$ip=getenv('HTTP_X_FORWARDED');
	}elseif (getenv('HTTP_FORWARDED_FOR')){
		$ip=getenv('HTTP_FORWARDED_FOR');
	}elseif (getenv('HTTP_FORWARDED')){
		$ip=getenv('HTTP_FORWARDED');
	}else {
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
function insert_mysql_show ($sex,$mous,$say,$name,$qq){
    if($say != ""){
        if($qq != ""){
            if(preg_match("/^[1-9]\d{4,10}$/",$qq)){
                if($name != ""){
                    $conn=new mysqli(get_mysql("mysql"),get_mysql("name"),get_mysql("password"),get_mysql("dbname"));
                    $conn->query("SET NAMES UTF8");//防止乱码
                    $stmt=$conn->prepare ("INSERT INTO contents (date,text,sex,qq,ip,mous,name) VALUES(?,?,?,?,?,?,?)");
		            $stmt->bind_param ("sssssss",time(),$say,$sex,$qq,get_client_ip (),$mous,$name);
		            $stmt->execute ();
		            $cookietime = time() + 60 * 60 * 24 * 360;
		            setcookie("sex", $sex, $cookietime, "/", $_SERVER['HTTP_HOST']);
		            setcookie("name", $name, $cookietime, "/", $_SERVER['HTTP_HOST']);
		            setcookie("qq", $qq, $cookietime, "/", $_SERVER['HTTP_HOST']);
		            echo '您已表白成功，请到首页查看！';
		            $stmt->close ();
		            $conn->close ();
                }else{
                    echo "名称不可以为空！";
                }
            }else{
                echo "此QQ号不存在！";
            }
        }else{
            echo "QQ不可以为空！";
        }
    }else{
        echo "你想说的话不可以为空！";
    }
}
