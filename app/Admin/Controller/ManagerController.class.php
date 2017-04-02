<?php
namespace Admin\Controller;
class ManagerController extends BaseController {
    
    //页面展示
    public function index(){
        $this->display('login');
    }
    
    //管理员登录
    public function login(){
        if(IS_POST && IS_AJAX){
            $manager = D('Manager');
            $userpwd = $manager->create();
            if($userpwd){
                $res = $manager->validate($manager->rule)->create();
                if($res){
                    $res = $manager->where('`pwd`="'.md5(I('post.pwd')).'"')->find();
                    if(!is_null($res) && $res['user'] === I('post.user')){
                        $msg = array(
                            'info'=>'登陆成功',
                            'error'=>3
                        );
                        $manager->where('id='.$res['id'])->save(['number'=>$res['number']+1]);
                        session('uid',$res['id']);
                        session('user',$res['user']);
                    }else{
                        $msg = array(
                            'info'=>'用户名或密码错误',
                            'error'=>0
                        );
                    }
                }else{
                    //验证码问题
                    $msg = $manager->getError();
                    $msg['error'] = 1;
                }
            }else{
                $msg = $manager->getError();
                $msg['error'] = 2;
            } 
            exit(json_encode($msg));
        }
    }
    
    //验证码
    public function code(){
        $code = new \Think\Verify();
        $code->length = 3;
        $code->entry();
    }
    
    //用户退出
    public function signout(){
        session(null);
        $this->redirect('manager/index');
    }
    
    
    //管理员显示
    public function showlist() {
        $manager = D('Manager');
        $res = $manager->alias('m')
            ->field('m.id,m.user,r.role_auth_ids,r.role_name')
            ->join('sp_role as r on m.role_id=r.role_id','left')->order('m.id')->select();
        $this->assign('result',$res);
        $this->display();
    }
    
    //管理员添加
    public function tianjia(){
        if(IS_POST){
            $manager = D('Manager');
            $res = $manager->create();
            if($res){
                $manager->pwd = md5(I('post.pwd'));
                $manager->user = I('post.user');
                $manager->register = time();
                $manager->role_id = I('post.role_id');
                if($manager->add()){
                    $this->success('新增管理员成功',U('showlist'));
                }else{
                    $this->error('新增管理员失败');
                }
                return ;
            }
            $this->assign('msg',$manager->getError());
        }
        $res = M('role')->field('role_id,role_name')->select();
        $this->assign('roles',$res);
        $this->display();
    }
    //管理员删除
    public function delete($id='') {
        $id = I('post.id');
        $res = D('Manager')->delete($id);
        $msg = $res?array('error'=>1):array('error'=>0);
        exit(json_encode($msg));
    }
   public function update($id='') {
       $manager = D('Manager');
       if(IS_POST){
           $res = $manager->create();
           if($res && session('uid')=== I('post.id')){
               $manager->pwd = md5(I('post.pwd'));
               $manager->user = I('post.user');
               $manager->role_id = I('post.role_id');
               if($manager->where('id='.I('post.id'))->save()){
                   $this->success('修改管理员成功',U('showlist'));
               }else{
                   $this->error('修改管理员失败');
               }
               return ;
           }
           $this->assign('msg',$manager->getError());
       }
       session('uid',$id);
       $res = $manager->field('id,user,role_id')->find($id);
       $res2 = M('role')->field('role_id,role_name')->select();
       $this->assign('roles',$res2);
       $this->assign('res',$res);
       $this->display();
   }
}