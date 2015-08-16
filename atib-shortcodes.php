<?php
/*
Plugin Name: ATIB Shortcodes
Plugin URI: https://github.com/fnlive/atib-shortcodes
Description: Shortcodes for "Annika och Torkel i Berg" webbplats.
Version: 0.0.1
Author: Fredrik Nilsson
Author URI: https://github.com/fnlive
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: atib-shortcodes

ATIB Shortcodes is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
ATIB Shortcodes is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


function atib_list_categories() {
	$args = array( 
	'orderby'    => 'id',
	'order'      => 'ASC',
	'hide_empty' => 0, 
	);
	$categories = get_categories( $args );
	foreach( $categories as $category ) {
		$out .=  '<div style="float: left; width:100%;">' . "\n";
		$out .=  '  <div style="float: left; width: 35%;"><p><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p></div> ' . "\n";
		$out .=  '  <div style="float: left; width: 45%;"><p>' . $category->description . '</p></div>' . "\n";
		$out .=  '  <div style="float: left; width: 10%; height: 100%; text-align: right;"><p>('. $category->count . ')</p></div>' . "\n";
		$out .=  '</div>' . "\n";
	}
	return $out;
}

add_shortcode( 'atiblistcategories', 'atib_list_categories' );


function atib_list_categories_simple() {
	$list = wp_list_categories( "echo=0&orderby=name&show_count=1&hide_empty=0&title_li=" );
	return $list;
}

add_shortcode( 'atiblistcategoriessimple', 'atib_list_categories_simple' );

function atib_list_tags_simple() {
	$list = wp_tag_cloud( 'echo=0&number=0&format=flat&order=ASC&orderby=name' );
	return $list;
}

add_shortcode( 'atiblisttagssimple', 'atib_list_tags_simple' );

function atib_list_monthly_archive() {
	$list = wp_get_archives( 'echo=0&type=monthly&format=html' );
	return $list;
}

add_shortcode( 'atiblistmonthlyarchive', 'atib_list_monthly_archive' );
