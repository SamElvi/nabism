<?php 
namespace Home\Model;
use Think\Model;

/**
* 
*/
class BookCoverModel extends BaseModel
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }
	public function insertImg($dbFiles){
		$book_cover_md = D('book_cover');
		$book_cover_md->create();
		return $book_cover_md->add($dbFiles);
	}

	public function uploadImgInfoById($id,$dbFiles=array(),$status=1){
		$book_cover_md = D('book_cover');
		$condition['id'] = $id;
		$condition['status'] = $status;
		return $book_cover_md->where($condition)->save($dbFiles);
	}

	public function findImgInfo($dbFiles=array(),$status=1){
		$book_cover_md = D('book_cover');
		$dbFiles['status'] = $status;
		return $book_cover_md->where($dbFiles)->find();
	}
}