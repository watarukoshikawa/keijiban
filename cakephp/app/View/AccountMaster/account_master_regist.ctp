<style type="text/css">
	div#main_area{
		width: 300px;
		margin: 0 auto;
	}
	.text_box{
		width: 300px;
	}
	div#button_area{
		margin-bottom: 10px;
	}
	p{
		margin: 0;
	}
</style>

<div id="main_area">
	<div>
		<p><?php echo $res = isset($msg) && $msg != "" ? $msg : "" ; ?></p>
	</div>
	<div id="button_area">
		<form action="return_account" method="POST">
			<input type="submit" name="return_account" value="戻る">
		</form>
	</div>
	<div id="form_area">
		<form action="run_regist" method="POST">
			<p>Id:</p>
			<input type="text" name="regist_id" class="text_box">
			<p>Name:</p>
			<input type="text" name="regist_name" class="text_box">
			<p>Pass:</p>
			<input type="text" name="regist_pass" class="text_box">
			<input type="submit" name="regist_btn" value="登録" style="margin-top: 10px;">
		</form>
	</div>
</div>