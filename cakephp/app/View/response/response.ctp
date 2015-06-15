<<<<<<< HEAD
<style>
	div#main_area{
		width: 500px;
		margin: 0 auto;
	}
	p.title_text{
		font-size: 30px;
		margin: 0;
	}
	div#button_area{
		height: 50px;
	}
	div#response_regist{
		float: left;
	}
	div#return_thread{
		float: right;
		margin-right: -20px;
	}
	div.response_box{
		margin-top: 50px
		border:solid;
	}
	div#response_text{
		float: left;
		width: 300px;
	}
	div#response_delete{
		float: right;
		width: 150px;
		margin-bottom: 0;
	}
</style>
<div id="main_area">
	<div id="title_area">
		<table style="width:500px">
			<tr>
				<th style="padding:0; width:120px; ">
					<p class="title_text">スレタイ：</p>
				</th>
				<th>
					<p class="title_text"><?php echo $table_data[0]['thread_tbs']['title'] ?></p>
				</th>
			</tr>
			<tr>
				<th style="text-align:right;">
					<p class="title_text">本文：</p>
				</th>
				<th>
					<p class="title_text"><?php echo $table_data[0]['thread_tbs']['thread_text'] ?></p>
				</th>
			</tr>
		</table>
	</div>
	<!-- 区切り線をいれる -->
	<div id="response_area">
		<div id="button_area">
			<div id="response_regist">
				<form action="show_input" method="POST">
					<input type="hidden" name="account_id" value="<?php echo $check_input['account_id'] ?>">
					<input type="hidden" name="thread_id" value="<?php echo $check_input['thread_id'] ?>">
					<input type="submit" name="input_res" value="レス投稿">
				</form>
			</div>
			<div id="return_thread">
				<form action="return_thread" method="POST">
					<input type="submit" name="return_thread" value="スレ一覧に戻る">
				</form>
			</div>
		</div>
		<hr><br>
		<?php
			//for文でレスをまわして表示
		foreach ($table_data as $data):
			if($data['response_tbs']['response_text']):
		?>
				<div class='response_box'>
					<div id="response_text">
						<table>
							<tr><th>日付：<?php echo $data['response_tbs']['date']; ?></th></tr>
							<tr><th style="word-break:break-all;">本文：<?php echo $data['response_tbs']['response_text']; ?></th></tr>
						</table>
					</div>

			<?php
				if($account['id'] == $data['account_tbs']['account_id'] && $account['name'] == $data['account_tbs']['name']):
			?>
					<div id="response_delete">
						<form action='run_dalete' method='POST'>
							<input type="hidden" name="thread_id" value="<?php echo $check_input['thread_id'] ?>">
							<input type="hidden" name="response_id" value="<?php echo $data['response_tbs']['response_id'] ?>">
							<input type='submit' name='delete_res' value='削除'>
						</form>
					</div>
			<?php
				endif;
			?>


				</div>
		<?php
			else:
			endif;
		endforeach;
		?>

		<form action="show_input" method="POST">
			<input type="hidden" name="account_id" value="<?php echo $check_input['account_id'] ?>">
			<input type="hidden" name="thread_id" value="<?php echo $check_input['thread_id'] ?>">
			<input type="submit" name="input_res" value="レス投稿">
		</form>
	</div>
</div>
=======
<pre>

	<?php  var_dump($table_data);?>
</pre>
<style type="text/css">
	.response_box{
		border:solid;
	}
</style>
<div id="title_area">
	<p>スレタイ：<?php echo $table_data[0]['get_thread']['thread_title'] ?></p>
	<p>本文：<?php echo $table_data[0]['get_thread']['thread_text'] ?></p>
</div>
<!-- 区切り線をいれる -->
<div id="response_area">
	<form action="show_input" method="POST">
		<input type="submit" name="input_res" value="レス投稿">
	</form>
	<?php
		//for文でレスをまわして表示
		//以下HTMLは見本

	foreach ($table_data as $data) {
		$box = '

			<div class="response_box">
				<form action="run_dalete" method="POST">
					<input type="submit" name="delete_res" value="削除">
				</form>
				<p>日付：'. $data["get_thread"]["response_date"] .'</p>
				<p>本文：'. $data["get_thread"]["response_text"] .'</p>
			</div>
		';
		print($box);
	}
	?>
	<form action="show_input" method="POST">
		<input type="submit" name="input_res" value="レス投稿">
	</form>
</div>
>>>>>>> response 初の画面表示データ取得から表示まで
