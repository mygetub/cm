<?php
// +----------------------------------------------------------------------
// | OCEC [ 新一代跨境电商商城管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://www.ccbox.net All rights reserved.
// +----------------------------------------------------------------------
// | Author: 达达 <ccbox_net@163.com> <http://www.ccbox.net>
// +----------------------------------------------------------------------
return array (
	// 'demo' => array (// 在后台插件配置表单中的键名 ,会是config[text]
		// 'title' => '地址数据表名称:', // 表单的label标题
		// 'type' => 'text',// 表单的类型：text,password,textarea,checkbox,radio,select等
		// 'value' => 'prov_city_area',// 表单的默认值
		// 'tip' => '' //表单的帮助提示
	// ),
	
	'outer_id' => array (// $config['outer_id']
		'title' => '选择器ID:',
		'type' => 'text',
		'value' => 'LocationSelector',
		'tip' => '请输入选择器ID，留空默认为 LocationSelector ，需要空白请填写 null'
	),
	
	'outer_class' => array (// $config['outer_class']
		'title' => '选择器Class:',
		'type' => 'text',
		'value' => 'location_selector',
		'tip' => '请输入选择器外容器DIV的样式Class，留空默认为： location_selector ，需要空白请填写 null'
	),
	
	'outer_style' => array (// $config['outer_style']
		'title' => '选择器风格:',
		'type' => 'text',
		'value' => '',
		'tip' => '请输入选择器外容器DIV的style属性，留空为无'
	),
	
	'select_class' => array (// $config['select_class']
		'title' => '选择框Class:',
		'type' => 'text',
		'value' => 'location_select',
		'tip' => '请输入选择选择框的样式Class，留空默认为： location_select ，需要空白请填写 null'
	),
	
	'select_name' => array (// $config['select_name']
		'title' => '选择器表单名:',
		'type' => 'text',
		'value' => 'location',
		'tip' => '请输入选择器表单名name属性，留空默认为 location ，需要空白请填写 null'
	),
	
	'select_break' => array (// $config['select_break']
		'title' => '选择框间隔符:',
		'type' => 'text',
		'value' => '<br/>',
		'tip' => '请输入选择框间隔符，留空默认为 < br /> ，需要空白请填写 null'
	),

	'level' => array (// $config['level']
		'title' => '选择器深度:',
		'type' => 'radio',
		'options' => array (
			'1' => '省',
			'2' => '市' ,
			'3' => '区' ,
			'4' => '县' ,
		),
		'value' => 3,
		'tip' => '请选择深度，默认为 市级单位'
	),

	
	 'table_name' => array (// 在后台插件配置表单中的键名 ,会是config[text]
		 'title' => '地址数据表名称:', // 表单的label标题
		 'type' => 'text',// 表单的类型：text,password,textarea,checkbox,radio,select等
		 'value' => 'prov_city_area',// 表单的默认值
		 'tip' => '请输入地址表名称' //表单的帮助提示
	 ),
	 'is_true_name' => array (
		 'title' => '是否trueTableName',
		 'type' => 'radio',
		 'options' => array (
			 '1' => '是',
			 '0' => '否'
		 ),
		 'value' => '0',
		 'tip' => '数据表名是否是trueTableName'
	 ),
);
