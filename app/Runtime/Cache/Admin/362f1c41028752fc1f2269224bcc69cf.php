<?php if (!defined('THINK_PATH')) exit();?>﻿<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="<?php echo C('AD_JS');?>/jquery.js"></script>
<script type="text/javascript" src="<?php echo C('AD_JS');?>/chili-1.7.pack.js"></script>
<script type="text/javascript" src="<?php echo C('AD_JS');?>/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo C('AD_JS');?>/jquery.dimensions.js"></script>
<script type="text/javascript" src="<?php echo C('AD_JS');?>/jquery.accordion.js"></script>
<script language="javascript">
	jQuery().ready(function(){ 
		jQuery('#navigation').accordion({
			header: '.head',
			navigation1: true, 
			event: 'click',
			fillSpace: true,
			animated: 'bounceslide'
		});
	});
</script>
<style type="text/css">
<!--
body {
	margin:0px;
	padding:0px;
	font-size: 12px;
}
#navigation {
	margin:0px;
	padding:0px;
	width:147px;
}
#navigation a.head {
	cursor:pointer;
	background:url('<?php echo C('AD_IMG');?>/main_34.gif') no-repeat scroll;
	display:block;
	font-weight:bold;
	margin:0px;
	padding:5px 0 5px;
	text-align:center;
	font-size:12px;
	text-decoration:none;
}
#navigation ul {
	border-width:0px;
	margin:0px;
	padding:0px;
	text-indent:0px;
}
#navigation li {
	list-style:none; display:inline;
}
#navigation li li a {
	display:block;
	font-size:12px;
	text-decoration: none;
	text-align:center;
	padding:3px;
}
#navigation li li a:hover {
	background:url('<?php echo C('AD_IMG');?>/tab_bg.gif') repeat-x;
		border:solid 1px #adb9c2;
}
a:link{
    color:#036;
}
-->
</style>
</head>
<body>
<div  style="height:100%;">
  <ul id="navigation">
  <?php if(is_array($arrP)): $i = 0; $__LIST__ = $arrP;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fu): $mod = ($i % 2 );++$i;?><li> <a class="head"><?php echo ($fu['auth_name']); ?></a></li>
	      <ul>
	       <?php if(is_array($arrC)): foreach($arrC as $key=>$vo): if(($vo["auth_pid"]) == $fu["auth_id"]): ?><li style="padding-left:60px;display:block;"><a style="text-decoration:none;" href="/index.php/Admin/<?php echo ($vo["auth_c"]); ?>/<?php echo ($vo["auth_a"]); ?>" target="rightFrame"><?php echo ($vo["auth_name"]); ?></a></li><?php endif; endforeach; endif; ?>
	     </ul>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
  
</div>
</body>
</html>