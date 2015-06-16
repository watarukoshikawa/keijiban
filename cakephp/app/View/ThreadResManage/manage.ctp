<style>
	div#aggregation_box{
		width: 650px;
		margin: 0px auto;
		text-align: center;
		font-size: 30px;
	}
	table#data_table{
		width: 500px;
		margin: 20px auto;
	}
	table#data_table th{
		text-align: center;
	}
</style>


<div id="aggregation_box">
	<?php echo $aggregation_data['from'] ?>
	~
	<?php echo $aggregation_data['to'] ?>
	のスレッド一覧
</div>

<table id="data_table">
	<tr>
		<th>日付</th><th>タイトル</th><th>レス数</th>
	</tr>
	<?php foreach($threads as $thread): ?>
		<tr>
			<th><?php echo $thread['thread_tbs']['date']; ?></th>
			<th><?php echo $thread['thread_tbs']['title']; ?></th>
			<th><?php echo $thread['res_tb']['res_count']; ?>件</th>
		</tr>
	<?php endforeach; ?>
</table>
