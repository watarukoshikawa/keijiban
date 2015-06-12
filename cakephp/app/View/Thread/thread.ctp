
<!-- スレッド作成ボタン -->
<form class="" action="" method="POST">
	<input type="submit" name="" value="スレッド作成">
</form>

<!-- スレッド一覧表示 -->
<table>
	<tr>
		<th>スレッドタイトル</th><th>作成者</th><th>日付</th><th>削除</th>
	</tr>

<!-- foreachでユーザーデータ表示 -->
<?php foreach ($threads as $thread_data): ?>
	<?php foreach ($thread_data as $thread): ?>
	<tr>
		<th> <a href="..//response/show_main?thread_id=<?php echo $thread['id'] ?>"><?php echo $thread['title']; ?></a></th>
		<th><?php  ?></th>
		<th><?php echo $thread['date']; ?></th>
		<th>
			<!-- ログインidと投稿者が一致すれば削除ボタンを表示する予定 -->
			<form action="run_thread_delete" method="POST" class="delete_thread_form">
				<input type="submit" name="delete_btn" value="削除">
				<input type="hidden" name="delete_thread_id" value="">
				<input type="hidden" name="account_id" value="">
			</form>
		</th>
	</tr>
	<?php endforeach; ?>
<?php endforeach; ?>

</table>
