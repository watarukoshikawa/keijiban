<style>
	h1#msg_area{
		font-size: 20px;
	}
	#form_area{
		width: 500px;
		margin: auto;
	}
	#form_area_box{
		width: 300px;
		margin:auto;
	}
	.align_l{
		align:left;
	}
	.btn_size{
		width: 100px;
	}
	table#show_area{
		width: 500px;
	}

</style>

<div id="form_area">


	<div id="form_area_box">
		<div style="display:inline-flex">
			<form action="run_insert" method="POST">
				<input type="submit" style="width:100px; margin-left:7px;" name="insert_view" value="新規登録">
			</form>
			<form action="run_logout" method="POST">
				<input type="submit" style="width:100px; margin-left: 35px;" name="logout" value="ログアウト">
			</form>
		</div>
		<form action="index" method="POST">
			<div style="display:inline-flex">
				<input type="text" name="select_name" placeholder="name検索">
				<input type="submit" style="width:70px;" name="select_btn" value="検索">
			</div>
		</form>
	</div>
	<?php
		if(isset($msg) && $msg != ""){
			print("<h1 id='msg_area'>".$msg."</h1>");
		}
	?>
	<table id="show_area">
		<tr>
			<th>ID</th>
			<th>name</th>
			<th>value</th>
			<th>date</th>
			<th>削除</th>
		</tr>
		<?php

			for($i=0; $i<count($table_data); $i++){
				print("<tr><td>".$table_data[$i]['User']['id']."</td>");
				print("<td><a href='show_update_view?id=".$table_data[$i]['User']['id']."'>".$table_data[$i]['User']['name']."</a></td>");
				print("<td>".$table_data[$i]['User']['value']."</td>");
				$split_date = split(" ",$table_data[$i]['User']['date']);
				print("<td>".$split_date[0]."</td>");
				$delete_form = "<td style='width:75px;'><form action='run_delete' method='POST'>";
				$delete_form .="<input type='hidden' name='delete_id' value='".$table_data[$i]['User']['id']."'>";
				$delete_form .="<input type='submit' style='width:70px; margin-left:5px;'  name='delete_btn' value='削除'></form></td></tr>";
				print($delete_form);
			} 
		?>
	</table>
</div>