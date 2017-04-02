<?php 
    namespace Home\Model;
    use Think\Model;
use Think\Verify;
        class UserModel extends Model
    {
        
        protected $patchValidate    =   true;
        public $rule = [['checkcode','checkerror','验证码错误',1,'callback']];
        protected $_validate = array(
            array('username','require','用户名不得为空',1),
            array('password','require','密码不得为空',1),
        );
        
        //验证验证码
        protected function checkerror($value){
            $verify = new Verify();
            return $verify->check($value);
        }
    }

?>