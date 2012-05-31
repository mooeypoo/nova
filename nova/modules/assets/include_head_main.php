<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Main Header
 *
 * @package		Nova
 * @category	Assets
 * @author		Anodyne Productions
 * @copyright	2011 Anodyne Productions
 */

$faceboxcss = ( ! is_file(APPPATH.'views/'.$current_skin.'/main/css/jquery.facebox.css'))
	? base_url().MODFOLDER.'/assets/js/css/jquery.facebox.css'
	: base_url().APPFOLDER.'/views/'.$current_skin.'/main/css/jquery.facebox.css';
	
$uiTheme = ( ! is_file(APPPATH .'views/'.$current_skin.'/main/css/jquery.ui.theme.css'))
	? base_url().MODFOLDER.'/assets/js/css/jquery.ui.theme.css'
	: base_url().APPFOLDER.'/views/'.$current_skin.'/main/css/jquery.ui.theme.css';

?><style type="text/css">
			@import url("<?php echo base_url() . MODFOLDER .'/assets/js/css/jquery.ui.core.css';?>");
			@import url('<?php echo $faceboxcss;?>');
			@import url('<?php echo $uiTheme;?>');
		</style>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url().MODFOLDER .'/assets/js/jquery.lazy.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().MODFOLDER .'/assets/js/jquery.ui.core.min.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().MODFOLDER .'/assets/js/jquery.ui.widget.min.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().MODFOLDER .'/assets/js/reflection.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().MODFOLDER .'/assets/js/jquery.facebox.js';?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$.lazy({					
					src: '<?php echo base_url().MODFOLDER;?>/assets/js/jquery.ui.tabs.min.js',
					name: 'tabs',
					cache: true
				});
				
				$.lazy({					
					src: '<?php echo base_url() . MODFOLDER;?>/assets/js/jquery.prettyPhoto.js',
					name: 'prettyPhoto',
					dependencies: {
						css: ['<?php echo base_url() . MODFOLDER;?>/assets/js/css/jquery.prettyPhoto.css']
					},
					cache: true
				});
				
				$.lazy({
					src: '<?php echo base_url() . MODFOLDER;?>/assets/js/bootstrap-twipsy.js',
					name: 'twipsy',
					dependencies: {
						css: ['<?php echo base_url() . MODFOLDER;?>/assets/js/css/bootstrap.css']
					},
					cache: true
				});
				
				$('a#userpanel').toggle(function(){
					$('div.panel-body').slideDown('normal', function(){
						$('.panel-trigger div.ui-icon').removeClass('ui-icon-triangle-1-s');
						$('.panel-trigger div.ui-icon').addClass('ui-icon-triangle-1-n');
					});
					return false;
				}, function(){
					$('div.panel-body').slideUp('normal', function(){
						$('.panel-trigger div.ui-icon').removeClass('ui-icon-triangle-1-n');
						$('.panel-trigger div.ui-icon').addClass('ui-icon-triangle-1-s');
					});
					return false;
				});
				
				$.facebox.settings.loadingImage = '<?php echo base_url() . MODFOLDER;?>/assets/js/images/facebox-loading.gif';
				
				$('.reflect').reflect({ opacity: '0.3' });
			});
		</script>
		