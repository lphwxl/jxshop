<?php 
    namespace Admin\Model;
    use Think\Model;
    class ManagerModel extends Model
    {
       
        protected $patchValidate    =   true;
        protected $_validate = array(
            array('user','require','用户名不能为空'),
            array('user','5,16','用户名在5-16位之间 ',1,'length'),
           /*  array('user','','用户名唯一',1,'unique',1), */
            array('pwd','require','密码不得为空'),
            array('role_id','0','请选择角色',0,'notin',3),
        );
        public $rule = array(
            array('chknumber','require','验证码不能为空',1),
            array('chknumber','checkcode','验证码错误',1,'callback')
        );
        //验证验证码
        protected function checkcode($value){
            $verify = new \Think\Verify();
            return $verify->check($value);
        }
    }


?>