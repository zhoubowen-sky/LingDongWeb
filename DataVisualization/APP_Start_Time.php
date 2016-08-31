<?php
	
	header('Access-Control-Allow-Origin:*');  //指定允许所有域名访问，用以解决跨域js不能访问的问题
	
	require_once '../connect.php';       //添加相关的数据库等等的配置
	
	
	
	
	//从数据库中查询数据
	
	$sql  = "select  start_app_time  from  user_using_time_android";  //选择存储离线文件的数据表 user_using_time_android  ,只选取app启动时间
	$query  = mysql_query($sql); //$query是资源标识符   就是指针
	
	
	//定义存储每一个时间段启动次数的变量
	$num_00 = 0;   //00:00点--02:00
	$num_02 = 0;   //02:00点--04:00
	$num_04 = 0;  
	$num_06 = 0;  
	$num_08 = 0;  
	$num_10 = 0;  
	$num_12 = 0;  
	$num_14 = 0;  
	$num_16 = 0; 
	$num_18 = 0; 
	$num_20 = 0;  
	$num_22 = 0;
	
	//下面是离线文件数据表  fileinfo 中的数据
	while ($row = mysql_fetch_row($query)){
	
		//截取字符串中有用的信息，并转换为数字，启动时间格式为  2016-08-09 17:26:11
		//echo $row[0]."<br>";
		//截取到的字符串为17:26:11 
		$row[0] = substr($row[0], -8,2);//从倒数第八位，往后取两个字符串
		//echo $row[0]."<br>";
		//将字符串17:26:11 转换为数字 后 得到17
		$num = (int)($row[0]);
		//echo ($num)."<br>";
	
		if (0 <= $num && $num < 2){
			$num_00++;
		}elseif (2 <= $num && $num < 4){
			$num_02++;
		}elseif (4 <= $num && $num < 6){
			$num_04++;
		}elseif (6 <= $num && $num < 8){
			$num_06++;
		}elseif (8 <= $num && $num < 10){
			$num_08++;
		}elseif (10 <= $num && $num < 12){
			$num_10++;
		}elseif (12 <= $num && $num < 14){
			$num_12++;
		}elseif (14 <= $num && $num < 16){
			$num_14++;
		}elseif (16 <= $num && $num < 18){
			$num_16++;
		}elseif (18 <= $num && $num < 20){
			$num_18++;
		}elseif (20 <= $num && $num < 22){
			$num_20++;
		}elseif (22 <= $num && $num < 24){
			$num_22++;
		}
	
	}
	
	
	
	

	$start_app_time[0]  =  array("name"=>"00:00","value"=>$num_00);
	$start_app_time[1]  =  array("name"=>"02:00","value"=>$num_02);
	$start_app_time[2]  =  array("name"=>"04:00","value"=>$num_04);
	$start_app_time[3]  =  array("name"=>"06:00","value"=>$num_06);
	$start_app_time[4]  =  array("name"=>"08:00","value"=>$num_08);
	$start_app_time[5]  =  array("name"=>"10:00","value"=>$num_10);
	$start_app_time[6]  =  array("name"=>"12:00","value"=>$num_12);
	$start_app_time[7]  =  array("name"=>"14:00","value"=>$num_14);
	$start_app_time[8]  =  array("name"=>"16:00","value"=>$num_16);
	$start_app_time[9]  =  array("name"=>"18:00","value"=>$num_18);
	$start_app_time[10] =  array("name"=>"20:00","value"=>$num_20);
	$start_app_time[11] =  array("name"=>"22:00","value"=>$num_22);
	
	
	
	echo json_encode($start_app_time,JSON_UNESCAPED_UNICODE); //返回测试的数据
	
	
	
	
	
	
	
	
	
	
	