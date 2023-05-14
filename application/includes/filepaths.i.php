<?php
	// Starting the session for all pages only when admin is logged in
	ob_clean();
	session_start();
	//$_SESSION['admin'] = 0;		or		
	isset($_SESSION['admin']);

	//All the filepaths should be coming from the public folder
	define ('DS', DIRECTORY_SEPARATOR);
	
	define("APPLICATION_PATH" , '../application/'); // Correct the path
	define("VIEW_PATH" , '../application/views/'); // Create paths from only one folder
	define("MODEL_PATH" , '../application/models/');
	define("INCLUDE_PATH" , '../application/includes/');
	define("CSS_PATH" , 'css/');
	define("JS_PATH" , 'js/');
	define("IMG_PATH" , 'img/');
	define("LAYOUT_PATH" , '../application/layout/');
	define("LIBRARY_PATH" , '../library/');
 ?>