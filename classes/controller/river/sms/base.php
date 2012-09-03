<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * River Channel SMS Endpoint Base Controller
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
class Controller_River_SMS_Base extends Controller {

	/**
	 * ORM reference for the currently selected river
	 * @var Model_River
	 */
	protected $river;

	/**
	 * SMS Provider
	 * @var from
	 */
	protected $provider = '';

	/**
	 * SMS Sender
	 * @var from
	 */
	protected $from = NULL;

	/**
	 * SMS Message
	 * @var message
	 */
	protected $message = NULL;

	/**
	 * SMS Message ID
	 * @var message_id
	 */
	protected $message_id = 0;

	/**
	 * SMS Timestamp
	 * @var timestamp
	 */
	protected $timestamp = NULL;

	/**
	 * SMS Processed?
	 * @var processed
	 */
	protected $processed = FALSE;

	/**
	 * @return	void
	 */
	public function before()
	{
		// Execute parent::before first
		parent::before();

		// Get the river name from the url
		$river_name_url = $this->request->param('name');
		
		// This check should be made when this controller is accessed
		// and the database id of the rive is non-zero
		$this->river = ORM::factory('river')
			->where('river_name_url', '=', $river_name_url)
			->find();
	}

	public function action_index()
	{
		// Action involves a specific river, check permissions
		if ( $this->river->loaded() )
		{
			// Retreive token from route
			$token = $this->request->param('token', 0);

			// Is this a valid token and does this river have
			// an SMS channel?
			if ( $this->river->public_token == $token AND 
				$this->river->channel_filters
				->where('channel', '=', 'sms')
				->count_all() )
			{
				// Parse the [from] for only digits
				$this->from = preg_replace('/\D/', '', $this->from);

				// Do we have a sender and a message?
				// If so, create new droplet
				if ($this->from AND $this->message)
				{
					$droplet = Swiftriver_Dropletqueue::get_droplet_template();
					$droplet['channel'] = 'sms';
					$droplet['river_id'] = array($this->river->id);
					$droplet['identity_orig_id'] = $this->from;
					$droplet['identity_name'] = $this->from;
					$droplet['identity_avatar'] = null;
					$droplet['droplet_orig_id'] = ($this->message_id) ? $this->provider.'_'.$this->message_id : strtotime('now');
					$droplet['droplet_type'] = 'original';
					$droplet['droplet_title'] = $this->message;
					$droplet['droplet_raw'] = $droplet['droplet_content'] = $this->message;
					$droplet['droplet_date_pub'] = ($this->timestamp) ? 
						gmdate("Y-m-d H:i:s", strtotime($this->timestamp)) :
						gmdate("Y-m-d H:i:s",time());
					
					// Add droplet to the queue
					Swiftriver_Dropletqueue::add($droplet);

					$this->processed = TRUE;
				}
			}
		}
	}
}