<?php 
    namespace Admin\Model;
    use Think\Model;
    use Think\Image;
    use Think\Upload;
    class RoleModel extends Model
    {
        protected $patchValidate    =   true;
        protected $_validate = array(    
             array('role_name','require','角色不能为空！'),
             array('role_name','','角色已经存在！',0,'unique',3), 
             /*  array('goods_price','require','价格不得为空！'),
             array('goods_number','require','数量不得为空！'),
             array('goods_number','number','请输入数字',1,self::MODEL_BOTH),
             array('goods_price','number','请输入数字',1,self::MODEL_BOTH), */
        );
       
        protected function _before_insert(&$data, $options){
            return $this->_insert_update($data,$options);
        }
        protected  function _before_update(&$data, $options){
            return $this->_insert_update($data,$options);
        }
        protected function _insert_update(&$data=array(), $options){
            $ids = I('post.role_auth_ids');
            if(is_array($ids)){
                $str = implode(',', $ids);
                $data['role_auth_ids'] = $str;
                $auth = D('Auth')->field('auth_level,auth_c,auth_a')->select($str);
                $role_auth = '';
                foreach ($auth as $v)
                {
                    if($v['auth_level'] !== '0'){
                        $role_auth .= $v['auth_c'].'-'.$v['auth_a'].',';
                    }
                }
                $role_auth = rtrim($role_auth,',');
                $data['role_auth_ac'] = $role_auth;
            }
            return $data;
        }
        
        
    }
?>