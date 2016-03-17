<?php 
namespace Home\Model;
use Think\Model;
class LoginModel extends BaseModel {

	public function findLoginCode($dbfiles,$status = 1)
	{
		$dbfiles['status'] = $status;
		$login_md = D('login');
		return $login_md->where($dbfiles)->field('ctime,status,isdel',true)->find();
	}

	public function registerInsert($dbfiles)
	{
		$login_md = D('login');
		$login_md->create();
		return $login_md->add($dbfiles);
	}

	public function checkLoginInfo($dbfiles,$status = 1){
		$dbfiles['status'] = $status;
		$login_md = D('login');
		return $login_md->where($dbfiles)->find();
	}

	public function signUpInsert($dbfiles){
		$login_md = D('login');
		$login_md->create();
		return $login_md->add($dbfiles);
	}

	public function updateLoginInfoByid($id,$dbfiles=array(),$status=1){
		$login_md = D('login');
		$condition['id'] = $id;
		$condition['status'] = $status;
		return $login_md->where($condition)->save($dbfiles);
	}

}