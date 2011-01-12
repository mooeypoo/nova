<?php $string = random_string('alnum', 8);?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabs').tabs();
		$('#tabs').tabs('select', <?php echo $tab;?>);
		
		$('table.zebra tbody > tr:nth-child(odd)').addClass('alt');
		
		$("a[rel*=facebox]").click(function() {
			var action = $(this).attr('myAction');
			var id = $(this).attr('myID');
			var selected = $('#tabs').tabs('option', 'selected');
			
			if (action == 'delete')
				var location = '<?php echo site_url('ajax/del_menu_item');?>/' + id + '/' + selected + '/<?php echo $string;?>';
			
			if (action == 'edit')
				var location = '<?php echo site_url('ajax/edit_menu_item');?>/' + id + '/' + selected + '/<?php echo $string;?>';
			
			if (action == 'add')
				var location = '<?php echo site_url('ajax/add_menu_item');?>/' + selected + '/<?php echo $string;?>';
			
			$.facebox(function() {
				$.get(location, function(data) {
					$.facebox(data);
				});
			});
			
			return false;
		});
	});
</script>