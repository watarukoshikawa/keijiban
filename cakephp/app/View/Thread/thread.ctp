
<!-- スレッド作成ボタン -->
<form class="" action="" method="POST">
	<input type="submit" name="" value="スレッド作成">
</form>

<!-- スレッド一覧表示 -->
<table>
	<tr>
		<th>スレッドタイトル</th><th>作成者</th><th>日付</th><th>削除</th>
	</tr>

<!-- foreachでユーザーデータ表示 する予定-->
	<tr>
		<th> </th>
		<th></th>
		<th></th>
		<th>
			<form action="run_thread_delete" method="POST" class="delete_thread_form">
				<input type="submit" name="delete_btn" value="削除">
				<input type="hidden" name="delete_thread_id" value="">
				<input type="hidden" name="account_id" value="">
			</form>
		</th>
	</tr>
</table>
