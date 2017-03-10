<?php
/**
 * @copyright	Copyright © 2017 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @generator	http://xdsoft/joomla-module-generator/
 */
defined('_JEXEC') or die;

$doc = JFactory::getDocument();


	$db = JFactory::getDBO();
	$db->setQuery("SELECT * FROM #__persona_portfolio where state=1 ORDER BY ordering ASC");
	$objects = $db->loadAssocList();

require JModuleHelper::getLayoutPath('mod_persona_portfolio', $params->get('layout', 'default'));