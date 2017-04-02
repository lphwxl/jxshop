<?php
namespace Admin\Controller;
class RoleController extends BaseController {
   
    
    //显示角色列表
    public function showlist() {
        $role = D('Role');
        $res = $role->field('role_id,role_name,role_auth_ac')->select();
        //dump($res);die;
        $this->assign('result',$res);
        $this->display();
    }
    
    //添加角色的时候，需要查询出所有的权限
    public function tianjia(){
        if(IS_POST){
           $role = D('Role');
           $res = $role->create();
           !$res?$this->assign('msg',$role->getError()):'';
           if($res){
               $res1 = $role->add(I('post.'));
               $res1?$this->success('添加成功',U('showlist')):$this->error('添加失败');
               return;
           }
        }
        $res = M('Auth')->order('auth_id')->select();
        $res = getTree($res);
        $this->assign('result',$res);
        $this->display();
    }
    
    //修改权限
    public function update($id='') {
         $role = D('Role');
         if(IS_POST && (session('role_id')===I('post.role_id'))){
               $res = $role->create();
               !$res?$this->assign('msg',$role->getError()):'';
               if($res){
                   $res1 = $role->save(I('post.'));
                   $res1?$this->success('修改成功',U('showlist')):$this->error('修改失败');
                   return;
               }
            }
        $info = $role->field('role_id,role_name,role_auth_ids')->find($id);
        $info?session('role_id',$id):'';
        $res = M('Auth')->order('auth_id')->select();
        $res = getTree($res);
        $this->assign('result',$res);
        $this->assign('roles',$info);
        $this->display();
    }
    //删除数据
    public function delete($id='') {
        $id = I('post.id');
        $res = D('Role')->delete($id);
        $msg = $res?array('error'=>1):array('error'=>0);
        exit(json_encode($msg));
    }
}