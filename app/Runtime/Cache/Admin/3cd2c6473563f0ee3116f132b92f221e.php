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
.STYLE6 {color: gray; font-size: 16px;}
.STYLE10 {color: gray; font-size: 16px; }
.STYLE19 {
	color: gray; font-size: 16px;
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
 <style type="text/css">
    #tabbar-div {
        background: #80bdcb none repeat scroll 0 0;
        height: 22px;
        padding-left: 10px;
        padding-top: 1px;
        margin-bottom: 3px;
    }
    #tabbar-div p { margin: 2px 0 0;font-size:12px;
    }
    table.tab-front {
        background: #bbdde5 none repeat scroll 0 0;
        border-right: 2px solid #278296;
        cursor: pointer;
        font-weight: bold;
        line-height: 20px;
    	color:#000;
        padding: 4px 15px 4px 18px;
    }
    .tab-back {
        border-right: 1px solid #fff;
        color: #fff; cursor: pointer;line-height: 20px;
        padding: 4px 15px 4px 18px;
    }
  </style>
<script src="<?php echo C('UE');?>/ueditor/ueditor.config.js"></script>
<script src="<?php echo C('UE');?>/ueditor/ueditor.all.min.js"></script>
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
                <td width="94%" valign="bottom"><span class="STYLE1"> 属性管理 -> 添加属性</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1"> 
            <a href="<?php echo U('attribute/showlist');?>">返回</a>   &nbsp; </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    	
		<form action="" method="post" id='info-form' enctype="multipart/form-data">
		<!-- 属性 开始 -->
	    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" >
	      <tr>
	        <td  height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19 STYLE6">* 属性名称：</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
	        <input type="text" style="width:40%;" value='<?php echo ($result["attr_name"]); ?>' name="attr_name" /><span style="color:red;"><?php if(isset($msg["attr_name"])): echo ($msg['attr_name']); endif; ?></span>
	        </div></td>
	      </tr>
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">* 所属商品类型：</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19">
	        	<div align="left">
					<select name="type_id">
						<option value="0" class="STYLE6">--请选择商品类型--</option>
						<?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['type_id']); ?>" <?php if(($result['type_id']) == $vo['type_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['type_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
					<span style="color:red;">
					<?php if(isset($msg["type_id"])): echo ($msg['type_id']); endif; ?>
					</span>
				</div>
			</td>
	      </tr>
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19"> 属性是否可选：</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19">
	        	<div align="left" id='unique'>
	         		<input type='radio' id="only" name="attr_sel" value="only" <?php if(($result['attr_sel']) == "only"): ?>checked="checked"<?php endif; ?>class="STYLE6"/>唯一属性
			        <input type="radio"  name="attr_sel" value="many"  <?php if(($result['attr_sel']) == "many"): ?>checked="checked"<?php endif; ?> class="STYLE6"/>单选属性
				  	<input type="hidden"  name="attr_id" value="<?php echo ($result['attr_id']); ?>"/>
				    <span style='color:red;'><?php if(isset($msg["attr_sel"])): echo ($msg['attr_sel']); endif; ?></span>
			    </div>
			 </td>
	      </tr>
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">属性值录入方式：</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19">
	        	<div align="left" id="work_select">
			        <input name="attr_write" id="manual" value="manual" type="radio" <?php if(($result['attr_write']) == "manual"): ?>checked="checked"<?php endif; ?>class="STYLE6"/>手工录入
			     <input type="radio"  id='list' name="attr_write" value="list" <?php if(($result['attr_write']) == "list"): ?>checked="checked<?php endif; ?> class="STYLE6"/>从下边列表中选取
	      	  </div>
	        </td>
	      </tr>
	       <tr>
	       <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19 STYLE6">可选值列表：</span></div></td>
	        <td height="20" colspan="2" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
	        	<textarea id="attr_vals" name="attr_vals" style="width:400px;height:90px;"><?php if(!empty($result['attr_vals'])): echo ($result['attr_vals']); endif; ?></textarea><span style="color:gray;font-size:16px;margin-left:18px;">多个值 之间用&nbsp;<em style="color:red;font-weight:bold;"> , 逗号</em>分割</span>
	        	</div></td>
	      </tr>
	      <tr id="last_poto">
	        <td height="20" colspan="2" bgcolor="#FFFFFF" class="STYLE19"><div align="left" style="padding-left:300px;"><input style="outline:none;border:none;border-radius:6px;width:100px;height:40px;coursor:pointer;box-shadow:0 0 4px gray;" type="submit" value="提交"/></div></td>
	      </tr>
		  </table>
		  <!-- 属性 结束 -->
    	</form>
    </td>
  </tr>
</table>
<script type="text/javascript">
$(function(){
	
	var oDiv1 = $('#unique');
	var oDiv2 = $('#work_select');
	//单选框
	
	oDiv1.find('input').click(function(){
		var i = $(this).index();
		oDiv2.find('input').eq(i).prop('checked',$(this).prop('checked'));
	    !i?$('#attr_vals').prop('disabled',true):$('#attr_vals').prop('disabled',false);
		
		
	});
	oDiv2.find('input').click(function(){
		var i = $(this).index();
		oDiv1.find('input').eq(i).prop('checked',$(this).prop('checked'));
		 !i?$('#attr_vals').prop('disabled',true):$('#attr_vals').prop('disabled',false);
	});
	if($('#only').prop('checked') && $('#manual').prop('checked')){
		$('#attr_vals').prop('disabled',true);
	}else{
		$('#attr_vals').prop('disabled',false);
	}
	
	
});

</script>
</body>
</html>