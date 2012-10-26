<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * SMSSync End Point Controller
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
class Controller_River_SMS_Smssync extends Controller_River_SMS_Base {

	/**
	 * @return	void
	 */
	public function before()
	{
		// Execute parent::before first
		parent::before();

		$this->provider = 'smssync';

		$this->from = filter_input(INPUT_POST, 'from',
			FILTER_SANITIZE_SPECIAL_CHARS);
		$this->message = filter_input(INPUT_POST, 'message',
			FILTER_SANITIZE_SPECIAL_CHARS);

		$this->timestamp = filter_input(INPUT_POST, 'sent_timestamp',
			FILTER_SANITIZE_SPECIAL_CHARS);

		$this->message_id = filter_input(INPUT_POST, 'message_id',
			FILTER_SANITIZE_SPECIAL_CHARS);
	}

	/**
	 * @return	void
	 */
	public function after()
	{
		// Execute parent::after first
		parent::after();

		if ($this->processed)
		{
			// Let SMSSync know the delivery was successful
			echo json_encode(array("payload"=>array("success"=>"true")));
		}
	}
}