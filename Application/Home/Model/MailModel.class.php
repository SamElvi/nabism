<?php
/**
 * Created by PhpStorm.
 * User: sammy
 * Date: 16/4/9
 * Time: 下午4:35
 */
namespace Home\Model;
use Think\Model;

class MailModel extends BaseModel{
    public function insertMailByOption($option){
        $md_mail = D('mail');
        $md_mail->create();
        return $md_mail->add($option);
    }

    public function updateMailById($mailid,$status=1){
        if($mailid == '')
            return false;
        $md_mail = D('mail');
        return $md_mail->where('id = '.$mailid)->save(array('status'=>$status));
    }

    public function getMailsByFromStatus($fromid){
        if($fromid =='')
            return null;
        $md_mail = D('mail');
        $option['fromid'] = $fromid;
        $option['status'] = array('neq',2);;
        return $md_mail->where($option)->select();
    }

    public function getMailsByToStatus($toid,$status=0){
        if($toid =='')
            return null;
        $md_mail = D('mail');
        $option['toid'] = $toid;
        $option['status'] = array('neq',3);;
        return $md_mail->where($option)->select();
    }
}