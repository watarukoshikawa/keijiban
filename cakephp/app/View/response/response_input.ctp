<style type="text/css">
	div#main_area{
		width:500px;
		margin: 0 auto;
	}
	div#return_response{
		
	}
	div#regist_response{

	}
</style>
<div id="main_area">
	<div id="return_response">
		<form action="return_response" method="POST">
			<input type="hidden" name="thread_id" value="<?php echo $check_input['thread_id'] ?>"> 
			<input type="submit" name="return_response" value="戻る">
		</form>
	</div>
	<div id="regist_response">
		<form action="run_input" method="POST">
			<input type="hidden" name="account_id" value="<?php echo $check_input['account_id'] ?>">
			<input type="hidden" name="thread_id" value="<?php echo $check_input['thread_id'] ?>"> 
			<p>レス：<textarea type="text" cols="20" rows="5" name="input_response"></textarea></p>
			<input type="submit" name="input_res_btn" value="投稿">
		</form>
	</div>
</div>