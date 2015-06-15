

<form class="aggregation_form" action="run_aggregation" method="POST">
	<input type="date" name="aggregation_date_from" value="" style="width:300px;">
	～
	<input type="date" name="aggregation_date_to" value="" style="width:300px;">
	<input type="submit" name="aggregation_btn" value="集計">
</form>

<?php if (isset($aggregation_data)):?>
	<div>
		<?php echo $aggregation_data['aggregation_date_from']; ?>
		~
		<?php echo $aggregation_data['aggregation_date_to']; ?>
		の集計
	</div>

	<div>
		投稿スレッド件数:
		<a href="manage?from=<?php echo $aggregation_data['aggregation_date_from']; ?>
		&to=<?php echo $aggregation_data['aggregation_date_to']; ?>">
			<?php echo $number_of_thread; ?>
		</a>
		件
	</div>
	<div>
		投稿レス件数:<?php echo $number_of_response; ?>件
	</div>
<?php endif; ?>
