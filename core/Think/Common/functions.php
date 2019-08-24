<?php
defined('IN_IA') or exit('Access Denied');

/***************C函数设置读取参数***********/

/**
 * @method : C方法来源thinkphp3.2
 * @explain : 
 * @param {type} 
 * @return: 
 */
function C($name = null, $value = null, $default = null)
{
    static $_config = array();
    // 无参数时获取所有
    if (empty($name)) {
        return $_config;
    }
    // 优先执行设置获取或赋值
    if (is_string($name)) {
        if (!strpos($name, '.')) {
            $name = strtoupper($name);
            if (is_null($value)) {
                return isset($_config[$name]) ? $_config[$name] : $default;
            }

            $_config[$name] = $value;
            return;
        }
        // 二维数组设置和获取支持
        $name = explode('.', $name);
        $name[0] = strtoupper($name[0]);
        if (is_null($value)) {
            return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : $default;
        }

        $_config[$name[0]][$name[1]] = $value;
        return;
    }
    // 批量设置
    if (is_array($name)) {
        $_config = array_merge($_config, array_change_key_case($name, CASE_UPPER));
        return;
    }
    return null; // 避免非法参数
}

/************************前端访问路径***********************/
if (!function_exists("mobileUrl")) {
    function mobileUrl($do = "", $query = null, $full = false)
    {
        global $_W;
        global $_GPC;
        !($query) && ($query = array());
        $dos = explode('/', trim($do));
        $routes = array();
        $routes[] = $dos[0];
        if (isset($dos[1])) {
            $routes[] = $dos[1];
        }
        if (isset($dos[2])) {
            $routes[] = $dos[2];
        }
        if (isset($dos[3])) {
            $routes[] = $dos[3];
        }
        if (isset($dos[4])) {
            $routes[] = $dos[4];
        }
        $r = implode(".", $routes);
        if (!empty($r)) {
            $query = array_merge(array("r" => $r), $query);
        }
        $query = array_merge(array("do" => "mobile"), $query);
        $query = array_merge(array("m" => APP_NAME), $query);
        if (empty($query["mid"])) {
            $mid = intval($_GPC["mid"]);
            if (!empty($mid)) {
                $query["mid"] = $mid;
            }
        }
        if (empty($query["merchid"])) {
            $merchid = intval($_GPC["merchid"]);
            if (!empty($merchid)) {
                $query["merchid"] = $merchid;
            }
        } else {
            if ($query["merchid"] < 0) {
                unset($query["merchid"]);
            }
        }
        if (empty($query["liveid"])) {
            $liveid = intval($_GPC["liveid"]);
            if (!empty($liveid)) {
                $query["liveid"] = $liveid;
            }
        }
        if ($full) {
            return $_W["siteroot"] . "app/" . substr(murl("entry", $query, true), 2);
        }
        return murl("entry", $query, true);
    }
}
/**********************前端访问路径结束**********************/

/*************获得微擎后台入口路径*************/
if (!function_exists("webUrl")) {
    function webUrl($do = "", $query = array(), $full = true)
    {
        global $_W;
        global $_GPC;

        $dos = explode("/", trim($do));
        $routes = array();
        $routes[] = $dos[0];
        if (isset($dos[1])) {
            $routes[] = $dos[1];
        }
        if (isset($dos[2])) {
            $routes[] = $dos[2];
        }
        if (isset($dos[3])) {
            $routes[] = $dos[3];
        }
        $r = implode(".", $routes);
        if (!empty($r)) {
            $query = array_merge(array("r" => $r), $query);
        }
        $query = array_merge(array("do" => "web"), $query);
        $query = array_merge(array("m" => APP_NAME), $query);
        if ($full) { 
            return $_W["siteroot"] . "web/" . substr(wurl("site/entry", $query), 2);
        }
        return wurl("site/entry", $query);
    }
}
/*************获得入口路径结束*************/

/*************点火开始实例化*************/
if (!function_exists("mod")) {
    function mod($name = "")
    {
        static $_modules = array();
        if (isset($_modules[$name])) {
            return $_modules[$name];
        }
        $model = THINK_MODEL_PATH . strtolower($name) . ".php"; 
        if (!is_file($model)) {
            exit(" Model " . $name . " Not Found!");
        }
        require_once $model;
        $class_name = ucfirst($name) . "_APPModel";
        $_modules[$name] = new $class_name(); 
        return $_modules[$name];
    }
}
/*************点火开始实例化结束*************/
if (!function_exists("air")) {
    function mod_ad($name = "")
    {
        static $_modules = array();
        if (isset($_modules[$name])) {
            return $_modules[$name];
        }
        $model = CORE_APP_PATH . APP_ADMIN_MODULE . DEFAULT_M_LAYER . strtolower($name) . ".php"; 
        if (!is_file($model)) {
            exit(" Model " . $name . " Not Found!");
        }
        require_once $model;
        $class_name = ucfirst($name) . "_APPDATAModel";
        $_modules[$name] = new $class_name(); 
        return $_modules[$name];

    }
}

