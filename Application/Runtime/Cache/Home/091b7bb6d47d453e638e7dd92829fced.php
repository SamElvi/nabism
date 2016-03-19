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
            <span class="sr-only">WEN DI</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:white">WEN DI</a>
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
	/*
	 * Masthead for nav
	 */

	.blog-masthead {
	  background-color: #428bca;
	  -webkit-box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
	          box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
	}

	/* Nav links */
	.blog-nav-item {
	  position: relative;
	  display: inline-block;
	  padding: 10px;
	  font-weight: 500;
	  color: #cdddeb;
	}
	.blog-nav-item:hover,
	.blog-nav-item:focus {
	  color: #fff;
	  text-decoration: none;
	}

	/* Active state gets a caret at the bottom */
	.blog-nav .active {
	  color: #fff;
	}
	.blog-nav .active:after {
	  position: absolute;
	  bottom: 0;
	  left: 50%;
	  width: 0;
	  height: 0;
	  margin-left: -5px;
	  vertical-align: middle;
	  content: " ";
	  border-right: 5px solid transparent;
	  border-bottom: 5px solid;
	  border-left: 5px solid transparent;
	}

	.myspace{
		margin-top: 20px;
		/*font-size: 20px;*/
		margin-bottom: 100px;
	}

	.my-head {
		text-align: center;
	}

	.sys-font-type,.use-font-type{
		font-size: 20px;
	}
	.sys-font-type,.note-font-type{
		color: darkgrey;
	}
	.use-font-type{
		color: ;
	}
	.form-group{
		margin-top: 5px;
		margin-bottom: 0px;
	}
	#userimg { 
		width: 300px;
		height: 300px;
	}

	.space-book-cover{
		height: 50px;
		width: 50px;
	}
</style>
<!-- <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="#">个人信息</a>
          <a class="blog-nav-item" href="#">我的书架</a>
          <a class="blog-nav-item" href="#">我的文章</a>
          <a class="blog-nav-item" href="#">我的信息
          	<span class="badge">2</span>
          </a>
          <a class="blog-nav-item" href="#">About</a>
        </nav>
      </div>
</div> -->
<div class="myspace">
	<div class="my-head">
		<a id="img_change">
			<!-- <?php if(!empty($userImgInfo["imgurl"])): ?><div class="img-thumbnail"  style="background-repeat: round; background-image:url('<?php echo ($userImgInfo["imgurl"]); ?>')"></div>  
            <?php else: ?>  	          
				<img data-src="holder.js/300x300" class="img-thumbnail" alt="300x300" src="/graduationproject/Public/img/bg.jpg" style="width: 300px; height: 300px;"><?php endif; ?> -->
			<?php if(!empty($my_userinfo["headerimage"])): ?><img  id="userimg" src="/graduationproject/Public/Uploads/Users/<?php echo ($my_userinfo["headerimage"]); ?>">
					<?php else: ?>
					<img style="width:150px;height:150px;" src="/graduationproject/Public/img/default.gif"><?php endif; ?>
		</a>
	</div>
	<hr />
	<div class="form-horizontal " >
        <div class="form-group">
            <label class="col-xs-6 .col-md-4 control-label">ID</label>
            <div class="col-xs-6 .col-md-4 ">
            	<label class="control-label"><?php echo ($my_userinfo["id"]); ?></label>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-xs-6 .col-md-4 control-label">昵称</label>
        	<div class="col-xs-6 .col-md-4 user-name-div">
        		<label class="control-label"><?php echo ($my_userinfo["name"]); ?></label>
        	</div>
        </div>
        <div class="form-group">
        	<label class="col-xs-6 .col-md-4 control-label">邮箱/帐号</label>
        	<div class="col-xs-6 .col-md-4 user-account-div">
        		<label class="control-label"><?php echo ($my_userinfo["email"]); ?></label>
        	</div>
        </div>
        <div class="form-group">
        	<label class="col-xs-6 .col-md-4 control-label">个性签名</label>
        	<div class="col-xs-6 .col-md-4 user-introduction-div">
        		<?php if(empty($my_userinfo["selfintroduction"])): ?><label class="control-label">social library</label>
        		<?php else: ?>
        			<label class="control-label"> <?php echo ($my_userinfo["selfintroduction"]); ?></label><?php endif; ?>
        	</div>
        </div>
        <div class="form-group">
            <label class="col-xs-6 .col-md-4 control-label">藏书量</label>
            <div class="col-xs-6 .col-md-4">
        		<?php if(($my_userinfo["books"] != 0)): ?><label class="control-label"><?php echo ($my_userinfo["books"]); ?></label>
            	<?php else: ?>
            		<label class="control-label">没有贡献图书</label><?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-6 .col-md-4 control-label">文章</label>
            <div class="col-xs-6 .col-md-4">
            	<?php if(($my_userinfo["articles"] != 0)): ?><label class="control-label"><?php echo ($my_userinfo["articles"]); ?></label>
            	<?php else: ?>
            		<label class="control-label">暂时没有文章</label><?php endif; ?>
            </div>
        </div>
    </div>

	<hr />
	<div class="books-articles">
		<div class="row">
			<div class="col-xs-6 .col-md-6 ">
				<?php if(is_array($mybooks)): $i = 0; $__LIST__ = $mybooks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><div class="well" id="<?php echo ($book['id']); ?>">
						<img class="space-book-cover" src="/graduationproject/Public/Uploads/Books/<?php echo ($book['cover']); ?>">
						<a href="<?php echo ($book['uri']); ?>" target="_blank"><label>《<?php echo ($book['title']); ?>》发布时间：<?php echo ($book['ctime']); ?></label></a>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>	
			</div>
			<div class="col-xs-6 .col-md-6"> 
				<?php if(is_array($myarticles)): $i = 0; $__LIST__ = $myarticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><div class="well" id="<?php echo ($article['id']); ?>">
						<a href="<?php echo ($article['uri']); ?>" target="_blank">
							《<?php echo ($article['title']); ?>》
						</a>
						<p class="text-muted small"> &nbsp;&nbsp;发表时间:<?php echo ($article['ctime']); ?></p>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
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