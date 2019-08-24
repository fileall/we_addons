<?php
/*
 * @Description: 石头类
 * @Github: https://github.com/fileall/we_addons.git
 */
defined("IN_IA") or exit( "Access Denied" );


class Stone extends WeModuleSite
{

    /**
     * @method : 模板渲染
     * @explain : 来源于人人商城与thinkphp3.2
     * @param {type} 
     * @return: 
     */
    final public function template($filename = "", $type = TEMPLATE_INCLUDEPATH, $account = false)
    {
        global $_W;
        global $_GPC;

        // $source 为源文件 $compile 为模板缓存文件
        list($source,$compile)   =   $this->parseTemplate($filename);

        if( !is_file($source) )
        {
            exit( "Error: template source '" . $source . "' is not exist!" );
        }
        $sourceContent =  file_get_contents($source);
        //开启布局
        if(C('LAYOUT_ON')) {
            if(false !== strpos($sourceContent,'{__NOCONTENT__}')) {  // 可以单独定义不使用布局
                $sourceContent = str_replace('{__NOCONTENT__}','',$sourceContent);
            }else{  // 替换布局的主体内容
                $layoutFile  =  APP_TEMPLATE_PATH .C('DEFAULT_MODULE').'/'.C('LAYOUT_NAME').TMPL_TEMPLATE_SUFFIX;//var_dump($layoutFile);die;
                $sourceContent = str_replace(C('TMPL_LAYOUT_ITEM'),$sourceContent,file_get_contents($layoutFile));
            }
        }
        //检测模板文件是否要重新编译
        if( APP_DEBUG || !is_file($compile) || filemtime($compile) < filemtime($source) )
        {
           //编译后的文件重新写入到缓存目录中$compile
            shop_template_compile($sourceContent, $compile, true);//var_dump(32);die;
        }  
        return $compile;
    }

    
    /**
     * @method : 寻找模板路径
     * @explain : 
     * @param {type} 
     * @return: 
     */
    final public function parseTemplate($template=''){
        // 分析模板文件规则
        $depr = TMPL_FILE_DEPR;
        if($template =='') {
            // 如果模板文件名为空 按照默认规则定位
            $template = CONTROLLER_NAME .$depr . ACTION_NAME;
        }elseif(false ==strpos($template, $depr) ){
            $template = CONTROLLER_NAME .$depr . $template;
        } elseif(strpos($template, $depr)){
            //跨上一级目录查找模板
            //$template = $template;
        }
        $module    = C('DEFAULT_MODULE');
        $file      = APP_TEMPLATE_PATH .$module.'/' .$template.TMPL_TEMPLATE_SUFFIX;
        $cacheFile = APP_DATA_PATH .$module.'/'.$template.FILE_SUFFIX;
        return array($file,$cacheFile);
    }


    /**
     * @method : 
     * @explain : 
     * @param {type} 
     * @return: 
     */
    final public function parseBaseTemplate($baseTemplate){
        if(empty($baseTemplate)) return false;
        $module = C('DEFAULT_MODULE');
        $file   =   APP_TEMPLATE_PATH .$module.'/'.$baseTemplate.TMPL_TEMPLATE_SUFFIX;
        $cacheFile   =   APP_DATA_PATH .$module.'/'.$baseTemplate.FILE_SUFFIX;
        return array($file,$cacheFile);
    }


}
?>