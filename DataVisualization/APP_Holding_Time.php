<?php
	header('Access-Control-Allow-Origin:*');  //指定允许所有域名访问，用以解决跨域js不能访问的问题
	
	require_once '../connect.php';       //添加相关的数据库等等的配置
	
	
	
	//从数据库中查询数据
	
	$sql  = "select  holding_app_time  from  user_using_time_android";  //选择存储离线文件的数据表 user_using_time_android  ,只选取app停留时间
	$query  = mysql_query($sql); //$query是资源标识符   就是指针
	
	//定义存储每一个时间段启动次数的变量
	$num_0_1m  = 0;   
	$num_1m_2m = 0;   
	$num_2m_3m = 0;
	$num_3m_4m = 0;
	$num_4m_5m = 0;
	$num_5m_6m = 0;
	$num_6m_7m = 0;
	$num_7m_8m = 0;
	$num_8m_9m = 0;
	$num_9m_10m = 0;
	$num_10m___ = 0;
	
	//下面是离线文件数据表  fileinfo 中的数据
	while ($row = mysql_fetch_row($query)){
	
		//echo $row[0]."<br>";
		$num = $row[0];
		//echo ($num)."<br>";
	
		if (0 <= $num && $num < 60){
			$num_0_1m++;
		}elseif (60 <= $num && $num < 120){
			$num_1m_2m++;
		}elseif (120 <= $num && $num < 180){
			$num_2m_3m++;
		}elseif (180 <= $num && $num < 240){
			$num_3m_4m++;
		}elseif (240 <= $num && $num < 300){
			$num_4m_5m++;
		}elseif (300 <= $num && $num < 360){
			$num_5m_6m++;
		}elseif (360 <= $num && $num < 420){
			$num_6m_7m++;
		}elseif (420 <= $num && $num < 480){
			$num_7m_8m++;
		}elseif (480 <= $num && $num < 540){
			$num_8m_9m++;
		}elseif (540 <= $num && $num < 600){
			$num_9m_10m++;
		}elseif (600 <= $num ){
			$num_10m___++;
		}
	
	}
	
	
	
	$app_holding_time[0]  =  array("name"=>"00:00","value"=>$num_0_1m);
	$app_holding_time[1]  =  array("name"=>"02:00","value"=>$num_1m_2m);
	$app_holding_time[2]  =  array("name"=>"04:00","value"=>$num_2m_3m);
	$app_holding_time[3]  =  array("name"=>"06:00","value"=>$num_3m_4m);
	$app_holding_time[4]  =  array("name"=>"08:00","value"=>$num_4m_5m);
	$app_holding_time[5]  =  array("name"=>"10:00","value"=>$num_5m_6m);
	$app_holding_time[6]  =  array("name"=>"12:00","value"=>$num_6m_7m);
	$app_holding_time[7]  =  array("name"=>"14:00","value"=>$num_7m_8m);
	$app_holding_time[8]  =  array("name"=>"16:00","value"=>$num_8m_9m);
	$app_holding_time[9]  =  array("name"=>"18:00","value"=>$num_9m_10m);
	$app_holding_time[10] =  array("name"=>"20:00","value"=>$num_10m___);
	
	
	
	echo json_encode($app_holding_time,JSON_UNESCAPED_UNICODE); //返回测试的数据
	
	
	
	