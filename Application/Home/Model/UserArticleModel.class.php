<?php 
namespace Home\Model;
use Think\Model;
/**
* 
*/
class UserArticleModel extends BaseModel
{
	public function insetArticle($dbfiles,$status=1)
	{
		$dbfiles['status'] = $status;
		$article_md = D('user_article');
		$article_md->create();
		return $article_md->add($dbfiles);
	}

	public function getArticlesList($dbfiles,$status){
		$article_md = D('user_article');
		if(isset($status) && $status !== null){
			$dbfiles['status'] = $status;
		}
		return $article_md->where($dbfiles)->field('isdel',true)->select();
	}

	public function getArticleById($article_id,$status){
		if($article_id !=''){
			$condition['id'] = $article_id;
			if(isset($status) && $status !== null){
				$condition['status'] = $status;
			}
			$article_md = D('user_article');
			return $article_md->where($condition)->field('isdel',true)->find();
		}
		else{
			return ;
		}
	}

	public function updateArticleByid($article_id,$article,$status=1){
		$article_md = D('user_article');
		$article['status'] = $status;
		return $article_md->where('id='.$article_id)->save($article);
	}

	public function getArticlesWithoutContent($condition){
		$article_md = D('user_article');
		return $article_md->where($condition)->field('isdel,content,status',true)->order('ctime desc')->select();
	}
}	