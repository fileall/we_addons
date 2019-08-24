<?php
defined('IN_IA') or exit('Access Denied');

define('CORE_APP_PATH'       ,   APP_CORE . APP_PATH);
define('APP_ADMIN_MODULE'    ,   'Admin');
define('APP_HOME_MODULE'     ,   'Home');
define('APP_DATA_PATH'       ,   APP_CORE . '/Data/runtime/');
define('APP_TEMPLATE_PATH'   ,   CORE_APP_PATH .'Template/');
define('DEFAULT_C_LAYER'     ,   'Controller');                                            //定义控制器名
define('DEFAULT_M_LAYER'     ,   'Model');                                                 //定义模型层
define('FILE_SUFFIX'         ,   '.php');                                                  //默认后缀
define('TMPL_TEMPLATE_SUFFIX',   '.html');                                                 //默认模板文件后缀
define('TMPL_FILE_DEPR'      ,   '/');                                                     //模板文件CONTROLLER_NAME与ACTION_NAME之间的分割符
define('APP_PUBLIC'          ,    '../addons/'. APP_NAME .'/core/Public/');                 //样式文件引入路径
define('THINK_PATH'          ,   APP_CORE.'Think/');
defined('APP_DEBUG')          or define('APP_DEBUG'        , false);                 // 是否调试模式
defined('THINK_COMMON_PATH')  or define('THINK_COMMON_PATH',  THINK_PATH.'Common/'); // 应用公共目录
defined('THINK_MODEL_PATH')   or define('THINK_MODEL_PATH' ,  THINK_PATH.'Model/');  // 应用核心模型目录

require THINK_COMMON_PATH . 'functions.php';

?>