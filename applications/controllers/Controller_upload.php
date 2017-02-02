<?php

	Class Controller_upload Extends Controller {

		function index() {
			if( isset($_FILES['price']['name']) ):
				$var = new Upload( array($_FILES['price']['name'], $_FILES['price']['type'], $_FILES['price']['tmp_name']), 'write'  );
			endif;
			View::GUI( 'upload.php' );
		}

	}