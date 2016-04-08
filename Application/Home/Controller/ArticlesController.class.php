<?php 
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class ArticlesController extends BaseController
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function index(){
		$article_db = D('user_article');
		$articles = $article_db->getArticlesWithoutContent(array('status'=>1,'isdel'=>0));
		$user_db = D('user');
		foreach ($articles as $key => $one) {
			$articles[$key]['uri'] = $this->buildUri('Articles','articleDetail',array('id'=>$one['id']));
			$user = $user_db->getUserImgById($one['userid'],'name,headerimage');
			$articles[$key]['img'] = $user['headerimage'];
			$articles[$key]['author'] = $user['name'];
		}
		$this->assign('articles',$articles);
		$this->display();
	}

	public function articleDetail(){
		$article_id = I('get.id');
		if ($article_id<1) {
			$this->redirect('<{:U("Nation/index")}>');
			exit();
		}
		$article_db = D('user_article');
		$article = $article_db->getArticleById($article_id,1);
		// $article['content'] = addslashes($article['content']);
		$user_db = D('user');
		$authorInfo = $user_db->getUserInfoById($article['userid']);
		$authorInfo['user_uri'] = $this->buildUri('User','user',array('userid'=>$authorInfo['id']));
		$this->assign('author',$authorInfo);
		$this->assign('article',$article);
		$this->display();
	}

	public function writeArticle(){
		if($this->_userInfo == null){
			$this->redirect("Login/login");
			
		}
		$article_id = I('get.id');
		$article_db = D('user_article');
		if ($article_id !='') {
			$article = $article_db->getArticleById($article_id);
			if($article['userid'] !== $this->_userInfo['userid']){
				$this->redirect('Articles/articleDetail',array('id'=>$article_id));
			}else{
				$this->assign('article',$article);
			}
		}
		$draftList = $article_db->getArticlesList(array('userid'=>$this->_userInfo['userid']),0);
		$drafts = null;
		foreach ($draftList as $key=>$one) {
			$drafts[$key]['title'] = $one['title'];
			$drafts[$key]['ctime'] = $one['ctime'];
			$drafts[$key]['uri'] = $this->buildUri('Articles','writeArticle',array('id'=>$one['id']));
		}
		$this->assign('draftsList',$drafts);
		$this->display();
	}

	public function saveArticle(){
		$article_db = D('user_article');
		$article['title'] = $_POST['title'];
		$article['content'] = $_POST['content'];
		$article['userid'] = $this->_userInfo['userid'];
		if(is_array($this->_location)){
			$article['lat'] = $this->_location['lat'];
			$article['lng'] = $this->_location['lng'];
		}
		$article_id = I('post.article_id');
		$articleInfo = $article_db->getArticleById($article_id);
		$status = I('post.type');
		if(is_array($articleInfo) && $articleInfo['userid'] == $this->_userInfo['userid']){
			$isSave = $article_db->updateArticleByid($article_id,$article,$status);
		}
		else{
			$article_id = $article_db->insetArticle($article,$status);
		}

		if(($article_id>0 || $isSave>0) && $status ==1){
			$error['name'] = '文章已发布';
			$error['code'] = 1;
			$error['uri'] = $this->buildUri('Articles','articleDetail',array('id'=>$article_id));
		}else if(($article_id>0 || $isSave>0) && $status ==0){
			$error['name'] = "已存储的草稿";
			$error['code'] = 2;
		}else{
			$error['name'] = '存储失败';
			$error['code'] = 0;
		}
		$this->ajaxReturn($error,"json");
	}

	public function deleteArticle(){
		$article_db = D('user_article');
		$article_id = I('post.article_id');
		$outcome = $article_db->updateArticleByid($article_id,array('isdel'=>1));
		if($outcome){
			$error['name'] = '删除成功';
			$error['code'] = 1;
		}else{
			$error['name'] = '删除失败';
			$error['code'] = 0;
		}
		$this->ajaxReturn($error,"json");
	}

}