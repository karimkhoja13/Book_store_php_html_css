<?php
	
	include LIBRARY_PATH . 'functions.php';
	/*
	if(get('cat') != NULL && get('desc') != NULL)
	{
		
		$fin = fopen("categories.txt" , 'a+') or die('Cannot open the file.');
		$cat_user = array(get('cat'), get('desc'));
		echo $cat_user[0] . "<br />" . $cat_user[1] . "<br />";
		
		CODE FOR DISPLAYING ALL THE CATEGORIES
		
		$all_cats = get_all_categories($conn);
		foreach($all_cats as $field)
		{
			print $field . ' - ';
		}
		
		print '<br />';
		$string = implode(":" , $cat_user);
		$write = fwrite($fin , "\n" . $string);
		fclose($fin);
		
		function add_product($name, $desc, $price)
		{
			$str = "INSERT INTO `products` (`name`, `desc`, `price`)
					VALUES ('$name', '$desc', $price)";
			return mysql_query($str);
		}
		
		
	}
	else
	{
		print "<br /><font color='red'><b>The category name or description was not entered. Both the fields are mandatory.</b></font><br /><hr />";
		return false;
	}*/
/*
	if(stristr($user[5], get('category')) == TRUE)
	{
		
	}
*/

?>
<div class="span2">
  <div class="well sidebar-nav">
	<ul class="nav nav-list">
	<li class="active"><a href="?page=cat"><b><u>All Categories</u></b></a></li>
	<?php
		// DISPLAYING THE CATEGORIES IN THE SIDE NAVBAR
		
		//$lines = file("categories.txt");
		
		$all_cats = get_all_categories($conn);
		var_dump(get_all_categories($conn));
		
		if(get('add'))
		{
			//$all_cats = get_all_categories($conn);
			foreach($all_cats as $field)
			{
				print $field . ' - ';
			}
			print '<br />';
			
			/*
			foreach($lines as $line)
			{
				$category = explode(":" , $line);
				print "<li><a href='?page=items&category=".$category[0]."'>";
				print $category[0];
				print "</a></li>";
			}
			*/
			
		}
		else
		{
			//$all_cats = get_all_categories($conn);
			foreach($all_cats as $field)
			{
				print $field . ' - ';
			}
			print '<br />';
			
			/*
			foreach($lines as $line)
			{
				$category = explode(":" , $line);
				print "<li><a href='?page=items&category=".$category[0]."'>";
				print $category[0];
				print "</a></li>";
			}
			*/
			
		}
	?>
	</ul>
  </div><!--/.well -->
</div><!--/span-->
		