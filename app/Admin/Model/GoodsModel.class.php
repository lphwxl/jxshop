<?php 
    namespace Admin\Model;
    use Think\Model;
    use Think\Image;
    use Think\Upload;
    class GoodsModel extends Model
    {
        public $error = '';
        protected $patchValidate    =   true;
        protected $_validate = array(    
             array('goods_name','require','商品品牌不得为空！'),
             array('goods_name','','商品已经存在！',0,'unique',self::MODEL_INSERT), 
             array('goods_price','require','价格不得为空！'),
             array('goods_number','require','数量不得为空！'),
             array('goods_number','number','请输入数字',1,self::MODEL_BOTH),
             array('goods_price','number','请输入数字',1,self::MODEL_BOTH),
             array('type_id','0','请选择商品类型',1,'notin',3),
        );
       protected function _after_insert($data, $options){
          if($data['goods_id']){
              $arr['goods_id'] =  $data['goods_id'];
              $attr = I('post.attr_info');
              foreach ($attr as $k=>$v){
                  if(!empty($v) && !is_array($v)){
                      $arr['attr_id'] = $k;
                      $arr['attr_value'] = $v;
                      M('GoodsAttr')->add($arr);
                  }
                  if(is_array($v)){
                      $v = array_unique($v);
                      foreach ($v as $vv){
                          if($vv != '0'){
                              $arr['attr_id'] = $k;
                              $arr['attr_value'] = $vv;
                              M('GoodsAttr')->add($arr);
                          }
                      }
                  }
              }
          }
       }
       protected function _after_update($data, $options){
           $goods_id = I('post.goods_id');
           M('GoodsAttr')->where('goods_id='.$goods_id)->delete();
           if($goods_id){
               $arr['goods_id'] =  $goods_id;
               $attr = I('post.attr_info');
               foreach ($attr as $k=>$v){
                   if(!empty($v) && !is_array($v)){
                       $arr['attr_id'] = $k;
                       $arr['attr_value'] = $v;
                       M('GoodsAttr')->add($arr);
                   }
                   if(is_array($v)){
                       $v = array_unique($v);
                       foreach ($v as $vv){
                           if($vv != '0'){
                               $arr['attr_id'] = $k;
                               $arr['attr_value'] = $vv;
                               M('GoodsAttr')->add($arr);
                           }
                       }
                   }
               }
           }
       }
        public  function detail($str,$mark=false){
            $data = I('post.');
            $data['goods_introduce'] = phpfilter($str);
            if($mark === true){
                $data['upd_time'] = time();
            }else{
                $data['add_time'] = time();
            }
            unset($data['goods_id']);
            return $this->logo($data);
        }
        
        //商品logo的制作
        public function logo(&$data){
            if($_FILES['goods_big_logo']['error'] === 0){
               $upload = new Upload();
               $upload->maxSize = 3145728 ;
               $upload->rootPath = './Public';
               $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
               $upload->savePath = '/upload/logo/'; 
               $z = $upload->uploadOne($_FILES['goods_big_logo']);
               if($z){
                   $path = $upload->rootPath.$z['savepath'].$z['savename'];
                   $data['goods_big_logo'] = ltrim($path,'.');
                   $img = new Image();
                   $img->open($path);
                   $small = $upload->rootPath.$z['savepath'].'sm_'.$z['savename'];
                   $img->thumb(120,120,1)->save($small);
                   $data['goods_small_logo'] = ltrim($small,'.');
               }else{
                   $this->error = $upload->getError();
               }
            }
            unset($_FILES['goods_big_logo']);
            return $data;
        }
        
        public function moreLogo(){
            $arr = array();
            foreach ($_FILES as $k=>$v){
                if($v['error'] === 0){
                    $arr[$k] = $_FILES[$k];
                }
            }
            if(count($arr)!= 0){
                $arrdata = array();
                $img = new Image();
                $upload = new Upload();
                $upload->maxSize = 3145728 ;
                $upload->rootPath = './Public';
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                $upload->savePath = '/upload/bigsmall/';
                $z = $upload->upload($arr);
                $i = 0;
                foreach($z as $k=>$v){
                    $pt = $upload->rootPath.$v['savepath'].$v['savename'];
                    $bg = $upload->rootPath.$v['savepath'].'bg_'.$v['savename'];
                    $md = $upload->rootPath.$v['savepath'].'mid_'.$v['savename'];
                    $small = $upload->rootPath.$v['savepath'].'sma_'.$v['savename'];
                    if(file_exists($pt)){
                        $img->open($pt)->thumb(600, 600,1);
                        $img->save($bg);
                        $arrdata[$i]['pics_big'] = ltrim($bg,'.');
                        $img->thumb(300, 300,1)->save($md);
                        $arrdata[$i]['pics_mid'] = ltrim($md,'.');
                        $img->thumb(120, 120,1)->save($small);
                        $arrdata[$i]['pics_sma'] = ltrim($small,'.');
                    }
                    unlink($pt);
                    $i++;
                }
                return $arrdata;
            }
        }
    }
?>