<?php
defined('IN_IA') or exit('Access Denied');

require_once IA_ROOT . '/addons/we_addons/core/defines.php';//如果更换项目，需更改we_addons项目名

class We_addonsModule extends WeModule
{
   
    /**
     * @method : 微擎自定义后台入口 如果去除,则自动走定义在manifest.xml中<menu call="getMenus">微擎自带的菜单入口
     * @explain : index.php?c=site&a=entry&m=we_addons&do=web";
     * @param {type} 
     * @return: 
     */
	public function welcomeDisplay()
	{
		header('location: ' .webUrl());
		exit();
	}
}


?>