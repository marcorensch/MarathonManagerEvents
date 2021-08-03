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

<?php if($event):?>
    <div>
        <div class="uk-card uk-card-default <?php echo $hover;?> uk-card-small uk-position-relative">
            <div class="uk-card-media-top uk-height-small">
                <img src="<?php echo $event->headerimg;?>" alt="<?php echo $event->name;?>">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title"><?php echo $event->name;?></h3>
            </div>
            <?php include __DIR__ . '/widgets/itemlink.php';?>
        </div>
    </div>
<?php endif; ?>
