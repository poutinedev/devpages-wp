<?php

/**
 * @package poutine-static-pages
 * @version 0.1
 */

/*
	Plugin Name: Dev/Static Pages for WP
	Plugin URI: https://poutine.dev
	Description: Have you ever needed to spin up a quick wordpress template, and had to go to the Admin panel just to create the page/post to tie into? No longer!
	Author: Poutine / Chris Lagasse
	Version: 0.1
	Author URI: https://poutine.dev
*/

require_once('vendor/autoload.php');

define( 'POUTINEDEVPAGES__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( POUTINEDEVPAGES__PLUGIN_DIR . "/vendor/autoload.php" );

add_action('init', 'poutine_staticpage_setup');
function poutine_staticpage_setup()
{
	$handler = Poutine\DevPagesWP\Manager::init();
	$handler->register();
}

function register_page($url, $args = [])
{
	$handler = Poutine\DevPagesWP\Manager::init();
	$handler->add($url, $args);
}