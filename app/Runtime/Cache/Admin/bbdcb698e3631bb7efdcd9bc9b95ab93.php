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
.STYLE6 {color: gray; font-size: 16px; }
.STYLE10 {color: #422d2d; font-size: 16px; }
.STYLE19 {
	font-size: 16px;
	color:gray;
	font-family:'微软雅黑';
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
   .yanzheng{
		outline:none;
    	border:none;
    	border-radius:4px;
    	box-shadow:0 0 3px gray;
    	width:80px;
    	height:30px;
    	margin-right:40px;
    	cursor:pointer;
    	margin-top:12px;
   		font-size:14px;
   		color:gray;
    }
-->
</style>
<script src="<?php echo C('AD_JS');?>/jquery-3.0.0.min.js"></script>
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
                <td width="94%" valign="bottom"><span class="STYLE1"> 角色管理 -> 角色列表</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              <a href="<?php echo U('tianjia');?>"><img src="<?php echo C('AD_IMG');?>/add.gif" width="10" height="10" /> 添加</a>   &nbsp; 
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
	        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">角色ID</span></div></td>
	        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">角色名称</span></div></td>
	        <td width="12%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">权限列表</span></div></td>
	        <td width="20%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
	      </tr>
	      
	      <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr>
	        <td height="40" bgcolor="#FFFFFF"><div align="center">
	          <input type="checkbox" name="checkbox2[]" class="checkbox2" />
	        </div></td>
	        <td height="40" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($info['role_id']); ?></span></div></td>
	        <td height="40" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($info['role_name']); ?></div></td>
	        <td height="40" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($info['role_auth_ac']); ?></div></td>
	        <td height="20" style="width:60px;" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
	        <img src="<?php echo C('AD_IMG');?>/del.gif" width="10" height="10" /> <button style='color:gray;'  data-id="<?php echo ($info['role_id']); ?>" class="delete">删除 </button>| <a href="<?php echo U('show','id='.$info['role_id']);?>" style="color:gray;">查看</a> | <img src="<?php echo C('AD_IMG');?>/edit.gif" width="10" height="10" /> <button type="button" class='btn' onclick='javascript:window.location.href="/admin/role/update/id/<?php echo ($info['role_id']); ?>"' style="cursor:pointer;outline:none;border:none;">编辑</button></div></td>
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
<script type="text/javascript">
	$(function(){
		//ajax异步删除
		$('button.delete').click(function(){
			var obj = $(this);
			$('#zhegai,#clear_no').stop().show(500);
			//删除确认
			$('#confirm button.yanzheng').click(function(){
				if($(this).index() === 0){
					$('#zhegai,#clear_no').stop().hide(500);
					var id = obj.attr('data-id');
					$.ajax({
						url:'/admin/role/delete',
						data:{'id':id},
						type:'post',
						success:function(msg){
							var msg = eval('('+msg+')');
							msg.error?obj.parent().parent().parent().remove():alert('删除失败');
						},
					});
				}else if($(this).index() === 1){
					$('#zhegai,#clear_no').stop().hide(500);
				}
			});
		});
		
		$('#zhegai').click(function(){
			$('#zhegai,#clear_no').stop().hide(500);
		});
		
		//全选和全部选的功能
		$('#checkbox').change(function(){
				
		
		});
	});

</script>
<!-- 遮罩层 -->
<div id="zhegai" style="display:none;width:100%;height:100%;position:absolute;z-index:6;top:0;left:0;background:gray;opacity:.4;">
	
</div>
<!-- 删除确认  -->
<div id='clear_no' style="display:none;position:absolute;z-index:12;background:#fff;box-shadow:0 0 6px;width:400px;height:200px;padding-top:60px;top:0;bottom:0;left:0;right:0;margin:auto;border-radius:8px;">
	<p style="padding-bottom:12px;box-shadow:0px -3px 0px 0px grey inset;text-align:center;height:30px;line-height:30px;margin:0 auto;color:green;font-weight:bold;letter-spacing:4px;">确认删除吗？</p>
	<p style="padding-left:94px;" id="confirm">
		<button type="button" id="confire" class="yanzheng">确认</button>
		<button type="button"id="clear_delete" class="yanzheng">取消</button>
	</p>
</div>

</body>
</html>