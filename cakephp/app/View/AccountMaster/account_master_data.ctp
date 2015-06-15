<div id="main_area">
	<div id="button_area">
		<div id="regist_area">
			<form action="show_regist" method="POST">
				<input type="submit" name="show_regist" value="新規登録">
			</form>
		</div>
		<div id="return_area">
			<form action="return_account" method="POST">
				<input type="submit" name="return_account" value="戻る">
			</form>
		</div>
	</div>
	<div id="data_area">
		<table>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>削除</th>
			</tr>
	<?php foreach ($table_data as $data): ?>
			<tr>
				<td><?php echo $data['account_tbs']['id'] ?></td>
				<td><?php echo $data['account_tbs']['name'] ?></td>
				<td>
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

<pre>
	<?php var_dump($table_data); ?>
</pre>