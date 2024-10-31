<?php if ( ! defined( 'ABSPATH' ) ) exit;
	
	// WP_List_Table is not loaded automatically so we need to load it in our application
	if( ! class_exists( 'WP_List_Table' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
	}
	/**
		* Create a new table class that will extend the WP_List_Table
	*/
	class LG_List_Table extends WP_List_Table{
		
		/**
			* Number of items per page
			*
			* @var int
			* @since 1.5
		*/
		public $per_page = 30;	
		
		private $data;
		private $toolpage;
		private $shortcode;
		
		public function __construct( $data, $toolpage, $shortcode) {	
			$this->data = $data;
			$this->toolpage = $toolpage;
			$this->shortcode = $shortcode;
			
			// Set parent defaults			
			parent::__construct( array(			
			'ajax'     => false,
			) );			
			$this->process_bulk_action();			
		}		
		
		public function search_box( $text, $input_id ) {
			$input_id = $input_id . '-search-input';			
			if ( ! empty( $_REQUEST['orderby'] ) )
			echo '<input type="hidden" name="orderby" value="' . esc_attr( $_REQUEST['orderby'] ) . '" />';
			if ( ! empty( $_REQUEST['order'] ) )
			echo '<input type="hidden" name="order" value="' . esc_attr( $_REQUEST['order'] ) . '" />';
		?>
		<p class="search-box">
			<label class="screen-reader-text" for="<?php echo $input_id ?>"><?php echo $text; ?>:</label>
			<input type="search" id="<?php echo $input_id ?>" name="s" value="<?php _admin_search_query(); ?>" />
			<?php submit_button( $text, 'button', false, false, array('ID' => 'search-submit') ); ?>
		</p>
		<?php
		}
		
		/**
			* Define what data to show on each column of the table
			*
			* @param  Array $item        Data
			* @param  String $column_name - Current column name
			*
			* @return Mixed
		*/
		public function column_default( $item, $column_name )
		{
			$value = $item[ $column_name ];			
			return $value;			
		}
		
		public function column_title( $item ) {		
			$title      = ! empty( $item['title'] ) ? $item['title'] : '<em>Untitle</em>';		
			$edit_url    = admin_url( '/admin.php?page='.$this->toolpage.'&tab=add_new&act=update&id=' . urlencode( $item['ID'] ) );
			$duplicate_url    = admin_url( '/admin.php?page='.$this->toolpage.'&tab=add_new&act=duplicate&id=' . urlencode( $item['ID'] ) );
			$delete_url    = admin_url( '/admin.php?page='.$this->toolpage.'&info=delete&did=' . urlencode( $item['ID'] ) ) ;			
			$actions     = array(
			'edit'   => '<a href="' . $edit_url . '">' . __( 'Edit', 'leadgeneration' ) . '</a>',
			'duplicate'   => '<a href="' . $duplicate_url . '" style="color:green;">' . __( 'Duplicate', 'leadgeneration' ) . '</a>',
			'delete'   => '<a href="' . $delete_url . '" style="color:red;">' . __( 'Delete', 'leadgeneration' ) . '</a>',
			);
			return '<a href="' . esc_url( $edit_url ) . '">' . $title . '</a>'  . $this->row_actions( $actions );					
		}
		
		
		/**
			* Override the parent columns method. Defines the columns to use in your listing table
			*
			* @return Array
		*/
		public function get_columns()
		{
			$columns = array(  
			'cb'    => '<input type="checkbox" />',
			'title'  => 'Title',
			'code'  => 'Shortcode',
			'view' => 'Views',
			'action' => 'Actions',
			'ñonversion' => 'Conversion',			
			);
			return $columns;
			
		}
		
		/**
			* Define the sortable columns
			*
			* @return Array
		*/
		public function get_sortable_columns()
		{
			return array(
			'ID'          => array( 'ID', false ),			
			);					
		}
		
		/**
			* Gets the name of the primary column.
			*
			* @since 1.0
			* @access protected
			*
			* @return string Name of the primary column.
		*/
		protected function get_primary_column_name() {
			return 'ID';
		}
		
		/**
			* Retrieves the search query string
			*
			* @access public
			* @since 1.0
			* @return mixed string If search is present, false otherwise
		*/
		public function get_search() {
			return ! empty( $_POST['s'] ) ? urldecode( trim( $_POST['s'] ) ) : false;
		}
		
		
		/**
			* Retrieve the current page number
			*
			* @access public
			* @since 1.5
			* @return int Current page number
		*/
		public function get_paged() {
			return isset( $_GET['paged'] ) ? absint( $_GET['paged'] ) : 1;
		}
		
		/**
			* Prepare the items for the table to process
			*
			* @return Void
		*/
		public function prepare_items()
		{
			$columns = $this->get_columns();
			$hidden = $this->get_hidden_columns();
			$sortable = $this->get_sortable_columns();		
			$data = $this->table_data();
			$perPage = 30;
			$currentPage = $this->get_pagenum();
			if ($data){
				usort( $data, array( &$this, 'sort_data' ) );
				$data = array_slice($data,(($currentPage-1)*$perPage),$perPage);				
			}
			$totalItems = $this->list_count();			
			$this->_column_headers = array($columns, $hidden, $sortable);
			$this->items = $data;
			$this->set_pagination_args( array(
			'total_items' => $totalItems,
			'per_page'    => $perPage,
			'total_pages' => ceil( $totalItems / $perPage ),
			) );
		}
		
		/**
			* Define which columns are hidden
			*
			* @return Array
		*/
		public function get_hidden_columns()
		{
			return array();
		}
		
		/**
			* Render the checkbox column
			*
			* @access public
			* @since 1.0
			* @param array $item Contains all the data for the checkbox column
			* @return string Displays a checkbox
		*/
		public function column_cb( $item ) {
			return sprintf(
			'<input type="checkbox" name="%1$s[]" value="%2$s" />',
			'ID',
			$item['ID']
			);
		}
		
		/**
			* Get the table data
			*
			* @return Array
		*/
		private function table_data()
		{
			global $wpdb;
			$data    = array();
			$paged   = $this->get_paged();
			$offset  = $this->per_page * ( $paged - 1 );
			$search  = $this->get_search();	
			
			$table = $this->data;		
			
			$tool = explode('-', $this->toolpage);
			
			if(!$search || empty($search)){
				$resultat = $wpdb->get_results("SELECT * FROM " . $table . " WHERE tool='" . $tool[1] . "' order by id desc");			
			}
			elseif(is_numeric( $search )) {
				$resultat = $wpdb->get_results("SELECT * FROM " . $table . " WHERE tool='" . $tool[1] . "' id=".$search);				
				}else{
				$resultat = $wpdb->get_results("SELECT * FROM " . $table . " WHERE tool='" . $tool[1] . "' title='".$search."' order by id desc");			
			}			
			
			
			
			if ($resultat) {				
				foreach ($resultat as $key => $value) {		
					$option_name_view = '_lg_tool_popup_view_counter_' . $value->id;
					$option_name_action = '_lg_tool_popup_action_counter_' . $value->id;
					$tool_view = get_option( $option_name_view, '0' );	
					$tool_action = get_option( $option_name_action, '0' );
					if ( !empty( $tool_view ) ) {
						$ñonversion = round( $tool_action/$tool_view*100, 2 ) . '%';
					}
					else {
						$ñonversion = '0%';
					}					
					$title = !empty( $value->title ) ? $value->title : '<em>' . __('Untitle Popup', 'leadgeneration')	. '</em>';
					$data[] = array(							
					'ID' => $value->id,	
					'title'  => '<a href="admin.php?page='.$this->toolpage.'&tab=add_new&act=update&id='.$value->id.'">'.$title.'</a>',
					'code'  => '['.$this->shortcode.' id="'.$value->id.'"]',					
					'view' => $tool_view,
					'action' => $tool_action,
					'ñonversion' => $ñonversion,				
					);				
				}	
			}
			return $data;	
		}
		
		public function list_count() {
			global $wpdb;
			$data = $this->data;
			$resultat = $wpdb->get_results("SELECT * FROM " . $data . " WHERE tool='popups' order by id asc");
			$count = count($resultat);			
			return $count;
		}
		
		/**
			* Allows you to sort the data by the variables set in the $_GET
			*
			* @return Mixed
		*/
		private function sort_data( $a, $b )
		{
			// If no sort, default to title
			$orderby = ( ! empty( $_GET['orderby'] ) ) ? sanitize_text_field( $_GET['orderby'] ) : 'ID';
			// If no order, default to asc
			$order = ( ! empty($_GET['order'] ) ) ? sanitize_text_field( $_GET['order'] ) : 'desc';
			// Determine sort order
			$result = strnatcmp( $a[$orderby], $b[$orderby] );
			// Send final sort direction to usort
			return ( $order === 'asc' ) ? $result : -$result;
						
		}	
		
		/**
			* Retrieve the bulk actions
			*
			* @access public
			* @since 1.4
			* @return array $actions Array of the bulk actions
		*/
		public function get_bulk_actions() {
			$actions = array(			
			'delete-items' => 'Delate',
			);
			
			return $actions;
		}
		
		/**
			* Process the bulk actions
			*
			* @access public
			* @since 1.4
			* @return void
		*/
		public function process_bulk_action() {
			$ids    = isset( $_POST['ID'] ) ? sanitize_text_field( $_POST['ID'] ) : false;
			$action = $this->current_action();			
			if ( ! is_array( $ids ) )
			$ids = array( $ids );			
			if( empty( $action ) )
			return;			
			global $wpdb;
			$table = $this->data;
			foreach ( $ids as $id ) {
				if ( 'delete-items' === $this->current_action() ) {					
					$wpdb->query("delete from " . $table . " where id=" . $id);														
				}
			}
			
		}
		
	}
