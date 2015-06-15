
<div>
	<?php echo $aggregation_data['from'] ?>
	~
	<?php echo $aggregation_data['to'] ?>
	のスレッド一覧
</div>

<table>
	<tr>
		<th>日付</th><th>タイトル</th><th>レス数</th>
	</tr>

	<?php foreach($threads as $thread): ?>
		<tr>
			<th><?php echo $thread['thread_tb']['date'] ?></th>
			<th><?php echo $thread['thread_tb']['title'] ?></th>
			<th><?php var_dump($number_of_response); ?>件</th>
		</tr>
	<?php endforeach; ?>
</table>
