<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * Auto Login Module Control Panel File
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Module
 * @author		Bjørn Børresen
 * @link		http://wedoaddons.com
 */

class Auto_login_mcp {
	
	public $return_data;
	
	private $_base_url;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		
		$this->_base_url = BASE.AMP.'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module=auto_login';
		
		$this->EE->cp->set_right_nav(array(
			'module_home'	=> $this->_base_url,
		));
	}
	
	// ----------------------------------------------------------------

	/**
	 * Index Function
	 *
	 * @return 	void
	 */
	public function index()
	{
        // $this->EE->cp->set_variable was deprecated in 2.6
        if (version_compare(APP_VER, '2.6', '>=')) {
            $this->EE->view->cp_page_title = lang('autologin_welcome');
        } else {
            $this->EE->cp->set_variable('cp_page_title', lang('autologin_welcome'));
        }

        $action_url = '';
        $q = $this->EE->db->get_where('actions', array('class' => 'Auto_login', 'method' => 'perform_login'));
        if($q->num_rows() > 0) {
            $action_id = $q->row('action_id');
            $action_url = $this->EE->functions->fetch_site_index() . '?ACT='.$action_id;
        }

        $vars['autologins'] = $this->EE->config->item('autologins');
        $vars['action_url'] = $action_url;

        return $this->EE->load->view('index', $vars, TRUE);

	}

	/**
	 * Start on your custom code here...
	 */
	
}
/* End of file mcp.auto_login.php */
/* Location: /system/expressionengine/third_party/auto_login/mcp.auto_login.php */