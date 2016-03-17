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
	<link rel="stylesheet" type="text/css" href="/graduationproject/Public/css/jquery.Jcrop.css">
<script type="text/javascript" src="/graduationproject/Public/js/imgjs/jquery.Jcrop.js"></script>
<script type="text/javascript" src="/graduationproject/Public/js/imgjs/ajaxfileupload.js"></script>

<style>

	#save_img{
		margin-top: 20px;
	}
	#set-cover{
		padding-left: 75px;
		text-align: center;
		/*display: none;*/
	}
	#book-cover{
		text-align: center;
	}
	#bookimg { 
		width: 300px;
		height: 300px;
	}
	.content{
		margin-top: 10px;
		margin-bottom: 10px;
		display: flex;
	}
</style>
<script>
$(document).ready(function(e){
		
	$('#head_photo').on('change',function(){ 
		console.log('change');
		ajaxFileUploadview('head_photo','photo_pic','<?php echo U("Img/getImg");?>');

	});	
});


function show_head(head_file){
}

function createCutArea(imgurl){
	console.log(imgurl);
	var img = '<img id="operate-img" data-img="'+imgurl+'" src="/graduationproject/Public/Uploads/Temp/'+imgurl+'">';
	console.log(img);
	$("#cut-img").empty();
	$("#cut-img").append(img);
	$("#start-cut").click();
}

//文件上传带预览
function ajaxFileUploadview(imgid,hiddenid,url){
		$.ajaxFileUpload
		({
			url:url,
			secureuri:false,
			fileElementId:imgid,
			dataType: 'json',
			data:{name:'logan', id:'id'},
			success: function (data, status)
			{
				 if(data['msg'] == 0){
				 	createCutArea(data['imgurl']);
				 }else{
				 	alert(data['error']);
				 }
			},
			error: function (data, status, e)
			{
				alert(e);
			},
			complete: function(xmlHttpRequest) {  
				$('#head_photo').on('change',function(){ 
					console.log('change');
					ajaxFileUploadview('head_photo','photo_pic','<?php echo U("Img/getImg");?>');
				});	
            }
		});
		return false;
	}

</script>
<div class="row" style="margin-top:50px;margin-bottom:230px">
	<div class="col-sm-8">
		<div id="set-cover" class="clearfix">
			<input type="file" name="head_photo" id="head_photo" value="" style="display:none">  
			<input type="hidden" name="photo_pic" id="photo_pic" value="">
			<!--头像显示-->
			<div id="show_photo" style="border:1px solid #f7f7f7;">
				<?php if(!empty($book["cover"])): ?><img style="width:150px;height:150px;" data-img="<?php echo ($book["cover"]); ?>" id="head_photo_src" src="/graduationproject/Public/Uploads/Books/<?php echo ($book["cover"]); ?>">
					<?php else: ?>
					<img style="width:150px;height:150px;" data-img="" id="head_photo_src" src="/graduationproject/Public/img/default.gif"><?php endif; ?>
			</div>


			<!-- 按钮触发模态框 -->
			<button class="btn btn-primary btn-lg" data-toggle="modal" 
			   data-target="#myModal" id="start-cut" style="display:none">
			   开始截图
			</button>
		</div>
		<div class="form-horizontal">
			<div class="content">
				<label class="col-xs-3 .col-md-4 control-label">*书名</label>
				<div class="col-xs-9 .col-md-4">
					<input class="form-control" id="book-name" value="<?php echo ($book["title"]); ?>">
				</div>
			</div>
			<div class="content">
				<label class="col-xs-3 .col-md-4 control-label">*作者</label>
				<div class="col-xs-9 .col-md-4">
					<input class="form-control" id="book-author" value="<?php echo ($book["author"]); ?>">
				</div>
			</div>
			<div class="content">
				<label class="col-xs-3 .col-md-4 control-label">科目</label>
				<div class="col-xs-9 .col-md-4">
					<select class="form-control" id="book-type">
						<?php if(is_array($books_type)): $i = 0; $__LIST__ = $books_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i; if(($book["type"]) == $type["id"]): ?><option value="<?php echo ($type["id"]); ?>" selected> <?php echo ($type["name"]); ?> </option>
							<?php else: ?>
								<option value="<?php echo ($type["id"]); ?>"> <?php echo ($type["name"]); ?> </option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
			<div class="content">
				<label class="col-xs-3 .col-md-4 control-label">*简介</label>
				<div class="col-xs-9 .col-md-4">
					<textarea class="form-control" id="book-introduction"><?php echo ($book["content"]["introduction"]); ?></textarea>
				</div>
			</div>
			<div class="content">
				<label class="col-xs-3 .col-md-4 control-label">我的书评</label>
				<div class="col-xs-9 .col-md-4">
					<textarea class="form-control" id="book-mycomment"><?php echo ($book["content"]["mycomment"]); ?></textarea>
				</div>
			</div>
			<div class="content">
				<label class="col-xs-3 .col-md-4 control-label">地理位置</label>
				<div class="col-xs-9 .col-md-4">
				
				</div>
			</div>
		</div>
		<button id="submit-book" class="btn btn-success col-md-offset-6">发布图书</button>

	</div>
	<div class="col-sm-3 col-sm-offset-1">
		<h4>已发布图书：</h4>
		<?php if(is_array($mybooks)): foreach($mybooks as $k=>$one): ?><p><em><?php echo ($k); ?>: </em><a href="<?php echo ($one["uri"]); ?>">《<?php echo ($one["name"]); ?>》 作者：<?php echo ($one["author"]); ?></a><br>上架时间：<?php echo ($one["time"]); ?></p><?php endforeach; endif; ?>
	</div>
