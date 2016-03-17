<?php
namespace Home\Controller;
use Think\Controller;
class NationController extends BaseController {
    public function index(){
    	$this->assign('title',"National Library");
    	$book_db = D('user_books');
    	$bookList = $book_db->getBookList(array('status'=>1));
    	foreach ($bookList as $key => $value) {
    		$bookList[$key]['uri'] = $this->buildUri('Books','detail',array('id'=>$value['id']));
            $bookList[$key]['content'] = unserialize($value['content']);
    	}
        // $ip = get_client_ip();
        $Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
        $area = $Ip->getlocation('218.79.93.194'); // 获取某个IP地址所在的位置
        // var_dump($area);
        $ocation = iconv('gbk','utf-8',$area['area']);
        // var_dump($ocation);
        // var_dump($area);
        // $area = iconv('gbk','utf-8',$area);
        // var_dump($area);
        $this->assign('bookList',$bookList);
    	$this->display();
    }
}