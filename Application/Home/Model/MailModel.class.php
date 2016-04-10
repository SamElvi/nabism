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

    public function updateMailById($mailid,$data){
        if($mailid == '')
            return false;
        $md_mail = D('mail');
        return $md_mail->where('id = '.$mailid)->save($data);
    }

    public function getMailsByFromStatus($fromid){
        if($fromid =='')
            return null;
        $md_mail = D('mail');
        $option['fromid'] = $fromid;
        $option['del'] = 0;
        return $md_mail->where($option)->select();
    }

    public function getMailsByToStatus($toid){
        if($toid =='')
            return null;
        $md_mail = D('mail');
        $option['toid'] = $toid;
        $option['status'] = array('lt','2');
        return $md_mail->where($option)->select();
    }

    public function getMailNumByIdAndStatus($uid,$status=0){
        if(empty($uid))
            return null;
        $md_mail = D('mail');
        $option['toid'] = $uid;
        $option['status'] = $status;
        return $md_mail->where($option)->count();
    }

    public function watchMailStatusByToid($toid){
        if(empty($toid))
            return null;
        $md_model = D('mail');
        $option['toid'] = $toid;
        $option['status'] = 0;
        $data['status']=1;
        $list = $md_model->where($option)->save($data);
//        $num = 0;
//        foreach($list as $one){
//           $num+= $md_model->where('id ='.$one['id'])->save($data);
//        }
        return $list;
    }
}