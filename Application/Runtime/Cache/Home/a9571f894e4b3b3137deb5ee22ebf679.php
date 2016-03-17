<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="HandheldFriendly" content="True">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title><?php echo ($title); ?></title>
		<link href="/graduationproject/Public/dist/css/bootstrap.css" rel="stylesheet">
	<script src="/graduationproject/Public/js/jquery-2.1.1.js" type="text/javascript"></script>


	<style type="text/css">
		body {
		  padding-top: 70px;
		}

		.theme-dropdown .dropdown-menu {
		  position: static;
		  display: block;
		  margin-bottom: 20px;
		}

		.theme-showcase{
			padding-bottom: 50px;
		}

		.theme-showcase > p > .btn {
		  margin: 5px 0;
		}

		.theme-showcase .navbar .container {
		  width: auto;
		}

		.footer {
		  /*position: absolute;*/
		  bottom: 0;
		  width: 100%;
		  /* Set the fixed height of the footer here */
		  height: 60px;
		  background-color: #f5f5f5;
		}
	</style>
</head>
<body role="document">
	<style type="text/css">
    #head-img{
    	width: 40px;
    	height: 40px;
      background-repeat: round;
	    display: block;
    }
    #head-a-img {
	    padding: 1px 10px;
    }
    .nav a {
    	margin-top: 15px;
    }
    #u-message{
      padding: 0px;
    }
    .navbar-brand{
      font-size: 30px;
    }
    </style>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">National Library</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:white">National Library</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          	<li><a href="<?php echo U('Nation/index');?>" class="active">HOME</a></li>
			<li><a href='<?php echo U("Articles/index");?>'>好文</a></li>
			<!-- <li><a href="#">附近的人</a></li> -->
			<li><a href='<?php echo U("Books/donateBooks");?>'>发布图书</a></li>
			<li><a href='<?php echo U("Articles/writeArticle");?>'>发布文章</a></li>
			<?php if(!empty($userInfo)): ?><li> 
					<!-- style="padding-top:10px;" -->
					<a  id="head-a-img" href='/graduationproject/index.php/home/user/user/userid/<?php echo ($userInfo["userid"]); ?>.html'>
            <!-- <?php if(!empty($userInfo["headerimage"])): ?><div id="head-img" style="background-image:url('<?php echo ($userImgInfo["imgurl"]); ?>')"></div>  
                <?php else: ?>            
                 <img id="head-img" src="/graduationproject/Public/img/bg.jpg"><?php endif; ?> -->

            <?php if(!empty($userImgInfo)): ?><img  id="head-img" src="/graduationproject/Public/Uploads/Users/<?php echo ($userImgInfo); ?>">
              <?php else: ?>
              <img id="head-img" src="/graduationproject/Public/img/default.gif"><?php endif; ?>
          </a>
					<!-- U('Blog/cate','cate_id=1&status=1') -->
				</li>
        <!-- <li>
          <a href="" id="u-message"><span class="badge">2</span></a>
        </li> -->
				<li><a id="log_out">退出</a></li>
			<?php else: ?>
				<li><a href="<?php echo U('Login/login');?>">SignIn/SignUp</a></li><?php endif; ?>
            <!-- <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<script>
	$(function(){
		$("li").find("#log_out").click(function(){
			$.post('<?php echo U("Login/logOut");?>',{
			},function(data){
				location.reload();
			});
		});
	})
</script>		

	<div class="container theme-showcase" role="main" style=”clear:both;”>
	
<link rel="stylesheet" type="text/css" href="/graduationproject/Public/css/bootstrap3-wysihtml5.min.css"></link>
<!-- <link rel="stylesheet" type="text/css" href="/graduationproject/Public/css/blog.css"> -->

<div class="row">
	<div class="col-sm-10 ">
		<div class="jumbotron" style="margin-top:40px">
			<div class="form-inline">
				<input type="text" class="form-control title" style="width:400px" value="<?php echo ($article["title"]); ?>" placeholder="输入标题(限20字)">
				<button class="btn btn-success publish ">发布文章</button>
				<button class="btn btn-primary draft">存为草稿</button>
			</div>
			<hr style="border-color: white"/>
			<textarea class="textarea form-control" placeholder="Enter text ..." style="width: 100%; height: 800px; font-size: 14px; line-height: 18px;" data-id="<?php echo ($article["id"]); ?>"><?php echo ($article["content"]); ?></textarea>
		</div>
	</div>
	<div class="col-sm-2" style="margin-top:40px;">
		<div class="sidebar-module sidebar-module-inset">
            <h4>草稿：</h4>
            <?php if(is_array($draftsList)): foreach($draftsList as $k=>$draft): ?><p><em><?php echo ($k); ?>: </em><a href="<?php echo ($draft["uri"]); ?>">《<?php echo ($draft["title"]); ?>》</a><br>  <?php echo ($draft["ctime"]); ?></p><?php endforeach; endif; ?>
     </div>
	</div>
</div>

<script src="/graduationproject/Public/js/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript" src="/graduationproject/Public/js/bootstrap-wysihtml5.zh-CN.js"></script>
<script>
  var article_id = '<?php echo ($article["id"]); ?>';
  $('.textarea').wysihtml5({
  	locale: "zh-CN",
	});

  $(function() {
  	$(".jumbotron").find(".publish").click(function(){
  		saveText(1);
  		console.log(1);
  	});

  	$(".jumbotron").find(".draft").click(function(){
  		saveText(0);
  		console.log(0);
  	});

  	function saveText(type){
  		var title = $(".title").val();
  		var content = $(".textarea").val();
  		if(title!=='' && content !==''){
  			$.post('<?php echo U("Articles/saveArticle");?>',{
  				title:title,
  				content:content,
  				type:type,
          article_id:article_id
  			},function(data){
          if(data['code'] ==1){
            location.href=data['uri'];
            return ;
          }else if(data['code']){
            location.reload();
            return ;
          }else{
            alert(data['name']);
          }
  			});
  		}else{
  			alert("请完善内容再保存或者发表");
  			return;
  		}
  		
  	}
  });
</script>
	</div>
	<style type="text/css">
.footer-content{
	text-align: center;
	padding-bottom: 20px;
	padding-top: 10px;
}



</style>
    <style type="text/css"></style>
    <footer class="footer" style="height:auto">
      <div class="footer-content">
        <p class="text-muted center-block">National Library 是有许广保搭建</p>
        <p class="text-muted center-block">感谢<a href="http://www.bootcss.com/" target="_blank">Bootstrap</a>,感谢<a href="http://www.thinkphp.cn/" target="_blank">ThinkPHP</a>,感谢 
          <a href="https://www.apachefriends.org/zh_cn/index.html" target="_blank">Xampp</a>,感谢<a href="https://jquery.com/" target="_blank">jQuery</a>,等免费开源项目支持</p>	
       	<a href="">关于我AboutMe</a>
      </div>
    </footer>
	    <script src="/graduationproject/Public/dist/js/bootstrap.min.js"></script>
</body>
</html>