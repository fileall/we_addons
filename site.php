<?php

require_once IA_ROOT . '/addons/we_addons/core/defines.php';//如果更换项目，需更改we_addons项目名
class we_addonsModuleSite extends WeModuleSite
{


    /**
     * @method : 微擎后端访问入口
     * @explain :
     * @param {type}
     * @return:
     */
    public function doWebWeb()
    {
        mod('route')->run();
        exit;
    }


    /**
     * @method : 微擎前端的访问入口
     * @explain : app/index.php?i=1&c=entry&m=we_addons&do=mobile
     * @param {type}
     * @return:
     */
    public function doMobileMobile()
    {
        mod('route')->run(false);
        exit;
    }
}

?>