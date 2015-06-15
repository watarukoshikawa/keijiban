<style>
	div#main_area{
		width:500px;
		margin: 0 auto;
	}
	div#button_area{
		display: inline;;
	}
	div#thread_regist_area{
		float:left;
	}
	div#run_logout_area{
		float: right;
		margin-right: -20px
	}
	th{
		text-align: center;
	}
</style>
<!-- スレッド作成ボタン -->
<div id="main_area">
	<div id="button_area">
		<div id="thread_regist_area">
			<form action="thread_regist" method="POST">
				<input type="submit" name="thread_regist_btn" value="スレッド作成">
			</form>
		</div>
		<div id="run_logout_area">
			<!-- ログアウトボタン -->
			<form class="logout" action="run_logout" method="post">
				<input type="submit" name="logout_btn" value="ログアウト">
			</form>
		</div>
	</div>
	<!-- スレッド一覧表示 -->
	<table>
		<tr>
			<th>スレッドタイトル</th><th>作成者</th><th>日付</th><th>削除</th>
		</tr>

	<!-- foreachでユーザーデータ表示 -->
	<?php foreach ($threads as $thread): ?>
		<tr>
			<th> <a href="../response/show_main?thread_id=<?php echo $thread['thread_tbs']['id'] ?>"><?php echo $thread['thread_tbs']['title']; ?></a></th>
			<th><?php echo $thread['account_tbs']['name']; ?></th>
			<th><?php echo $thread['thread_tbs']['date']; ?></th>
				<!-- ログインidと投稿者が一致すれば削除ボタンを表示する予定 -->

			<th>
			<?php if ($account_id == $thread['account_tbs']['id'] && $account_name == $thread['account_tbs']['name']):
				?>
				<form action="run_thread_delete" method="POST" class="delete_thread_form">
					<input type="submit" name="delete_btn" value="削除">
					<input type="hidden" name="delete_thread_id" value="<?php echo $thread['thread_tbs']['id']; ?>">
				</form>
			<?php endif; ?>
			</th>
		</tr>
	<?php endforeach; ?>

	</table>
</div>
