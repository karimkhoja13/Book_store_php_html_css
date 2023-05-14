<?php
function get($name, $default='')
{
	if(isset($_REQUEST[$name]))
		return $_REQUEST[$name];
	return $default;
}
function post($name, $default='')
{
	if(isset($_POST[$name]))
		return $_POST[$name];
	return $default;
}
function is_admin()
{
	if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0) 
	{
		return false;
	}
	return true;
}
function set_message($str)
{
    $_SESSION['message'] = $str;
}
/*function logout()
{
	$_SESSION['admin'] = 0;
    unset($_SESSION['admin']);
	session_unset($_SESSION);
	session_destroy();
    redirect('?page=home');
}*/
function get_message()
{
    if(isset($_SESSION['message']))
    {
        $template = '<div style="color:red">%s</div>';
        $msg = sprintf($template,$_SESSION['message']);
        unset($_SESSION['message']);
        return $msg;
    }
}
function redirect($url)
{
	ob_clean();
	header('Location:'. $url);
	ob_flush();
}