<?php

	include LIBRARY_PATH . 'functions.php'; // includes the functions library(for comments refer to items.php in the models folder
	
	if(isset($_FILES["image"]))
	{
		$name = $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $name);
	}
	$scan = scandir('img/');
	$images = array();
	// try uploading the image without scandir and the following code
	foreach ($scan as $result)
	{
		if ($result != '.' && $result != '..' && $result != 'thumbs.db')
		{
			$images[] = $result;
		}
	}
	if(!is_file('items.txt'))
	{
		touch('items.txt');
	}
	if(isset($_POST['addSubmit']))
	{
		add_item($_POST['itemname'] , $_POST['description'] , $_POST['price'] , $name , $_POST['category']);
	}
	if(isset($_POST['editSubmit']))
	{
		edit_item($_POST['id'], $_POST['itemname'], $_POST['description'], $_POST['price'], $name , $_POST['category']);
	}
	if(isset($_POST['deleteSubmit']))
	{
		delete_item($_POST['id']);
	}
	$items = get_all_items();
	var_dump($items);
?>



<div class="span6">
<?php if(isset($_GET['edit'])): // CONDITION FOR GETTING THE ACTION EDIT FROM THE item THROUGH GET METHOD?>
<?php $item = get_item($_GET['edit']) ?>
<!-- Edit Item Form -->
<form action="?page=items" method="post" enctype = "multipart/form-data">
	Item Name: <input type="text" name="itemname" value="<?php echo $item[1] ?>"><br />
	Description: <input type="text" name="description" value="<?php echo $item[2] ?>"><br />
	Price: <input type="integer" name="price" value="<?php echo $item[3] ?>"><br />
	Select another file for image: <input type= "file" name= "image" value="<?php echo $item[4] ?>" />
	Category: <select name="category" value="<?php echo $item[5] // ASK FOR KEEPING THE CATEGORY AS SAME FOR THE ITEM EDITING AS IT WAS BEFORE?>">
			<?php
				$lines = file("categories.txt");
				foreach($lines as $line)
				{
					$category= explode(":" , $line);
					//list($item, $pass) = explode(":" , $line . PHP_EOL);										Ask about this line
					
					print "<option>";
					print $category[0];
					print "</option>";
				}
			?>
		</select>
	<br />
	<input type="hidden" name="id" value="<?php echo $item[0] ?>">
	<input type="submit" name="editSubmit" value="Save changes">
</form>
<?php elseif(isset($_GET['delete'])): // CONDITION FOR GETTING THE ACTION DELETE FROM THE item THROUGH GET METHOD?>
<?php $item = get_item($_GET['delete']) ?>
<!-- Delete Item Form -->
<form action="?page=items" method="post" enctype = "multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $item[0] ?>">
	Are you sure you want to delete this item?<input type="submit" name="deleteSubmit" value="Delete Item: <?php echo $item[1] ?>">
</form>
<?php else: // CONDITION FOR GETTING THE ACTION FROM THE item TO ADD AN ITEM THROUGH GET METHOD?>
<!-- Add item Form -->
<?php if(is_admin()): // STARTING THE IS_ADMIN FUNCTION?>
<h4>You can add an Item by adding the necessary information below</h4>
<form action="?page=items" method="post" enctype = "multipart/form-data">
	Item Name: <input type="text" name="itemname"><br />
	Description: <input type="text" name="description"><br />
	Price: <input type="integer" name="price"><br />
	Select a file for image: <input type= "file" name= "image" /><br />
	Category: <select name="category">
				<?php
					$lines = file("categories.txt");
					foreach($lines as $line)
					{
						$category= explode(":" , $line);
						//list($item, $pass) = explode(":" , $line . PHP_EOL);										Ask about this line
						
						print "<option>";
						print $category[0];
						print "</option>";
					}
				?>
		</select>
	<br />
	<input type="submit" name="addSubmit" value="Add Item">
</form>
<?php endif; // ENDING IS_ADMIN FUNCTION?>
<?php endif; // ENDING THE CONDITION FOR GETTING THE ACTION FROM THE item?>
</div>
<!-- Results Table -->

	<div class="span8 offset2">
	<h1>All Items are listed below: </h1>
		<table border="1" style='width: 800px;'>
			<tr>
				<th>Item Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Image</th>
				<th>Category</th>
				
				<!--  SHOWING THE ACTIONS HEADING COLUMN ONLY WHEN ADMIN IS LOGGED IN -->
					
				<?php if(is_admin()): // STARTING THE IS_ADMIN FUNCTION?>
				<th colspan="2">Actions</th>
				<?php endif; // ENDING IS_ADMIN FUNCTION?>
			</tr>
			
			
			<?php
			var_dump($_GET);
			if(!empty($_GET['category'])):	// IF CATEGORY IS SET, THEN EXECUTE THE CODE BELOW OTHERWISE GO TO THE ELSE PART
				if (file_exists("items.txt")):
				
					//$cat = get('category');
					//$cat_file = fopen( , 'r') or die('Cannot open the file.');
					$item_array = file("items.txt");
					//echo $cat;
					foreach($item_array as $item_line)
					{
						$array_cat_check = explode("," , $item_line);
						
						if($_GET['category'] == trim($array_cat_check[5]))
						{
							echo $array_cat_check[5];
							echo $cat;
								print "<tr>
									<th>" . $array_cat_check[1] . "</th>
									<th>" . $array_cat_check[2] . "</th>
									<th>" . $array_cat_check[3] . "</th>
									<td><img src='img/" . $array_cat_check[4] . "' alt='The Image was not uploaded properly. Please edit the item and try again.' 
									width=200 height=200 /></td>
									<th>" . $array_cat_check[5] . "</th>";
								if(is_admin()):
									print "<th><a href='?page=items&edit=" . $array_cat_check[0] . "'>Edit</a></th>
										<th><a href='?page=items&delete=" . $array_cat_check[0] . "'>Delete</a></th>";
								endif;
								print "</tr>";
						}
					}
				endif;
			else:	// EXECUTING THE CODE BELOW IF THE CATEGORY IS NOT SET
			?>
			
			
				<?php foreach($items as $item): ?>
				<tr>
					<th><?php echo $item[1] ?></th>
					<th><?php echo $item[2] ?></th>
					<th><?php echo $item[3] ?></th>
					<td><img src="img/<?php echo $item[4] ?>" alt="The Image was not uploaded properly. Please edit the item and try again." 
					width=200 height=200 /></td>
					<th><?php echo $item[5] ?></th>
					
					<!--  SHOWING THE EDIT AND DELETE BUTTONS ONLY WHEN ADMIN IS LOGGED IN -->
					
					<?php if(is_admin()): // STARTING THE IS_ADMIN FUNCTION?>
					<th><a href="?page=items&edit=<?php echo $item[0] ?>">Edit</a></th>
					<th><a href="?page=items&delete=<?php echo $item[0] ?>">Delete</a></th>
					<?php endif; // ENDING IS_ADMIN FUNCTION?>
				</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</table>
	</div>