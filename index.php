<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>灵动快传文件分享平台</title>

    <link  href="http://cdn.bootcss.com/amazeui/2.7.1/css/amazeui.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
	<!-- 下面是添加网站标题栏前面的Logo <link rel="icon" href="website_icon.ico" type="image/x-icon" />-->
	<link rel="shortcut icon" href="img/website_icon.ico"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--APP二维码显示的脚本-->
    <script type="text/javascript">
        function  showImg(){
            document.getElementById("wxImg").style.display='block';
        }
        function hideImg(){
            document.getElementById("wxImg").style.display='none';
        }
    </script>

	<style type='text/css'>
        .julishangmian {
            padding-top: 20px;
        }
		.julishangmian2 {
            padding-top: 190px;
        }
        /*"数据分析与可视化："字样垂直居中代码*/
        .center-vertical {
            position:relative;
            top:50%;
            transform:translateY(20%);
        }
		.dibianlanyanse{
			background:#1C1C1C;
		}
    </style>
	
	
	
	
    <!--图片轮播文件引入-->
    <link href="css/dongtai/jsdaima.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="css/dongtai/jsdaima.js"></script>



</head>


<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand topnav " href="#shouye">灵动快传文件分享平台</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right ">
                    <li>
                        <a href="#uploadfiles">上传文件</a>
                    </li>
                    <li>
                        <a href="#downloadfiles">下载文件</a>
                    </li>
					<li>
                        <a href="DataVisualization/DataVisualization_index.html" target="_blank">大数据分析</a>
                    </li>
					<li>
                        <a href="#aboutus">关于我们</a>
                    </li>
					<li>
                        <a href="javascript:void(0)" onMouseOut="hideImg()"  onmouseover="showImg()">扫码下载APP</a> <!--这里做成用户鼠标一移动到这儿就显示一个二维码的图片，用户扫码后就可以跳转到APP的下载界面-->
                        <div id="wxImg" style="display:none;position:absolute;"><img src="img/APP_ErWeiMa.jpg"></div>
                    </li>
					<li>
                        <a href="http://115.28.101.196/AndroidAPK/LingDong_PC_V2.1.zip">下载PC版软件</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	
	
	
	
	
	
	<!-- 图片轮播代码 开始 -->
	<div id="playBox">
	  <div class="pre"></div>
	  <div class="next"></div>
		<div class="smalltitle">
		  <ul>
			<li class="thistitle"></li>
			<li></li>
			<li></li>
		  </ul>
		</div>
		<ul class="oUlplay">
		   <li><img src="img/images/1.jpg"/></li>
		   <li><img src="img/images/2.jpg"/></li>
		   <li><img src="img/images/3.jpg"/></li>
		</ul>
	</div>
	<!-- 图片轮播代码 结束 -->




	
	
	


    <!-- Header -->
    <a name="shouye"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1 ></h1>
                        <h3 ></h3>
                     <!--<center>   <hr class="intro-divider" >  </center>-->
                        <ul class="list-inline intro-social-buttons">
                            <li>
								<!--<a href="#maodian1" class="btn btn-default btn-lg"><i class="am-icon-cloud-upload"></i><span class="network-name"></span></a>--> 
                            </li>
                            <li>
                                <!--<a href="#maodian2" class="btn btn-default btn-lg"><i class="am-icon-cloud-download"></i><span class="network-name"></span></a>--> 
                            </li>
                            <li>
                                <!--<a href="#maodian3" class="btn btn-default btn-lg"><i class="am-icon-heart"></i><span class="network-name"></span></a>--> 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div> 
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="uploadfiles"></a>
    <div class="content-section-a julishangmian2"  id="maodian1">

        <div class="container" >
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">上传文件:<br>Upload Files</h2>
                    <p class="lead">在这里您可以上传文件 ，随后我们会返回给您一个文件提取码，以供提取文件。</p>
				 
					<form action="WebUploadAction.php" method="post" enctype="multipart/form-data">
					<hr>
					<div class="am-btn-group">
						<div class="am-form-group am-form-file" id="file-upload">
							<button type="button" class="am-btn am-btn-danger am-btn-primary">选择要上传的文件</button>
							<input id="doc-form-file" type="file" multiple name="myFile">
						</div>
						<div id="file-list"></div>
					</div>
					<div id="upload">
						<button type="submit" class="am-btn am-btn-primary"><i class="am-icon-cloud-upload"></i>点击上传</button>
					</div>
		</form>
		
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/ipad.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
	<a  name="downloadfiles"></a>
    <div class="content-section-b" id="maodian2">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">下载文件:<br>Download Files</h2>
                    <p class="lead">您需要一个提取码来下载文件 ，提取码在上传时自动生成。</p>
              
			  
			  	<div class="am-g">
				<div class="am-u-lg-6 am-u-md-10 ">
			
				<form action="WebDownloadAction.php" method="post" enctype="multipart/form-data"class="am-form">
				<hr/>
				</div>
			</div>
			<label for="text">请输入文件提取码 ：</label>
			<br>
			<input type="text" name="myNumber" />
			<br>
			<br>
			<button type="submit" class="am-btn am-btn-primary"><i class="am-icon-cloud-download"></i> 点击下载</button>
			  </form>
			  
			  
			    </div>
							
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/dog.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
	
	
	
	
	<a  name="shujufenxijiqikeshihua"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 center-vertical">
                    <h2 class="center-vertical">大数据分析：</h2>
                </div>
                <div class="col-lg-7">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="DataVisualization/DataVisualization_index.html#gnmksypl" class="btn btn-default btn-sm"><span class="network-name">功能模块使用频率</span></a>
                        </li>
                        <li>
                            <a href="DataVisualization/DataVisualization_index.html#cswjlxfx" class="btn btn-default btn-sm"><span class="network-name">传输文件类型分析</span></a>
                        </li>
						<li>
                            <a href="DataVisualization/DataVisualization_index.html#cswjdxfx" class="btn btn-default btn-sm"><span class="network-name">传输文件大小分析</span></a>
                        </li>
                        <li>
                            <a href="DataVisualization/DataVisualization_index.html#wjscsjfb" class="btn btn-default btn-sm"><span class="network-name">文件上传时间分布</span></a>
                        </li>
                        <div class="julishangmian"></div>
                        <li>
                            <a href="DataVisualization/DataVisualization_index.html#APPsysjfx" class="btn btn-default btn-sm"><span class="network-name">APP使用时间分析</span></a>
                        </li>
                        <li>
                            <a href="DataVisualization/DataVisualization_index.html#AndroidVersion" class="btn btn-default btn-sm"><span class="network-name">安卓手机版本分布</span></a>
                        </li>
                        <li>
                            <a href="DataVisualization/DataVisualization_index.html#khdfblfb" class="btn btn-default btn-sm"><span class="network-name">客户端分辨率分布</span></a>
                        </li>
                        <li>
                            <a href="DataVisualization/DataVisualization_index.html#yhdyfbqk" class="btn btn-default btn-sm"><span class="network-name"><!--用户地域分布情况-->数据可视化小总结</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->
	
	
	
	
	
	
	
	
    <!-- /.content-section-b -->
	<a  name="aboutus"></a>
    <div class="content-section-a" id="maodian3">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">关于我们<br>About Us</h2>
					<p class="lead">你好，我们是来自湖北大学的“根号三”团队，队员分别为：郑志琦、董致礼、周博文 。<br>联系方式：<br>董：yhinu@qq.com<br>郑：664837069@qq.com<br>周：zhoubowen.sky@qq.com</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/phones.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
	
	
	
	

	

    <!-- Footer -->
    <footer class="dibianlanyanse">
        <div class="container">
		
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">首页</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="/tanzhen.php" target="_blank" class="links">CentOS6.5 探针</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="/phpinfo.php" target="_blank" class="links">PHPinfo</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; 湖北大学根号三团队 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
