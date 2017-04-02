<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Skiyo 后台管理工作平台 by Jessica</title>
<link rel="stylesheet" type="text/css" href="<?php echo C('AD_CSS');?>/style.css"/>
<script type="text/javascript" src="<?php echo C('AD_JS');?>/js.js"></script>
<script type="text/javascript" src="<?php echo C('AD_JS');?>/jquery-3.0.0.min.js"></script>
</head>
<body>
<div id="top">  </div>
<form id="login" name="login" action="" method="post">
  <div id="center">
    <div id="center_left"></div>
    <div id="center_middle">
      <div class="user">
        <label>用户名：
        <input type="text" name="user" id="user" />
        </label>
        <span style="color:red;" id="user_error"></span>
      </div>
      <div class="user">
        <label>密　码：
        <input type="password" name="pwd" id="pwd" />
        </label>
        <span style="color:red;" id="pwd_error"></span>
      </div>
      <div class="chknumber">
        <label>验证码：
        <input name="chknumber" type="text" id="chknumber" maxlength="4" class="chknumber_input" />
        </label>
        <img src="<?php echo U('code');?>" id="safecode" width="60"  style="vertical-align:middle;" onclick="this.src='<?php echo U('code');?>?id='+Math.random();"/>
      	<span style="color:red;" id="code_error"></span>
      </div>
    </div>
    <div id="center_middle_right"></div>
    <div id="center_submit">
      <div class="button"> <img src="<?php echo C('AD_IMG');?>/dl.gif" width="57" height="20" onclick="form_submit()" > </div>
      <div class="button"> <img src="<?php echo C('AD_IMG');?>/cz.gif" width="57" height="20" onclick="form_reset()"> </div>
    </div>
    <div id="center_right"></div>
  </div>
</form>
<div id="footer"></div>
</body>
</html>