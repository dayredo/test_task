<?php

	Class Controller_index Extends Controller {

		function index() {

			$sort = $_GET[ 'sort' ];
			switch( $sort ):
				case 'by_id_asc':
					$query = new SQL( 'select', 'prices', '', '', array( 'where' => '', 'order' => 'id' ), 'fetch_assoc' );
					break;
				case 'by_id_desc':
					$query = new SQL( 'select', 'prices', '', '', array( 'where' => '', 'order_desc' => 'id' ), 'fetch_assoc' );
					break;
				case 'by_name_asc':
					$query = new SQL( 'select', 'prices', '', '', array( 'where' => '', 'order' => 'name' ), 'fetch_assoc' );
					break;
				case 'by_name_desc':
					$query = new SQL( 'select', 'prices', '', '', array( 'where' => '', 'order_desc' => 'name' ), 'fetch_assoc' );
					break;
				case 'by_date_asc':
					$query = new SQL( 'select', 'prices', '', '', array( 'where' => '', 'order' => 'date_create' ), 'fetch_assoc' );
					break;
				case 'by_date_desc':
					$query = new SQL( 'select', 'prices', '', '', array( 'where' => '', 'order_desc' => 'date_create' ), 'fetch_assoc' );
					break;
				default:
					$query = new SQL( 'select', 'prices', '', '', array( 'where' => '', 'order' => 'name' ), 'fetch_assoc' );
					break;
			endswitch;

			if( isset( $_POST[ 'file' ] ) ):
				$var = new Upload( $_POST[ 'file' ], 'delete'  );
			endif;

			
			$data = $query->query;
			View::GUI( 'home.php', 'template.php' , $data );
		}

	}