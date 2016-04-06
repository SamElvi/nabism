<?php
/**
 * Created by PhpStorm.
 * User: sammy
 * Date: 16/4/6
 * Time: 下午5:39
 */

namespace Home\Model;
use Think\Model;

class ChangecodeModel extends BaseModel{

    public function findChangeCode($dbotion){
        $md_code = D('changecode');
        return $md_code->where($dbotion)->find();
    }

    public function insertCode($account,$code){
        $md_code = D('changecode');
        $option['account'] = $account;
        $option['code'] = md5($code);
        $this->deleteCodeByAccount($account);
        $md_code->create();
        return $md_code->add($option);
    }

    public function deleteCodeByAccount($account){
        $md_code = D('changecode');
        return $md_code->where('account = "'.$account.'"')->delete();
    }


}