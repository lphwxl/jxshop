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
                <td width="94%" valign="bottom"><span class="STYLE1"> 商品管理 -> 添加商品</span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1"> 
            <a href="<?php echo U('Goods/showlist');?>">返回</a>   &nbsp; </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="100">
    <div id="tabbar-div">
      <p>
        <span class="tab-front" id="general-tab">通用信息</span>
        <span class="tab-back" id="detail-tab">详细描述</span>
        <span class="tab-back" id="mix-tab">其他信息</span>
        <span class="tab-back" id="properties-tab">商品属性</span>
        <span class="tab-back" id="gallery-tab">商品相册</span>
        <span class="tab-back" id="linkgoods-tab">关联商品</span>
        <span class="tab-back" id="groupgoods-tab">配件</span>
        <span class="tab-back" id="article-tab">关联文章</span>
      </p>
    </div>
    </td>
  </tr>
  <tr>
    <td>
    	
		<form action="" method="post" id='info-form' enctype="multipart/form-data">
		<!-- 通用信息 开始 -->
	    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="" >
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">* 商品名称：</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
	        <input type="text" style="width:94%;" name="goods_name" value='<?php echo ($data[0]["goods_name"]); ?>'/><span style="color:red;"><?php if(isset($msg["goods_name"])): echo ($msg['goods_name']); endif; ?></span>
	        </div></td>
	      </tr>
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">* 价格：</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="goods_price" value="<?php echo ($data[0]["goods_price"]); ?>" /><span style="color:red;"><?php if(isset($msg["goods_price"])): echo ($msg['goods_price']); endif; ?><span></span></div></td>
	      </tr>
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">* 数量：</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="goods_number" value="<?php echo ($data[0]["goods_number"]); ?>" /><span style='color:red;'><?php if(isset($msg["goods_number"])): echo ($msg['goods_number']); endif; ?></span></div></td>
	      </tr>
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">重量：</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="goods_weight" value="<?php echo ($data[0]["goods_weight"]); ?>"/></div></td>
	      </tr>
	      <tr id="last_poto">
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">logo图片：</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="file" name="goods_big_logo" id="upload_file"/></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19"><img src="<?php echo ($data[0]["goods_small_logo"]); ?>" width="300"/></span></div></td>
	      </tr>
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
	        <input type="hidden" style="width:94%;" name="goods_id"  id='goods_id' value='<?php echo ($data[0]["goods_id"]); ?>'/><span style="color:red;"></span>
	        <input type="hidden" style="width:94%;" name="type_id" id='tp_id' value='<?php echo ($data[0]["type_id"]); ?>'/><span style="color:red;"></span>
	        </div></td>
	      </tr>
		  </table>
		  <!-- 通用信息 结束 -->
		  <!-- 详情描述 开始 -->
	      <table width="100%"  border="0" cellpadding="0" cellspacing="1" bgcolor="" id="mix-tab-show" style="display:none;">
		      <tr>
		        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">详情描述：</span></div></td>
		        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
		        <script type="text/javascript">
					var ue = UE.getEditor('goods_introduce',{
						toolbars: [[
						            'fullscreen', 'source', '|', 'undo', 'redo', '|',
						            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
						            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
						            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
						            'directionalityltr', 'directionalityrtl', 'indent', '|',
						            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
						            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
						            'simpleupload', 'insertimage', 'emotion', 'scrawl',  'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
						            'horizontal', 'date', 'time' 
						        ]],
					});//实例化ueditor对象，传入textarea的id 
				</script>
		        <textarea rows="5" cols="20" style='width:800px;height:100px;' name="goods_introduce" id="goods_introduce"><?php echo ($data[0]["goods_introduce"]); ?></textarea>
		        </div></td>
		      </tr>
	    </table>
		  <!-- 详情描述 结束 -->    
	   <!-- 其他信息 开始 --> 
		<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="" id="mix-tab-show" style="display:none;">
	     	 <tr>
		        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">其他信息</span></div></td>
		        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
		        </div>
		        </td>
	      	</tr>
       </table>    
       <!-- 其他信息 结束 -->
       
		 <!-- 商品属性 开始 -->
		    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#fff" id="properties-tab-show" style="display:none;">
		    <tr id='nav' style="height:40px;">
			        <td height="20" bgcolor="#FFFFFF" class="STYLE6" style="padding-left:100px;"><div align="right">
			        	<span class="STYLE19"> <em style="color:red;margin-right:12px;font-weight:bold;">*</em> 商品类型</span></div>
			        </td>
			        <td height="20" bgcolor="#fff" class="STYLE19" style="padding-left:20px;">
			       		 <div align="left">
			       		 	<select name="type_id" onchange='detal(this)' id="type_id">
			       		 		<option value="0">--请选择类型--</option>
			       		 		<?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo['type_id']); ?>"><?php echo ($vo['type_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			       		 	</select>
			       		 	<span style="color:darkred;font-size:14px;margin-left:14px;" id="info_tip">     * 请选择商品的类型</span>
			        		<span style="color:red;"><?php if(isset($msg["type_id"])): echo ($msg['type_id']); endif; ?></span>
			        	</div>
			       </td>
		      </tr>
		      <!-- 替换内容 开始 -->
		      <tr>
			      <td>
			      	
			      </td>
		      </tr>
		      <!-- 替换内容  结束  -->
		    </table> 
		<!-- 商品属性 结束 -->
		<!-- 商品相册 开始 --> 
	    <table  id='tab_poto' width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="" id="gallery-tab-show" style="display:none;">
	      <tr >
	      	<td><span style="margin:4px 10px;cursor:pointer" id='add'>[ + ]</span></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品相册</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19" ><input type="file" name="big_pic"/><div align="left">
	        </div></td>
	      </tr>
	    </table>  
	    <!-- 商品相册 结束 -->  
	    <!-- 关联商品 开始 -->
	    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="" id="linkgoods-tab-show" style="display:none;">
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">关联商品</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
	        </div></td>
	      </tr>
	    </table>    
	    <!-- 关联商品 结束 -->
	    <!-- 配件 开始 -->
	    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="" id="groupgoods-tab-show" style="display:none;">
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">配件</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
	        </div></td>
	      </tr>
	    </table>  
	    <!-- 配件 结束 -->  
	    <!-- 关联文章 开始 -->  
	    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="" id="article-tab-show" style="display:none;">
	      <tr>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">关联文章</span></div></td>
	        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
	        </div></td>
	      </tr>
	    </table>
		<!-- 关联文章 结束 -->  
		<!-- 提交 结束 --> 
		<div>
		    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="">
		      <tr>
		        <td colspan='100'  bgcolor="#FFFFFF"  class="STYLE6" style="text-align:center;">
		        <input type="submit" value="提交" style='height:40px;width:200px;border-radius:6px;outline:none;border:none;cursor:pointer;color:gray;font-size:16px;'/>
		        </td>
		      </tr>
		    </table>
	    </div> 
	    <!-- 提交结束  -->  
    	</form>
    </td>
  </tr>
