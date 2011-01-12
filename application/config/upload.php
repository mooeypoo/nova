<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  UPLOAD CONFIGURATION
| -------------------------------------------------------------------
| From this page you can set the various upload configuration options
| for the system. More information about uploading can be found
| at http://codeigniter.com/user_guide/libraries/file_uploading.html.
*/

$config['upload_path'] 		= './assets/images/';
$config['allowed_types'] 	= 'gif|jpg|jpeg|png|bmp';
$config['overwrite']		= FALSE;
$config['max_size']			= '500';
$config['max_width']		= '1024';
$config['max_height']		= '768';
$config['max_filename']		= '0';
$config['encrypt_name']		= FALSE;
$config['remove_spaces']	= TRUE;

$config['attempt_delete']	= TRUE;

/* End of file upload.php */
/* Location: ./application/config/upload.php */