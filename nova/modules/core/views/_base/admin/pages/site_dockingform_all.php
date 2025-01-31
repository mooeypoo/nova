<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php echo text_output($header, 'h1', 'page-head');?>

<?php echo text_output($text);?>

<p class="bold">
	<?php echo anchor('site/dockingsections', img($images['sections']) .' '. $label['sections'], array('class' => 'image'));?>
	<br /><br />
	<a href="#" rel="facebox" class="image" myAction="add">
		<?php echo img($images['add_field']) .' '. $label['add'];?>
	</a>
</p>
<br />

<?php if (isset($docking)): ?>
	<?php foreach ($docking['sections'] as $sec): ?>
		<?php echo text_output($sec['name'], 'h3', 'page-subhead');?>
		
		<?php if (isset($sec['fields'])): ?>
			<table class="table100 zebra">
				<tbody>
			
				<?php foreach ($sec['fields'] as $f): ?>
					<tr>
						<td class="cell-label"><?php echo $f['label'];?></td>
						<td class="cell-spacer"></td>
						<td><?php echo $f['input'];?></td>
						<td class="col_75 align_right">
							<a href="#" rel="facebox" myAction="delete" myID="<?php echo $f['id'];?>" class="image"><?php echo img($images['delete']);?></a>
							&nbsp;
							<?php echo anchor('site/dockingform/edit/'. $f['id'], img($images['edit']), array('class' => 'image'));?>
						</td>
					</tr>
				<?php endforeach;?>
			
				</tbody>
			</table>
		<?php else: ?>
			<?php echo text_output($label['nofields'], 'h3', 'orange');?>
		<?php endif;?>
	<?php endforeach;?>
<?php endif;?>