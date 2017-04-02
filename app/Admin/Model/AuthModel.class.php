<?php 
    namespace Admin\Model;
    use Think\Model;
    use Think\Image;
    use Think\Upload;
    class AuthModel extends Model
    {
        protected $patchValidate    =   true;
        protected $_validate = array(    
             array('auth_name','require','权限不能为空！'),
             array('auth_name','','权限已经存在！',0,'unique',3), 
             array('auth_c','require','控制器不得为空！'),
             array('auth_a','require','操作不得为空！'),
             /* array('goods_number','number','请输入数字',1,self::MODEL_BOTH),
             array('goods_price','number','请输入数字',1,self::MODEL_BOTH),  */
        );
        protected function _before_insert(&$data, $options){
            return $this->_insert_update($data,$options);
        }
        protected  function _before_update(&$data, $options){
            return $this->_insert_update($data,$options);
        }
        protected function _insert_update(&$data=array(), $options){
            $res = $this->field('auth_level')->where('auth_id='.$data['auth_pid'])->find();
            $data['auth_level']=$res?$res['auth_level']+1:0;
            return $data;
        }
        
        
    }
?>