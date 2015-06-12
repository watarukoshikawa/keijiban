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
