function form_submit(){
	$.ajax({
		url:'/admin/manager/login',
		type:'post',
		data:$('form').serialize(),
		success:function(msg){
			$('#safecode').get(0).src = '/admin/manager/code?id='+Math.random();
			var msg = eval('('+msg+')');
			if(msg.error == 0){
				$('#pwd_error').html(msg.info);
			}else if(msg.error == 1){
				$('#code_error').html(msg.chknumber);
			}else if(msg.error == 2){
				$('#user_error').html(msg.user);
				$('#pwd_error').html(msg.pwd);
			}else{
				alert(msg.info);
				window.location.href="/admin/index/index";
			}
		}
	});
	
}
function form_reset(){
	document.getElementById("login").reset();
}
function reloadcode(){ 
    var verify=document.getElementById('safecode');
    verify.setAttribute('src','code.php?'+Math.random());
}