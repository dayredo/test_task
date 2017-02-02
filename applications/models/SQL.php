<?php
	

	Interface iSQL {
		function query();
	}

	Class SQL implements iSQL {

		public $type;
		public $table;
		public $list_item;
		public $data;
		public $param;
		public $result;
		public $query;

		function __construct( $type, $table, $list_item = array(), $data = null, $param = array(), $result = null ) {
			mysql_connect( HOST_DB, USER_DB, PASSWORD_DB ) or die( '![ Invalid connect db, call to system administrator ]' );
			mysql_select_db( NAME_DB) or die( '<br> ![ Not Found Data Base, call system administrator ]' );
			mysql_query("Charset '" . CHARSET_DB . "'");
			$this->type = $type;
			$this->table = $table;
			$this->list_item = $list_item;
			$this->data = $data;
			$this->param = $param;
			$this->result = $result;
			$this->checkType();
		}

		function checkType() {
			switch ( $this->type ):
				case 'select':
					$this->select();
					break;
				case 'insert':
					$this->insert();
					break;
				case 'delete':
					$this->delete();
					break;		
				default:
					die('Failed type!');
					break;
			endswitch;
		}

		function pattern() {
			$data = array(
				'select' => array(
					'where' => ' FROM ' . $this->table,
					'where_current' => ' FROM ' . $this->table . ' WHERE ' . $this->param[ 'where_current' ],
					'limit' => ' LIMIT ' . $this->param[ 'limit' ],
					'order' => ' ORDER BY ' . $this->param[ 'order' ],
					'order_desc' => ' ORDER BY ' . $this->param[ 'order_desc' ] . ' DESC'
				),
				'insert' => array(
					'set' => ' INTO ' . $this->table . ' SET '
				),
				'update' => array(

				),
				'delete' => array(
					'where_current' => ' FROM ' . $this->table . ' WHERE ' . $this->param[ 'where_current' ],
				)
			);
			return $data[ $this->type ];

		}

		function checkList() {

			if( !empty($this->list_item) and isset( $this->list_item ) ):
				if( gettype( $this->list_item ) == 'array' ):
					foreach( $this->list_item as $key => $value ):
						if( $key != count( $this->list_item ) -1 ):
							$result .= $value;
							$result .= ', ';
						else:
							$result .= $value;
						endif;
					endforeach;
				endif;
			else:
				$result = '*';
			endif;
			return $result;

		}

		function checkData() {	
			$i = 0;
			if( !empty($this->data) and isset( $this->data ) ):
				if( gettype( $this->data ) == 'array' ):
					foreach( $this->data as $key => $value ):

						if( $i++ != count( $this->data ) -1 ):
							$result .=  " " . $key .  " = '" . $value . "'";
							$result .= ', ';
						else:
							$result .= " " . $key .  " = '" . $value . "'";
						endif;
					endforeach;
				endif;
			endif;
			return $result;
		}

		function checkParams() {
			$pattern = $this->pattern();
			$param = $this->param;
				foreach( $param as $key => $value ):
					$result .= $pattern[$key] . ' ';
				endforeach;
			return $result;
		}

		function select() {
			$this->query();
		}

		function insert() {
			$this->query();
		}

		function delete() {
			$this->query();
		}

		function query() {
			switch ( $this->type ):
				case 'select':
					$build_query = "" . strtoupper( $this->type ) . " " . $this->checkList() . $this->checkParams() . "";
					break;
				case 'insert':
					$build_query = "" . strtoupper( $this->type ) . " " . $this->checkParams() . $this->checkData() . "";
					break;
				case 'delete':
					$build_query = "" . strtoupper( $this->type ) . " "  . $this->checkParams() . "";
					break;
				default:
					die('Failed type!');
					break;
			endswitch;

			$query = mysql_query( $build_query ) or die( mysql_error() );
			$this->viewResult( $query );
		}

		function viewResult( $query ) {
			$res = array();
			if( $this->result != false ):
				while( $result = mysql_fetch_assoc( $query ) ):
					$res[] = $result;
				endwhile;
			else:
				$result = false;
			endif;
			switch ( $this->result ):
				case 'fetch_array':
					$result = mysql_fetch_array( $query );
					break;
				case 'fetch_assoc':
					$result = mysql_fetch_assoc( $query );
					break;
				case 'num_rows':
					$result = mysql_num_rows( $query );
				default:
					$result = false;
					break;
			endswitch;
			$this->query = $res;			
		}

		function __destruct() {
			mysql_close();
		}

	}