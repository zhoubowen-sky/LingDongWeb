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
	
	$sql  = "select  android_version  from  user_info_android";  //选择存储离线文件的数据表 user_info_android  ,只选取安卓版本
	$query  = mysql_query($sql); //$query是资源标识符   就是指针
	
	
	//定义存储不同型号系统数量的变量
	$num_4_0 = 0;
	$num_4_1 = 0;
	$num_4_2 = 0;
	$num_4_3 = 0;
	$num_4_4 = 0;
	$num_5_0 = 0;
	$num_5_1 = 0;
	$num_6_0 = 0;
	$num_7_0 = 0;
	$num_ELSE = 0;
	
	while ($row = mysql_fetch_row($query)){
		
		$row[0] = substr($row[0], 0,3);//截取字符串，例如5.1.1  截取5.1    6.0.1 截取6.0
		//echo $row[0]."<br>";
		
		switch ($row[0]){
			case '4.0':
				$num_4_0++;
				break;
				
			case '4.1':
			  	$num_4_1++;
			  	break;
			  
			case '4.2':
			  	$num_4_2++;
			  	break;
			  	
			case '4.3':   
			  	$num_4_3++;
			  	break;
			  
			case '4.4':
				$num_4_4++;
				break;
				
			case '5.0':  
				$num_5_0++;
				break;
			  
			case '5.1':
			  	$num_5_1++;
			  	break;
			  	
			case '6.0':  
			  	$num_6_0++;
			  	break;
			  
			case '7.0':
			  	$num_7_0++;
			  	break;
			  	
			default:
				$num_ELSE++;
				break;
		} 
	}
	
	
	$android_version_times[0]  =  array("name"=>"4.0","value"=>$num_4_0); 
	$android_version_times[1]  =  array("name"=>"4.1","value"=>$num_4_1);
	$android_version_times[2]  =  array("name"=>"4.2","value"=>$num_4_2);
	$android_version_times[3]  =  array("name"=>"4.3","value"=>$num_4_3);
	$android_version_times[4]  =  array("name"=>"4.4","value"=>$num_4_4);
	$android_version_times[5]  =  array("name"=>"5.0","value"=>$num_5_0);
	$android_version_times[6]  =  array("name"=>"5.1","value"=>$num_5_1);
	$android_version_times[7]  =  array("name"=>"6.0","value"=>$num_6_0);
	$android_version_times[8]  =  array("name"=>"7.0","value"=>$num_7_0);
	$android_version_times[9] =  array("name"=>"其他","value"=>$num_ELSE);
	
	
	
	echo json_encode($android_version_times,JSON_UNESCAPED_UNICODE); //返回测试的数据
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	