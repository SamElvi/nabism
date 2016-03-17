<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController {
    public function login(){
    	$this->assign('title',"SignIN/UP-National Library");
        if(is_array($this->_userInfo) && count($this->_userInfo)>2){
            $this->redirect('Nation/index');
        }
    	$this->display();
    }

    public function tryLogin(){
    	// $userid = I('post.user');
		$account['account'] = I('post.user');
		$password = md5(I('post.password'));
		$check = I('post.check');
        $location['lat'] = I('post.lat');
        $location['lng'] = I('post.lng');
        $location['address'] = I('post.address');
		if (is_array($this->_userInfo) && count($this->_userInfo)>2) {
            if($this->_userInfo['account'] = $account && $this->_userInfo['password'] == $password){
                $error['name'] = '已登录 ';
                $error['code'] = 1;
                $this->ajaxReturn($error,"json");
            }
        }
         $login_db = D('login');
            $logInfo = $login_db->findLoginCode($account);
            if(is_array($logInfo) && count($logInfo)>0){
                if ($password == $logInfo['password']) {
                    $this->reSetUserInfoSession($logInfo);
                    $this->reSetLocationSession($location);
                    $error['name'] = '登录成功';
                    $error['code'] = 1;
                 } 
                 else{
                    $error['name'] = '密码不正确';
                    $error['code'] = 0;
                 }
            }else{
                $error['name'] = '帐号未注册';
                $error['code'] = 0;
            }
            $this->ajaxReturn($error,"json");
    }

    public function doSignUp(){
        $account['account'] = I('post.email');
        $signUp['username'] = I('post.username');
        $signUp['password'] = md5(I('post.password'));
        $signUp['account']  = I('post.email');

        $userInfo['name'] = I('post.username');
        $userInfo['email'] = I('post.email');
        $userInfo['lat'] = I('post.lat');
        $userInfo['lng'] = I('post.lng');
        $userInfo['address'] = I('post.address');

        $user_db = D('user');
        $login_db = D('login');

        $hasLog = $login_db->checkLoginInfo($account);
        if(empty($hasLog)){
            $signUp['userid'] = $user_db->userInsert($userInfo);
            if(isset($signUp['userid'])){
                $isSign = $login_db->signUpInsert($signUp);
                if($isSign){
                    // updatesession
                    $this->reSetUserInfoSession($signUp);
                    $error['name'] = '注册成功';
                    $error['code'] = 1;
                }
                else{
                    $error['name'] = '注册失败';
                    $error['code'] = 0;
                }
            }
            else{
                $error['name'] = '用户信息写入错误';
                $error['code'] = 2;
            }
        }
        else{
            $error['name'] = '邮箱已经被注册';
            $error['code'] = 3;
        }
        $this->ajaxReturn($error,"json");
    }

    public function logOut(){
        $this->destoryUserInfoSession();
        $this->redirect("Nation/index");
        // $this->ajaxReturn();
    }






}