<?php
/**
 * Open Source Social Network
 *
 * @package   (openteknik.com).ossn
 * @author    OSSN Core Team <info@openteknik.com>
 * @copyright (C) OpenTeknik LLC
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
$database = new OssnDatabase;
$database->statement("ALTER TABLE `ossn_likes` ADD `subtype` VARCHAR(10) NOT NULL AFTER `type`;");
$database->execute();

ossn_version_upgrade($upgrade, '5.2');

$factory = new OssnFactory(array(
		'callback' => 'installation',
		'website' => ossn_site_url(),
		'email' => ossn_site_settings('owner_email'),
		'version' => '5.2'
));
$factory->connect;
