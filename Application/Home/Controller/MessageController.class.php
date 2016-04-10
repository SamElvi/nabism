<?php
/**
 * Created by PhpStorm.
 * User: sammy
 * Date: 16/4/9
 * Time: 下午4:32
 */
namespace Home\Controller;
use Think\Controller;

class MessageController extends BaseController{

    public function booksmail(){
        $mail = I('post.mail');
        $touserid = I('post.touserid');
        if(!empty($mail) && !empty($touserid) && !empty($this->_userInfo['userid'])){
            $db_mail = D('mail');
            $sent = $db_mail->insertMailByOption(array(
                'fromid'=>$this->_userInfo['userid'],
                'toid'=>$touserid,
                'content'=>$mail,
                'fromname'=>$this->_userInfo['username']
            ));
            if($sent){
                $error['name'] = '邮件发送啦';
                $error['code'] = 1;
            }else{
                $error['name'] = '额~邮件太多了,交给了EMS,你懂的...';
                $error['code'] = 2;
            }
        }else{
            $error['name'] = '邮件信息不完整,不能投递哦';
            $error['code'] = 0;
        }
        $this->ajaxReturn($error,"json");
    }


    public function openMails(){
        $db_mail = D('mail');
        $db_mail->watchMailStatusByToid($this->_userInfo['userid']);
        $this->ajaxReturn(array(
            'code'=>1
        ),"json");
    }

    public function delMessage(){
        $id = I('post.id');
        $type = I('post.type');
        if($type =='to'){
            $option['del'] = 1;
        }else if($type == 'from'){
            $option['status'] = 2;
        }
        $db_mail = D('mail');
            $isdel = $db_mail->updateMailById($id,$option);
        if($isdel){
            $error['code'] = 1;
            $error['name'] = '删除了';
        }else{
            $error['code'] = 0;
            $error['name'] = '程序员走开了,删除不了惹';
        }
        $this->ajaxReturn($error,"json");
    }


}