<?php
	require_once 'connect.php';
	//获取用户输入的文件提取码
	$downloadnumber = $_POST['myNumber'];
	//echo $downloadnumber;
	if(!$downloadnumber){
		echo "<script>alert('没有输入文件提取码！');window.location.href='index.php'</script>";
		exit;
	}else{
	//在数据库中根据输入的提取码查找数据
	$sql1 = "select * from fileinfo where downloadnumber = $downloadnumber";
	//将查找到的那一行赋值给$query作为资源标识符
	$query1 = mysql_query($sql1);
	//echo $query;
	//获取资源标识符$query所指向的对象，也就是所要查找的这一行
	$arr1 = mysql_fetch_object($query1);
	//如果没有查找到对应的对象，则说明数据库中没有这条数据，$downloadnumber不存在于系统fileinfo数据表里面
	if($arr1 == NULL){
		echo "<script>alert('没有输入文件提取码！');window.location.href='index.php'</script>";
		exit;
	}
	//从$arr对象中获取path的值，并将其赋值给$downloadpath
	$downloadpath = $arr1 -> path;
	
	//echo $downloadpath;
	//echo "<script>alert('$downloadpath');window.location.href='index.php'</script>";
	
	
	/********************以下是将下载相关的记录写入数据库filedownloadrecords********************/
	//获取下载的时间
	$date_tmp = time();//获取Linux时间戳
	$dateline2 = date("Y-m-d H:i:s", $date_tmp+8*60*60);//将时间戳转换为标准时间
	
	$name2 = $arr1 -> name;
	$path2 = $arr1 -> path;
	$md5name2 = $arr1 -> md5name;
	$type2 = $arr1 -> type;
	$size2 = $arr1 -> size;
	$downloadnumber2 = $arr1 -> downloadnumber;
	
	
	$requestIP = $_SERVER["REMOTE_ADDR"];
	
	//echo $requestIP;
	
	
	//在用户下载数据库里面重找是否有下载的记录
	//$downloadtimes = 0;
	
	$sql2 = "select * from filedownloadrecords where downloadnumber = $downloadnumber";
	
	$query2 = mysql_query($sql2);
	
	$arr2 = mysql_fetch_object($query2);
	
	/**如果下载记录表中没有这条记录，那么久插入这条记录*/
//	if ($arr2 == NULL){
		
		$downloadtimes=1;
		
		$insertsql = "insert into filedownloadrecords(name,path,md5name,type,size,downloadnumber,requestIP,downloadtimes,dateline) values ('$name2','$path2','$md5name2','$type2','$size2','$downloadnumber2','$requestIP','$downloadtimes','$dateline2')";
		//echo $insertsql;
		mysql_query($insertsql);
		
		
		
	/**如果有这条记录就判断是否为同一IP，如果是就增加下载次数，如果不是就重新插入一条数据*/
// 	}else 
// 	{
		
// 		if ($requestIP == $arr2 -> requestIP){
// 		//获取下载记录表中存储的下载次数的数据downloadtimes
		
// 		$downloadtimes = $arr2 -> downloadtimes + 1;
		
// 		$sql3 = "update filedownloadrecords set downloadtimes = $downloadtimes where downloadnumber = $downloadnumber";
		
// 		mysql_query($sql3);
// 		}else {
// 			/**不是同一条IP，那个就需要再插入一条数据*/
// 			$downloadtimes=1;
			
// 			$insertsql2 = "insert into filedownloadrecords(name,path,md5name,type,size,downloadnumber,requestIP,downloadtimes,dateline) values ('$name2','$path2','$md5name2','$type2','$size2','$downloadnumber2','$requestIP','$downloadtimes','$dateline2')";;
// 			//echo $insertsql2;
// 			mysql_query($insertsql2);
			
// 		}
		
// 	}
	
	
	/***********强制让用户下载文件的代码，用Header实现************/
		$file_dir = 'FilesUpload/';
		$file_name = $arr1 -> md5name;
		
		$file = fopen($file_dir.$file_name,"r"); // 打开文件
		//输入文件标签
		Header("Content-type: application/octet-stream");
		Header("Accept-Ranges: bytes");
		Header("Accept-Length: ".filesize($file_dir . $file_name));
		Header("Content-Disposition: attachment; filename=" . $file_name);//最终保存在磁盘上的文件名
		// 输出文件内容
		echo fread($file,filesize($file_dir.$file_name));
		fclose($file);
		//exit();
	
	
	//echo "<script>window.location.href='$downloadpath'</script>";
	}
	
	
	
	
	