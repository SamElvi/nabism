<?php 
namespace Home\Model;
use Think\Model;
/**
* 
*/
class UserImgModel extends BaseModel
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }
	public function insertImg($dbFiles){
		$userimg_md = D('user_img');
		$userimg_md->create();
		return $userimg_md->add($dbFiles);
	}

	public function uploadImgInfoById($id,$dbFiles=array(),$status=1){
		$userimg_md = D('user_img');
		$condition['id'] = $id;
		$condition['status'] = $status;
		return $userimg_md->where($condition)->save($dbFiles);
	}

	public function findImgInfo($dbFiles=array(),$status=1){
		$userimg_md = D('user_img');
		$dbFiles['status'] = $status;
		return $userimg_md->where($dbFiles)->find();
	}
}