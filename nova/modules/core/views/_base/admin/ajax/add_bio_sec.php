<?php echo text_output($header, 'h2');?>

<?php echo text_output($text);?>

<?php echo form_open('site/biosections/add');?>
	<table class="table100">
		<tbody>
			<tr>
				<td class="cell-label"><?php echo $label['name'];?></td>
				<td class="cell-spacer"></td>
				<td><?php echo form_input($inputs['name']);?></td>
			</tr>
			<tr>
				<td class="cell-label"><?php echo $label['order'];?></td>
				<td class="cell-spacer"></td>
				<td><?php echo form_input($inputs['order']);?></td>
			</tr>
			<tr>
				<td class="cell-label"><?php echo $label['tab'];?></td>
				<td class="cell-spacer"></td>
				<td><?php echo form_dropdown('section_tab', $values['tabs'], '', 'class="hud"');?></td>
			</tr>
		</tbody>
	</table>