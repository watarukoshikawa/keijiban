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
	<form action="run_login" method="POST" class="text_area">
		<div class="text_box">ID:<input type="text" name="login_id"></div>
		<div class="text_box">PASS:<input type="password" name="login_pass"></div>
		<input type="submit" id="submit_btn" name="login_btn" value="ログイン">
	</form>
</div>
