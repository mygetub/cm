<?php
// +----------------------------------------------------------------------
// | OCEC [ 新一代跨境电商商城管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://www.ccbox.net All rights reserved.
// +----------------------------------------------------------------------
// | Author: 达达 <ccbox_net@163.com> <http://www.ccbox.net>
// +----------------------------------------------------------------------
namespace plugins\Location\Model;
use Common\Model\CommonModel;
class PluginLocationModel extends CommonModel{
	
	protected $tableName='prov_city_area';
	// protected $trueTableName;
	
	//自动验证
	// protected $_validate = array(
		//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
		//array('ad_name', 'require', '广告名称不能为空！', 1, 'regex', 3),
	// );
	// protected function _before_write(&$data) {
		// parent::_before_write($data);
	// }
	/* 
	// 定义数据表的名称再实例化（暂时不搞）
	function _initialize($param=array()){
		if($param[1]){
			$this->tableName = '';
			$this->trueTableName = $tableName;
		}else{
			$this->tableName = $tableName;
		}
		parent::_initialize();
	}
	 */
	
	// ***************************************************************************
	
	// 获取所有一级区域
	public function getListTop(){
		return $this->getSubArea(0);
	}
	
	// 获取子域列表
	public function getSubArea($pUpid=0){
		if(!is_numeric($pUpid) || $pUpid<0){
			return array('status'=>0,'info'=>"传入参数错误。");
		}
		$map["upid"] = $pUpid;
		$result = $this->where($map)->select();
//		print_r($result);exit;
//		if($result){
//			//$return = turnPkArray($result,"id");
//            $result = '22';
//		}
		return array('status'=>1,'data'=>$result,'info'=>'');
	}
	
	// 根据区域代码获取配送区域信息
	// 输入配送区域代码，或者代码数组（前端提交）
	// 返回配送区域的各个层级的详情数组
	public function getCodeInfo($pCode){
		$areaIdList = '';
		$thisAreaCode = '';
		if (is_array($pCode)){
			$thisAreaCode = implode('-',$pCode);
			$areaIdList = $pCode;
		}elseif(strpos($pCode,'-')){
			$thisAreaCode = $pCode;
			$areaIdList = explode('-',$pCode);
		}else{
			return false;
		}
		$areaIdList = array_filter($areaIdList, 'is_numeric');
		if($areaIdList){
			foreach($areaIdList as $val){
				$areaIdArr[] = $val;
			}
			$map['id'] = $areaIdArr;
			$return = $this->get_all_all($map);
			$result = $this->turn_pk_array($return[0],'id');
			return $result;
		}else{
			return false;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
