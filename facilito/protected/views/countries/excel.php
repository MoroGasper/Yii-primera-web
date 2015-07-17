<table>
	<tr>
		<th style="background-color: blue; color: white">ID</th>
		<th style="background-color: blue; color: white">NAME</th>
		<th style="background-color: blue; color: white">STATUS</th>
	</tr>
	<?php foreach ($model as $data): ?>
	<tr>
		<td><?php echo $data->id  ?></td>
		<td><?php echo $data->name  ?></td>
		<td><?php echo $data->status  ?></td>
	</tr>
<?php endforeach; ?>
</table>