</div>


<!-- 模态框（Modal） -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
			   aria-labelledby="myModalLabel" aria-hidden="true">
			   <div class="modal-dialog">
			      <div class="modal-content">
			         <div class="modal-header">
			            <button type="button" class="close" 
			               data-dismiss="modal" aria-hidden="true">
			                  &times;
			            </button>
			            <h4 class="modal-title" id="myModalLabel">
			               截图
			            </h4>
			         </div>
			         <div class="modal-body" >
			            <div id="cut-img" style="text-align:center; padding-left:34px">
			            </div>
			         </div>
			         <input type="hidden" id="x" name="x" />
					 <input type="hidden" id="y" name="y" />
					 <input type="hidden" id="w" name="w" />
					 <input type="hidden" id="h" name="h" />	
			         <div class="modal-footer">
			            <button type="button" class="btn btn-default" id="close"
			               data-dismiss="modal">关闭
			            </button>
			            <button type="button" class="btn btn-primary" id="submit-img">
			               截图
			            </button>
			         </div>
			      </div><!-- /.modal-content -->
				</div><!-- /.modal -->
			</div>

<script>
	var book_id = '<?php echo ($book["id"]); ?>';


	$(function(){
		$("#submit-book").click(function(){
			var bookname = $("#book-name").val(),
			author = $("#book-author").val(),
			type = $("#book-type option:selected").val(),
			introduction = $("#book-introduction").val(),
			cover = $("#head_photo_src").data('img');
			mycomment = $("#book-mycomment").val();
			if(bookname =='' || author =='' || introduction ==''){
				alert('*号为必填项目 请填写完整');
				return ;
			}
			$.post('<?php echo U("Books/publicBook");?>',{
				bookid:book_id,
				name:bookname,
				author:author,
				introduction:introduction,
				type:type,
				comment:mycomment,
				cover:cover,
			},function(data){
				if(data['code'] == 1){
					location.reload();
				}else{
					alert(data['name']);
					// location.reload();
				}
			});
		});
	});

	$("#start-cut").click(function(){
		corpImg();
	});

	function corpImg(){
		console.log('corpImg');
		$('#operate-img').Jcrop({
	    	aspectRatio: 1,
	    	onSelect: updateCoords,
	    	boxWidth:500,
	        boxHeight:500
	    });
	}

	function updateCoords(c){
	  $('#x').val(c.x);
	  $('#y').val(c.y);
	  $('#w').val(c.w);
	  $('#h').val(c.h);
	};

	function checkCoords(){
	  if (parseInt($('#w').val())) {
	    return true;
	  };
	  alert('请先选择要裁剪的区域后，再提交。');
	  return false;
	};

	$(function(){
		$("#head_photo_src").click(function(){
			$("#head_photo").click();
		});

		$("#submit-img").click(function(){
			if(checkCoords()){
				$.post('<?php echo U("Img/saveCropImg");?>',{
					x:$("#x").val(),
					y:$("#y").val(),
					w:$("#w").val(),
					h:$("#h").val(),
					img: $("#operate-img").data('img'),
					type:'Books'
				},function(data){
					if(data['status'] ==1 ){
						$("#head_photo_src").attr('src','/graduationproject/Public/Uploads/Books/'+data['file']);
						$("#head_photo_src").attr('data-img',data['file']);
						$("#close").click();
					}else{
						alert(data['error']);
					}
				});
		}
		});
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