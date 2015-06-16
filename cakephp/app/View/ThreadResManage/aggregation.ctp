<style>
	div#aggregation_box{
		width: 600px;
		margin: 50px auto;
		text-align: center;
	}

	div#aggregation_text{
		width: 600px;
		margin: 20px auto;
		text-align: center;
		font-size: 20px;
	}

	table#number_of_thread_res{
		width: 200px;
		margin: 0px auto;
	}

	table#number_of_thread_res td{
		text-align: right;
	}
</style>

<div id="aggregation_box">
	<form class="aggregation_form" action="run_aggregation" method="POST">
		<input type="date" name="aggregation_date_from" style="width:200px;">
		～
		<input type="date" name="aggregation_date_to" style="width:200px;">
		<input type="submit" name="aggregation_btn" value="集計">
	</form>
</div>

<?php if (isset($aggregation_data)):?>
	<div id="aggregation_text">
		<?php echo $aggregation_data['aggregation_date_from']; ?>
		~
		<?php echo $aggregation_data['aggregation_date_to']; ?>
		の集計
	</div>

	<table id="number_of_thread_res">
		<tr>
			<td>投稿スレッド件数:</td>
			<td>
				<a href="manage?from=<?php echo $aggregation_data['aggregation_date_from']; ?>
								&to=<?php echo $aggregation_data['aggregation_date_to']; ?>">
					<?php echo $number_of_thread; ?>
				</a>件
			</td>
		</tr>
		<tr>
			<td>投稿レス件数:</td>
			<td><?php echo $number_of_response; ?>件</td>
		</tr>
	</table>
<?php endif; ?>
