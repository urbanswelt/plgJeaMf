<?php
/**
 * This file is part of Joomla Estate Agency - Joomla! extension for real estate agency
 *
 * @version     $Id: script.php 257 2012-02-05 23:04:04Z ilhooq $
 * @package		Jea
 * @copyright	Copyright (C) 2008 PHILIP Sylvain. All rights reserved.
 * @license		GNU/GPL, see LICENSE.txt
 * Joomla Estate Agency is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses.
 *
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.folder');
/**
 * Install Script file of JEA component
 */
class plgJeaMfInstallerScript
{
    /**
     * method to install the extension
     *
     * @return void
     */
    function install($parent)
    {

    }

    /**
     * method to uninstall the extension
     *
     * @return void
     */
    function uninstall($parent)
    {

    }

    /**
     * method to update the extension
     *
     * @return void
     */
    function update($parent)
    {

    }

    /**
     * method to run before an install/update/uninstall method
     *
     * @return void
     */
    function preflight($type, $parent)
    {
        $db = JFactory::getDbo();
        $db->setQuery('SHOW COLUMNS FROM #__jea_properties');
        $cols = $db->loadObjectList('Field');
        if(!isset($cols['mf_field1']) && !isset($cols['mf_field2'])){
            $query = 'ALTER TABLE `#__jea_properties` '
            . "ADD `mf_field1` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,"
            . "ADD `mf_field2` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL";

            $db->setQuery($query);
            $db->query();
        } 
    }

    /**
     * method to run after an install/update/uninstall method
     *
     * @return void
     */
    function postflight($type, $parent)
    {

    }
}


