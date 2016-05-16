<?php
/**
 * Plugin Name: TIVWP FB Widgets
 * Description: Widgets for Facebook Social Plugins.
 * Version: 1.0.0
 * Author: TIV.NET INC.
 * Author URI: http://www.tiv.net
 * Text domain: tivwp-fb-widgets
 * Domain Path: /languages
 * License: GPLv3
 */

/** @noinspection dirnameCallOnFileConstantInspection */
require_once dirname( __FILE__ ) . '/includes/class-fb-page.php';

global $TIVWP_FB_Widget_Page;
$TIVWP_FB_Widget_Page = new TIVWP_FB_Widget_Page();

/* EOF */
