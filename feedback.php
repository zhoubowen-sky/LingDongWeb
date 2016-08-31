<?php
	//连接数据库
	require_once 'connect.php';
	//获取用户反馈的信息
	$username       = $_POST['username'];
	$useremail      = $_POST['useremail'];
	$usersuggestion = $_POST['usersuggestion'];
	
	//上传者IP
	$uploaderIP = $_SERVER["REMOTE_ADDR"];
	

	$date_tmp = time();//获取Linux时间戳
	$dateline = date("Y-m-d H:i:s", $date_tmp+8*60*60);//将时间戳转换为标准时间
	
	
	//向数据库中添加数据
	$insertsql = "insert into feedback(username,useremail,usersuggestion,uploaderIP,dateline) values ('$username','$useremail','$usersuggestion','$uploaderIP','$dateline')";
	echo $insertsql;
	mysql_query($insertsql);
	//echo "000000000000";