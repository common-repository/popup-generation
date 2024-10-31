<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Popups page
		*
		* @package     Lead_Generation
		* @subpackage  Popups
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	require_once POPUP_GENERATION_PLUGIN_DIR . 'admin/tools-data-base.php';
	$shortcode = 'Popup';
	$toolpage = 'popupgeneration-popups';
	
	$current_tab = ( isset( $_REQUEST["tab"] ) ) ? sanitize_text_field( $_REQUEST["tab"] ) : 'list';
	
	$tabs = array(
		'list'    => __( 'List', 'popupgeneration' ), 	
		'add_new' => __( 'Add new', 'popupgeneration' ),
		'extensions' => __( 'Extensions', 'popupgeneration' ),
		'support' => __( 'Support', 'popupgeneration' ),
	);
	
?>
<style>
	.nav-tab-wrapper {
		margin-bottom: 20px;
	}
	.wrap .nav-tab-wrapper .page-title-action {
    top: 4px;
    margin-left: 5px;
	}
	.lg-inform {
		margin: 10px 0;
	}
</style>

<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e( 'Popups', 'popupgeneration' ); ?></h1>
	<a href="?page=<?php echo $toolpage; ?>&tab=add_new" class="page-title-action"><?php _e( 'Add New', 'popupgeneration' ); ?></a> <a href="https://www.facebook.com/wowaffect/" class="page-title-action lg-facebook"  target="_blank">Stay in touch</a> <a href="<?php echo admin_url('admin.php?page=popupgeneration&tab=subscribe'); ?>" class="page-title-action lg-email">Start saving time</a>
	<hr class="wp-header-end">
	<div class="lg-inform">
		<span class="dashicons dashicons-megaphone" style="color:#e95645"></span> 
		<?php
		/* translators: %s is url to Customizer */
		printf( 'You can try to use a complete set of the most feature-rich tools for the marketing with the WordPress plugin <a href="%s" targt="_blank">' . esc_attr__( 'Lead Generation', 'popupgeneration' ) . '</a> ', esc_url( 'https://wordpress.org/plugins/leadgeneration/' ) ); ?>
	</div>
	<?php
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $tabs as $tab => $name ) {
			$class = ( $tab === $current_tab ) ? ' nav-tab-active' : '';
			if ( $tab == 'add_new' ) {
				$action = ( isset( $_REQUEST["act"] ) ) ? sanitize_text_field( $_REQUEST["act"] ) : '';
				if ( !empty( $action ) && $action == 'update' ) {
					echo '<a class="nav-tab' .esc_attr( $class ) . '" href="?page=' . $toolpage . '&tab=' . esc_attr( $tab ) . '">' . __( 'Update', 'popupgeneration' ) . ' #' . absint( $_REQUEST["id"] ) . '</a>';
				}
				else {
					echo '<a class="nav-tab' .esc_attr( $class ) . '" href="?page=' . $toolpage . '&tab=' . esc_attr( $tab ) . '">' . esc_attr( $name ) . '</a>';
				}
			}
			else {
				echo '<a class="nav-tab' .esc_attr( $class ) . '" href="?page=' . $toolpage . '&tab=' . esc_attr( $tab ) . '">' . esc_attr( $name ) . '</a>';
			}		
			
		}
		echo '</h2>';
		
		include_once ( $current_tab . '.php' );
		
	?>
</div>
