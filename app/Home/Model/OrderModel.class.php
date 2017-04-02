<?php 
    namespace Home\Model;
    use Think\Model;
use Home\Common\Cart;
        class OrderModel extends Model{
        
        
            
        //订单添加之前
        protected function _before_insert(&$data, $options){
            $cars = new Cart();
            $data['user_id'] = session('uid');
            $data['order_number'] = date('YmdHis').md5(session('user'));
            $data['order_price'] = $cars->getNumberPrice()['price'];
            $data['add_time'] = time();
            $data['order_pay'] = $this->payway();
        }
        
        //订单添加成功后
        protected function _after_insert($data, $options)
        {
            $order_id = $data['order_id'];
            $cars = new Cart();
            if($order_id)
            {
                $shju2 = array();
                $shuju2['order_id'] = $order_id;
                $info = $cars->getCartInfo();
                foreach ($info as $v)
                {
                    $shuju2['goods_id'] = $v['goods_id'];
                    $shuju2['goods_buy_number'] = $v['goods_number'];
                    $shuju2['goods_price'] = $v['goods_price'];
                    $shuju2['goods_total_price'] = $v['goods_total_price'];
                    $res2 = D('OrderGoods')->add($shuju2);
                    if(!$res2)
                    {
                        exit('操作失败');
                    }
                }
                $cars->delall();
                //跳转到对应的支付界面
                $this->paypull($order_id);
            }
        }
        //对支付方式的处理
        protected  function payway(){
            $str = I('post.order_pay');
            if(is_string($str)){
                switch ($str){
                    case '支付宝':
                        //提交成功后跳转到支付宝接口
                        $str = '0';
                        break;
                    case '微信':
                        //成功后跳转到微信接口
                        $str = '1';
                        break;
                    case '银行卡':
                        //成功后跳转到银行卡接口
                        $str = '2';
                        break;
                }
                return $str;
            }
        }
        
        
        //支付页面的跳转
        protected function paypull($order_id=''){
            $res = $this->find($order_id);
            $pay = $this->payway();
            switch ($pay){
                case '0':
                    //支付宝接口   构建表单并自动提交  
                    //主要传递价格
                    $str = <<<str
                       '<form action="/extend/alipay/alipayapi.php" method="post" name="shuju">
                        <input type="hidden" name="WIDout_trade_no" value="{$res['order_number']}"/>
                        <input type="hidden" name="WIDsubject" value="衣服"/>
                        <input type="hidden" name="WIDtotal_fee" value="{$res['order_price']}"/>
                        </from>
                        <script>getElementsByName("shuju")[0].submit();</script>
                        ' ;
                    
str;
                    echo $str;
                    break;
                case '1':
                    //微信接口
                    break;
                    
                    
                case '2':
                    //银行卡接口
                    
                    
                break;
                
            }
        }
    }


?>