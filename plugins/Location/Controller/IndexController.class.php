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

class IndexController extends PluginController{
	
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
		$this->display(':index');
	}
	
	// **********************************************************************
	// 获取子地区列表
	public function get_sub_area(){
		$pUpid = intval(I("param.upid"));
		$_omLocation = D("plugins://Location/PluginLocation");
		$data = $_omLocation->getSubArea($pUpid);
		if(IS_AJAX){
			$this->ajaxReturn($data);
		}else{
			return $data;
		}
	}

}
