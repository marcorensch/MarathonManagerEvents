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

use Joomla\CMS\Factory;
$document = Factory::getDocument();
$document->addStyleSheet(JURI::base()  . 'modules/mod_mmanager_events/tmpl/layouts/assets/css/circles_main.css');

?>

<?php if($event):?>
    <div>
        <div class="uk-card <?php echo $hover;?> uk-padding-small uk-position-relative">
            <div class="uk-child-width-expand uk-grid-medium uk-flex uk-flex-middle nx-event-element">
                <div class="uk-width-1-2">
                    <div class="nx-event-image-container">
                        <div class="uk-position-cover">
                            <div class="uk-border-circle uk-overflow-hidden nx-event-image-background">
                                <div class="uk-cover-container uk-border-circle uk-width-1-1 uk-height-1-1">
                                    <img uk-cover src="<?php echo $event->headerimg;?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="uk-padding-small">
                        <h3 class="uk-h4 uk-margin-remove-bottom nx-animate" style="color:#111"><?php echo $event->name;?></h3>
                        <div class="uk-text-meta uk-text-small nx-animate"> <?php echo $event->eventdate;?> </div>
                    </div>
                </div>
            </div>
            <?php include __DIR__ . '/widgets/itemlink.php';?>
        </div>
    </div>
<?php endif; ?>
