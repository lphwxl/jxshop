<?php 
    namespace Admin\Model;
    use Think\Model;
    use Think\Image;
    use Think\Upload;
    class AttributeModel extends Model
    {
        protected $patchValidate    =   true;
        protected $_validate = array(    
             array('attr_name','require','类型不能为空！'),
             array('attr_name','','类型已经存在！',0,'unique',3), 
          /*    array('type_id','require',),
             array('type_id','require','数量不得为空！'), */
             array('type_id','0','必须选择一项',1,'notin',3),
             /*array('goods_price','number','请输入数字',1,self::MODEL_BOTH), */
        );
       
         protected function _before_insert(&$data, $options){
            return $this->_insert_update($data,$options);
        }
        protected  function _before_update(&$data, $options){
            return $this->_insert_update($data,$options);
        }
        protected function _insert_update(&$data=array(), $options){
            $content = I('post.attr_vals');
            if(!empty($content)){
                $content = str_replace(' ', '', str_replace('，',',',trim($content,' ')));
                $data['attr_vals'] = $content;
            }
            return $data;
        } 
    }
?>