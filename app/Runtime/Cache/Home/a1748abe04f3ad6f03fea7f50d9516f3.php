<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>购物车页面</title>
    <link rel="stylesheet" href="<?php echo C('CSS');?>/base.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS');?>/global.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS');?>/header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS');?>/cart.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS');?>/footer.css" type="text/css">

    <script type="text/javascript" src="<?php echo C('JS');?>/jquery-1.8.3.min.js"></script>
   <!--  <script type="text/javascript" src="<?php echo C('JS');?>/cart1.js"></script> -->
    
</head>
<body>
    <!-- 顶部导航 start -->
    <!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w1210 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<?php if(isset($_SESSION['user'])): ?><li>您好，欢迎来到京西！<span style="font-weight:bold;color:gray;font-size:18px;">[<?php echo (session('user')); ?>]</span> [<a href="<?php echo U('user/loginout');?>">退出系统</a>] </li>
						<?php else: ?>
					<li>您好，欢迎来到京西！[<a href="<?php echo U('user/login');?>">登录</a>] [<a href="<?php echo U('user/register');?>">免费注册</a>] </li><?php endif; ?>
					<li class="line">|</li>
					<li>我的订单</li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->
	
	<div style="clear:both;"></div>

	<!-- 头部 start -->
	<div class="header w1210 bc mt15">
		<!-- 头部上半部分 start 包括 logo、搜索、用户中心和购物车结算 -->
		<div class="logo w1210">
			<h1 class="fl"><a href="index.html"><img src="<?php echo C('IMG');?>/logo.png" alt="京西商城"></a></h1>
			<!-- 头部搜索 start -->
			<div class="search fl">
				<div class="search_form">
					<div class="form_left fl"></div>
					<form action="" name="serarch" method="get" class="fl">
						<input type="text" class="txt" value="请输入商品关键字" /><input type="submit" class="btn" value="搜索" />
					</form>
					<div class="form_right fl"></div>
				</div>
				
				<div style="clear:both;"></div>

				<div class="hot_search">
					<strong>热门搜索:</strong>
					<a href="">D-Link无线路由</a>
					<a href="">休闲男鞋</a>
					<a href="">TCL空调</a>
					<a href="">耐克篮球鞋</a>
				</div>
			</div>
			<!-- 头部搜索 end -->

			<!-- 用户中心 start-->
			<div class="user fl">
				<dl>
					<dt>
						<em></em>
						<a href="">用户中心</a>
						<b></b>
					</dt>
					<dd>
						<div class="prompt">
							您好，请<a href="">登录</a>
						</div>
						<div class="uclist mt10">
							<ul class="list1 fl">
								<li><a href="">用户信息></a></li>
								<li><a href="">我的订单></a></li>
								<li><a href="">收货地址></a></li>
								<li><a href="">我的收藏></a></li>
							</ul>

							<ul class="fl">
								<li><a href="">我的留言></a></li>
								<li><a href="">我的红包></a></li>
								<li><a href="">我的评论></a></li>
								<li><a href="">资金管理></a></li>
							</ul>

						</div>
						<div style="clear:both;"></div>
						<div class="viewlist mt10">
							<h3>最近浏览的商品：</h3>
							<ul>
								<li><a href=""><img src="<?php echo C('IMG');?>/view_list1.jpg" alt="" /></a></li>
								<li><a href=""><img src="<?php echo C('IMG');?>/view_list2.jpg" alt="" /></a></li>
								<li><a href=""><img src="<?php echo C('IMG');?>/view_list3.jpg" alt="" /></a></li>
							</ul>
						</div>
					</dd>
				</dl>
			</div>
			<!-- 用户中心 end-->

			<!-- 购物车 start -->
			<div class="cart fl">
				<dl>
					<dt>
						<a href="">去购物车结算</a>
						<b></b>
					</dt>
					<dd>
						<div class="prompt">
							购物车中还没有商品，赶紧选购吧！
						</div>
					</dd>
				</dl>
			</div>
			<!-- 购物车 end -->
		</div>
		<!-- 头部上半部分 end -->
		
		<div style="clear:both;"></div>

		<!-- 导航条部分 start -->
		<div class="nav w1210 bc mt10">
			<!--  商品分类部分 start-->
			<?php if((CONTROLLER_NAME== 'Index') AND (ACTION_NAME== 'index') ): ?><div class="category fl"> <!-- 非首页，需要添加cat1类 -->
				<div class="cat_hd">				 <!-- 注意，首页在此div上只需要添加cat_hd类，非首页，默认收缩分类时添加上off类，鼠标滑过时展开菜单则将off类换成on类 -->
				<h2>全部商品分类</h2>
					<em></em>
				</div>
				<div class="cat_bd">
			<?php else: ?>
				<div class="category fl cat1"> <!-- 非首页，需要添加cat1类 -->
				<div class="cat_hd off">				 <!-- 注意，首页在此div上只需要添加cat_hd类，非首页，默认收缩分类时添加上off类，鼠标滑过时展开菜单则将off类换成on类 -->
				<h2>全部商品分类</h2>
					<em></em>
				</div>
				<div class="cat_bd none"><?php endif; ?>
					
					<div class="cat item1">
						<h3><a href="">图像、音像、数字商品</a> <b></b></h3>
						<div class="cat_detail">
							<dl class="dl_1st">
								<dt><a href="">电子书</a></dt>
								<dd>
									<a href="">免费</a>
									<a href="">小说</a>
									<a href="">励志与成功</a>
									<a href="">婚恋/两性</a>
									<a href="">文学</a>
									<a href="">经管</a>
									<a href="">畅读VIP</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">数字音乐</a></dt>
								<dd>
									<a href="">通俗流行</a>
									<a href="">古典音乐</a>
									<a href="">摇滚说唱</a>
									<a href="">爵士蓝调</a>
									<a href="">乡村民谣</a>
									<a href="">有声读物</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">音像</a></dt>
								<dd>
									<a href="">音乐</a>
									<a href="">影视</a>
									<a href="">教育音像</a>
									<a href="">游戏</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">文艺</a></dt>
								<dd>
									<a href="">小说</a>
									<a href="">文学</a>
									<a href="">青春文学</a>
									<a href="">传纪</a>
									<a href="">艺术</a>
									<a href="">经管</a>
									<a href="">畅读VIP</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">人文社科</a></dt>
								<dd>
									<a href="">历史</a>
									<a href="">心理学</a>
									<a href="">政治/军事</a>
									<a href="">国学/古籍</a>
									<a href="">哲学/宗教</a>
									<a href="">社会科学</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">经管励志</a></dt>
								<dd>
									<a href="">经济</a>
									<a href="">金融与投资</a>
									<a href="">管理</a>
									<a href="">励志与成功</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">人文社科</a></dt>
								<dd>
									<a href="">历史</a>
									<a href="">心理学</a>
									<a href="">政治/军事</a>
									<a href="">国学/古籍</a>
									<a href="">哲学/宗教</a>
									<a href="">社会科学</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">生活</a></dt>
								<dd>
									<a href="">烹饪/美食</a>
									<a href="">时尚/美妆</a>
									<a href="">家居</a>
									<a href="">娱乐/休闲</a>
									<a href="">动漫/幽默</a>
									<a href="">体育/运动</a>
								</dd>
							</dl>

							<dl>
								<dt><a href="">科技</a></dt>
								<dd>
									<a href="">科普</a>
									<a href="">建筑</a>
									<a href="">IT</a>
									<a href="">医学</a>
									<a href="">工业技术</a>
									<a href="">电子/通信</a>
									<a href="">农林</a>
									<a href="">科学与自然</a>
								</dd>
							</dl>

						</div>
					</div>

					<div class="cat">
						<h3><a href="">家用电器</a><b></b></h3>
						<div class="cat_detail">
							<dl class="dl_1st">
								<dt><a href="">大家电</a></dt>
								<dd>
									<a href="">平板电视</a>
									<a href="">空调</a>
									<a href="">冰箱</a>
									<a href="">洗衣机</a>
									<a href="">热水器</a>
									<a href="">DVD</a>
									<a href="">烟机/灶具</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">生活电器</a></dt>
								<dd>
									<a href="">取暖器</a>
									<a href="">加湿器</a>
									<a href="">净化器</a>
									<a href="">饮水机</a>
									<a href="">净水设备</a>
									<a href="">吸尘器</a>
									<a href="">电风扇</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">厨房电器</a></dt>
								<dd>
									<a href="">电饭煲</a>
									<a href="">豆浆机</a>
									<a href="">面包机</a>
									<a href="">咖啡机</a>
									<a href="">微波炉</a>
									<a href="">电磁炉</a>
									<a href="">电水壶</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">个护健康</a></dt>
								<dd>
									<a href="">剃须刀</a>
									<a href="">电吹风</a>
									<a href="">按摩器</a>
									<a href="">足浴盆</a>
									<a href="">血压计</a>
									<a href="">体温计</a>
									<a href="">血糖仪</a>						
								</dd>
							</dl>

							<dl>
								<dt><a href="">五金家装</a></dt>
								<dd>
									<a href="">灯具</a>
									<a href="">LED灯</a>
									<a href="">水槽</a>
									<a href="">龙头</a>
									<a href="">门铃</a>
									<a href="">电器开关</a>
									<a href="">插座</a>						
								</dd>
							</dl>
						</div>
					</div>

					<div class="cat">
						<h3><a href="">手机、数码</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

					<div class="cat">
						<h3><a href="">电脑、办公</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>
					
					<div class="cat">
						<h3><a href="">家局、家具、家装、厨具</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>
					
					<div class="cat">
						<h3><a href="">服饰鞋帽</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>
					
					<div class="cat">
						<h3><a href="">个护化妆</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>
					
					<div class="cat">
						<h3><a href="">礼品箱包、钟表、珠宝</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

					<div class="cat">
						<h3><a href="">运动健康</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

					<div class="cat">
						<h3><a href="">汽车用品</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>
					
					<div class="cat">
						<h3><a href="">母婴、玩具乐器</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

					<div class="cat">
						<h3><a href="">食品饮料、保健食品</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

					<div class="cat">
						<h3><a href="">彩票、旅行、充值、票务</a><b></b></h3>
						<div class="cat_detail none">
							
						</div>
					</div>

				</div>

			</div>
			<!--  商品分类部分 end--> 

			<div class="navitems fl">
				<ul class="fl">
					<li class="current"><a href="">首页</a></li>
					<li><a href="">电脑频道</a></li>
					<li><a href="">家用电器</a></li>
					<li><a href="<?php echo U('goods/showlist');?>">品牌大全</a></li>
					<li><a href="">团购</a></li>
					<li><a href="">积分商城</a></li>
					<li><a href="">夺宝奇兵</a></li>
				</ul>
				<div class="right_corner fl"></div>
			</div>
		</div>
		<!-- 导航条部分 end -->
	</div>
	<!-- 头部 end-->
	
	<div style="clear:both;"></div>
    <!-- 顶部导航 end -->
    <div style="clear:both;"></div>
    <!-- 页面头部 start -->
    <div class="header w990 bc mt15">
        <div class="logo w990">
            <h2 class="fl"><a href="index.html"><img src="<?php echo C('IMG');?>/logo.png" alt="京西商城"></a></h2>
            <div class="flow fr">
                <ul>
                    <li <?php if((ACTION_NAME) == "flow1"): ?>class="cur"<?php endif; ?>>1.我的购物车</li>
                    <li <?php if((ACTION_NAME) == "flow2"): ?>class="cur"<?php endif; ?>>2.填写核对订单信息</li>
                    <li <?php if((ACTION_NAME) == ""): ?>class="cur"<?php endif; ?>>3.成功提交订单</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- 页面头部 end -->
    <div style="clear:both;"></div>

    <!-- 主体部分 start -->
    <div class="mycart w990 mt10 bc">
        <h2><span>我的购物车</span></h2>
        <table>
            <thead>
                <tr>
                    <th class="col1">商品名称</th>
                    <th class="col2">商品信息</th>
                    <th class="col3">单价</th>
                    <th class="col4">数量</th>    
                    <th class="col5">小计</th>
                    <th class="col6">操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td class="col1"><a href=""><img src="<?php echo ($vo['goods_small_logo']); ?>" alt="" /></a>  <strong><a href=""><?php echo ($vo['goods_name']); ?></a></strong></td>
                    <td class="col2"> <p>颜色：073深红</p> <p>尺码：170/92A/S</p> </td>
                    <td class="col3">￥<span><?php echo ($vo['goods_price']); ?></span></td>
                    <td class="col4"> 
                        <a href="javascript:;" class="reduce_num" onclick="changenum(<?php echo ($vo['goods_id']); ?>,'red')"></a>
                        <input onkeyup="changenum(<?php echo ($vo['goods_id']); ?>)" type="text" name="amount" value="<?php echo ($vo['goods_buy_number']); ?>" class="amount" id="amount_<?php echo ($vo['goods_id']); ?>"/>
                        <a href="javascript:;" class="add_num" onclick="changenum(<?php echo ($vo['goods_id']); ?>,'add')"></a>
                    </td>
                    <td class="col5">￥<span id="small_<?php echo ($vo['goods_id']); ?>"><?php echo ($vo['goods_total_price']); ?></span></td>
                    <td class="col6"><a href="<?php echo U('shop/del','goods_id='.$vo['goods_id']);?>">删除</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">购物金额总计： <strong>￥ <span id="total"><?php echo ($price['price']); ?></span></strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="cart_btn w990 bc mt10">
            <a href="<?php echo U('goods/showlist');?>" class="continue">继续购物</a>
            <a href="<?php echo U('flow2');?>" class="checkout">结 算</a>
        </div>
    </div>
    <!-- 主体部分 end -->

    <div style="clear:both;"></div>
    <!-- 底部版权 start -->
    <div style="clear:both;"></div>
