<?php
	require_once '../connect.php';       //添加相关的数据库等等的配置

	$json = file_get_contents('php://input');
	
	$obj = json_decode($json,true);  //json_decode返回的是一个对象，一班可以用$res->key这种方式访问值，也可以像我这样用【】访问，不过 第二个变量要设置为 true
	
	
	$_id = $obj['_id'];//这是 Android sqlite 数据表的ID字段
	$device_id = $obj['device_id'];
	$start_app_time = $obj['start_app_time'];
	$exit_app_time = $obj['exit_app_time'];
	$holding_app_time = $obj['holding_app_time'];
	
	
	$sql = "insert into user_using_time_android(device_id,start_app_time,exit_app_time,holding_app_time) values ('$device_id','$start_app_time','$exit_app_time','$holding_app_time')";
	mysql_query($sql);
	//echo $sql;
	
	
	echo "   这里是   User_Using_Time_Android 数据表的服务端接口！";