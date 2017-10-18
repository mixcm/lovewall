<?php
	$id = !empty($_POST['id'])?$_POST['id']:'';
	if (empty($id)) {
		echo json_encode(['err'=>0]);
	}
	$conf = include "../require/conf.php";
	$conn = mysqli_connect($conf['mysql'],$conf['name'],$conf['password']);

	if(! $conn )
	{
	  die('连接失败: ' . mysqli_error($conn));
	}

	// 设置编码，防止中文乱码
	mysqli_query($conn , "set names utf8");

	$sql = 'delete from '.$conf['table'].' where id = '.$id;
	
	mysqli_select_db( $conn, $conf['dbname'] );
	$retval = mysqli_query( $conn, $sql );
	if ($retval) {
		echo json_encode(['err'=>1]);
	}else{
		echo json_encode(['err'=>0]);
	}
 ?>