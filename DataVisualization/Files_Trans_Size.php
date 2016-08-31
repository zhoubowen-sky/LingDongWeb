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
	
	$sql  = "select  size  from  fileinfo";  //选择存储离线文件的数据表 fileinfo  ,只选取文件大小
	$query  = mysql_query($sql); //$query是资源标识符   就是指针
	
	
	//定义存储每一种类型文件的变量
	$num_1M = 0;   //1024*1024
	$num_2M = 0;   //2048*1024
	$num_3M = 0;   //3072*1024
	$num_4M = 0;   //4096*1024
	$num_5M = 0;   //5120*1024
	$num_6M = 0;   //6144*1024
	$num_8M = 0;   //8192*1024
	$num_10M = 0;  //10240*1024
	$num_20M = 0;  //20480*1024
	$num_30M = 0;  //30720*1024
	$num_40M = 0;  //40960*1024
	$num_ELSE = 0;
	
	//下面是离线文件数据表  fileinfo 中的数据
	while ($row = mysql_fetch_row($query)){
		
		//echo $num;
		//将字符串$num转换为数字
		$num = (int)($row[0]);//intval()
		//echo $num."aaaa";
		//echo 5555 < $num && $num  <= 10024;
		//echo "<br>";

		if ( $num <= 1024*1024){
			$num_1M++;
		}elseif (1024*1024 < $num && $num <= 2048*1024){
			$num_2M++;
		}elseif (2048*1024 < $num && $num <= 3072*1024){
			$num_3M++;
		}elseif (3072*1024 < $num && $num <= 4096*1024){
			$num_4M++;
		}elseif (4096*1024 < $num && $num <= 5120*1024){
			$num_5M++;
		}elseif (5120*1024 < $num && $num <= 6144*1024){
			$num_6M++;
		}elseif (6144*1024 < $num && $num <= 8192*1024){
			$num_8M++;
		}elseif (8192*1024 < $num && $num <= 10240*1024){
			$num_10M++;
		}elseif (10240*1024 < $num && $num <= 20480*1024){
			$num_20M++;
		}elseif (20480*1024 < $num && $num <= 30720*1024){
			$num_30M++;
		}elseif (30720*1024 < $num && $num <= 40960*1024){
			$num_40M++;
		}elseif (40960*1024 < $num ){
			$num_ELSE++;
		} 
		
	}
	
	
	
	
	$sql2 = "select  files_size  from  user_using_files_trans_android";  //选择存储Android端文件传输信息的数据表 user_using_files_trans_android  ,只选取文件大小
	$query2 = mysql_query($sql2);
	
	//下面是Android端之间，Android与电脑之间文件传递的数据  数据表为   user_using_files_trans_android 
	while ($row2 = mysql_fetch_row($query2)){
	
		//echo $row2[0]."<br>";
		$num2 = (int)($row2[0]);//intval()
		//echo $num2."<br>";

		if ( $num2 <= 1024*1024){
			$num_1M++;
		}elseif (1024*1024 < $num2 && $num2 <= 2048*1024){
			$num_2M++;
		}elseif (2048*1024 < $num2 && $num2 <= 3072*1024){
			$num_3M++;
		}elseif (3072*1024 < $num2 && $num2 <= 4096*1024){
			$num_4M++;
		}elseif (4096*1024 < $num2 && $num2 <= 5120*1024){
			$num_5M++;
		}elseif (5120*1024 < $num2 && $num2 <= 6144*1024){
			$num_6M++;
		}elseif (6144*1024 < $num2 && $num2 <= 8192*1024){
			$num_8M++;
		}elseif (8192*1024 < $num2 && $num2 <= 10240*1024){
			$num_10M++;
		}elseif (10240*1024 < $num2 && $num2 <= 20480*1024){
			$num_20M++;
		}elseif (20480*1024 < $num2 && $num2 <= 30720*1024){
			$num_30M++;
		}elseif (30720*1024 < $num2 && $num2 <= 40960*1024){
			$num_40M++;
		}elseif (40960*1024 < $num2 ){
			$num_ELSE++;
		}  
	
	}
	
	
	//echo $num_1M."<br>";
	//echo $num_2M;
	//echo $num_ZIP;
	//echo $num_TXT;
	//echo $num_ELSE;
	
	
	$files_trans_size_times[0]  =  array("name"=>"<1M","value"=>$num_1M); 
	$files_trans_size_times[1]  =  array("name"=>"<2M","value"=>$num_2M);
	$files_trans_size_times[2]  =  array("name"=>"<3M","value"=>$num_3M);
	$files_trans_size_times[3]  =  array("name"=>"<4M","value"=>$num_4M);
	$files_trans_size_times[4]  =  array("name"=>"<5M","value"=>$num_5M);
	$files_trans_size_times[5]  =  array("name"=>"<6M","value"=>$num_6M);
	$files_trans_size_times[6]  =  array("name"=>"<8M","value"=>$num_8M);
	$files_trans_size_times[7]  =  array("name"=>"<10M","value"=>$num_10M);
	$files_trans_size_times[8]  =  array("name"=>"<20M","value"=>$num_20M);
	$files_trans_size_times[9]  =  array("name"=>"<30M","value"=>$num_30M);
	$files_trans_size_times[10] =  array("name"=>"<40M","value"=>$num_40M);
	$files_trans_size_times[11] =  array("name"=>"40M<","value"=>$num_ELSE);
	
	
	
	echo json_encode($files_trans_size_times,JSON_UNESCAPED_UNICODE); //返回测试的数据
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	