<?php 

	Class Upload Extends SQL {

		public $file;
		public $type;
		public $tmp;

		function __construct( $params, $flag ) {
			if( gettype( $params ) == 'array' ):
				$this->file = $params[0];
				$this->type = $params[1];
				$this->tmp = $params[2];
			else:
				$this->file = $params;
			endif;

			$this->checkFlag( $flag );
		}

		function checkFlag( $flag ) {
			switch( $flag ):
				case 'write':
					$this->checkFile();
					break;
				case 'delete':
					$this->deleteFile();
					break;
				case 'read':
					break;
				default:
					die( 'Invalid flag' );
			endswitch;
		}

		function checkFile() {
			$dir = sPath . 'uploads/';
			if( !file_exists( $dir . $this->file ) ) $this->uploadFile();
		}

		function checkFileType() {
			if( $this->type == 'text/plain') return true;
		}

		function checkFileName() {
			$pos = strpos($this->file, 'prices');
			if( $pos !== false ) return true;
		}

		function uploadFile() {
			if( $this->checkFileType() == true): 
				if( $this->checkFileName() == true ):
				$uploadfile = "uploads/" . $this->file;
 				move_uploaded_file($this->tmp, $uploadfile);
 				$this->registrFile();
 				chmod( sPath . 'uploads/' . $this->file, 0777 ); 
 				header( 'Location: /test_task', true, 307 );
 				else:
 					echo 'Failed name';
 				endif;
 			else:
 				echo 'Failed type';
			endif;
		}

		function registrFile() {
			$query = new SQL( 'insert', 'prices', '', array( 'name' => $this->file, 'date_create' => date( 'd.m.Y H.i' ) ), array( 'set' => '' ) );
			unset( $query );
		}

		function deleteFile() {
			$dir = './uploads/';
			if( file_exists( $dir . $this->file ) ):
				unlink( $dir . $this->file );
				$id = new SQL( 'delete', 'prices', '', '', array( 'where_current' => " name = '" . $this->file . "'" ) );
				header( 'Location: /test_task', true, 307 );
			endif;
			unset( $id );

		}

	}