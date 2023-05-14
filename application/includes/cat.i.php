<?php
	
	//include 'filepaths.php';
	//include INCLUDE_PATH . 'config.php';
	/*
	$con = mysqli_connect('localhost', 'root', '', 'second_sem');
	if (!$con) {
		die('could not connect to database');
	}
	//mysql_select_db('db_name');
	*/

	include LIBRARY_PATH . 'functions.php';
	
	if(get('add_category'))
	{
		add_category($_POST['name'], $_POST['desc'], $_POST['status']);
	}
	elseif(get('edit_category'))
	{
		edit_category($_POST['id'], $_POST['name'], $_POST['desc'], $_POST['status']);
	}
	elseif(get('delete_category'))
	{
		delete_category($_POST['id']);
	}
	
	$products = get_all_categories($conn);
	
?>

<?php if ($categories): ?>
<table border="1" cellspacing="5" cellpadding="5">
	<tr>
		<th>Name</th>
		<th>Description</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo $category['id'] ?></td>
		<td><?php echo $category['name'] ?></td>
		<td><?php echo $category['desc'] ?></td>
		<td><?php echo $category['status'] ?></td>
		<td>
			<a href="?page=cat&edit=<?php echo $category['id'] ?>">Edit</a>
			<a href="?page=cat&delete=<?php echo $category['id'] ?>">Delete</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<?php if(get('edit')): ?>
<?php $category = get_category($_GET['edit']) ?>
	<h1>Edit Category</h1>
	<form action="?page=cat" method="post">
		<label>Name</label><br />
		<input type="text" name="name" value="<?php echo $product['name'] ?>"><br />
		<label>Description</label><br />
		<textarea name="desc"><?php echo $product['desc'] ?></textarea><br />
		<label>Status</label><br />
		<select name="status">
			<option value="<?php echo $category['status'] 			// IMPORTANT	?>">SHOW</option>
			<option value="<?php echo $category['status'] 			// IMPORTANT	?>">HIDE</option>
		</select><br />
		<input type="hidden" name="id" value="<?php echo $product['id'] ?>">
		<input type="submit" name="edit_category">
	</form>
<?php elseif(get('delete')): ?>
	<h1>Delete Category</h1>
	<p>Do you really want to delete this category?</p>
	<form action="index.php" method="post">
		<input type="hidden" name="id" value="<?php echo $_GET['delete'] ?>"><br />
		<input type="submit" name="delete_category">
	</form>
<?php else: ?>
	<h1>Add Product</h1>
	<form action="?page=cat" method="post">
		<label>Name</label><br />
		<input type="text" name="name"><br />
		<label>Description</label><br />
		<textarea name="desc"></textarea><br />
		<label>Status</label><br />
		<select name="status">
			<option>SHOW</option>
			<option>HIDE</option>
		</select><br />
		
		<input type="submit" name="add_category">
	</form>
<?php endif; ?>