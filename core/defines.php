<?php
defined('IN_IA') or exit('Access Denied');

define('APP_DEBUG', false);                                          //true开启调试模式;false关闭调试模式
define('APP_NAME', basename(dirname(dirname(__FILE__))));            //对外项目名称
define('APP_PATH', 'App/');                                          //内置项目目录
define('APP_CORE', realpath(__DIR__ ). '/');                         //定义项目目录

require APP_CORE . 'Think/Think.php';


?>