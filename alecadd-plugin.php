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
 * Plugin Name:       Alecadd Plugin
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

class AlecaddPlugin
{
    // public
    // can be accessed everywhere

    // protected
    // can be accessed only within the class itself or extension
    
    // private
    // can be accessed only within the class itself

    function __construct()
    {
        $this->create_post_type();
    }
    
    function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    
    protected function create_post_type()
    {
        add_action('init', [$this, 'custom_post_type']);
    }

    function activate()
    {
        // generate a CPT
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate()
    {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    // function uninstall()
    // {
    //     // delete CPT
    //     // delete all the plugin data from the db
    // }

    function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }

    function enqueue()
    {
        // enqueue all our scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/css/style.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/js/main.js', __FILE__));
    }
}

if (class_exists('AlecaddPlugin')) {
    $alecaddPlugin = new AlecaddPlugin();
    $alecaddPlugin->register();
}

// activation 
register_activation_hook(__FILE__, array($alecaddPlugin, 'activate'));

// add_action( 'init', 'function_name');

// deactivation
register_deactivation_hook(__FILE__, array($alecaddPlugin, 'deactivate'));   

// uninstall
// register_uninstall_hook( __FILE__, array($alecaddPlugin, 'uninstall') );