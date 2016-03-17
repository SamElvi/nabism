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
		<link rel="stylesheet" type="text/css" media="all" href="/graduationproject/Public/css/login_styles.css" />
	<style type="text/css">
		.overCorn{
		    position: absolute;
		    /* top: 250px; */
		    /* left: 30%; */
		    background-color: rgba(10, 6, 6, 0.35);
		    box-shadow: #C0C0C0 3px 3px 3px;
		    width: 100%;
		    height: 100%;
		    top: 60px;
		    left: 0px;
		}

		#signIn_wrong,#signUp_wrong{
			color: red;
      text-align: center;

		}
    #locaiton:hover{
      background-color: #7CC67C;
    }

  
	</style>

<div class="login-wrap">
<!--   <div class="overCorn">
</div> -->
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In 登录</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up 注册</label>
    <div class="login-form">
      <div class="sign-in-htm">
        <div class="group">
          <label for="user" class="label">Account(Email)</label>
          <input id="user" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Keep me Signed in</label>
        </div>
        <p id="signIn_wrong"></p>
        <div class="group">
          <button class="button" id="sign_in">Sign In 登录</button>
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="#forgot">Forgot Password?</a>
        </div>
      </div>
      <div class="sign-up-htm">
        <div class="group">
          <label for="pr_user" class="label">Username</label>
          <input id="pr_user" type="text" class="input">
        </div>
        <div class="group">
          <label for="pr_pass" class="label">Password</label>
          <input id="pr_pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="prc_pass" class="label">Repeat Password</label>
          <input id="prc_pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="pr_email" class="label">Email Address</label>
          <input id="pr_email" type="text" class="input">
        </div>
        <p id="signUp_wrong"></p>
        <div class="group">
          <button  class="button" id="sign_up">Sign Up 注册</button>
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <label for="tab-1">Already Member?</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

var lat;
var lng;
var address;
// var locationInfo ={};
	$(function() {
    $("#locaiton").click(function(){
      alert('1111');
      $("#mark-location").click();
    });
    //登录接口
		$("#sign_in").click(function(event){
			var user = deleteEmptyStr($("#user").val());
			var pass = deleteEmptyStr($("#pass").val());
			var check = $("#check")[0].checked;
			if(user !='' && pass!=''){
				if(!checkemail(user)){
					$("#signIn_wrong").html("请填写正确的用户名格式");
					setTimeout(function(){$("#signIn_wrong").html("");},4000);
					return ;
				}
				else{
					$.post('<?php echo U("Login/tryLogin");?>',{
						user: user,
						password: pass,
            lat: '134.023422342',
            lng: '122.23113',
            address:'北京市',
						check: check
					},function(data){
            $("#signIn_wrong").html(data['name']);
            setTimeout(function(){$("#signIn_wrong").html('')},4000);
            if(data['code'] == 1){
              location.href='<?php echo U("Nation/index");?>';
            }
            return ;
					});
				}
			}
			else{
				$("#signIn_wrong").html("请输入完整的用户名和密码");
				setTimeout(function(){$("#signIn_wrong").html("");},4000);
				return ;
			}
		});

    // 注册接口
    $("#sign_up").click(function(){
      var username = deleteEmptyStr($("#pr_user").val());
      var password1 = deleteEmptyStr($("#pr_pass").val());
      var password2 = deleteEmptyStr($("#prc_pass").val());
      var email = deleteEmptyStr($("#pr_email").val());

      if(username != '' && password1 != '' && password2!='' && email !=''){
        if(password1 != password2){
          $("#signUp_wrong").html('密码不一致');
          setTimeout(function(){$("#signUp_wrong").html('')},4000);
          return ;
        }

        if(!checkemail(email)){
          $("#signUp_wrong").html('邮箱格式不正确');
          setTimeout(function(){$("#signUp_wrong").html('')},4000);
          return ;
        }
          // do sign_up
        $.post('<?php echo U("Login/doSignUp");?>',{
          username:username,
          password:password1,
          email:email,
          lat: '134.023422342',
          lng: '122.23113',
          address:'北京市'
        },function(data){
            $("#signUp_wrong").html(data['name']);
          setTimeout(function(){$("#signUp_wrong").html('')},4000);
          if(data['code'] == 1){
            location.href='<?php echo U("Nation/index");?>';
          }
          return ;
        });

      }else{
        $("#signUp_wrong").html('请填写完整信息');
         setTimeout(function(){$("#signUp_wrong").html('')},4000);
         return ;
      }
    });
	});

	//判断邮箱格式是否合格
    function checkemail(email) { var obj = new RegExp("^[0-9a-zA-Z][_.0-9a-zA-Z-]{0,31}@([0-9a-zA-Z][0-9a-zA-Z-]{0,30}[0-9a-zA-Z]\.){1,4}[a-z]{2,4}$"); return obj.test(email); }
    //检查电话号码是否合格
    function checkphonenumber(phonenum) { var obj = new RegExp(/^(13[0-9]{9}$)|(15[89][0-9]{8}$)|(18[0-9]{8}$)/); return obj.test(phonenum);}

    function deleteEmptyStr(str){
      str = str.replace(/\s+/g,"");
      return str;
    }
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