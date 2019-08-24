<?php
/*
 * @Description:路由解析
 * @Github: https://github.com/fileall/we_addons.git
 */
defined('IN_IA') or exit('Access Denied');

final class Route_APPModel
{
    /**
     * @method : 应用初始化URL控制器调度
     * @explain :
     * @param {isWeb}
     * @return:
     */
    public function run($isWeb = true)
    {
        global $_GPC;
        global $_W;

        //加载二个基类文件
        self::BaseFileLoader($isWeb);

        $r = str_replace('//', '/', trim($_GPC['r'], '/'));
        $routes = $paths = array_filter(array_slice(explode('.', $r), 0, 2)); //访问层数;强制最大为2层

        $root = CORE_APP_PATH . BIND_MODULE . '/' . DEFAULT_C_LAYER . TMPL_FILE_DEPR;
        //强制层级只能访问到Controller目录文件下控制器方法
        list($varController, $varAction) = self::getConAct($routes);
        // 定义控制器和操作名
        define('CONTROLLER_NAME', $varController);
        define('ACTION_NAME', $varAction);

        $_W['routes'] = $r;
        $_W['action'] = $varController . TMPL_FILE_DEPR . $varAction;
        $_W['controller'] = $varController;
        $method = $varAction;
        $class = ucfirst($varController);
        $file = $root . $varController . FILE_SUFFIX;
        include $file;
        if (!is_file($file)) {
            show_message('未找到控制器 ' . $r);
        }

        //加载应用模式对应的配置文件
        self::setConf();

        $class = ucfirst($class) . '_Page';
        $instance = new $class();

        if (!method_exists($instance, $method)) {
            show_message('控制器 ' . $_W['controller'] . ' 方法 ' . $method . ' 未找到!');
        }
        $instance->$method();
        exit();
    }

    /** 
     * @method :加载二个基类文件 
     * @explain : 
     * @param {isWeb} 
     * @return: 
     */
    private function BaseFileLoader($isWeb)
    {
        require_once THINK_MODEL_PATH . 'Stone.php'; //加载基类
        if ($isWeb) {
            define('BIND_MODULE', APP_ADMIN_MODULE);
            $file = 'Lichen.php';
        } else {
            define('BIND_MODULE', APP_HOME_MODULE);
            $file = 'Skin.php';
        }
        require_once CORE_APP_PATH . BIND_MODULE . '/' . DEFAULT_C_LAYER . '/' . $file; //加载基类
        return ;
    }

	/**
     * @method : 加载模块配置文件
     * @explain : 
     * @param {type} 
     * @return: 
     */
    private function setConf()
    {
        if (is_file(CORE_APP_PATH . BIND_MODULE . '/Conf/config.php')) {
            C(include CORE_APP_PATH . BIND_MODULE . '/Conf/config.php');
        }
          return ;
    }

	/**
     * @method : 获得控制器方法
     * @explain : 
     * @param {routes} 
     * @return: 
     */
    private function getConAct($routes)
    {
        $varController = 'Index';
        $varAction = 'index';
        if (empty($routes)) {
            return array($varController, $varAction);
        }

        $varController = ucfirst(array_shift($routes));
        if ($routes) {
            $varAction = ucfirst(array_shift($routes));
        }

        return array($varController, $varAction);
    }
}

?>
