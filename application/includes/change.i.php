<?php
require 'config.i.php';
if(isset($_SESSION['admin']))
{
if(isset($_POST['change']))
{
$op = $np ="";
 	if($_POST['old_pass'] == NULL)
  	{
  		 echo "Fill your Old Pass please.<br />";
  	}
 	else
 	{
   		$op=$_POST['old_pass'];
  	}
  	if($_POST['new_pass'] != $_POST['re_pass'])
 	{
   		echo "Password and re-password is not correct. Please try again.<br />";
  	}
  	else
  	{
   		if($_POST['new_pass'] == NULL)
   		{
    		echo "Please type new password.<br />";
  		}
  		else
   		{
    		$np=$_POST['new_pass'];
   		}
 	}
 	if($op && $np)
  	{
 		//@mysql_select_db("mydatabase",$conn);
   		$sql="select password from member where password='".$op."'";
   		$query=mysqli_query($conn,$sql);
   		if(mysqli_num_rows($query) != 0 )
   		{
   			if ($_POST['new_pass'] == $_POST['re_pass'])
   			{
   				$sql2="UPDATE `member` SET `password` = '".$np."' WHERE `password` = '$op';";
    			$query2=mysqli_query($conn,$sql2);
    			echo "Your password changed successful.";
    		}
   		}
   		else
   			{	
   				echo "Your old password is not correct. Please try again.";
   			}
 	}
}
}

?>
<h2><b><u>Change Password</u></b></h2>
<form method='POST'>
Old Password: <input type='password' name='old_pass' size='25' /> <br />
New Password: <input type='password' name='new_pass' size='25' /> <br />
Re-Password: <input type='password' name='re_pass' size='25' /><br />
<input type='submit' name='change' value='Change Password' />
</form>
