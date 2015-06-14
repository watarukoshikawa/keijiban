<style>
	div#main_area{
		width: 500px;
		margin: 0 auto;
	}
	div#form_box{
		margin: 0 auto;
		width: 450px;
	}
</style>
<div id="main_area">
	<div id="form_box">
		<form class="return_btn" action="thread" method="post">
			<input type="submit" name="return_btn" value="戻る">
		</form>

		<form class="regist_thread_form" action="run_thread_regist" method="POST">
			スレッドタイトル：<input type="text" name="regist_thread_title" value="">
			本文：<input type="textarea" rows="5" cols="40" name="regist_thread_text" value="">
			<input type="submit" name="regist_thread_btn" value="登録">
		</form>
	</div>
</div>
