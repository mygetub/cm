<?php
// +----------------------------------------------------------------------
// | OCEC [ 新一代跨境电商商城管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://www.ccbox.net All rights reserved.
// +----------------------------------------------------------------------
// | Author: 达达 <ccbox_net@163.com> <http://www.ccbox.net>
// +----------------------------------------------------------------------
namespace plugins\Location\Controller; //Demo插件英文名，改成你的插件英文就行了
use Api\Controller\PluginController;//插件控制器基类

class AdminIndexController extends PluginController{
	
	function _initialize(){
		$adminid=sp_get_current_admin_id();//获取后台管理员id，可判断是否登录
		if(!empty($adminid)){
			$this->assign("adminid",$adminid);
		}else{
			//TODO no login
		}
	}
	
	// 插件首页
	function index($data=array()){
		if(is_array($param)){
			$attr = empty($param['attr'])?'':$param['attr'];
			$data = array_filter($param['data'],'is_numeric');
			if(empty($data)){
				$data = array_filter($param,'is_numeric');
			}
		}else{
			$data = array(intval($param));
		}
		
		$plugin = new \plugins\Location\LocationPlugin();
		$config = $plugin->getConfigByName();
		$this->assign('config',$config);
		
		$_omLocation = D("plugins://Location/PluginLocation");
		$topList = $_omLocation->getListTop();
		$this->assign('topList',$topList['data']);
		
		$this->assign('data',$data);
		$this->display(":admin_index");
	}

}
