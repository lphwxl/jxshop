<?php 
    namespace Admin\Controller;
    use Think\Controller;
    class BaseController extends Controller{
        protected $allow = [];
        
        public function __construct(){
            parent::__construct();
            $ac = CONTROLLER_NAME.'-'.ACTION_NAME;
            $this->allow = C('authlist');
            $this->deny($ac);
            $this->authdeny($ac);
        }
       
        //防止用户未登录的情况下访问后台
        protected function deny($ac){
            if(!session('?user') && !in_array($ac, $this->allow)){
                header('location:/admin/manager/index');
            }
        }
        //防止用户访问其他用户的权限
        protected function authdeny($ac){
            if(session('?uid')){
                //引入memcache 减少服务器压力
                $manager = D('Manager');
                $res =$manager->field('role_id')->find(session('uid'));
                $role_id = !is_null($res)?$res['role_id']:'';
                $authlist = $manager->field('sp_role.role_auth_ac')->where('sp_manager.role_id='.$role_id)
                ->join('sp_role on sp_manager.role_id = sp_role.role_id','left')
                ->find();
                if(is_null($authlist['role_auth_ac'])){
                    header('location:/admin/manager/index');
                }else{
                    $arr = explode(',',$authlist['role_auth_ac']);
                    if(!in_array($ac, $arr) && (!in_array($ac,C('auth'))) && session('user')!=='admin'){
                        $this->error('暂无该访问权限,请联系管理员');
                    }
                }
            }
        }
    }


?>