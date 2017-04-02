<?php
namespace Admin\Controller;
class AuthController extends BaseController {
   
    
    //显示角色列表
    public function showlist() {
        $auth = D('Auth')->order('auth_id asc')->select();
        $auth = getTree($auth);
        $this->assign('result',$auth);
        $this->display();
    }
    
    //添加角色的时候，需要查询出所有的权限
    public function tianjia(){
        $auth = D('Auth');
        if(IS_POST){
           $auth = D('Auth');
           $res = $auth->create();
           !$res?$this->assign('msg',$auth->getError()):'';
           if($res){
               $res1 = $auth->add(I('post.'));
               $res1?$this->success('添加成功',U('showlist')):$this->error('添加失败');
               return;
           }
        }
        $auth = $auth->order('auth_id asc')->select();
        $auth = getTree($auth);
        $this->assign('auths',$auth);
        $this->display();
    }
    
    //修改权限
    public function update($id='') {
         $auth = D('Auth');
         if(IS_POST && (session('auth_id')===I('post.auth_id'))){
               $res = $auth->create();
               !$res?$this->assign('msg',$auth->getError()):'';
               if($res){
                   $res1 = $auth->save(I('post.'));
                   $res1?$this->success('修改成功',U('showlist')):$this->error('修改失败');
                   return;
               }
            }
        $info = $auth->field('auth_level',true)->find($id);
        $info?session('auth_id',$id):'';
        $auth = $auth->order('auth_id asc')->select();
        $auth = getTree($auth);
        $this->assign('result',$info);
        $this->assign('auths',$auth);
        $this->display();
    }
    //删除数据
    public function delete() {
        $auth = D('Auth');
        $role = D('Role');
        $id = I('post.id');
        
        /* //匹配角色中对应的权限
        $sql = "select * from sp_role  where role_auth_ids regexp '(.,)*{$id}(,.)*'";
        //查询当前控制器和操作
        $resone = $auth->find($id); */
        $res = $auth->order('auth_id asc')->select();
        $res = getChilds($res,$id);
        $res[] = $id;
        $str = implode(',', $res);
        $res = $auth->delete($str);
        $msg = $res?array('error'=>1,'ids'=>$str):array('error'=>0,'ids'=>$id);
        exit(json_encode($msg));
    }
}