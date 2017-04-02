<?php 

    use Think\Verify;
use Think\Crypt\Driver\Think;
//过滤函数
    
    function phpfilter($str){
        
        //引入文件
        require_once './app/Common/Plugin/phpfilter/HTMLPurifier.auto.php';
        // 生成配置对象
        $cfg = HTMLPurifier_Config::createDefault();
        // 以下就是配置：
        $cfg->set('Core.Encoding', 'UTF-8');
        // 设置允许使用的HTML标签
        $cfg->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,br,span[style],img[width|height|alt|src]');
        // 设置允许出现的CSS样式属性
        $cfg->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
        // 设置a标签上是否允许使用target="_blank"
        $cfg->set('HTML.TargetBlank', TRUE);
        // 使用配置生成过滤用的对象
        $obj = new HTMLPurifier($cfg);
        // 过滤字符串
        return $obj->purify($str);
    }

    //无限递归分类
    function getTree($data,$pid=0,$level=0){
          static $arr = [];
          foreach ($data as $k=>$v){
              if($v['auth_pid'] == $pid){
                  $v['level'] = $level;
                  $arr[] = $v;
                  getTree($data,$v['auth_id'],$level+1);
              }
          }
          return $arr;
    }
    
    //无限极删除函数
    function getChilds($data=array(),$id=''){
        static $arr = [];
        foreach ($data as $k=>$v){
            if($v['auth_pid'] == $id){
                $arr[] = $v['auth_id'];
                getChilds($data,$v['auth_id']);
            }
            
        }
        return $arr;
    }
    
    function initmem(){
        S(array( 
            'type'=>'memcache', 
            'host'=>'127.0.0.1',
            'port'=>'11211', 
            'prefix'=>'mem', 
            'expire'=>60));
    }
?>