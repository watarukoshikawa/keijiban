<form action="return_response" method="POST">
	<input type="hidden" name="thread_id" value="<?php echo $check_input['thread_id'] ?>">
	<input type="submit" name="return_response" value="戻る">
</form>
<form action="run_input" method="POST">
	<p>レス：<input type="text" name="input_response"></p>
	<input type="hidden" name="account_id" value="<?php echo $check_input['account_id'] ?>">
	<input type="hidden" name="thread_id" value="<?php echo $check_input['thread_id'] ?>">
	<input type="submit" name="input_res_btn" value="投稿">
</form>