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

// Access to module parameters
$divider = ($params->get('list_divider',0)) ? 'uk-grid-divider' : '';
$hover = ($params->get('link_items',0)) ? 'uk-card-hover' : '';
//Grid cols
$cols = 'uk-child-width-' . $params->get('elements_cols','1-1');
$cols_s = ($params->get('elements_cols_s','inherit') == 'inherit') ? $cols : 'uk-child-width-'.$params->get('elements_cols_s','1-1').'@s';
$cols_m = ($params->get('elements_cols_m','inherit') == 'inherit') ? $cols_s : 'uk-child-width-'.$params->get('elements_cols_m','1-2').'@m';
$cols_l = ($params->get('elements_cols_l','inherit') == 'inherit') ? $cols_m : 'uk-child-width-'.$params->get('elements_cols_l','1-3').'@l';

$columns = $cols . ' ' . $cols_s . ' ' . $cols_m . ' ' . $cols_l . ' ';
?>
<?php if(is_array($events)):?>
    <div class=" <?php echo $columns . $divider;?> uk-grid-small" uk-grid uk-scrollspy="target:div.uk-card; cls:uk-animation-scale-up; delay:150;">
    <?php foreach ($events as $event){
        include __DIR__ . '/layouts/' . $params->get('elements_layout','card') . '.php';
    } ?>
    </div>
<?php endif; ?>
