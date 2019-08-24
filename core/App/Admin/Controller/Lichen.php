<?php
defined("IN_IA") or exit( "Access Denied" );

/**
 * 苔藓类
 * Class Lichen
 */
class Lichen extends Stone
{
    //TODO:继承的方法
    protected $menu_id = 0;//主菜单ID
    
    function __construct(){
        global $_W;
        global $_GPC;
        $this->menu_id = $_GPC['menu_id'];
         

    }


}