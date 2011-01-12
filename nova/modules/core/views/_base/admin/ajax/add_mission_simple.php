<?php echo text_output($header, 'h2');?>

<?php echo text_output($text);?><br />

<?php echo form_open('write/missionpost/missionCreate');?>
	<table class="table100">
		<tbody>
			<tr>
				<td colspan="2"></td>
				<td><?php echo form_dropdown('action', $missions, 0, 'class="hud" id="addMissionOption"');?></td>
			</tr>
			
			<?php echo table_row_spacer(3, 15);?>
			
			<tr>
				<td class="cell-label"><?php echo $label['title'];?></td>
				<td class="cell-spacer"></td>
				<td><?php echo form_input($inputs['title']);?></td>
			</tr>
			<tr>
				<td class="cell-label"><?php echo $label['desc'];?></td>
				<td class="cell-spacer"></td>
				<td><?php echo form_textarea($inputs['desc']);?></td>
			</tr>
			
			<?php echo table_row_spacer(3, 15);?>
			
			<tr>
				<td colspan="3"><?php echo form_button($inputs['submit']);?></td>
			</tr>
		</tbody>
	</table>
<?php echo form_close();?>