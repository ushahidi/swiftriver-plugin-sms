<?php defined('SYSPATH') OR die('No direct script access');

/**
 * Init for the SMS plugin
 *
 * @package SwiftRiver
 * @author Ushahidi Team
 * @category Plugins
 * @copyright (c) 2008-2011 Ushahidi Inc <htto://www.ushahidi.com>
 */

class Sms_Init {

	public function __construct() 
	{
	    // Hook into the river settings page
		Swiftriver_Event::add('swiftriver.river.settings.nav', array($this, 'settings_nav'));
	}

	/**
	 * Render the SMS Settings Menu
	 */
	public function settings_nav()
	{
		// Get the active menu
		$active = Swiftriver_Event::$data;

		// Kind of a dirty way to get the base_url without a global variable
		$river_base_url = URL::site().Request::current()->param('account').'/river/'.Request::current()->param('name');

		echo View::factory('sms/menu')
			->bind('active', $active)
			->bind('river_base_url', $river_base_url);
	}

}
new Sms_Init;

/**
 * River SMS Endpoint Routes
 */
Route::set('river_sms', '<account>/river/<name>/sms(/<controller>)')
	->defaults(array(
		'action'     => 'index',
		'directory'  => 'river/SMS'
	));