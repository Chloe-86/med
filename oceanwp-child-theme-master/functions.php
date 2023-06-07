<?php

/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style()
{
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme('OceanWP');
	$version = $theme->get('Version');
	// Load the stylesheet
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('oceanwp-style'), $version);
}
add_action('wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style');

function enqueue_custom_script() {
	// Enregistrer le script
	wp_register_script('custom-script', get_stylesheet_directory_uri() . '/scripts/script.js', array('jquery'), '1.0', true);
  
	// Ajouter le script à la file d'attente
	wp_enqueue_script('custom-script');
  }
  add_action('wp_enqueue_scripts', 'enqueue_custom_script');
  


function contact_btn($items, $args)
{
	$items .= '<a href="/contact" class="contact-btn">Nous contacter</a>';
	return $items;
}



add_filter('wp_nav_menu', 'contact_btn', 10, 2);



/**
 * Shortcode pour ajouter un bouton
 */
function contact_short_btn()
{

	// Code du bouton
	$string .= '<a href="/contact" class="contact-btn">Nous contacter</a>';

	// On retourne le code
	return $string;
}
// On publie le shortcode
add_shortcode('contact', 'contact_short_btn');
