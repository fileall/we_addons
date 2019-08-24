<?php
defined('IN_IA') or exit('Access Denied');

class Index_Page extends Skin
{
    public function index(){ 
        echo 'welcome';exit;
        include $this->template();
    }




}