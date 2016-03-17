<?php 
namespace Home\Model;
use Think\Model;

/**
* 
*/
class UserBooksModel extends BaseModel
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }
	public function insertBook($dbfiles){
		$books_md = D('user_books');
		$books_md->create();
		return $books_md->add($dbfiles);
	}

	public function getBookById($book_id){
		$books_md = D('user_books');
		return $books_md->where('id = '.$book_id)->field('isdel',true)->find();
	}

	public function getBooksByUserId($userid){
		$books_md = D('user_books');
		return $books_md->where('userid = '.$userid.' AND isdel = 0')->field('isdel',true)->order('ctime desc')->select();
	}

	public function updateBookInfoById($book_id,$dbfiles){
		$books_md = D('user_books');
		return $books_md->where('id = '.$book_id)->save($dbfiles);
	}

	public function getBookList($condition){
		$books_md = D('user_books');
		return $books_md->where($condition)->field('ctime,mtime,userid,isdel',true)->order('ctime desc')->select();
	}

	public function getBookListLimit($condition,$limitnum){
		$books_md = D('user_books');
		return $books_md->where($condition)->field('ctime,mtime,userid,isdel',true)->order('ctime desc')->limit($limitnum)->select();
	}
}