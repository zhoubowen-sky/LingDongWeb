<?php

	header('Access-Control-Allow-Origin:*');  //指定允许所有域名访问，用以解决跨域js不能访问的问题

	require_once '../connect.php';       //添加相关的数据库等等的配置
	
	
	//查询数据
	/* $sql = "select * from echarts_map";
	$query = mysql_query($sql);
	while($row=mysql_fetch_array($query)){
		$arr[] = array(
				'name' => $row['province'],
				'value' => $row['gdp']
		);
	} */
	
	//从数据库中查询数据
	
	$sql = "select  offline_files_upload,offline_files_download,bluetooth_trans,share_app,files_manage,user_feedback,software_version,software_describe,about_us,user_android_version,connect_PC,create_connection,scan_to_join  from  user_using_modules_times_android";  //选择存储用户功能模块使用次数的数据表 user_using_modules_times_android
	$query = mysql_query($sql); //$query是资源标识符   就是指针
	
	//定义存储每一列数据，即记录各个模块使用次数的变量
	$num_offline_files_upload = 0;
	$num_offline_files_download = 0;
	$num_bluetooth_trans = 0;
	$num_share_app = 0;
	$num_files_manage = 0;
	$num_user_feedback = 0;
	$num_software_version = 0;
	$num_software_describe = 0;
	$num_about_us = 0;
	$num_user_android_version = 0;
	$num_connect_PC = 0;
	$num_create_connection = 0;
	$num_scan_to_join = 0;
	
	while ($row = mysql_fetch_row($query)){
		//用以统计每一项的总数，数据量特别大的情况下，遍历数据表可能需要一定的时间
		$num_offline_files_upload   = $row[0] + $num_offline_files_upload;
		$num_offline_files_download = $row[1] + $num_offline_files_download;
		$num_bluetooth_trans        = $row[2] + $num_bluetooth_trans;
		$num_share_app              = $row[3] + $num_share_app;
		$num_files_manage           = $row[4] + $num_files_manage;
		$num_user_feedback          = $row[5] + $num_user_feedback;
		$num_software_version       = $row[6] + $num_software_version;
		$num_software_describe      = $row[7] + $num_software_describe;
		$num_about_us               = $row[8] + $num_about_us;
		$num_user_android_version   = $row[9] + $num_user_android_version;
		$num_connect_PC             = $row[10] + $num_connect_PC;
		$num_create_connection      = $row[11] + $num_create_connection;
		$num_scan_to_join           = $row[12] + $num_scan_to_join;
	}
	
	//echo $num_offline_files_upload;
	
	//Echarts 所需Json格式为     [{value:23,name:'xxxx' }]   key 的名字不要写错
	/*"离线上传","离线下载","蓝牙传输","分享APP","文件管理","用户反馈","软件版本","软件描述","关于我们","安卓版本","连接电脑","创建连接","搜索加入"*/
	$modules_using_times[0] = array("name"=>"离线上传","value"=>$num_offline_files_upload);  
	$modules_using_times[1] = array("name"=>"离线下载","value"=>$num_offline_files_download);
	$modules_using_times[2] = array("name"=>"蓝牙传输","value"=>$num_bluetooth_trans);
	$modules_using_times[3] = array("name"=>"分享APP","value"=>$num_share_app);
	$modules_using_times[4] = array("name"=>"文件管理","value"=>$num_files_manage);
	$modules_using_times[5] = array("name"=>"用户反馈","value"=>$num_user_feedback);
	$modules_using_times[6] = array("name"=>"软件版本","value"=>$num_software_version);
	$modules_using_times[7] = array("name"=>"软件描述","value"=>$num_software_describe);
	$modules_using_times[8] = array("name"=>"关于我们","value"=>$num_about_us);
	$modules_using_times[9] = array("name"=>"安卓版本","value"=>$num_user_android_version);
	$modules_using_times[10] = array("name"=>"连接电脑","value"=>$num_connect_PC);
	$modules_using_times[11] = array("name"=>"创建连接","value"=>$num_create_connection);
	$modules_using_times[12] = array("name"=>"搜索加入","value"=>$num_scan_to_join);
	
	
	echo json_encode($modules_using_times,JSON_UNESCAPED_UNICODE); //返回测试的数据
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	