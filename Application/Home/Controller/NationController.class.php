<?php
namespace Home\Controller;
use Think\Controller;
class NationController extends BaseController {
    public function index(){
    	$this->assign('title',"National Library");
    	$book_db = D('user_books');
        $option['status'] = 1;
        if(is_array($this->_location) && count($this->_location)==2){
            $around = $this->getAround($this->_location['lat'],$this->_location['lng'],2000);
            $option['lat'] = array(array('gt',$around['0']),array('lt',$around[2]));
            $option['lng'] = array(array('gt',$around['1']),array('lt',$around[3]));
        }
    	$bookList = $book_db->getBookList($option);
    	foreach ($bookList as $key => $value) {
    		$bookList[$key]['uri'] = $this->buildUri('Books','detail',array('id'=>$value['id']));
            $bookList[$key]['content'] = unserialize($value['content']);
    	}
//        $Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
//        $area = $Ip->getlocation('218.79.93.194'); // 获取某个IP地址所在的位置
        $this->assign('bookList',$bookList);
    	$this->display();
    }
}