<!-- 底部版权 start -->
	<div class="footer w1210 bc mt10">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
			<a href="">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
		</p>
		<p class="auth">
			<a href=""><img src="<?php echo C('IMG');?>/xin.png" alt="" /></a>
			<a href=""><img src="<?php echo C('IMG');?>/kexin.jpg" alt="" /></a>
			<a href=""><img src="<?php echo C('IMG');?>/police.jpg" alt="" /></a>
			<a href=""><img src="<?php echo C('IMG');?>/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->
    <!-- 底部版权 end -->
    
    <script type="text/javascript">
		function changenum(goods_id,mark){
			var mark = mark || '';
			var num = $('#amount_'+goods_id).val();
			if( mark == 'red'){
				num--;
				if(num < 1){
					window.location.href = window.location.href;
					return ;
				}
			}else if(mark=='add'){
				num++;
			}else if(mark == ''){
				var reg = /^([1-9]|1\d{1}|20)$/;
				if(!num.match(reg)){
					alert('超出购买数量');
					window.location.href=window.location.href;
					return;
				}
			}
			$.ajax({
				url:"<?php echo U('changenum');?>",
				data:{'goods_id':goods_id,'num':num},
				type:'post',
				success:function(msg){
					var msg = eval('('+msg+')');
					$('#total').text(msg.price);
					$('#small_'+msg.goods_id).text(msg.goods_total_price);
					$('#amount_'+msg.goods_id).val(msg.goods_buy_number);
				}
			});
		}
	
	</script>
</body>
</html>