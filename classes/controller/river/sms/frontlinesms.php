<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * FrontlineSMS End Point Controller
 *
 * PHP version 5
 * LICENSE: This source file is subject to GPLv3 license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/gpl.html
 * @author	   Ushahidi Team <team@ushahidi.com> 
 * @package	   SwiftRiver - http://github.com/ushahidi/Swiftriver_v2
 * @subpackage Controllers
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license	   http://www.gnu.org/copyleft/gpl.html GNU General Public License v3 (GPLv3) 
 */
class Controller_River_SMS_Frontlinesms extends Controller_River_SMS_Base {

	/**
	 * @return	void
	 */
	public function before()
	{
		// Execute parent::before first
		parent::before();

		$this->provider = 'frontlinesms';

		$this->from = filter_input(INPUT_POST | INPUT_GET, 'from',
			FILTER_SANITIZE_SPECIAL_CHARS);

		$this->message = filter_input(INPUT_POST | INPUT_GET, 'message',
			FILTER_SANITIZE_SPECIAL_CHARS);
	}
}