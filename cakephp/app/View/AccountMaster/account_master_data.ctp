<style type="text/css">
	div#main_area{
		width: 500px;
		margin: 0 auto;
	}
	div#regist_area{
		float: left;
	}
	div#return_area{
		float: right;
		margin-right: -20px;
	}

</style>
<div id="main_area">
	<div>
		<p><?php echo $res = isset($msg) && $msg != "" ? $msg : "" ; ?></p>
	</div>
	<div id="button_area">
		<div id="regist_area">
			<form action="show_regist" method="POST">
				<input type="submit" name="show_regist" value="新規登録">
			</form>
		</div>
		<div id="return_area">
			<form action="run_logout" method="POST">
				<input type="submit" name="run_logout" value="ログアウト">
			</form>
		</div>
	</div>
	<div id="data_area">
		<table>
			<tr>
				<th>id</th>
				<th>name</th>
				<th width="50px" style="text-align:center;">削除</th>
			</tr>
	<?php foreach ($table_data as $data): ?>
			<tr>
				<td><?php echo $data['account_tbs']['id'] ?></td>
				<td><?php echo $data['account_tbs']['name'] ?></td>
				<td style="text-align:center;">
					<form action="run_delete" method="POST">
						<input type="hidden" name="delete_id" value="<?php echo $data['account_tbs']['id'] ?>">
						<input type="submit" name="run_delete" value="削除">
					</form>
				</td>
			</tr>
				
	<?php endforeach; ?>
		</table>
	</div>
</div>