<!-- Container begins -->
<?php
	include INCLUDE_PATH . 'utilities.i.php';
?>

<!-- Heading Link to home page -->

<div class="span3 offset2">
	<a href="?page=home" style='color: red;'>
		<em>
			<h1>
				Electronics
			</h1>
		</em>
	</a>
</div>

<br />
<br />

<!-- Navbar begins and contains home, about us, about website, and contact us -->
<div class="navbar span10 offset2">
	<div class="navbar-inner">
		<ul class="nav">
			<!-- Home -->
			<li<?php echo ($page == 'home' || $page == '' ? ' class="active"' : ''); ?>><a href="?page=home">Home</a></li>
			<!-- About Us -->
			<li<?php echo ($page == 'aboutus') ? ' class="active"' : ''; ?>><a href = "?page=aboutus" >About Us</a></li>
			<!-- Contact Us -->
			<li<?php echo ($page == 'contactus') ? ' class="active"' : '' ?>><a href="?page=contactus">Contact Us</a></li>
			<li<?php echo ($page == 'items') ? ' class="active"' : '' ?>><a href="?page=items">All Items</a></li>
			<li>
				<ul class="nav nav-tabs">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						Categories<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<!-- links -->
							<?php
								$lines = file("categories.txt");
								foreach($lines as $line)
								{
									$category= explode(":" , $line);
									//list($user, $pass) = explode(":" , $line . PHP_EOL);										Ask about this line
									
									print "<li><a href='#'>";
									print $category[0];
									print "</a></li>";
								}
							?>
						</ul>
					</li>
				</ul>
			</li>
			
			<!-- DISPLAY WHEN ADMIN LOGGED IN -->
			
			<?php if(is_admin()): // STARTING THE IS_ADMIN FUNCTION?>
			<li<?php echo $page == 'admin' ? ' class="active"' : '' ?>><a href="?page=admin">Admin</a></li>
			<li><a href="?page=logout">Logout</a></li>
			<?php endif; // ENDING IS_ADMIN FUNCTION?>
			
			<!-- DISPLAY WHEN ADMIN NOT LOGGED IN -->
			
			<?php if(!is_admin()): // STARTING THE IS_ADMIN FUNCTION FOR NOT LOGGED IN?>
			<li<?php echo $page == 'login' ? ' class="active"' : '' ?>><a href="?page=login">Login</a></li>
			<?php endif; // ENDING IS_ADMIN FUNCTION?>
			
		</ul>
	</div>
	<!-- Navbar ends -->

	<hr />
</div>
<br />
<!-- Navbar ends -->
<?php
	//echo var_dump($_SESSION);
?>