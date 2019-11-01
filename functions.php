<?php
/**
 * WordPress Theme functions
 *
 * @package WordPress
 */

defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' );

ob_start();
require 'package.json';
$npm_package = json_decode( ob_get_clean() );

define( 'THEME_TEXT_DOMAIN', $npm_package->name );

require_once 'includes/classes/class-wp-bootstrap-navwalker.php';
require_once 'includes/core.php';
require_once 'includes/woocommerce.php';
