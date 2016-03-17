<?php 
namespace Home\Controller;
use Think\Controller; 
/**
* 
*/
class BooksController extends BaseController
{
	
	public function donateBooks(){
		if($this->_userInfo == null){
			$this->redirect("Login/login");
		}
		$this->assign('title','National Library DonateBooks');
		$book_id = I('get.id');
		$books_db = D('user_books');
		if($book_id>0){
			$bookInfo = $books_db->getBookById($book_id);
			if(is_array($bookInfo) && $bookInfo['userid'] == $this->_userInfo['userid']){
				$bookInfo['content'] = unserialize($bookInfo['content']);
				$this->assign('book',$bookInfo);
			}elseif(is_array($bookInfo) && $bookInfo['userid'] != $this->bookInfo['userid']){
				$this->redirect('Books/bookDetail',array('id'=>$book_id));
			}
		}
		$books_type = array(
			array('id'=>0,'name'=>'未分类'),
			array('id'=>1,'name'=>'医学'),
			array('id'=>2,'name'=>'物理'),
			array('id'=>3,'name'=>'生物'),
			array('id'=>5,'name'=>'化学'),
			array('id'=>6,'name'=>'文学'),
			array('id'=>7,'name'=>'哲学'),
		);
		$book_list = $books_db->getBooksByUserId($this->_userInfo['userid']);
		$mybooks = null;
		foreach ($book_list as $key => $one) {
			$mybooks[$key]['name'] = $one['title'];
			$mybooks[$key]['author'] = $one['author'];
			$mybooks[$key]['time'] = $one['ctime'];
			$mybooks[$key]['uri'] = $this->buildUri('Books','donateBooks',array('id'=>$one['id']));
		}
		$this->assign('mybooks',$mybooks);
		$this->assign('books_type',$books_type);
		$this->display();
	}

	public function publicBook(){
		$book['title'] = I('post.name');
		$book['author'] = I('post.author');
		$book['type'] = I('post.type');
		$book['userid'] = $this->_userInfo['userid'];
		$book_id = I('post.bookid');
		$introduction = I('post.introduction');
		$imgdata = $_POST['cover'];
		$book = array_filter($book);
		if(count($book)==4 && $introduction !=''){
			$mycomment = I('post.comment');	
			$content['introduction'] = $introduction;
			$content['mycomment'] = $mycomment;
			$book['content'] = serialize($content);
			$book['cover'] = $imgdata;//I('post.img');
			$books_db = D('user_books');
			if($book_id>0){
				$is_exist = $books_db->getBookById($book_id);
			}
			if(isset($is_exist) && is_array($is_exist) && count($is_exist)>0){
				$outcome = $books_db->updateBookInfoById($book_id,$book);
			}else{
				$outcome = $books_db->insertBook($book);
			}
			if($outcome>0){
				$error['name'] = '图书上架';
				$error['code'] = 1;
			}else{
				$error['name'] = '存储出错';
				$error['code'] = 0;
			}
		}else{
			$error['name'] = '信息不完整';
			$error['code'] = 0;
		}
		$this->ajaxReturn($error,"json");
	}

	public function detail(){
		$bookid = $_GET['id'];
		if(empty($bookid)){			
			$this->redirect('Nation/index');
		}	

		$books_db = D('user_books');
		$book_info = $books_db->getBookById($bookid);
		if($book_info == null){
			$this->redirect('Nation/index');
		}
		$book_info['content'] = unserialize($book_info['content']);
		$user_db = D('user');
		$user = $user_db->getUserInfoById($book_info['userid']);
		$book_user['name'] = $user['name'];
		$book_user['email'] = $user['email'];
		$book_user['img'] = $user['headerimage'];
		if(isset($user) && $user['id']!=''){
			$user_books = $books_db->getBookListLimit(array('userid'=>$user['id']),5);
			foreach ($user_books as $key => $ubook) {
				$user_books[$key]['uri'] = $this->buildUri("Books","detail",array('id'=>$ubook['id']));
			}
			$this->assign('user_books',$user_books);
		}
		$this->assign('book',$book_info);
		$this->assign('book_user',$book_user);
		$this->display();
	}

	public function deleteBook(){
		$bookid = I('post.bookid');
		if(empty($bookid)){
			$error['name'] = '没有传入id';
			$error['code'] = 0;
			$this->ajaxReturn($error,"json");
		}
		$books_db = D('user_books');
		$book_info = $books_db->getBookById($bookid);
		if($book_info['userid'] != $this->_userInfo['userid']){
			$error['name'] = 'bitch!这本书不是你的－.－,你不要在这给我搞事';
			$error['code'] = 0;
			$this->ajaxReturn($error,"json");
		}
		$outcome = $books_db->updateBookInfoById($bookid,array('isdel'=>1));
		if($outcome>0){
			$error['name'] = '删除成功';
			$error['code'] = 1;
		}
		else{
			$error['name'] = '删除失败';
			$error['code'] = 0;
		}
		$this->ajaxReturn($error,"json");
	}
}