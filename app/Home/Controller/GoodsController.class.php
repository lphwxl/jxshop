<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Think\Db;
class GoodsController extends Controller {
    
    //前台商品展示
    public function showlist(){
        $goods = D('Goods');
        //分页
        $num = $goods->count();
        $page = new Page($num,4);
        $page->setConfig('header','共 %TOTAL_ROW% 条记录');
        $page->setConfig('first ', '<<');
        $page->setConfig('prev', '上一页');
        $page->setConfig('next', '下一页');
        $page->setConfig('last', '>>');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show = $page->show();
        $result = $goods->field('goods_id,goods_name,goods_price,goods_small_logo')->where('is_del=0')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('result',$result);
        $this->display();
    }
    //商品详情
    public function detail($id='') {
        $goods_id =  I('get.goods_id');
        //商品基本信息
        $goods = D('Goods')->field('goods_small_logo,goods_big_logo,upd_time',true)->find($goods_id);
        //dump($goods);die;
        
        //商品相册
        $pic = M('GoodsPics')->field('pics_id',true)->where('goods_id='.$goods_id)->select();
        //dump($pic);;die;
        //唯一属性
        $sql1 = 'select a.attr_id,a.attr_name,ga.attr_value from sp_attribute a INNER JOIN sp_goods_attr ga on ga.attr_id=a.attr_id WHERE ga.goods_id=%d and a.attr_sel="only"';
        $sql1 = sprintf($sql1,$goods_id);
        $un_attr = D('Attribute')->query($sql1);
       // dump($un_attr);die;
        //获取商品的单选属性
        $sql2  = 'select a.attr_name,a.attr_id,GROUP_CONCAT(ga.attr_value) attr_values from sp_goods_attr ga inner JOIN sp_attribute a on ga.attr_id=a.attr_id where ga.goods_id=%d and a.attr_sel="many" GROUP BY ga.attr_id';
        $sql2 = sprintf($sql2,$goods_id);
        $many = D('GoodsAttr')->query($sql2);
        foreach ($many as $kk=>$v){
            foreach ($v as $k=>$vv){
                if($k == 'attr_values'){
                    $many[$kk][$k] = explode(',', $vv);
                }
            }
        }
       // dump($many);die;
        $this->assign('manyAttr',$many);
        $this->assign('attrone',$un_attr);
        $this->assign('pics',$pic);
        $this->assign('goodone',$goods);
        $this->display();
    }
    
}