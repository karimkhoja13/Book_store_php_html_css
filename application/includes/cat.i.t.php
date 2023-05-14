<div class="span8">
<?php
	include LIBRARY_PATH . "functions.php";
	
	// ADDING A CATEGORY
	if(get['addcategory'])
	{
		add_category(get['name'], get['desc']);
	}
?>
<?php //if(is_admin()): 										 ADMIN AUTHENTICATION COMMENTED	?>
<form action="?page=cat" method="post">
	Category: <input type="text" name="name" />
	Description: <textarea name="desc"></textarea>
<input type = "submit" value="Add Category" name="addcategory" />
<?php //endif; 													 ADMIN AUTHENTICATION COMMENTED	?>
<?php
	//put_cat();
	print "<br /><br />
	<table width='700px'>
		<tr>
			<td>
				<font size = '5'>
					Categories
				</font>
			</td>
			<td>
				<font size = '5'>
					Description
				</font>
			</td>
		</tr>
	</table>
	<br />";
?>
<?php
	$lines = file("categories.txt");
	print "<table width='900px'>";
		foreach($lines as $line)
		{
			$category= explode(":" , $line);
			//list($user, $pass) = explode(":" , $line . PHP_EOL);										Ask about this line
			print "<tr>";
			print "<td><font size = '4'><a href='#'><b>" . $category[0] . "</b></a></font></td>";
			print "<td><font size = '4'>" . $category[count($category)-1] . "</b></font></td>";
			print "</tr>";
		}
	print "</table>";
?>
</div>
