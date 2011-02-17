<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Characters Controller
 *
 * @package		Nova
 * @category	Controllers
 * @author		Anodyne Productions
 * @copyright	2011 Anodyne Productions
 * @since		2.0
 */

class Controller_Nova_Admin_Characters extends Controller_Nova_Base {
	
	public function before()
	{
		parent::before();
		
		// check to make sure the user is logged in
		Auth::is_logged_in(true);
		
		// pull these additional setting keys that'll be available in every method
		$additionalSettings = array(
			'skin_admin',
		);
		
		// merge the settings arrays
		$this->settingsArray = array_merge($this->settingsArray, $additionalSettings);
		
		// pull the settings and put them into the options object
		$this->options = Jelly::query('setting')->get_settings($this->settingsArray);
		
		// set the variables
		$this->skin		= $this->session->get('skin_admin', $this->options->skin_admin);
		$this->rank		= $this->session->get('display_rank', $this->options->display_rank);
		$this->timezone	= $this->session->get('timezone', $this->options->timezone);
		$this->dst		= $this->session->get('dst', $this->options->daylight_savings);
		
		// set the values to be passed to the views
		$vars = array(
			'template' => array(
				'skin' => $this->skin,
				'sec' => 'main'),
			'layout' => array(
				'skin'	=> $this->skin,
				'sec'	=> 'main'),
		);
		
		// set the shell
		$this->template = View::factory('_common/layouts/admin', $vars['template']);
		
		// grab the image index
		$this->images = Utility::get_image_index($this->skin);
		
		// set the variables in the template
		$this->template->title 						= $this->options->sim_name.' :: ';
		$this->template->javascript					= false;
		$this->template->layout						= View::factory($this->skin.'/template_admin', $vars['layout']);
		$this->template->layout->navmain 			= Menu::build('main', 'main');
		$this->template->layout->ajax 				= false;
		$this->template->layout->flash				= false;
		$this->template->layout->content			= false;
		
		$this->template->layout->panel				= View::factory('_common/partials/panel');
		$this->template->layout->panel->panel1		= false;
		$this->template->layout->panel->panel2		= false;
		$this->template->layout->panel->panel3		= false;
		$this->template->layout->panel->workflow	= false;
		
		$this->template->layout->navsub 			= View::factory('_common/partials/navsub');
		$this->template->layout->navsub->menu		= Menu::build('sub', 'main');
		$this->template->layout->navsub->widget1	= false;
		$this->template->layout->navsub->widget2	= false;
		$this->template->layout->navsub->widget3	= false;
		
		$this->template->layout->footer				= View::factory('_common/partials/footer');
		$this->template->layout->footer->extra 		= Jelly::query('message', 'footer')->limit(1)->select()->value;
	}
	
	public function action_index()
	{
		// create a new content view
		$this->template->layout->content = "This is the characters page";
		
		// create the javascript view
		//$this->template->javascript = View::factory(Location::view('admin_index_js', $this->skin, 'admin', 'js'));
		
		// assign the object a shorter variable to use in the method
		$data = $this->template->layout->content;
		
		// content
		$this->template->title.= ucfirst(__("admin"));
		//$data->header = Jelly::query('message', 'welcome_head')->limit(1)->select()->value;
		//$data->message = Jelly::query('message', 'welcome_msg')->limit(1)->select()->value;
		
		// send the response
		$this->request->response = $this->template;
	}
}