</table>
<script type="text/javascript">
	var con = new Array();
	$(function(){
		var oFile = $('#upload_file');
		var oAdd = $('#add');
		var oSele =$('#type_id');
		var i = 0;
		var oTr = $('#tab_poto');
		var oSpan = $('#tabbar-div').find('span');
		var oTab = $('#info-form').children('table');
		
		oTab.css('display','none');
		oTab.eq(0).css('display','block');
		oSpan.click(function(){
			$(this).addClass('tab-front').removeClass('tab-back').siblings().addClass('tab-back').removeClass('tab-front');
			var mark = $(this).index();
			oTab.eq(mark).css('display','block').siblings('table').css('display','none');
		});
		oAdd.click(function(){
			$str = '<tr class="nav" style="margin-bottom:20px;"><td class="dete_tr"><span style="margin:4px 10px;cursor:pointer" class="delete">[ - ]</span></td><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品相册</span></div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE19" ><input type="file" name="big_'+(++i)+'"/><div align="left"></div></td></tr>';
			oTr.append($str);
			var oNav =  $('.nav').on('click','td.dete_tr','span.delete',function(){
				$(this).parent().remove();
			});
		});
		oFile.change(function(){
			window.url = window.URL || webkitURL;
			var img = new Image();
			img.src = window.url.createobjectURL(this.files[0]);
			$('#last_poto').append(img);
			
		});
		//ajax异步删除图片
		var chr = $('#tp_id').val();
		oSele.val(chr).trigger('change');
		
		$('#dele_img span.delete_img').click(function(){
			var obj = $(this);
			$('#zhegai,#clear_no').css('display','block');
			//删除确认
			$('#confirm button.yanzheng').click(function(){
				
				if($(this).index() === 0){
					$('#zhegai,#clear_no').css('display','none');
					var id = obj.attr('data-id');
					$.ajax({
						url:'/admin/goods/dele',
						data:{'id':id},
						type:'post',
						success:function(msg){
							var msg = eval('('+msg+')');
							msg.error?obj.parent().remove():alert('删除失败');
						},
					});
				}else if($(this).index() === 1){
					$('#zhegai,#clear_no').css('display','none');
				}
			});
		});
		
		$('#zhegai').click(function(){
			$('#zhegai,#clear_no').css('display','none');
		});
	});

	
	
	function detal(param){
		var $oNav = $('tr#nav');
		var id = $(param).val();
		var goods = $('#goods_id').val();
		if(!con[id] && (id !='0'))
		{
			$.ajax({
				url:'/index.php/Admin/Goods/getattr2/',
				type:'get',
				data:{'type_id':id,'goods_id':goods},
				async:false,
				success:function(msg){
					var msg = eval('('+msg+')');
					var len = msg.length;
					var str = '';
					if(len == 0)
					{
						str = '<tr><td style="color:green;font-weight:bold;">暂无数据</td></tr>';
					}else{
						for(var i=0;i<len;i++){
							if(msg[i].attr_sel == 'only'){
								str += '<tr style="height:40px;"> <td height="20" bgcolor="#FFFFFF" class="STYLE6" style="padding-left:100px;"><div align="right">';
								str += msg[i].attr_name+'</span></div> </td>';
								str += '<td height="20" bgcolor="#fff" class="STYLE19" style="padding-left:20px;"> <div align="left"><span style="color:green;font-size:14px;">'; 
								if(msg[i].attr_values == null){
									str += '<input type="text" name="attr_info['+msg[i].attr_id+']"/>';
								}else{
									str += '<input type="text" name="attr_info['+msg[i].attr_id+']" value="'+msg[i].attr_values+'"/>';
								}
							}else  if(msg[i].attr_sel=='many'){
								if(msg[i].attr_values == null){
									str += '<tr style="height:40px;"> <td height="20" bgcolor="#FFFFFF" class="STYLE6" style="padding-left:100px;"><div align="right">';
									str += '<span class="STYLE19" id="addchange" style="cursor:pointer;margin-right:12px;" onclick="addchange(this)">[+]</span>'+msg[i].attr_name+'</div> </td>';
									str += '<td height="20" bgcolor="#fff" class="STYLE19" style="padding-left:20px;"> <div align="left"><span style="color:green;font-size:14px;">';
									var arr = msg[i].attr_vals.split(',');
									var t = arr.length;
									str += '<select name="attr_info['+msg[i].attr_id+'][]"><option value="0">--请选择属性值--';
									for(var x=0 ;x<t;x++){
										str +=  '<option name="'+arr[x]+'">'+arr[x]+'</option>';
									}
									str += '</option></select>';
									str += '</span></div> </td> </tr>';
								}else{
									var arrval = msg[i].attr_values.split(',');
									var num  =  arrval.length;
									for(var kk=0; kk<num;kk++){
										if(kk == 0){
											str += '<tr style="height:40px;"> <td height="20" bgcolor="#FFFFFF" class="STYLE6" style="padding-left:100px;"><div align="right">';
											str += '<span class="STYLE19" id="addchange" style="cursor:pointer;margin-right:12px;" onclick="addchange(this)">[+]</span>'+msg[i].attr_name+'</div> </td>';
											str += '<td height="20" bgcolor="#fff" class="STYLE19" style="padding-left:20px;"> <div align="left"><span style="color:green;font-size:14px;">';
											var arr = msg[i].attr_vals.split(',');
											var t = arr.length;
											str += '<select name="attr_info['+msg[i].attr_id+'][]"><option value="0">--请选择属性值--';
											for(var x=0 ;x<t;x++){
												if(arrval[kk] == arr[x]){
													str +=  '<option selected="selected" name="'+arr[x]+'">'+arr[x]+'</option>';
												}else{
													
													str +=  '<option name="'+arr[x]+'">'+arr[x]+'</option>';
												}
											}
											str += '</option></select>';
											str += '</span></div> </td> </tr>';
										}else{
											str += '<tr style="height:40px;"> <td height="20" bgcolor="#FFFFFF" class="STYLE6" style="padding-left:100px;"><div align="right">';
											str += '<span class="STYLE19 delchange" style="cursor:pointer;margin-right:12px;" onclick="delchange(this)">[ - ]</span>'+msg[i].attr_name+'</div> </td>';
											alert(str);
											str += '<td height="20" bgcolor="#fff" class="STYLE19" style="padding-left:20px;"> <div align="left"><span style="color:green;font-size:14px;">';
											str += '<select name="attr_info['+msg[i].attr_id+'][]"><option value="0">--请选择属性值--';
											for(var xx=0 ;xx<t;xx++)
											{
												if(arrval[kk] == arr[xx])
												{
													str +=  '<option selected="selected" name="'+arr[xx]+'">'+arr[xx]+'</option>';
												}else{
													str +=  '<option name="'+arr[xx]+'">'+arr[xx]+'</option>';
												}
											}
											str += '</option></select>';
											str += '</span></div> </td> </tr>';
										}
									}
								}
							}
							str += '</span></div> </td> </tr>';
						}
					}
					$oNav.siblings().remove('tr');
					$oNav.after(str);
					con[id] = str;
				},
			});
		}else{
			$oNav.siblings().remove('tr');
			$oNav.after(con[id]);
		}
		if(id == 0){
			$('#info_tip').css('color','red').text('* 请选择商品的类型');
		}else{
			$('#info_tip').css('color','green').text(' √ 已选择');
		}
	}
	
	 function addchange(param){
		var $oTr = $(param).parent().parent().parent();
		var $oTrcopy = $oTr.clone();
		var str = '<span class="STYLE19 delchange" style="cursor:pointer;margin-right:12px;" onclick="delchange(this)">[ - ]</span>';
		$oTrcopy.find('span#addchange').replaceWith(str);
		$oTr.parent().append($oTrcopy);
	} 
	 function delchange(param){
		 $(param).parent().parent().parent().remove();
	 }
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