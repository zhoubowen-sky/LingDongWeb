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
	
	$sql  = "select  device_screen_resolution  from  user_info_android";  //选择存储离线文件的数据表 user_info_android  ,只选取Android_Screen_Resolution
	$query  = mysql_query($sql); //$query是资源标识符   就是指针
	
	
	//定义存储不同型号系统数量的变量
	$num_720p_l  = 0;
	$num_720p    = 0;
	$num_1080p   = 0;
	$num_1080p_h = 0;
	$num_ELSE = 0;
	
	while ($row = mysql_fetch_row($query)){
		//echo $row[0]."<br>";
		//$row[0]转换为数字  480 * 800  转换为了 480
		$num = (int) $row[0];
		//echo $row[0]."<br>";
		switch ($num){
			case $num<720 :
				$num_720p_l++;
				break;
	
			case '720':
				$num_720p++;
				break;
					
			case '1080':
				$num_1080p++;
				break;
	
			case $num>1080 :
				$num_1080p_h++;
				break;
	
			default:
				$num_ELSE++;
				break;
		} 
	}
	
	
	$android_screen_resolution_times[0]  =  array("name"=>"720P-","value"=>$num_720p_l);
	$android_screen_resolution_times[1]  =  array("name"=>"720P","value"=>$num_720p);
	$android_screen_resolution_times[2]  =  array("name"=>"1080P","value"=>$num_1080p);
	$android_screen_resolution_times[3]  =  array("name"=>"1080P+","value"=>$num_1080p_h);
	$android_screen_resolution_times[4]  =  array("name"=>"其他","value"=>$num_ELSE);
	
	
	
	echo json_encode($android_screen_resolution_times,JSON_UNESCAPED_UNICODE); //返回测试的数据 
	
	
	
	
	
	
