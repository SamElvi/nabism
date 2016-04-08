<?php 
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {

	public $_userInfo = null;
	public $_location = null;
	public $_userImgInfo = null;
	
	protected function _checkLogin()
	{
     	$userInfo = session("_userInfo");
     	if(!empty($userInfo)){
     		$this->_userInfo = $userInfo;
     		$this->assign("userInfo",$this->_userInfo);
     	}
     	else{
     		// $this->redirect("Nation/index");
     	}
		$this->_location = session("_location");
	}

	protected function _checkUserImgCookie(){
		// if(!isset($this->_userImgInfo)){
		// 	$userimgCookie = cookie($this->_userInfo['userid'].'_imgurl');
	 // 		if(!is_array($userimgCookie) && empty($userimgCookie['imgurl'])){
	 // 			$this->_userImgInfo = $this->writeUserImgInfoToCookie($this->_userInfo['userid']);
	 // 		}else{
	 // 			$this->_userImgInfo = $userimgCookie;
	 // 		}
		// }
	}

	protected function _checkUserImgSession(){
		$userImgInfo = session('_userImgInfo');
		if(is_array($userImgInfo) && !empty($userImgInfo)){
			$this->_userImgInfo = $userImgInfo;
     	}
     	else{
   //   		$userimg_db = D('user_img');
			// $imgInfo = $userimg_db->findImgInfo(array('userid'=>$this->_userInfo['userid']));
			// $userImgInfo = array(
			// 		'id'=>$imgInfo['id'],
			// 		'imgurl'=>$imgInfo['imgdata']
			// 		);
			$user_db = D('user');
			$user = $user_db->getUserInfoById($this->_userInfo['userid']);
			$userImgInfo = $user['headerimage'];
			session('_userImgInfo',$userImgInfo);
			$this->_userImgInfo = $userImgInfo;
     	}
 		$this->assign("userImgInfo",$this->_userImgInfo);
	}

	/**
     * 初始化函数， 在__construct中调用
     * 
     * @access public
     */
	protected function _initialize()
	{

		$this->_checkLogin();
		$this->_checkUserImgSession();
		// import('@.ORG.ShoppingCart');
		// import('@.ORG.Lately');
		// $this->checkBrowsingType();

		// $this->_link();
		// $this->_pageConfig();
		// $this->_visitLog();
	}

	public function reSetUserInfoSession($userInfo){
		$this->_userInfo = $userInfo;
		session("_userInfo",$this->_userInfo);
	}

	public function reSetLocationSession($location){
		$this->_location = $location;
		session("_location",$this->_location);
//		$tmp = $this->_location;
//		var_dump(session("_location"));
	}

	public function destoryUserInfoSession(){
		$this->_userInfo = null;
		session("_userInfo",null);
		session('_userImgInfo',null);
	}

	public function destoryLocationSession(){
		session('_location',null);
	}

	// public function writeUserImgInfoToCookie($userid){
	// 	$userimg_db = D('user_img');
	// 	$imgInfo = $userimg_db->findImgInfo(array('userid'=>$userid));
	// 	$cook_img = array(
	// 				'id'=>$imgInfo['id'],
	// 				'imgurl'=>$imgInfo['imgdata']
	// 				);
	// 	if(is_array($imgInfo) && !empty($imgInfo['imgdata'])){
	// 		cookie($userid.'_imgurl',$cook_img,3600*24);
	// 	}
	// 	return $cook_img;
	// }

	public function buildUri($con,$fun,$val_arr=array()){
		return U($con.'/'.$fun,$val_arr);
	}



	/**
	 * @param raidus 单位米
	 * return minLat,minLng,maxLat,maxLng
	 */
	public function getAround($lat,$lon, $raidus = 1000) {

		$latitude = $lat;
		$longitude = $lon;
		$degree = (24901 * 1609) / 360.0;
		$raidusMile = $raidus;

		$dpmLat = 1 / $degree;
		$radiusLat = $dpmLat * $raidusMile;
		$minLat = $latitude - $radiusLat;
		$maxLat = $latitude + $radiusLat;

		$mpdLng = $degree * cos($latitude * (M_PI / 180));
		$dpmLng = 1 / $mpdLng;
		$radiusLng = $dpmLng * $raidusMile;
		$minLng = $longitude - $radiusLng;
		$maxLng = $longitude + $radiusLng;
		return  array($minLat, $minLng, $maxLat, $maxLng);
	}

    public function Index(){
    	$this->display();
    }
	
	

}