<?php
/**
 *
 * @package		Joomla
 * @subpackage	JEA
 * @copyright	Copyright (C) 2011 PHILIP Sylvain. All rights reserved.
 * @license		GNU/GPL, see LICENSE.txt
 * Joomla Estate Agency is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses.
 *
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');

/**
 * More Fields - JEA Plugin
 *
 * @package		Joomla
 * @subpackage	JEA
 * @since 		1.5
 */
class plgJeaMf extends JPlugin
{

    /**
     * Constructor
     *
     * For php4 compatability we must not use the __constructor as a constructor for plugins
     * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
     * This causes problems with cross-referencing necessary for the observer design pattern.
     *
     * @param object $subject The object to observe
     * @param object $params  The object that holds the plugin parameters
     * @since 1.5
     */
    public function plgJeaMf( &$subject, $params )
    {
        parent::__construct( $subject, $params );
		$this->loadLanguage();
    }


    /**
     * onBeforeSaveProperty method
     *
     * Called before $row property save.
     *
     * @param string $namespace
     * @param TableProperties $row
     * @param boolean $is_new
     * @return boolean
     */
    public function onBeforeSaveProperty($namespace, &$row, $is_new)
    {
    $row->mf_field1 = JRequest::getVar( 'mf_field1', '');
    $row->mf_field2 = JRequest::getVar( 'mf_field2', '');
    return true;
	}

    /**
     * onAfterSaveProperty method
     *
     * Called after $row property save.
     *
     * @param string $namespace
     * @param TableProperties $row
     * @param boolean $is_new
     * @return void
     */
    function onAfterSaveProperty($namespace, &$row, $is_new)
    {

    }

    /**
     * onAfterLoadPropertyForm method
     *
     * Called after load the property form.
     *
     * @param JForm $form
     * @return void
     */
    function onAfterLoadPropertyForm(&$form)
    {

    }

    /**
     * onAfterStartPanels method (Called in the admin property form)
     *
     * @param TableProperties $row
     * @return void
     */
    function onAfterStartPanels(&$row)
    {

    }

    /**
     * onBeforeEndPane method (Called in the admin property form)
     *
     * @param TableProperties $row
     * @return void
     */
    public function onBeforeEndPanels(&$row)
    {
		if ($row->mf_field1 === null) {
            $row->mf_field1 = '-1';
        }

        if ($row->mf_field2 === null) {
            $row->mf_field2 = '-1';
        }
		
	$gesLabel1 = JText::_('PLG_JEA_MF_FIELD1');
	$gesLabel2 = JText::_('PLG_JEA_MF_FIELD2');
    $gesDesc1  = $gesLabel1 .'::'. JText::_('PLG_JEA_MF_FIELD1_DESC');
	$gesDesc2  = $gesLabel2 .'::'. JText::_('PLG_JEA_MF_FIELD2_DESC');
	
    $html ='
    <fieldset class="panelform">
      <ul class="adminformlist">
        <li>
			<label for="mf_field1" class="hasTip" title="' . $gesDesc1.'">' . $gesLabel1 .' : </label>
			<input type="text" name="mf_field1" id="mf_field1" value="'.$row->mf_field1.'" size="255" />
        </li>
        <li>
			<label for="mf_field2" class="hasTip" title="' . $gesDesc2.'">' . $gesLabel2 .' : </label>
			<input type="text" name="mf_field2" id="mf_field2" value="'.$row->mf_field2.'" size="255" />
        </li>
      </ul>
    </fieldset>';

    echo JHtml::_('sliders.panel', 'My custom fields', 'my-custom-pane');
    echo $html;
	}

    /**
     * onBeforeSearch method (Called before query properties list in frontend)
     *
     * @param JDatabaseQueryElement $query
     * @param JObject $Modelstate
     *
     * @return void
     */
    function onBeforeSearch(&$query, &$Modelstate)
    {

    }

    /**
     * onBeforeShowDescription method
     * Called in the defaul.php property layout
     *
     * @param stdClass $row
     */
    public function onBeforeShowDescription(&$row)
    {
    echo '<h3>'. JText::_('PLG_JEA_MF_DESC_FR') .'</h3>'. PHP_EOL;
    echo '<p>'. JText::_('PLG_JEA_MF_FIELD1_FR') .($row->mf_field1) .'</p>'. PHP_EOL;
    echo '<p>'. JText::_('PLG_JEA_MF_FIELD2_FR') .($row->mf_field2) .'</p>'. PHP_EOL;
    }

    /**
     * onAfterShowDescription method
     * Called in the defaul.php property layout
     *
     * @param stdClass $row
     */
    function onAfterShowDescription(&$row)
    {

	}

    /**
     * onBeforeSendContactForm method
     *
     * Called before emailing the contact form
     *
     * @param array $data
     * @return boolean true on success or false
     */
    function onBeforeSendContactForm($data)
    {
        return true;
    }


}