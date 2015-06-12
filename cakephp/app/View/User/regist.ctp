<style>
	h1#msg_area{
		font-size: 50px;
		background-color: red;
	}
	#main_area{
		width: 500px;
		margin: auto;
	}
	.input_text{
		width:250px;
	}
	#form_area{
		width:280px;
		margin-left: ;
	}

</style>
<?php
	if(isset($msg) && $msg != ""){
		print("<h1 id='msg_area'>".$msg."</h1>");
	}
?>
<div id="main_area">
	<div id="form_area">
		<div style="display:inline-flex">
			<form action="index" method="POST">
				<input type="submit" name="insert_view" value="戻る">
			</form>
			<form action="run_logout" method="POST">
				<input type="submit" name="logout" style="margin-left:50px;" value="ログアウト">
			</form>
		</div>
		<form action="<?php echo $action ?>" method="POST" onsubmit="return regist_check()">
		<?php

			if(isset($update_data)){
				print('<div class="input_text">name:<input type="text" name="regist_name" id="regist_name" value="'.$update_data['User']['name'].'"></div>');
				print('<div class="input_text">value:<input type="text" name="regist_value" id="regist_value" value="'.$update_data['User']['value'].'"></div>');
				print('<div class="input_text">pass:<input type="text" name="regist_pass" id="regist_pass" value="'.$update_data['User']['pass'].'"></div>');
				print('<input type="hidden" name="regist_id" value="'.$update_data['User']['id'].'">');

			}else{
				print('<div class="input_text">name:<input type="text" name="regist_name" id="regist_name"></div>');
				print('<div class="input_text">value:<input type="text" name="regist_value" id="regist_value"></div>');
				print('<div class="input_text">pass:<input type="text" name="regist_pass" id="regist_pass"></div>');
			}
		?>
			<input type="submit" name="regist_btn" value="<?php echo $btn_value ?>">
		</form>
	</div>
</div>
<script type="text/javascript">
	function regist_check(){
		var res = {
			name:document.getElementById('regist_name').value,
			value:document.getElementById('regist_value').value,
			pass:document.getElementById('regist_pass').value,
		}

		if(res.name && res.value && res.pass){
			if(res.value == parseInt(res.value)){
				console.log("test"+res.name);
				return window.confirm("name:"+res.name+"\nvalue:"+res.value+"\npass:"+res.pass+"\nよろしいですか？");
			}else{
				alert("valueは数字にしてください");
				return false;
			}
		}else{
			alert("空白があります");
			return false;
		}
	}
</script>