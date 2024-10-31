<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Main settings
*
* @package     Lead_Generation
* @subpackage  Settings
* @copyright   Copyright (c) 2018, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/

	$popup_title = array(
	'id'   => 'popup_title',
	'name' => 'popup_title',	
	'type' => 'checkbox',
	'val' => isset( $param['popup_title'] ) ? $param['popup_title'] : 0,	
	'func' => 'popup_title',
	);
	
	$content = array(
	'id'   => 'content',
	'name' => 'content',	
	'type' => 'editor',
	'val' => isset( $param['content'] ) ? $param['content'] : '',	
	);
	
	// Show on specific content 

$tax_args = array(
	'public'   => true,
	'_builtin' => false
);
$output = 'names';
$operator = 'and';	
$taxonomies = get_taxonomies( $tax_args, $output, $operator );

$show_option = array (
	'all' => __('All posts and pages', 'leadgeneration'),
	'onlypost' => __('All posts', 'leadgeneration'),
	'onlypage' => __('All pages', 'leadgeneration'),
	'posts' => __('Posts with certain IDs', 'leadgeneration'),
	'pages' => __('Pages with certain IDs', 'leadgeneration'),
	'postsincat' => __('Posts in Categorys with IDs', 'leadgeneration'),
	'expost' => __('All posts. except...', 'leadgeneration'),
	'expage' => __('All pages, except...', 'leadgeneration'),
	'shortcode' => __('Where shortcode is inserted', 'leadgeneration'),
);
if( $taxonomies ){ 
	$show_option['taxonomy'] = __('Taxonomy', 'leadgeneration');
}

$show = array(
	'id'   => 'show',
	'name' => 'show',	
	'type' => 'select',
	'val' => isset( $param['show'] ) ? $param['show'] : 'all',	
	'option' => $show_option,
	'func' => 'show_option',
	'sep' => '<p/>',
);

$show_help = array (
	'text' => __('Choose a condition to target to specific content.', 'leadgeneration'),
);

// Taxonomy
$taxonomy_option = array();
if( $taxonomies ){
	foreach( $taxonomies as $taxonomy ){
		$taxonomy_option[$taxonomy] = $taxonomy;	
	}
}

$taxonomy_select = array (
	'id'   => 'taxonomy_select',
	'name' => 'taxonomy_select',	
	'type' => 'select',
	'val' => isset( $param['taxonomy_select'] ) ? $param['taxonomy_select'] : '',	
	'option' => $taxonomy_option,
	'sep' => '<p/>',
);

// Content ID'sa
$show_id = array (
	'id'   => 'show_id',
	'name' => 'show_id',	
	'type' => 'text',
	'val' => isset( $param['show_id'] ) ? $param['show_id'] : '',	
	'option' => array(
		'placeholder' => __('Enter IDs, separated by comma.', 'leadgeneration'),
	),
	'sep' => '<p/>',
);

