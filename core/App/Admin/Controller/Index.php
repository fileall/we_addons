<?php
defined('IN_IA') or exit('Access Denied');

class Index_Page extends Lichen
{

    public function _initialize()
    {

    }

    public function index()
    {
        C('LAYOUT_NAME', 'layout2');
        include $this->template();
    }

    /**
     * @description: 后台首页
     * @msg: 
     * @param {type} 
     * @return: 
     */
    public function main()
    {
        //系统环境信息
        $server_info = array(
            '运行环境' => PHP_OS . ' ' . $_SERVER["SERVER_SOFTWARE"],
            'PHP执行方式' => php_sapi_name(),
            '最大上传限制' => ini_get('upload_max_filesize'),
            '执行时间限制' => ini_get('max_execution_time') . '秒',
        );
        $data = $server_info;
        include $this->template();


    }


}