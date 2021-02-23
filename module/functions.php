<?php
// Let’s instantiate this class in our functions.php file:

if( is_admin() ) {
	require 'simple_settings_page.php';
	new simple_settings_page();
}