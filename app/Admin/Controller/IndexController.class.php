<?php
namespace Admin\Controller;
class IndexController extends BaseController 
{
    //初始化
    public function index(){
        $this->display();
    }
    //头部
    public function top(){
        $this->display();
    }
    //左侧导航栏
    public function left() {
        $arrP = [];
        $arrC = [];
        if(session('user') === 'admin'){
            $auth = M('Auth');
            $res = $auth->where('auth_level=0 or auth_level=1')->select();
            
        }else{
            $res = M('Manager')->field('role_id')->find(session('uid'));
            $ids = M('Role')->field('role_auth_ids')->find($res['role_id']);
            $res = M('Auth')->select($ids['role_auth_ids']);
        }
        foreach ($res as $k=>$v){
            if($v['auth_pid'] ==0){
                $arrP[] = $v;
            }else{
                $arrC[] = $v;
            }
        }
        $this->assign('arrP',$arrP);
        $this->assign('arrC',$arrC);
        $this->display();
    }
    //右侧
    public function right() {
        $manager = D('Manager');
        $msg = $manager->field('pwd,role_id',true)->find(session('uid'));
        $this->assign('ip',$_SERVER['REMOTE_ADDR']);
        $this->assign('usermsg',$msg);
        $this->display();
    }
    public function down() {
        $this->display();
    }
}