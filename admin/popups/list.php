<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* List of Popups
		*
		* @package     Lead_Generation
		* @subpackage  Popups
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	require_once 'class-list-table.php';	
	$list_table = new LG_List_Table( $data, $toolpage, $shortcode );
	$list_table->prepare_items();
?>	 
<div class="wrap">		
	<form method="post">		
		<?php			
			$list_table->search_box( __( 'Search', 'leadgeneration' ), $toolpage );
			$list_table->display();
		?>		
		<input type="hidden" name="page" value="<?php echo sanitize_text_field( $_REQUEST['page'] ); ?>" />			
	</form>
</div>
