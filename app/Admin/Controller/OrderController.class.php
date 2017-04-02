<?php 
    namespace Admin\Controller;
    use Think\Controller;
    class OrderController extends Controller{
        
        
        //展示订单
        public function showlist(){
            $resall = D('Order')->field('order_id,order_number,order_price,is_send,order_status,add_time')->select();
            //foreach既能遍关联数组，也能遍历索引数组
            //for只能遍历索引数组
            foreach ($resall as &$v){
                $v['order_status'] = $v['order_status']?'已付款':'未付款';
                $v['add_time'] = date('Y-m-d H:i:s');
            }
            //dump($resall);die;
            $this->assign('orders',$resall);
            $this->display();
        }
        
        //订单详情
        public function detail($order_id='') {
            $id = $order_id;
            $res = D('Order')->field('order_id,user_id,cgn_id')->find($id);
            $detail  = D('Consignee')->where([['user_id='.$res['user_id']],['cgn_id='.$res['cgn_id']]])->select();
            $args = D('OrderGoods')->where('order_id='.$res['order_id'])->select();
            $this->assign('useraddr',$detail);
            $this->assign('args',$args);
            $this->display();
        }
    }


?>