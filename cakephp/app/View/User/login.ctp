<style>
	h1#msg_area{
		margin: 10px 25px;
		font-size: 15px;
		font-weight: 700;
	}
	.text_area{
		width: 300px;
	}
	#main_area{
		width: 500px;
		margin: auto;
	}
	.text_box{
		width: 250px;
		margin: auto;
	}
	#submit_btn{
		margin: 0 25px;
	}

</style>
<div id="main_area">
	<?php
		if(isset($msg) && $msg != ""){
			print("<h1 id='msg_area'>".$msg."</h1>");
		}
	?>
	<form action="run_login" method="POST" class="text_area">
		<div class="text_box">ID:<input type="text" name="input_id"></div>
		<div class="text_box">PASS:<input type="pass" name="input_pass"></div>
		<input type="submit" id="submit_btn" name="input_login" value="ログイン">
	</form>
</div>