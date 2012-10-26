<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Config for SMS Plugin
 *
 * PHP version 5
 * LICENSE: This source file is subject to GPLv3 license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/gpl.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package	   SwiftRiver - http://github.com/ushahidi/Swiftriver_v2
 * @subpackage Plugin Configs
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License v3 (GPLv3) 
 */

return array(
	'sms' => array(
		'name'          => 'SMS',
		'description'   => 'Adds an SMS channel to SwiftRiver. Creates an endpoint for SMSSync, FrontlineSMS, Clickatell & Twilio',
		'author'        => 'David Kobia',
		'email'         => 'david@ushahidi.com',
		'version'       => '0.1.0',
		
		// Designate as a channel
		'channel'       => TRUE,

		// Fields
		'channel_options' => array(
		),

		// Has Settings
		'settings'      => TRUE
	),
);