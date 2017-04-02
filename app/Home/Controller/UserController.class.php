<?php 
    namespace Home\Controller;
    use Think\Controller;
    use Think\Verify;
        class UserController extends Controller{
        
        public function login(){
            if(IS_POST){
                $data = I('post.');
                $user = D('User');
                $res = $user->validate($user->rule)->create();
                if($res){
                    //验证用户名是否为空
                    $resu = $user->create();
                    if($resu){
                        $resuser = $user->where('username="'.I('post.username').'"')->find();
                        if($resuser['password'] == md5(I('post.password'))){
                          //dump($_SESSION['shop_url']);die;
                            session('u_id',$resuser['user_id']);
                            session('u_user',$resuser['username']);
                            $shop_url = session('shop_url');
                            if(!empty($shop_url)){
                                //dump($shop_url);die;
                                session('shop_url',null);
                                $this->redirect($shop_url);
                            }
                            $this->success('登陆成功',U('index/index'));
                            return ;
                        }
                        $this->assign('msg',['password'=>'用户名或密码错误']);
                    }else{
                        $this->assign('msg',$user->getDbError());
                    }
                }else{
                   
                    $this->assign('msg',$user->getError());
                }
            }
            $this->display();
        }
        
        //用户注册
        public function register(){
            
            $this->display();
        }
        
        
        //用户中心
        public function user(){
            $this->display();
        }
        //用户注销
        public function loginout(){
            session(null);
            header('location:/home/index/index');
        }
        
        //验证码
        public function code(){
            $verify = new Verify();
            $verify->length = 4;
            $verify->fontSize = 18;
            $verify->imageH = 32;
            $verify->imageW = 150;
            $verify->entry();
        }
        
    }

?>