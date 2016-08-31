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
	
	$sql  = "select  type  from  fileinfo";  //选择存储离线文件的数据表 fileinfo  ,只选取文件类型
	$query  = mysql_query($sql); //$query是资源标识符   就是指针
	
	
	//定义存储每一种类型文件的变量
	$num_JPG = 0;
	$num_PNG = 0;
	$num_DOC = 0;
	$num_PPT = 0;
	$num_XLS = 0;
	$num_PDF = 0;
	$num_TXT = 0;
	$num_MP3 = 0;
	$num_ZIP = 0;
	$num_RAR = 0;
	$num_APK = 0;
	$num_EXE = 0;
	$num_ELSE = 0;
	
	//下面是离线文件数据表  fileinfo 中的数据
	while ($row = mysql_fetch_row($query)){
		
		$row[0] = strtoupper($row[0]);//将字符串转换为大写
		//echo $row[0]."<br>";
		
		switch ($row[0]){
			case 'JPG':
				$num_JPG++;
				break;
				
			case 'PNG':
			  	$num_PNG++;
			  	break;
			  
			case 'DOC':
			  	$num_DOC++;
			  	break;
			  	
			case 'DOCX':   //DOCX也统计在DOC
			  	$num_DOC++;
			  	break;
			  
			case 'PPT':
				$num_PPT++;
				break;
				
			case 'PPTX':  //PPTX也统计在PPT
				$num_PPT++;
				break;
			  
			case 'XLS':
			  	$num_XLS++;
			  	break;
			  	
			case 'XLSX':  //XLSX也统计在XLS
			  	$num_XLS++;
			  	break;
			  
			case 'PDF':
			  	$num_PDF++;
			  	break;
			  	
			case 'TXT':
			  	$num_TXT++;
			  	break;
			
			case 'MP3':
			  	$num_MP3++;
			  	break;
			  	
			case 'ZIP':
			  	$num_ZIP++;
			  	break;		  	
			  	
			case 'RAR':  //RAR也统计在ZIP
			  	$num_ZIP++;
			  	break;		  	
			  	
			case 'APK':
			  	$num_APK++;
			  	break;
			  	
			case 'EXE':
			  	$num_EXE++;
			  	break;
			  	
			default:
				$num_ELSE++;
				break;
		}
	}
	
	
	
	
	$sql2 = "select  files_type  from  user_using_files_trans_android";  //选择存储Android端文件传输信息的数据表 user_using_files_trans_android  ,只选取文件类型
	$query2 = mysql_query($sql2);
	
	//下面是Android端之间，Android与电脑之间文件传递的数据  数据表为   user_using_files_trans_android 
	while ($row2 = mysql_fetch_row($query2)){
	
		$row2[0] = strtoupper($row2[0]);//将字符串转换为大写
		//echo $row2[0]."<br>";
	
		switch ($row2[0]){
			case 'JPG':
				$num_JPG++;
				break;
	
			case 'PNG':
				$num_PNG++;
				break;
					
			case 'DOC':
				$num_DOC++;
				break;
	
			case 'DOCX':   //DOCX也统计在DOC
				$num_DOC++;
				break;
					
			case 'PPT':
				$num_PPT++;
				break;
	
			case 'PPTX':  //PPTX也统计在PPT
				$num_PPT++;
				break;
					
			case 'XLS':
				$num_XLS++;
				break;
	
			case 'XLSX':  //XLSX也统计在XLS
				$num_XLS++;
				break;
					
			case 'PDF':
				$num_PDF++;
				break;
	
			case 'TXT':
				$num_TXT++;
				break;
					
			case 'MP3':
				$num_MP3++;
				break;
	
			case 'ZIP':
				$num_ZIP++;
				break;
	
			case 'RAR':  //RAR也统计在ZIP
				$num_ZIP++;
				break;
	
			case 'APK':
				$num_APK++;
				break;
	
			case 'EXE':
				$num_EXE++;
				break;
	
			default:
				$num_ELSE++;
				break;
		}
	}
	
	
	//echo $num_JPG;
	//echo $num_EXE;
	//echo $num_ZIP;
	//echo $num_TXT;
	//echo $num_ELSE;
	
	
	$files_trans_type_times[0]  =  array("name"=>"JPG","value"=>$num_JPG); 
	$files_trans_type_times[1]  =  array("name"=>"PNG","value"=>$num_PNG);
	$files_trans_type_times[2]  =  array("name"=>"DOC","value"=>$num_DOC);
	$files_trans_type_times[3]  =  array("name"=>"PPT","value"=>$num_PPT);
	$files_trans_type_times[4]  =  array("name"=>"XLS","value"=>$num_XLS);
	$files_trans_type_times[5]  =  array("name"=>"PDF","value"=>$num_PDF);
	$files_trans_type_times[6]  =  array("name"=>"TXT","value"=>$num_TXT);
	$files_trans_type_times[7]  =  array("name"=>"MP3","value"=>$num_MP3);
	$files_trans_type_times[8]  =  array("name"=>"ZIP","value"=>$num_ZIP);
	$files_trans_type_times[9]  =  array("name"=>"APK","value"=>$num_APK);
	$files_trans_type_times[10] =  array("name"=>"EXE","value"=>$num_EXE);
	$files_trans_type_times[11] =  array("name"=>"其他","value"=>$num_ELSE);
	
	
	
	echo json_encode($files_trans_type_times,JSON_UNESCAPED_UNICODE); //返回测试的数据
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	