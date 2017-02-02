<?php

	Class View {
	
		function GUI( $content, $template = null, $data = null ){
			
			empty( $template ) ? $template = 'template.php' : $template;
			// self::error( $content ) == false ? $content = 'error.php' : $content;
			include_once 'applications' . DIRSEP . 'views' . DIRSEP . $template;
			return $data;
			
		}
		
	}