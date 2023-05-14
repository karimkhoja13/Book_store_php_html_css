<?php
	//require INCLUDE_PATH . 'config.i.php';
	/*
		FUNCTIONS LIBRARY - included by admin.php and options.i.php
	*/
	// get_all_items() - a function that returns an array containing all items saved in the 'items.txt' file
	function get_all_items($conn)
	{
		$items = array(); // create empty array to hold the data read from the file
		$sql = "SELECT * from item";
		$result= mysqli_query($conn,$sql);
		if($result)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$items[] = $row;
			}
			return $items;
		}
		else
		return false;		
	}
	
	function get_all_categories($conn)
	{
		$categories = array(); // create empty array to hold the data read from the file
		$sql = "SELECT * from category";
		$result= mysqli_query($conn,$sql);
		//print mysqli_error();
		if($result)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$categories[] = $row;
			}
			return $categories;
		}
		return false;
	}
	
	
	
	
	

	function get_item($id)
	{
		$string = "SELECT * FROM `products` WHERE `id`=$id";
		$query = mysql_query($string);
		if ($query)
		{
			return mysql_fetch_assoc($query);
		}
		return false;
	}
	
	// get_item() - a function that accepts an ID and returns an array containing the item data matching that ID
	function get_category($id)
	{
		$f = fopen('items.txt', 'r'); // open file for reading
		while ($item = fgetcsv($f)) { // loop through the file one line at a time, converting the line into an array based on comma separated values (CSV)
			if ($item[0] == $id) { // if the ID of the current line matches the ID submitted to the function as an argument...
				return $item; // return the array containing that item's data
			}
		}
		return false; // return false if the ID could not be found
	}
	
	
	

	// edit_item() - a function that accepts an ID, username, and password, and changes the username/password for the line matching that ID
	function edit_item($id, $itemname, $description, $price, $result, $category)
	{
		$items = get_all_items(); // use the get_all_items() function to get an array containing all items
		$f = fopen('items.txt', 'w'); // open the file for writing, file contents are TRUNCATED (ie. file is wiped clean)
		foreach ($items as $item) { // loop through the array of all the item data one item at a time
			if ($item[0] == $id) { // if the current item matches the ID submitted to be edited by the function...
				$item[1] = $itemname; // change the itemname
				$item[2] = $description; // change the description
				$item[3] = $price;  // change the price
				$item[4] = $result;  // change the image
				$item[5] = $category;  // change the category
			}
			fputcsv($f, $item); // write the current item back to the file
		}
		fclose($f);	// close the file
	}
	function edit_category($id, $cat, $desc)
	{
		$items = get_all_items(); // use the get_all_items() function to get an array containing all items
		$f = fopen('items.txt', 'w'); // open the file for writing, file contents are TRUNCATED (ie. file is wiped clean)
		foreach ($items as $item) { // loop through the array of all the item data one item at a time
			if ($item[0] == $id) { // if the current item matches the ID submitted to be edited by the function...
				$item[1] = $itemname; // change the itemname
				$item[2] = $description; // change the description
				$item[3] = $price;  // change the price
				$item[4] = $result;  // change the image
				$item[5] = $category;  // change the category
			}
			fputcsv($f, $item); // write the current item back to the file
		}
		fclose($f);	// close the file
	}
	
	// delete_user() - a function that accepts an ID and removes the line from 'items.txt' that matches that ID
	function delete_item($id)
	{
		$items = get_all_items(); // use the get_all_items() function to get an array containing all items
		$f = fopen('items.txt', 'w'); // open the file for writing, file contents are TRUNCATED (ie. file is wiped clean)
		foreach ($items as $item)
		{ // loop through the array of all the item data one item at a time
			if ($item[0] != $id)
			{ // if the ID of the current item DOES NOT MATCH the ID submitted to be deleted
				fputcsv($f, $item); // write the line back to the file
			}
		}
		fclose($f);	// close the file
	}
	
	/*function add_item($itemname, $description, $price, $result, $category)
	{
		$array = array(getID(), $itemname, $description, $price, $result, $category); // create an array containing the data for the new line (use getID() to get the next auto-incrementing ID number)
		$f = fopen('items.txt', 'a'); // open the file in append mode (keeps file contents preserved and writes to the end of the file)
		fputcsv($f, $array); // write the data of the array to the line in comma separated value (CSV) format
		fclose($f); // close the file
	}*/
	
	// add_item() - a function that accepts a username and password and adds a new line to items.txt representing the new item
	
	function add_item($title, $desc, $price, $cat_id, $status, $front_page)
	{
		$str = "INSERT INTO `second_sem`.`category` (`title`, `desc`, `price`, `cat_id`, `status`, `front_page`) VALUES ($title, $desc, $price, $cat_id, $status, $front_page);";
		return mysql_query($str);
	}
	function add_category($name, $desc, $status)
	{
		$str = "INSERT INTO `second_semester`.`category` (`name`, `desc`, `status`) VALUES ($name, $desc, $status);";
		return mysql_query($str);
	}
	
