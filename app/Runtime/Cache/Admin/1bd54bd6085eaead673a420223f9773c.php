<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
body { 
	margin-left: 3px;
	margin-top: 0px;
	margin-right: 3px;
	margin-bottom: 0px;
}
.STYLE1 {
	color: #e1e2e3;
	font-size: 12px;
}
.STYLE6 {color: #000000; font-size: 12; }
.STYLE10 {color: #000000; font-size: 12px; }
.STYLE19 {
	color: #344b50;
	font-size: 12px;
}
.STYLE21 {
	font-size: 12px;
	color: #3b6375;
}
.STYLE22 {
	font-size: 12px;
	color: #295568;
}
a:link{
    color:#e1e2e3; text-decoration:none;
}
a:visited{
    color:#e1e2e3; text-decoration:none;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="6%" height="19" valign="bottom"><div align="center"><img src="<?php echo C('AD_IMG');?>/tb.gif" width="14" height="14" /></div></td>
                <td width="94%" valign="bottom"><span class="STYLE1"> 订单管理 -> 订单列表</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
             
              </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
	    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
	      <tr>
	        <td width="4%" height="20" bgcolor="d3eaef" class="STYLE10"><div align="center">
	          <input type="checkbox" name="checkbox" id="checkbox" />
	        </div></td>
	        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">订单id</span></div></td>
	        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">订单编号</span></div></td>
	        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">总金额</span></div></td>
	        <td width="12%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">是否付款</span></div></td>
	        <td width="16%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">是否发货</span></div></td>
	        <td width="16%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">下单时间</span></div></td>
	        <td width="20%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
	      </tr>
	      <?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr>
	        <td height="20" bgcolor="#FFFFFF"><div align="center">
	          <input type="checkbox" name="checkbox2[]" id="checkbox2" />
	        </div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($info['order_id']); ?></span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($info['order_number']); ?></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($info['order_price']); ?></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($info['order_status']); ?></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($info['is_send']); ?></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($info['add_time']); ?></div></td>
<!-- 	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><img src="<?php echo ($info['goods_small_logo']); ?>" width="20"/></div></td>
 -->	        <td height="20" style="width:60px;" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
	        <img src="<?php echo C('AD_IMG');?>/del.gif" width="10" height="10" /> 删除 | <a style="color:gray;font-size:16px;" href="<?php echo U('detail','order_id='.$info['order_id']);?>">查看</a> | <img src="<?php echo C('AD_IMG');?>/edit.gif" width="10" height="10" /> <button type="button" class='btn' onclick='javascript:window.location.href="/admin/goods/update/id/<?php echo ($info['goods_id']); ?>"' style="cursor:pointer;outline:none;border:none;">编辑</button></div></td>
	      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    </table>
	  </td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="33%"><div align="left"><span class="STYLE22">&nbsp;&nbsp;&nbsp;&nbsp;共有<strong> <?php echo ($count); ?></strong> 条记录，当前第<strong> 1</strong> 页，共 <strong>10</strong> 页</span></div></td>
        <td width="67%"><table width="312" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG');?>/main_54.gif" width="40" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG');?>/main_56.gif" width="45" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG');?>/main_58.gif" width="45" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG');?>/main_60.gif" width="40" height="15" /></div></td>
            <td width="37" class="STYLE22"><div align="center">转到</div></td>
            <td width="22"><div align="center">
              <input type="text" name="textfield" id="textfield"  style="width:20px; height:12px; font-size:12px; border:solid 1px #7aaebd;"/>
            </div></td>
            <td width="22" class="STYLE22"><div align="center">页</div></td>
            <td width="35"><img src="<?php echo C('AD_IMG');?>/main_62.gif" width="26" height="15" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>