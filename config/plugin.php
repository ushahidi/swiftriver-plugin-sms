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
			'keyword' => array(
				'label' => __('Keyword'),
				'type' => 'text',
				'values' => array(),
				'placeholder' => 'E.g. Ushahidi, "African Tech" For multiple keywords, separate each keyword with a ","'
			),
			'phone' => array(
				'label' => __('Phone Number'),
				'type' => 'text',
				'values' => array(),
				'placeholder' => 'With Country Code e.g. 1404000000'
			)
		),

		// Has Settings
		'settings'      => TRUE
	),
);