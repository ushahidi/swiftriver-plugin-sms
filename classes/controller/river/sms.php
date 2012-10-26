<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * River Channel SMS Settings Controller
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
class Controller_River_SMS extends Controller_River_Settings {
	
	/**
	 * @return	void
	 */
	public function action_index()
	{
		$this->template->header->title = $this->river->river_name.' ~ '.__('SMS Settings');
		
		$this->active = 'sms';
		$this->settings_content = View::factory('sms/settings')
			->bind('token', $token)
			->bind('smssync', $smssync)
			->bind('frontlinesms', $frontlinesms)
			->bind('clickatell', $clickatell)
			->bind('twilio', $twilio);

		$token = $this->river->public_token;
		$sms_base_url = $this->river->account->account_path.'/river/'.$this->river->river_name_url.'/sms/';
		
		$smssync = $sms_base_url.'smssync?at='.$token;
		$frontlinesms = $sms_base_url.'frontlinesms?at='.$token;
		$clickatell = $sms_base_url.'clickatell?at='.$token;
		$twilio = $sms_base_url.'twilio?at='.$token;
	}
}