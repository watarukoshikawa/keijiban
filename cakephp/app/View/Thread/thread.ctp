
<!-- スレッド作成ボタン -->
<form action="thread_regist" method="POST">
	<input type="submit" name="thread_regist_btn" value="スレッド作成">
</form>

<!-- ログアウトボタン -->
<form class="logout" action="run_logout" method="post">
	<input type="submit" name="logout_btn" value="ログアウト">
</form>

<!-- スレッド一覧表示 -->
<table>
	<tr>
		<th>スレッドタイトル</th><th>作成者</th><th>日付</th><th>削除</th>
	</tr>

<!-- foreachでユーザーデータ表示 -->
<?php foreach ($threads as $thread): ?>
	<tr>
		<th> <a href="..//response/show_main?thread_id=<?php echo $thread['thread_tbs']['id'] ?>"><?php echo $thread['thread_tbs']['title']; ?></a></th>
		<th><?php echo $thread['account_tbs']['name']; ?></th>
		<th><?php echo $thread['thread_tbs']['date']; ?></th>
		<th>
			<!-- ログインidと投稿者が一致すれば削除ボタンを表示する予定 -->

		<?php if ($account_id == $thread['account_tbs']['id'] && $account_name == $thread['account_tbs']['name']): ?>
			<form action="run_thread_delete" method="POST" class="delete_thread_form">
				<input type="hidden" name="delete_thread_id" value="<?php echo $thread['thread_tbs']['id']; ?>">
				<input type="submit" name="delete_btn" value="削除">
			</form>
		<?php endif; ?>
		</th>
	</tr>
<?php endforeach; ?>

</table>
