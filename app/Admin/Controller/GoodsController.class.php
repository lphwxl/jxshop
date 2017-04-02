<?php
namespace Admin\Controller;
class GoodsController extends BaseController {
    //前台商品展示
    public function showlist(){
        $goods = D('Goods');
        $res = $goods->where('is_del=0')->select();
        $count = count($res);
        $this->assign('count',$count);
        $this->assign('result',$res);
        $this->display();
    }
    //商品详情
    public function tianjia() {
        if(IS_POST){
            $goods = D('Goods');
            $res = $goods->create();
            if($res){
                $data = $goods->detail($_POST['goods_introduce']);
                $bigdata = $goods->moreLogo();
                $pic = D('GoodsPics');
                $res = $goods->add($data);
                if($res){
                    foreach ($bigdata as $v){
                        $v['goods_id'] = $res;
                        $pic->add($v);
                    }
                    $this->success('添加成功',U('showlist'));
                    return;
                }
                $this->error('添加失败');
            }
            $this->assign('msg',$goods->getError());
        }
        $type = D('Type')->select();
        $this->assign('types',$type);
        $this->display();
    }
    
    //修改商品
    public function update($id=''){
        //优先判断 数据的合法性
        if(!is_numeric($id)){
            return;
        }
        //id 合法 执行
        $goods = D('Goods');
        if(IS_POST){
            //dump(I('post.'));die;
            //验证 成功返回数据数组   失败返回false
            $res = $goods->create();
            if($res){
                //富文本的处理 以及字段和缩略图的制作
                $data = $goods->detail($_POST['goods_introduce'],true);
                //如果有上传的图片信息，则删除原来的图片
                if(isset($data['goods_big_logo'])){
                    $res = $goods->field('goods_big_logo,goods_small_logo')->find(I('post.goods_id'));
                    foreach ($res as $v){
                        $path = str_pad($v,strlen($v)+1,'.', STR_PAD_LEFT );
                        if(file_exists($path)){
                            unlink($path);
                        }
                    } 
                }
                //商品相册的制作
                $bigdata = $goods->moreLogo();
                //获取model模型 对象   对应的表名是goods_pics
                $pic = D('GoodsPics');
                $res = $goods->where('goods_id='.I('post.goods_id'))->save($data);
                if($res){
                    foreach ($bigdata as $v){
                        $v['goods_id'] = I('post.goods_id');
                        $pic->add($v);
                    }
                    $this->success('修改成功',U('showlist'));
                    return;
                }
                $this->error('修改失败');
            }
            $this->assign('msg',$goods->getError());
        }
        $res = $goods->field('is_del,add_time,upd_time',true)->find($id);
        $res1 = D('GoodsPics');
        $type = D('Type')->select();
        $this->assign('types',$type);
        $result = $res1->field('pics_id,pics_mid')->where('goods_id='.$id)->select();
        $this->assign('data',array($res,$result));
        $this->display();
    }
    
    //异步ajax删除商品相册
    public function dele(){
        $id = I('post.id');
        $gp = D('GoodsPics');
        $pic = $gp->field('pics_big,pics_mid,pics_sma')->find($id);
        foreach ($pic as $v){
            $path = str_pad($v,strlen($v)+1,'.', STR_PAD_LEFT );
            if(file_exists($path)){
                unlink($path);
            }
        }
        $res = $gp->delete($id);
        $res?exit(json_encode(array('error'=>1))):exit(json_encode(array('error'=>0)));
    }
    //添加和修改 的业务公共代码
    public function addsave($param) {
        
    }
    
    //获取商品的类别
    public function getattr() {
        $id = I('get.type_id');
        $attr  = D('Attribute');
        $res = $attr->where('type_id='.$id)->order('attr_id asc')->select();
        exit(json_encode($res));
    }
    
    public function getattr2(){
        $type_id = I('get.type_id');
        $goods_id = I('get.goods_id');
        $res = D('Attribute\
             
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ')
                ->alias('a')
                ->field('a.attr_id,a.attr_name,a.attr_vals,a.attr_sel,(select group_concat(attr_value) from sp_goods_attr ga where ga.attr_id=a.attr_id and ga.goods_id='.$goods_id.' group by attr_id) attr_values ')
                ->where('a.type_id='.$type_id)->order('a.attr_id asc')->select();
        exit(json_encode($res));
    }
}