/*************模板解析*************/
if (!function_exists("shop_template_compile")) {
    function shop_template_compile($from, $to, $inmodule = false)
    {
        $path = dirname($to);
        if (!is_dir($path)) {
            load()->func("file");
            mkdirs($path);
        }
        $content = shop_template_parse($from, $inmodule);
        if (IMS_FAMILY == "x" && !preg_match("/(footer|header|account\\/welcome|login|register)+/", $from)) {
            $content = str_replace("微擎", "系统", $content);
        }
        file_put_contents($to, $content);
    }
}
if (!function_exists("shop_template_parse")) {
    function shop_template_parse($str, $inmodule = false)
    {

        $str = template_parse_web($str, $inmodule);

        $str = preg_replace("/{ifp\\s+(.+?)}/", "<?php if(cv(\$1)) { ?>", $str);
        $str = preg_replace("/{ifpp\\s+(.+?)}/", "<?php if(cp(\$1)) { ?>", $str);
        $str = preg_replace("/{ife\\s+(\\S+)\\s+(\\S+)}/", "<?php if( ce(\$1 ,\$2) ) { ?>", $str);

        return $str;
    }
}
if (!function_exists("template_parse_web")) {
    function template_parse_web($str, $inmodule = false)
    {
        $str = preg_replace("/<!--{(.+?)}-->/s", "{\$1}", $str);
        $str = preg_replace("/{template\\s+(.+?)}/", "<?php (!empty(\$this) && \$this instanceof WeModuleSite || " . intval($inmodule) . ") ? (include \$this->template(\$1, TEMPLATE_INCLUDEPATH)) : (include template(\$1, TEMPLATE_INCLUDEPATH));?>", $str);
        $str = preg_replace("/{php\\s+(.+?)}/", "<?php \$1?>", $str);
        $str = preg_replace("/{if\\s+(.+?)}/", "<?php if(\$1) { ?>", $str);
        $str = preg_replace("/{else}/", "<?php } else { ?>", $str);
        $str = preg_replace("/{else ?if\\s+(.+?)}/", "<?php } else if(\$1) { ?>", $str);
        $str = preg_replace("/{\\/if}/", "<?php } ?>", $str);
        $str = preg_replace("/{loop\\s+(\\S+)\\s+(\\S+)}/", "<?php if(is_array(\$1)) { foreach(\$1 as \$2) { ?>", $str);
        $str = preg_replace("/{loop\\s+(\\S+)\\s+(\\S+)\\s+(\\S+)}/", "<?php if(is_array(\$1)) { foreach(\$1 as \$2 => \$3) { ?>", $str);
        $str = preg_replace("/{\\/loop}/", "<?php } } ?>", $str);
        $str = preg_replace("/{(\\\$[a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff]*)}/", "<?php echo \$1;?>", $str);
        $str = preg_replace("/{(\\\$[a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff\\[\\]'\\\"\\\$]*)}/", "<?php echo \$1;?>", $str);
        $str = preg_replace("/{url\\s+(\\S+)}/", "<?php echo url(\$1);?>", $str);
        $str = preg_replace("/{url\\s+(\\S+)\\s+(array\\(.+?\\))}/", "<?php echo url(\$1, \$2);?>", $str);
        $str = preg_replace("/{media\\s+(\\S+)}/", "<?php echo tomedia(\$1);?>", $str);
        $str = preg_replace_callback("/<\\?php([^\\?]+)\\?>/s", "template_addquote", $str);
        $str = preg_replace_callback("/{hook\\s+(.+?)}/s", "template_modulehook_parser", $str);
        $str = preg_replace("/{\\/hook}/", "<?php ; ?>", $str);
        $str = preg_replace("/{([A-Z_\\x7f-\\xff][A-Z0-9_\\x7f-\\xff]*)}/s", "<?php echo \$1;?>", $str);
        $str = str_replace("{##", "{", $str);
        $str = str_replace("##}", "}", $str);
        if (!empty($GLOBALS["_W"]["setting"]["remote"]["type"])) {
            $str = str_replace("</body>", "<script>\$(function(){\$('img').attr('onerror', '').on('error', function(){if (!\$(this).data('check-src') && (this.src.indexOf('http://') > -1 || this.src.indexOf('https://') > -1)) {this.src = this.src.indexOf('" . $GLOBALS["_W"]["attachurl_local"] . "') == -1 ? this.src.replace('" . $GLOBALS["_W"]["attachurl_remote"] . "', '" . $GLOBALS["_W"]["attachurl_local"] . "') : this.src.replace('" . $GLOBALS["_W"]["attachurl_local"] . "', '" . $GLOBALS["_W"]["attachurl_remote"] . "');\$(this).data('check-src', true);}});});</script></body>", $str);
        }
        $str = "<?php defined('IN_IA') or exit('Access Denied');?>" . $str;
        return $str;
    }
}


if (!function_exists("url_script")) {
    function url_script()
    {
        $url = "";
        $script_name = basename($_SERVER["SCRIPT_FILENAME"]);
        if (basename($_SERVER["SCRIPT_NAME"]) === $script_name) {
            $url = $_SERVER["SCRIPT_NAME"];
        } else {
            if (basename($_SERVER["PHP_SELF"]) === $script_name) {
                $url = $_SERVER["PHP_SELF"];
            } else {
                if (isset($_SERVER["ORIG_SCRIPT_NAME"]) && basename($_SERVER["ORIG_SCRIPT_NAME"]) === $script_name) {
                    $url = $_SERVER["ORIG_SCRIPT_NAME"];
                } else {
                    if (($pos = strpos($_SERVER["PHP_SELF"], "/" . $script_name)) !== false) {
                        $url = substr($_SERVER["SCRIPT_NAME"], 0, $pos) . "/" . $script_name;
                    } else {
                        if (isset($_SERVER["DOCUMENT_ROOT"]) && strpos($_SERVER["SCRIPT_FILENAME"], $_SERVER["DOCUMENT_ROOT"]) === 0) {
                            $url = str_replace("\\", "/", str_replace($_SERVER["DOCUMENT_ROOT"], "", $_SERVER["SCRIPT_FILENAME"]));
                        }
                    }
                }
            }
        }
        return $url;
    }
}
/*************模板解析完成*************/

/******************抛出错信息*******************/
if (!function_exists("show_message")) {
    function show_message($msg = "")
    {
        echo $msg;
        exit();
    }
}
/*****************抛出错误信息完成*****************/
