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
 * Auto Login Module Front End File
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Module
 * @author		Bjørn Børresen
 * @link		http://wedoaddons.com
 */

class Auto_login {
	
	public $return_data;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
	}
	

    public function perform_login()
    {
        $id = $this->EE->input->get('id');
        $autologins = $this->EE->config->item('autologins');

        if($id == '' || !isset($autologins[$id])) {
            show_error('The link you clicked was not correct. Please verify that you used the complete link.');
        }

        $user_arr = $autologins[$id];
        $_POST['username'] = $user_arr['username'];
        $_POST['password'] = $user_arr['password'];

        require_once APPPATH.'modules/member/mod.member.php';
        require_once APPPATH.'modules/member/mod.member_auth.php';
        $member_auth = new Member_auth();
        $member_auth->member_login();
    }
}
/* End of file mod.auto_login.php */
/* Location: /system/expressionengine/third_party/auto_login/mod.auto_login.php */