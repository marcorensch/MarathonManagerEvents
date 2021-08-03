<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_mmanager_events
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;




use Joomla\CMS\Factory;
use Joomla\CMS\Date\Date;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;


/*
JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');
JLoader::register('ContentHelperRoute', JPATH_SITE . '/components/com_content/helpers/route.php');
JLoader::register('ContactHelperRoute', JPATH_SITE . '/components/com_contact/helpers/route.php');
JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_content/models', 'ContentModel');
JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_contact/models', 'ContactModel');

use Joomla\Utilities\ArrayHelper;
*/

class ModNxMarathonManagerEventsHelper{

    public static function getEvents($params){
        $srtfield = $params->get('sorting_field','ordering');
        $srtgdir = $params->get('sorting_dir','desc');
        $filter_time = $params->get('filter_time','all');
        try{
            $db = JFactory::getDbo();

            $query = $db->getQuery(true);

            $query->select($db->quoteName(array('id','name', 'eventdate', 'headerimg', 'ordering')));
            $query->from($db->quoteName('#__nxmarathonmanager_event'));
            $query->where($db->quoteName('published') . ' = ' . $db->quote('1'));
            if($filter_time !== 'all'){
                $now = new Date('now');
                if($filter_time === 'future'){
                    $operator = '>';
                }else{
                    $operator = '<';
                }
                $query->where($db->quoteName('eventdate') . $operator . $db->quote($now));
            }
            $query->order($srtfield . ' ' .  $srtgdir);

            $db->setQuery($query);

            //var_dump($query->dump());

            $results = $db->loadObjectList();

            // Bring the date in form
            foreach ($results as $result){
                $result->eventdate = HtmlHelper::date($result->eventdate, Text::_('DATE_FORMAT_FILTER_DATE'));
            }

            return $results;

        } catch (Exception $e){
            $db->transactionRollback();
            JFactory::getApplication()->enqueueMessage( JText::_('MOD_MMANAGER_EVENTS') .'<br>'.  $e->getMessage(), 'error');
        }
    }

}