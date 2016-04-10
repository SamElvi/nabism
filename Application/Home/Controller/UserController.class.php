<?php  
namespace Home\Controller;
use Think\Controller;

class UserController extends BaseController
{
	
	// function __construct()
	// {
	// 	# code...
	// }

	public function user(){
    	$this->assign('title',"National Library user");
    	$userid = I('get.userid');
    	if(!empty($userid) && $this->_userInfo['userid'] == $userid){
    		$this->redirect('User/myspace',array('userid'=>$userid));
    	}
    	$user_db = D('user');
    	$userinfo = $user_db->getOneUserInfo(array('id'=>$userid));
    	$book_db = D('user_books');
    	$books = $book_db->getBooksByUserId($userid);
    	foreach ($books as $key => $book) {
    		$books[$key]['uri'] = $this->buildUri('Books','detail',array('id'=>$book['id']));
    	}
    	$userinfo['books'] = count($books);
    	$article_db = D('user_article');
    	$articles = $article_db->getArticlesWithoutContent(array('userid'=>$userid));
    	foreach ($articles as $key => $article) {
    		$articles[$key]['uri'] = $this->buildUri('Articles','articledetail',array('id'=>$article['id']));
    	}
    	$userinfo['articles'] = count($articles);
    	$this->assign('my_userinfo',$userinfo);
    	$this->assign('mybooks',$books);
    	$this->assign('myarticles',$articles);

    	// if(empty($userid)){
    	// 	$userinfo = session('_userInfo');
    	// 	$userid = $userinfo['userid'];
    	// }
    	// if(isset($this->_userInfo['userid']) && $this->_userInfo['userid'] == $userid){
    	// 	$this->redirect('User/myspace',array('userid'=>$userid));
    	// }

		$this->display();
	}

	public function myspace(){
		$this->assign('title',"National Library Myspace");
    	$userid = I('get.userid');
    	if(!isset($this->_userInfo['userid']) || $this->_userInfo['userid'] != $userid){
    		$this->redirect('User/user',array('userid'=>$userid));
    	}
    	$user_db = D('user');
    	$userinfo = $user_db->getOneUserInfo(array('id'=>$userid));

    	$book_db = D('user_books');
    	$mybooks = $book_db->getBooksByUserId($this->_userInfo['userid']);
    	foreach ($mybooks as $key => $book) {
    		$mybooks[$key]['uri'] = $this->buildUri('books','detail',array('id'=>$book['id']));
    		$mybooks[$key]['alterUri'] = $this->buildUri('Books','donateBooks',array('id'=>$book['id']));
    	}
    	$article_db = D('user_article');
    	$articles = $article_db->getArticlesWithoutContent(array(
    		'userid'=>$this->_userInfo['userid'],
    		'isdel'=>0,
    		));
    	foreach ($articles as $key => $article) {
    		$articles[$key]['uri'] = $this->buildUri('Articles','articledetail',array('id'=>$article['id']));
    		$articles[$key]['alterUri'] = $this->buildUri('Articles','writearticle',array('id'=>$article['id']));
    	}
    	$userinfo['books'] = count($mybooks);
    	$userinfo['articles'] = count($articles);
    	$this->assign('mybooks',$mybooks);
    	$this->assign('myarticles',$articles);
    	$this->assign('my_userinfo',$userinfo);
    	$this->display();
	}

	public function headImg(){
		$this->display();
	}


	public function updateUserName(){
		$username = I('post.username');
		$user_db = D('user');
		$outcome = $user_db->userUpdateByUserid($this->_userInfo['userid'],array('name'=>$username));
		if(!empty($outcome)){
			$login_db = D('login');
			$login_db->updateLoginInfoByid($this->_userInfo['id'],array('username'=>$username));	
			$this->_userInfo['username'] = $username;
			$this->reSetUserInfoSession($this->_userInfo);
			$error['name'] = '修改成功';
			$error['code'] = 1;
		}else{
			$error['name'] = '修改失败';
			$error['code'] = 0;
		}
		$this->ajaxReturn($error,'json');
	}

	public function updateUserAccount(){
		$useraccount = I('post.useraccount');
		$user_db = D('user');
		$outcome = $user_db->userUpdateByUserid($this->_userInfo['userid'],array('email'=>$useraccount));
		if(!empty($outcome)){
			$login_db = D('login');
			$login_db->updateLoginInfoByid($this->_userInfo['id'],array('account'=>$useraccount));	
			$this->_userInfo['account'] = $useraccount;
			$this->reSetUserInfoSession($this->_userInfo);
			$error['name'] = '修改成功';
			$error['code'] = 1;
		}else{
			$error['name'] = '修改失败';
			$error['code'] = 0;
		}
		$this->ajaxReturn($error,'json');
	}

	public function updateUserIntroduction(){
		$userintroduction = I('post.userintroduction');
		$user_db = D('user');
		$outcome = $user_db->userUpdateByUserid($this->_userInfo['userid'],array('selfintroduction'=>$userintroduction));
		if(!empty($outcome)){	
			$error['name'] = '修改成功';
			$error['code'] = 1;
		}else{
			$error['name'] = '修改失败';
			$error['code'] = 0;
		}
		$this->ajaxReturn($error,'json');
	}

	public function setUserHeadImg(){
		$user_db = D('user');
		$outcome = $user_db->userUpdateByUserid($this->_userInfo['userid'],array('headerimage'=>$_POST['img']));
		if(!empty($outcome)){
			$error['name'] = '保存成功';
			$error['code'] = 1;
		}else{
			$error['name'] = "上传出错";
			$error['code'] = 0;
		}
		$this->ajaxReturn($error,"json");
	}

	public function myMailBox(){
		if($this->_userInfo == null){
			$this->redirect("Login/login");

		}
		$db_mail = D('mail');
		$db_user = D('user');
		$sentMails = $db_mail->getMailsByFromStatus($this->_userInfo['userid']);
		foreach($sentMails as $key=>$mail){
			$user = $db_user->getUserInfoById($mail['toid']);
			$sentMails[$key]['toname'] = $user['name'];
		}
		$getMails = $db_mail->getMailsByToStatus($this->_userInfo['userid']);
		$this->assign('sentMails',$sentMails);
		$this->assign('getMails',$getMails);
		$this->display();
	}

}