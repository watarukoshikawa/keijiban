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
			Id:<input type="text" name="regist_id">
			Name:<input type="text" name="regist_name">
			Pass:<input type="text" name="regist_pass">
			<input type="submit" name="regist_btn" value="登録">
		</form>
	</div>
</div>