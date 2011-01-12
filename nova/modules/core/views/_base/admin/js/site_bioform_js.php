<?php $string = random_string('alnum', 8);?>

<script type="text/javascript">
	$(document).ready(function(){
		$('table.zebra tbody > tr:nth-child(odd)').addClass('alt');
		
		$("a[rel*=facebox]").click(function() {
			var id = $(this).attr('myID');
			var action = $(this).attr('myAction');
			var field = $(this).attr('myField');
			
			if (action == 'add')
				var location = '<?php echo site_url('ajax/add_bio_field/'. $string);?>';
			
			if (action == 'delete')
				var location = '<?php echo site_url('ajax/del_bio_field');?>/' + id + '/<?php echo $string;?>';
				
			if (action == 'edit_val')
				var location = '<?php echo site_url('ajax/edit_bio_field_value');?>/' + id + '/' + field + '/<?php echo $string;?>';
			
			$.facebox(function() {
				$.get(location, function(data) {
					$.facebox(data);
				});
			});
			
			return false;
		});
		
		$('#list').sortable({
			forcePlaceholderSize: true,
			placeholder: 'ui-state-highlight'
		});
		$('#list').disableSelection();
		
		$('#update').live('click', function(){
			var parent = $(this).parent().attr('class');
			var list = $('#list').sortable('serialize');
			
			$.ajax({
				beforeSend: function(){
					$('#loading_update').show();
					$('#update').attr('disabled', 'disabled');
				},
				type: "POST",
				url: "<?php echo site_url('ajax/save_bio_field_value');?>",
				data: list,
				success: function(data){
					$('.' + parent + ' .flash_message').remove();
					$('.' + parent).prepend(data);
				},
				complete: function(){
					$('#loading_update').hide();
					$('#update').attr('disabled', '');
				}
			});
			
			return false;
		});
		
		$('.remove').live('click', function(){
			var parent = $(this).parent().parent().parent().parent().attr('class');
			var id = $(this).attr('id');
			
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('ajax/del_bio_field_value');?>",
				data: { field: id },
				success: function(data){
					$('.' + parent + ' .flash_message').remove();
					$('.' + parent).prepend(data);
				},
				complete: function(){
					$('#value_' + id).fadeOut('slow', function(){
						$(this).remove();
					});
				}
			});
			
			return false;
		});
		
		$('#add').live('click', function(){
			var parent = $(this).parent().parent().attr('class');
			var value = $('#value').val();
			var content = $('#content').val();
			var field = $('#add').attr('rel');
			
			$.ajax({
				beforeSend: function(){
					$('#loading_add').show();
					$('#add').attr('disabled', 'disabled');
				},
				type: "POST",
				url: "<?php echo site_url('ajax/add_bio_field_value');?>",
				data: { value: value, content: content, field: field },
				success: function(data){
					$('#list').append(data);
				},
				complete: function(){
					$('#loading_add').hide();
					$('#add').attr('disabled', '');
				}
			});
			
			return false;
		});
	});
</script>