<?php
namespace Admin\Controller;
class AttributeController extends BaseController {
   
    
    //显示类型列表
    public function showlist($type_id='1') {
        $attr = D('Attribute');
        $res1 = $attr->alias('a')
             ->join('sp_type on a.type_id=sp_type.type_id','left')->where('a.type_id='.$type_id)->order('a.attr_id')->select();
        $type = D('Type');
        $res2 = $type->select();
        $this->assign('mark',$type_id);
        $this->assign('types',$res2);
        $this->assign('result',$res1);
        $this->display();
    }
    
    //添加角色的时候，需要查询出所有的权限
    public function tianjia(){
        if(IS_POST){
           $attr = D('Attribute'); 
           $msg = $attr->create();
           !$msg?$this->assign('msg',$attr->getError()):'';
           if($msg){
               $res = $attr->add(I('post.'));
               $res? $this->success('添加成功',U('showlist')):$this->error('添加失败');
               return ;
           }
        }
       $type = D('Type');
       $res = $type->select();
       $this->assign('types',$res);
       $this->display();
    }
    
    //修改权限
    public function update($id='') {
        $attr =  D('Attribute');
        if(IS_POST){
            $msg = $attr->create(); 
            !$msg?$this->assign('msg',$attr->getError()):'';
            if($msg){
                $res = $attr->save(I('post.'));
                $res? $this->success('修改成功',U('showlist')):$this->error('修改失败');
                return ;
            }
        }
        $res1 = $attr->find($id);
        $type = D('Type');
        $res2 = $type->select();
        $this->assign('types',$res2);
        $this->assign('result',$res1);
        $this->display();
    }
   
    /* 
     * 
     *  @return  json 数据
     *  */
     public function getdata() {
         $type_id = I('get.type_id');
         $attr = D('Attribute');
         if($type_id == 0){
             $res1 = $attr->alias('a')
             ->join('sp_type on a.type_id=sp_type.type_id','left')->order('a.attr_id')->select();
         }else{
             $res1 = $attr->alias('a')
             ->join('sp_type on a.type_id=sp_type.type_id','left')->where('a.type_id='.$type_id)->order('a.attr_id')->select();
         }
         exit(json_encode($res1));
     }
     
     
     public function delete() {
         $attr = D('Attribute');
         $id = I('post.id');
         $res = $attr->delete($id);
         $msg = $res?array('error'=>1):array('error'=>0);
         exit(json_encode($msg));
     }
}