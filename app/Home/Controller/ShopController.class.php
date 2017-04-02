<?php
    namespace Home\Controller;
    use Think\Controller;
    use Home\Common\Cart;
 class ShopController extends Controller{
        
        public function addgoods(){
            $goods_id = I('post.goods_id');
            $cars = new Cart();
            $goods['goods_id'] = $goods_id;
            $goods['goods_name'] = I('post.goods_name');
            $goods['goods_price'] = I('post.goods_price');
            $goods['goods_buy_number'] = I('post.num');
            $goods['goods_total_price'] = I('post.num')*I('post.goods_price');
            $cars->add($goods);
            echo json_encode($cars->getNumberPrice());
        }
        
        public function flow1(){
            $cars = new Cart();
            $res = $cars->getCartInfo();
            $keys = implode(array_keys($res),',');
           // dump($res);
            $goods = M('Goods')->field('goods_id,goods_small_logo')->select($keys);
            //dump($goods);
            foreach ($res as $k=>&$v){
                foreach ($goods as $vv){
                    if($k == $vv['goods_id']){
                        $v['goods_small_logo'] = $vv['goods_small_logo'];
                    }
                }
            }
           // dump($res);die;
            $price = $cars->getNumberPrice();
           // dump($price);die;
            $this->assign('price',$price);
            $this->assign('goods',$res);
            $this->display();
        }
        public function changenum(){
            $goods_id = I('post.goods_id');
            $num = I('post.num');
            $cars = new Cart();
            $cars->changeNumber($num, $goods_id);
            $info = $cars->getCartInfo()[$goods_id];
            $nump = $cars->getNumberPrice();
            $total = array_merge($info,$nump);
            echo json_encode($total);
        }
        
        public function del(){
            $goods_id = I('get.goods_id');
            $cars = new Cart();
            $cars->del($goods_id);
            $this->redirect('flow1');
        }
        
        
        public function flow2(){
            $cars = new Cart();
            if(IS_POST){
                $res = D('Order')->add(I('post.'));
            }
            //判断用户有没有登录
            if(empty(session('u_user'))){
                session('shop_url','shop/flow2');
                $this->redirect('user/login');
            }
            $res = $cars->getCartInfo();
            //dump($res);die;
            $keys = implode(array_keys($res),',');
            // dump($res);
            $goods = M('Goods')->field('goods_id,goods_small_logo')->select($keys);
            //dump($goods);
            foreach ($res as $k=>&$v){
                foreach ($goods as $vv){
                    if($k == $vv['goods_id']){
                        $v['goods_small_logo'] = $vv['goods_small_logo'];
                    }
                }
            }
            $price = $cars->getNumberPrice();
            $this->assign('price',$price);
            $this->assign('goods',$res);
            $this->display();
        }
        
    }


?>