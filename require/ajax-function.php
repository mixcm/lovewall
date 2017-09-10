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