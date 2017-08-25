<?php
// +----------------------------------------------------------------------
// | OCEC [ 新一代跨境电商商城管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://www.ccbox.net All rights reserved.
// +----------------------------------------------------------------------
// | Author: 达达 <ccbox_net@163.com> <http://www.ccbox.net>
// +----------------------------------------------------------------------
namespace plugins\Location;
use Common\Lib\Plugin;
require_once('Common/function.php');
/**地区联动选择插件
 * Location
 * 安装方法以及使用方法请看后台管理文件。
 * 
 */
class LocationPlugin extends Plugin{
	
	public $info = array(
		'name'=>'Location',
		'title'=>'地区联动选择插件',
		'description'=>'国内地区多级地址联动选择插件',
		'status'=>1,
		'author'=>'CCBox',
		'version'=>'1.0'
	);
	
	public $has_admin=1;//插件是否有后台管理界面

	public function install(){//安装方法必须实现
		// 请先将配套数据表导入到系统
		return true;//安装成功返回true，失败false
	}

	public function uninstall(){//卸载方法必须实现
		return true;//卸载成功返回true，失败false
	}
	
	
	// =============================================================================================
	// 自定义部分开始
	protected $_config_default;
	// function __construct()
	// {
		// parent::__construct();
	// }
	/**
	 * 获取插件的配置数组
	 */
	public function getConfigByName($name=''){
		if(empty($this->_config_default)){
			$temp_arr = include $this->config_file;
			if(!empty($temp_arr)){
				foreach ($temp_arr as $key => $value) {
					if($value['type'] == 'group'){
						foreach ($value['options'] as $gkey => $gvalue) {
							foreach ($gvalue['options'] as $ikey => $ivalue) {
								$_config_default[$ikey] = $ivalue['value'];
							}
						}
					}else{
						$_config_default[$key] = $temp_arr[$key]['value'];
					}
				}
			}
		}else{
			$_config_default = $this->_config_default;
		}
		
		$config = parent::getConfig($name);
		if(empty($name)){
			if(is_array($config)){
				foreach($_config_default as $key=>$val){
					$config[$key] = empty($config[$key]) ? $val : $config[$key];
					$config[$key] = ($config[$key] == 'null') ? '' : $config[$key];
				}
			}
			return $config;
		}else{
			$config[$name] = empty($config[$name]) ? $_config_default[$key] : $config[$name];
			$config[$name] = ($config[$name] == 'null') ? '' : $config[$name];
			return $config[$name];
		}
	}
	// 自定义部分结束
	// =============================================================================================
	
	
	// =============================================================================================
	/** 实现钩子方法
	 * @param array $param 参数，选中的省市区的ID数组，数字1维数组，0省份1城市2区域
	 * 					
	 * 
	 */
	public function location_selector($param=array()){
		if(is_array($param)){
			$attr = empty($param['attr'])?'':$param['attr'];
			$data = array_filter($param['data'],'is_numeric');
			if(empty($data)){
				$data = array_filter($param,'is_numeric');
			}
		}else{
			$data = array(intval($param));
		}
		$config = $this->getConfigByName();
		if(!empty($attr)) $config = array_merge($config,$attr);
		$this->assign('config',$config);
		// 实例化插件模型的几种方法：
		// $PluginLocationModel = oc_D("plugins://Location/PluginLocation",$config);
		// $PluginLocationModel = new \plugins\Location\Model\PluginLocationModel($config['table_name']);
		$_omLocation = D("plugins://Location/PluginLocation");
		$topList = $_omLocation->getListTop();
		$this->assign('topList',$topList['data']);
		$this->assign('data',$data);
		$this->display('location_selector');
	}
	
	
	
	
	
}
