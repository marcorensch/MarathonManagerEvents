<?php
/**
 * @package    mod_mmanager_events
 *
 * @author     proximate <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined('_JEXEC') or die;
?>

<?php if($params->get('link_items',0)):?>
    <a class="uk-position-cover" href="<?php echo JRoute::_(nxmarathonmanagerHelperRoute::getEventinfoRoute($event->id));?>"></a>
<?php endif;?>