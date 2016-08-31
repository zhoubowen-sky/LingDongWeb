<?php
	require_once '../connect.php';       //添加相关的数据库等等的配置
	
	
	$json = file_get_contents('php://input');
	
	$obj = json_decode($json,true);  //json_decode返回的是一个对象，一班可以用$res->key这种方式访问值，也可以像我这样用【】访问，不过 第二个变量要设置为 true
	
	
	
	$_id = $obj['_id'];//这是 Android sqlite 数据表的ID字段
	$device_id = $obj['device_id'];
	$android_version = $obj['android_version'];
	$device_brand = $obj['device_brand'];
	$device_model = $obj['device_model'];
	$device_memory = $obj['device_memory'];
	$device_CPU = $obj['device_CPU'];
	$device_screen_resolution = $obj['device_screen_resolution'];
	
	
	$sql = "insert into user_info_android(device_id,android_version,device_brand,device_model,device_memory,device_CPU,device_screen_resolution) values ('$device_id','$android_version','$device_brand','$device_model','$device_memory','$device_CPU','$device_screen_resolution')";
	
	//查找数据库，检查一下数据库中是否已经存在此条信息，如果已经存在，就不再插入，如果没有，就插入一条新的数据
	$sql1 = "select * from user_info_android where device_id = '$device_id'";
	//将查找到的那一行赋值给$query作为资源标识符
	$query1 = mysql_query($sql1);
	//echo $query;
	//获取资源标识符$query所指向的对象，也就是所要查找的这一行
	$arr1 = mysql_fetch_object($query1);
	//如果没有查找到对应的对象，则说明数据库中没有这条数据
	if($arr1 == NULL){
		mysql_query($sql);
		echo $sql;
	}
	
	
	
	
	
	//向数据库中添加数据
	//$insertsql = "insert into feedback(username,useremail,usersuggestion,uploadIP,dateline) values ('$username','$useremail','$usersuggestion','$uploaderIP','$dateline')";
	//echo $insertsql;
	//mysql_query($insertsql);
	//echo "000000000000";
	
	
	
	//echo var_dump($obj);
	echo "这里是 User_Info_Android 数据表的服务端接口！";
	