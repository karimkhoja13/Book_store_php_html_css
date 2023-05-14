<?php

	if (isset($_SESSION))
	{
		foreach ($_SESSION as $element)
		{
			unset($element);
		}
	}
	session_destroy();
	header('Location: ?page=home');