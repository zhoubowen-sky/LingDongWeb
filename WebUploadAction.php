<?php
	require_once 'connect.php';
	
	$fileInfo = $_FILES['myFile'];
	$filename = $fileInfo['name'];
	$type     = $fileInfo['type'];
	$tmp_name = $fileInfo['tmp_name'];
	$size     = $fileInfo['size'];
	$error    = $fileInfo['error'];
	//文件路径
	$path     = 'FilesUpload';
	//文件后缀名
	$ext=pathinfo($filename,PATHINFO_EXTENSION);
	//上传者IP
	$uploaderIP = $_SERVER["REMOTE_ADDR"];
	
	//将服务器上的临时文件移动指定目录下
	//move_uploaded_file($tmp_name,$destination):将服务器上的临时文件移动到指定目录下
	//叫什么名字，移动成功返回true，否则返回false
	//move_uploaded_file($tmp_name, "uploads/".$filename);
	//copy($src,$dst):将文件拷贝到指定目录，拷贝成功返回true,否则返回false
	//copy($tmp_name,"uploads/".$filename);
	
	if($error == UPLOAD_ERR_OK){
		//确保文件名唯一，防止重名产生覆盖
		$uniName = md5(uniqid(microtime(true),true)).'.'.$ext;
		//echo $uniName;exit;
		$destination = $path.'/'.$uniName;
		if(@move_uploaded_file($tmp_name,$destination)){
			//echo "<script>alert('文件上传成功!');window.location.href='index.php'</script>";
		}else{
			echo "<script>alert('文件上传失败!');window.location.href='index.php'</script>";
			exit;
		}
	}else{
		//匹配错误信息
		switch($fileInfo['error']){
			case 1:
				echo '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
				break;
			case 2:
				echo '超过了表单MAX_FILE_SIZE限制的大小';
				break;
			case 3:
				echo '文件部分被上传';
				break;
			case 4:
				echo "<script>alert('没有选择上传文件!');window.location.href='index.php'</script>";
				break;
			case 6:
				echo '没有找到临时目录';
				break;
			case 7:
			case 8:
				echo '系统错误';
				break;
		}
		exit;
	}
	
	//向数据库中添加文件的信息
	//mysql_query("set names utf8");
	$downloadpath = "http://115.28.101.196/".$destination;
	//echo $downloadpath;
	
	$downloadnumber = rand(100,999999);//生成随机的四位提取码
	
	//判断系统数据库中是否已经有这个提取码
	
	
	/* while (($sql_downloadnumber = "select * from fileinfo where downloadnumber = $downloadnumber")) {
		$downloadnumber = rand(100,999999);
	}
	 */
	
	$date_tmp = time();//获取Linux时间戳
	$dateline = date("Y-m-d H:i:s", $date_tmp+8*60*60);//将时间戳转换为标准时间
	
	$insertsql = "insert into fileinfo(name,path,md5name,type,size,downloadnumber,uploaderIP,dateline) values ('$filename','$downloadpath','$uniName','$ext','$size','$downloadnumber','$uploaderIP','$dateline')";
	//echo $insertsql;
	mysql_query($insertsql);
	
	echo "<script>alert('文件上传成功!文件提取码为：$downloadnumber');window.location.href='index.php'</script>";
	//echo "文件上传成功，文件提取码为：".$downloadnumber;
	//echo "<script>alert('文件上传成功!')</script>";
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	