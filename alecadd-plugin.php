<?php

/**
 * Alecadd-plugin
 *
 * @package           PluginPackage
 * @author            ajidk
 * @copyright         2021 ajidk company
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Wollow
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            ajidk
 * Author URI:        https://example.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined('ABSPATH') or die('hey, you cant accesss this file you silly human!');

function register_wollow_submenu()
{
    add_submenu_page('woocommerce', 'Wollow', 'Wollow', 'manage_options', 'wollow', 'wollow_submenu');
}

if (!empty($_POST)) {
    if (!empty($_POST['wollow']) and $_POST['wollow'] == 'Satu') {
        $wollowSatu = stripslashes(strip_tags(htmlspecialchars($_POST['wollowSatu'], ENT_QUOTES)));
        update_option('wollow_Satu', $wollowSatu);
    }elseif(!empty($_POST['wollow']) and $_POST['wollow'] == 'Dua'){
        $wollowDua = stripslashes(strip_tags(htmlspecialchars($_POST['wollowDua'], ENT_QUOTES)));
        update_option('wollow_Dua', $wollowDua);
    }elseif(!empty($_POST['wollow']) and $_POST['wollow'] == 'Tiga'){
        $wollowTiga = stripslashes(strip_tags(htmlspecialchars($_POST['wollowTiga'], ENT_QUOTES)));
        update_option('wollow_Tiga', $wollowTiga);
    }elseif(!empty($_POST['wollow']) and $_POST['wollow'] == 'Empat'){
        $wollowEmpat = stripslashes(strip_tags(htmlspecialchars($_POST['wollowEmpat'], ENT_QUOTES)));
        update_option('wollow_Empat', $wollowEmpat);
    }elseif(!empty($_POST['wollow']) and $_POST['wollow'] == 'Lima'){
        $wollowLima = stripslashes(strip_tags(htmlspecialchars($_POST['wollowLima'], ENT_QUOTES)));
        update_option('wollow_Lima', $wollowLima);
    }elseif(!empty($_POST['wollow']) and $_POST['wollow'] == 'Enam'){
        $wollowEnam = stripslashes(strip_tags(htmlspecialchars($_POST['wollowEnam'], ENT_QUOTES)));
        update_option('wollow_Enam', $wollowEnam);
    }elseif(!empty($_POST['wollow']) and $_POST['wollow'] == 'Tujuh'){
        $wollowTujuh = stripslashes(strip_tags(htmlspecialchars($_POST['wollowTujuh'], ENT_QUOTES)));
        update_option('wollow_Tujuh', $wollowTujuh);
    }
}

include 'module/wollow/wollow_submenu.php';

include 'module/output_settings_page.php';




add_action('admin_menu', 'register_wollow_submenu', 99);


// order woocommerce
add_filter('manage_edit-shop_order_columns', 'custom_shop_order_column', 20);
function custom_shop_order_column($columns)
{
    $reordered_columns = array();

    foreach ($columns as $key => $column) {
        $reordered_columns[$key] = $column;
        if ($key ==  'order_status') {
            $reordered_columns['wollow-1'] = __('Whatapp', 'theme_domain');
        }
    }
    return $reordered_columns;
}

add_action('manage_shop_order_posts_custom_column', 'custom_orders_list_column_content', 20, 2);
function custom_orders_list_column_content($column, $post_id)
{
    switch ($column) {
        case 'wollow-1':
            $my_var_one = get_post_meta($post_id, 'wollow-1', true);
            if (!empty($my_var_one))
                echo $my_var_one;
            else
                echo '<small>(<em>no value</em>)</small>';

            break;
    }
}
