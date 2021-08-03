<?php
/**
 * @package    mod_mmanager_events
 *
 * @author     proximate <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

use Joomla\CMS\Helper\ModuleHelper;

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

// Include Components Router
require_once JPATH_ROOT . '/components/com_nxmarathonmanager/helpers/route.php';

$events = ModNxMarathonManagerEventsHelper::getEvents($params);

// The below line is no longer used in Joomla 4
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require ModuleHelper::getLayoutPath('mod_mmanager_events', $params->get('layout', 'default'));
