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
                <td width="94%" valign="bottom"><span class="STYLE1"> 属性管理 -> 属性列表</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              <a href="<?php echo U('attribute/tianjia');?>"><img src="<?php echo C('AD_IMG');?>/add.gif" width="10" height="10" /> 添加属性</a>   &nbsp; 
              </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    	<table  id="nav" class="">
    		<tr>
    			<td>
    				<select name="type_id">
    					<option value="0">--请选择类型--</option>
    					<?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['type_id']); ?>" <?php if(($mark) == $vo['type_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['type_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    				</select>
    			</td>
    		</tr>
    	</table>
	    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
	      <tr id="banner">
	        <td width="4%" height="20" bgcolor="d3eaef" class="STYLE10"><div align="center">
	          <input type="checkbox" name="checkbox" id="checkbox" />
	        </div></td>
	        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">属性ID</span></div></td>
	        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">名称</span></div></td>
	        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">商品类型</span></div></td>
	        <td width="12%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">是否可选</span></div></td>
	        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">录入方式</span></div></td>
	        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">可选值列表</span></div></td>
	        <td width="20%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
	      </tr>
	      
	      
	      <!-- 替换部分 开始  -->
	      
	      
	      <?php if(empty($result)): ?><tr>
            <td width="94%" valign="bottom" colspan="8" style="text-align:center;"><span style="color:green;font-size:16px;" class="STYLE1"> 暂无数据</span></td>
          </tr><?php endif; ?>
	      <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr>
	        <td height="20" bgcolor="#FFFFFF"><div align="center">
	          <input type="checkbox" name="checkbox2[]" id="checkbox2" />
	        </div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($info['attr_id']); ?></span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($info['attr_name']); ?></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($info['type_name']); ?></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">
		        <?php if(($info['attr_sel']) == "only"): ?>唯一属性<?php endif; ?>
		        <?php if(($info['attr_sel']) == "many"): ?>单选属性<?php endif; ?>
	        </div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19">
	        	<div align="center">
	        	<?php if(($info['attr_write']) == "manual"): ?>手工<?php endif; ?>
		        <?php if(($info['attr_write']) == "list"): ?>列表选择<?php endif; ?>
	        	</div>
	        </td>
	        <td height="20"  width='40' style="width:40px;height:20px;" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><span  width="40"><?php if(empty($info['attr_vals'])): ?>无<?php endif; echo ($info['attr_vals']); ?></span></div></td>
            <td height="20" style="width:60px;" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
	          <img src="<?php echo C('AD_IMG');?>/del.gif" width="10" height="10" /> <button style='color:gray;'  data-id="<?php echo ($info['attr_id']); ?>" class="delete">删除 </button>| <a href="<?php echo U('showlist','id='.$info['attr_id']);?>" style="color:gray;">查看</a> | <img src="<?php echo C('AD_IMG');?>/edit.gif" width="10" height="10" /> <button type="button" class='btn' onclick='javascript:window.location.href="/admin/attribute/update/id/<?php echo ($info['attr_id']); ?>"' style="cursor:pointer;outline:none;border:none;">编辑</button></div></td>
	      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	      
	      <!-- 替换部分 结束    -->
	      
	      
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
<script type="text/javascript">
	$(function(){
	var $oTd = $('#nav').find('select');
	var $Ban = $('#banner');
	var con = new Array();
	$oTd.change(function(){
		var id  = $(this).val();
		alert(id);
		if(!con[id]){
			$.ajax({
				url:'/admin/attribute/getdata/type_id/'+id,
				type:'get',
				async:false,
				success:function(msg)
				{
					var msg = eval('('+msg+')');
						var str = '';
						var len  = msg.length;
						if(len == 0){
							$Ban.siblings().remove();
							$Ban.after('<tr> <td width="94%" valign="bottom" colspan="8" style="text-align:center;"><span style="color:green;font-size:16px;" class="STYLE1"> 暂无数据</span></td> </tr>');
						}else
						
						{
							for(var i=0;i<len;i++)
							{
								str += '<tr> <td height="20" bgcolor="#FFFFFF"><div align="center"> <input type="checkbox" name="checkbox2[]" id="checkbox2" /> </div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">'+msg[i].attr_id+'</span></div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+msg[i].attr_name+'</div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">';
								str += msg[i].type_name;
								str += '</div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">';
								if(msg[i].attr_sel == 'only'){
									str += '唯一属性';
								}else{
									str += '单选属性';
								}
								str +=  '</div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">';
								if(msg[i].attr_write == 'manual'){
									str += '手工录入';
								}else if(msg[i].attr_write == 'list'){
									str += '列表选择';
								}
								str += '</div> </td> <td height="20" width="40" style="width:40px;height:20px;" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><span width="40">';
								if(msg[i].attr_vals == ''){
									str += '无';
								}else{
									str += msg[i].attr_vals;
								}
								str += '</span></div></td> <td height="20" style="width:60px;" bgcolor="#FFFFFF"><div align="center" class="STYLE21"> <img src="'+"<?php echo C('AD_IMG');?>/del.gif"+'"'+'width="10" height="10"/><button style="color:gray;"'+'data-id="';
								str += msg[i].attr_id;
								str += '"'+'class="delete"> 删除 </button>| 查看 | <img src="'+"<?php echo C('AD_IMG');?>/edit.gif"+'"'+'width="10" height="10" /> <button type="button" class="btn"'+ 'onclick="update(this)"'+'attr-id="'+msg[i].attr_id+'"';
								str += 'style="cursor:pointer;outline:none;border:none;">编辑</button></div></td> </tr>';
							}
							con[id] = str;
							$Ban.siblings().remove();
							$Ban.after(str);
							dele();
						}
				   },
			 });
		}else{
			$Ban.siblings().remove();
			$Ban.after(con[id]);
			console.log(con[id]);
		}
	});
	dele();
	});
	
	//点击修改属性值
	function update(param){
		var id = $(param).attr('attr-id');
		window.location.href = '/admin/attribute/update/id/'+id;
	}
	function dele(){
		$('button.delete').unbind('click').click(function(event){
			window.obj = $(this);
			$('#zhegai,#clear_no').stop().show(500);
		});
		
		$('#confirm button.yanzheng').unbind('click').click(function(){
			var id = window.obj.attr('data-id');
			if($(this).index() === 0){
				$('#zhegai,#clear_no').stop().hide(500);
				$.ajax({
					url:'/admin/attribute/delete',
					data:{'id':id},
					type:'post',  
					success:function(msg){
						var msg = eval('('+msg+')');
						if(msg.error){
							window.obj.parent().parent().parent().remove();
						}else{
							alert('删除失败');
						}
					},
				});
			}else if($(this).index() === 1){
				$('#zhegai,#clear_no').stop().hide(500);
			}
		}); 
	}

</script>
</html>