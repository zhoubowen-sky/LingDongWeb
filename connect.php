<?php
	require_once 'config.php';
	//连接数据库，资源标识符$con,@可以隐藏警告
	if(!($con = @mysql_connect(HOST,USERNAME,PASSWORD))){
		echo "连接数据库失败";
	}
	//选择数据库
	if(!(mysql_select_db('uploadfileinfo'))){
		echo "<br>选择数据库失败";
	}
	//设定字符集
	if(!(mysql_query('set names utf8'))){
		echo "<br>设定字符集失败";
	}