<?php
/*
Plugin Name: Beers I drank
Plugin URI: http://wordpress.org/extend/plugins/beers-i-drank/
Description: Use this widget to track what kind of beers you have drunk in your life. Provides a map where you can see which province of the country is your favourite beer province.
Tags: beer, beers, tracking, drinking
Author: Sven Sommerfeld
Version: 1.0.0
Author URI: http://svensommerfeld.wordpress.com/category/beers-i-drank/
**************************************************************************

Copyright (C) 2012 Sven Sommerfeld

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************/

//Includes
include_once 'Serializer.php';
include_once 'repository/IBeerRepository.php';
include_once 'repository/BeerRepository.php';
include_once 'htmlgen/HtmlGenerator.php';
include_once 'AdminPage.php';

add_action('init', 'beers_i_drank_init');

// Widget initialisieren, wenn Widget-Plugin aktiv
function beers_i_drank_init() {

	// 	load_plugin_textdomain('footballStandings', 'wp-content/plugins/football-standings/languages', 'football-standings/languages');

	if (!function_exists('register_sidebar_widget')){
		return;
	}
	// Widget im Admin-Panel hinzufügen - register_sidebar_widget($name, $callback)
// 	register_sidebar_widget('Beers I Drank', 'widget_sport_table');
	// Zusätzliche Argumente im Widget-Control - register_widget_control($name, $callback, $width , $height);
	// 	register_widget_control('Football standings', 'widget_control_sport_table', 200, 100);
}

// Add menu entry to the admin meny
add_action('admin_menu', 'beers_i_drank_admin_action');

function beers_i_drank_admin_action() {
	add_options_page('Beers I Drank Options', 'Beers I Drank', 8, __FILE__, 'beers_i_drank_options');
	return true;
}

function beers_i_drank_options() {
	if(!is_admin()){
		print "You are not allowed to post data!<br />";
	}
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	$adminPage = new AdminPage(new PHPBeerRepository());
	echo $adminPage->display();
}
?>