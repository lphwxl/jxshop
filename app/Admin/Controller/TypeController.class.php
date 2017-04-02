<?php
namespace Admin\Controller;
class TypeController extends BaseController {
   
    
    //显示类型列表
    public function showlist() {
       $res = D('Type')->select();
       $this->assign('result',$res);
       $this->display();
    }
    
    public function tianjia(){
        if(IS_POST){
           $type = D('Type');
           $res = $type->create();
           !$res?$this->assign('msg',$type->getError()):'';
           if($res){
               $res1 = $type->add(I('post.'));
               $res1?$this->success('添加成功',U('showlist')):$this->error('添加失败');
               return;
           }
        }
        $this->display();
    }
    
    //修改权限
    public function update($id='') {
         $type = D('Type');
         if(IS_POST){
               $res = $type->create();
               !$res?$this->assign('msg',$type->getError()):'';
               if($res){
                   $res1 = $type->save(I('post.'));
                   $res1?$this->success('修改类型成功',U('showlist')):$this->error('修改类型失败');
                   return;
               }
            }
        $res = $type->find($id);
        $this->assign('result',$res);
        $this->display();
    }
    //删除数据
    public function delete($id='') {
        $id = I('post.id');
        $attr = D('Attribute');
        $res = D('Type')->delete($id);
        if($res){
            $res2 = $attr->where('type_id='.$id)->delete();
            $msg = $res2?array('error'=>1):array('error'=>0);
        }else{
            $msg = array('error'=>0);
        }
        exit(json_encode($msg));
    }
}