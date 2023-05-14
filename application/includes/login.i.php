<?php
require 'config.i.php';
if(isset($_POST['login']))
{
	$u=$p="";
 		if($_POST['username'] == NULL)
 		{
 		 echo "Please enter your username<br />";
 		}
		else
 		{
 		 $u=$_POST['username'];
		}
		if($_POST['password'] == NULL)
		{
			echo "Please enter your password<br />";
		}
		else
		{
			$p=$_POST['password'];
		}
	if($u && $p)
	{
		$sql="select * from member where username='".$u."' and password='".$p."'";
		$query=mysqli_query($conn,$sql);
		print mysqli_error();
		if(mysqli_num_rows($query) == 0)
		{
			echo "Username or password is not correct, please try again";
		}
		else
		{
			$member=mysqli_fetch_array($query);
			$_SESSION['admin'] = 1;
			header('Location: ?page=admin');
		}
	}
}
?>

<div class='row span8'>
	<form class="navbar-form" method='post'>
		<input type='hidden' name='action' value='login' />
		<input class="span2" type='text' name='username' size='25' placeholder="Username">
		<input class="span2" type='password' name='password' size='25' placeholder="Password">
		<input type='submit' class='btn' value='Login' name="login">
	</form>
</div>

