<?php  
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class ImgController extends BaseController
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function uploadUserImg()
	{
		$imgData = I('post.imgdata');
		$userid = $this->_userInfo['userid'];
		$userImg_db = D('user_img');
		$reImg['userid'] =$userid;
		$hasImg = $userImg_db->findImgInfo($reImg);
		// 如果没有插入 否则更新
		if(!is_array($hasImg) && empty($hasImg)){
			$in_img['userid'] = $userid;
			$in_img['imgdata'] = $imgData;
			$imgid = $userImg_db->insertImg($in_img);
			if(!empty($imgid)){
				$user_db = D('user');
				$up_userInfo['headerimageid'] = $imgid;
				$isup = $user_db->userUpdateByUserid($userid,array('headerimageid'=>$imgid));
			}
		}else{
			$isup = $userImg_db->uploadImgInfoById($hasImg['id'],array('imgdata'=>$imgData));
		}
		if(isset($isup) && $isup!=false){
				$this->_userImgInfo['imgid'] = $imgid;
				$this->_userImgInfo['imgurl'] = $imgData;
				session('_userImgInfo',$this->_userImgInfo);
					// location.href='<{:U("User/myspace/userid/'+ <{$userInfo.userid}> + '")>';
				$uri = U("User/myspace",array('userid'=>$userid));
				$error['code'] = 1;
				$error['name'] = 'success';
				$error['uri'] = $uri;
		}else{
			$error['name'] = '上传失败';
			$error['code'] = 0;
		}
		$this->ajaxReturn($error,"json");

	}


	public function imageUpload(){
		if($this->_userInfo == null){
			$this->redirect("Login/login");

		}
		$this->display();
	}

	public function getImg(){
		$filetype = $_FILES['head_photo']['type'];
		$imgtype = array(
				'image/jpg',
				'image/jpeg',
				'image/png',
				'image/gif'
			);

		if(!in_array($filetype, $imgtype)){
			$arr =  array(
			'msg'=>'1',
			'error'=>'请上传正确的图片格式，jpg，gif，png，jpeg', //返回错误
			'imgurl'=>$str,//返回图片名
			);
			$this->ajaxReturn($arr,"json");
			exit();
 		};
		$upload = new \Org\Net\UploadFile();//实例化上传类
		$upload->maxSize = 1024*1024*10;
		$upload->exts = array('jpg','gif','png','jpeg');
		$upload->savePath = './Public/Uploads/Temp/';
		$check = $upload->upload();//$_FILES['head_photo']
		if(!$check) {// 上传错误提示错误信息
			$errormsg = $upload->getErrorMsg();
			$arr =  array(
				'msg'=>'1',
				'error'=>$errormsg, //返回错误
				'imgurl'=>'',//返回图片名
			);			
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			$imgurl = $info[0]['savename'];
			$str = $imgurl;
			$arr =  array(
			'msg'=>'0',
			'error'=>'', //返回错误
			'imgurl'=>$str,//返回图片名
			);
		}
		$this->ajaxReturn($arr,"json");
	}

	public function saveCropImg(){
		// $image = new \Think\Image();
		// $image->open('./Public/Uploads/Temp/'.$_POST['img']);
		// $image->crop($_POST['w'],$_POST['h'],$_POST['x'],$_POST['y'])->save('./Public/Uploads/Books/'.$_POST['img']);//save('./Public/Uploads/Books/'.$_POST['img']);
		$filep = './Public/Uploads/'.$_POST['type'].'/';
		$pic_name='./Public/Uploads/Temp/'.$_POST['img'];
		$x=$_POST['x'];
		$y=$_POST['Y'];
		$w=$_POST['w'];
		$h=$_POST['h'];
		$targ_w = $targ_h = $w;
		$crop=new \Org\Net\JcropImage($filep, $pic_name,$x,$y,$w,$h,$targ_w,$targ_h);
		$file=$crop->crop();
		$this->ajaxReturn($file,"json");
	}
}