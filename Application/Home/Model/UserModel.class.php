<?php 
 namespace Home\Model;
 use THink\Model;

 class UserModel extends BaseModel {

 	public function userInsert($dbFiles){
 		$user_md = D('user');
 		$user_md->create();
 		return $user_md->add($dbFiles);
 	}

 	public function getOneUserInfo($dbFiles,$status = 1){
 		$dbFiles['status'] = 1;
 		$user_md = D('user');
 		return $user_md->where($dbFiles)->field('ctime,mtime,status,isdel',true)->find();
 	}

 	public function userUpdateByUserid($userid,$dbFiles=array(),$status=1){
 		$user_md = D('user');
 		$condition['id'] = $userid;
 		$condition['status'] = $status;
 		return $user_md->where($condition)->save($dbFiles);
 	}

 	public function getUserInfoById($userid,$status = 1){
 		$dbFiles['id'] = $userid;
 		$dbFiles['status'] = 1;
 		$user_md = D('user');
 		return $user_md->where($dbFiles)->field('ctime,mtime,status,isdel',true)->find();
 	}

 	public function getUserImgById($userid,$field_string){
 		$user_md = D('user');
 		return $user_md->where(array('id'=>$userid))->field($field_string)->find();
 	}

 }