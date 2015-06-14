

<div id="title_area">
	<p>スレタイ：<?php echo $table_data[0]['thread_tbs']['title'] ?></p>
	<p>本文：<?php echo $table_data[0]['thread_tbs']['thread_text'] ?></p>
</div>
<!-- 区切り線をいれる -->
<div id="response_area">
	<form action="show_input" method="POST">
		<input type="hidden" name="account_id" value="<?php echo $check_input['account_id'] ?>">
		<input type="hidden" name="thread_id" value="<?php echo $check_input['thread_id'] ?>">
		<input type="submit" name="input_res" value="レス投稿">
	</form>
	<form action="return_thread" method="POST">
		<input type="submit" name="return_thread" value="スレ一覧に戻る">
	</form>

	<?php 
		//for文でレスをまわして表示
	foreach ($table_data as $data):
		if($data['response_tbs']['response_text']):
	?>
			<div class='response_box' style='border:solid;'>
				<form action='run_dalete' method='POST'>

		<?php	
			if($account['id'] == $data['account_tbs']['account_id'] && $account['name'] == $data['account_tbs']['name']): 
		?>					
					<input type="hidden" name="thread_id" value="<?php echo $check_input['thread_id'] ?>">
					<input type="hidden" name="response_id" value="<?php echo $data['response_tbs']['response_id'] ?>">
					<input type='submit' name='delete_res' value='削除'>
		<?php 	
			endif; 
		?>
				</form>
				<p>日付：<?php echo $data['response_tbs']['date']; ?></p>
				<p>本文：<?php echo $data['response_tbs']['response_text']; ?></p>
			</div>
	<?php
		else:
			break;
		endif;
	endforeach;
	?>

	<form action="show_input" method="POST">
		<input type="hidden" name="account_id" value="<?php echo $check_input['account_id'] ?>">
		<input type="hidden" name="thread_id" value="<?php echo $check_input['thread_id'] ?>">
		<input type="submit" name="input_res" value="レス投稿">
	</form>
</div>
