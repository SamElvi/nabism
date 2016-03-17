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
	<style type="text/css">
	.cover{
		text-align: center;
	}
	.cover-img{
		width: 300px;
		height: 300px;
	}
	.user-img{
		height: 100px;
		width: 100px;
	}

	.little-cover{
		width: 50px;
		height: 50px
	}
</style>
<div class="row" style="margin-bottom:60px;margin-top:50px">
	<div class="col-sm-8" style="border-right: 1px solid">
		<div class="cover">
			<img class="cover-img" src="/graduationproject/Public/Uploads/Books/<?php echo ($book['cover']); ?>">
		</div>
		<div class="form-horizontal">
			<div class="form-group">
	            <label class="col-xs-5 .col-md-4 control-label">书名</label>
	            <div class="col-xs-6 .col-md-4 ">
	            	<label class="control-label"><?php echo ($book['title']); ?></label>
	            </div>
        	</div>
        	<div class="form-group">
	            <label class="col-xs-5 .col-md-4 control-label">作者</label>
	            <div class="col-xs-6 .col-md-4 ">
	            	<label class="control-label"><?php echo ($book['author']); ?></label>
	            </div>
        	</div>
        	<div class="form-group">
	            <label class="col-xs-5 .col-md-4 control-label">简介</label>
	            <div class="col-xs-6 .col-md-4 ">
	            	<label class="control-label"><?php echo ($book['content']['introduction']); ?></label>
	            </div>
        	</div>
        	<div class="form-group">
	            <label class="col-xs-5 .col-md-4 control-label">评论</label>
	            <div class="col-xs-6 .col-md-4 ">
	            	<label class="control-label"><?php echo ($book['content']['mycomment']); ?></label>
	            </div>
        	</div>
        	<div class="form-group">
	            <label class="col-xs-5 .col-md-4 control-label">分享者</label>
	            <div class="col-xs-6 .col-md-4 ">
	            	<label class="control-label"><?php echo ($book_user['name']); ?></label>
	            </div>
        	</div>
        	<div class="form-group">
	            <label class="col-xs-5 .col-md-4 control-label">联系方式</label>
	            <div class="col-xs-6 .col-md-4 ">
	            	<label class="control-label"><?php echo ($book_user['email']); ?></label>
	            </div>
        	</div>
		</div>
	</div>
	<div class="col-sm-4" >
		<div class="book-user" style="text-align:center">
			<img class="user-img" src="/graduationproject/Public/Uploads/Users/<?php echo ($book_user['img']); ?>">
			<p>分享者：<?php echo ($book_user['name']); ?></p>
			<p>Email：<?php echo ($book_user['email']); ?></p>
        	<label>他还分享的图书：</label>
		</div>
		<?php if(is_array($user_books)): $i = 0; $__LIST__ = $user_books;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ubook): $mod = ($i % 2 );++$i;?><div class="row" style="padding-left:50px">
				<a href='<?php echo ($ubook["uri"]); ?>'>
					<div class='col-xs-2 .col-md-2' >
						<img class="little-cover" src="/graduationproject/Public/Uploads/Books/<?php echo ($ubook['cover']); ?>">
					</div>
					<div class="col-xs-10 .col-md-10 ">
						<p><?php echo ($ubook["title"]); ?></p>
						<p><?php echo ($ubook["author"]); ?></p>
					</div>
				</a>
	        </div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>
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