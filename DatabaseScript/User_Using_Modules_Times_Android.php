<?php
	require_once '../connect.php';       //添加相关的数据库等等的配置
	
	$json = file_get_contents('php://input');
	
	$obj = json_decode($json,true);  //json_decode返回的是一个对象，一班可以用$res->key这种方式访问值，也可以像我这样用【】访问，不过 第二个变量要设置为 true
	
	
	$_id = $obj['_id'];//这是 Android sqlite 数据表的ID字段
	$device_id = $obj['device_id'];
	$offline_files_upload = $obj['offline_files_upload'];
	$offline_files_download = $obj['offline_files_download'];
	$bluetooth_trans = $obj['bluetooth_trans'];
	$share_app = $obj['share_app'];
	$files_manage = $obj['files_manage'];
	$user_feedback = $obj['user_feedback'];
	$software_version = $obj['software_version'];
	$software_describe = $obj['software_describe'];
	$about_us = $obj['about_us'];
	$user_android_version = $obj['user_android_version'];
	$connect_PC = $obj['connect_PC'];
	$create_connection = $obj['create_connection'];
	$scan_to_join = $obj['scan_to_join'];
	
	$sql =  "insert into user_using_modules_times_android(device_id,offline_files_upload,offline_files_download,bluetooth_trans,share_app,files_manage,user_feedback,software_version,software_describe,about_us,user_android_version,connect_PC,create_connection,scan_to_join) values ('$device_id','$offline_files_upload','$offline_files_download','$bluetooth_trans','$share_app','$files_manage','$user_feedback','$software_version','$software_describe','$about_us','$user_android_version','$connect_PC','$create_connection','$scan_to_join')";
	
	
	mysql_query($sql);
	//echo $sql;
	
	
	echo " 这里是   User_Using_Modules_Times_Android 数据表的服务端接口！";