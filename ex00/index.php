<?php

session_start();

if ($_GET['submit'] !== null) {

	$login = $_GET['login'];
	$passwd = $_GET['passwd'];
	$submit = $_GET['submit'];

	$exit = false;

	if($submit != 'OK')
	{
		$exit = true;
		echo ("ERROR");
	}

	if(!$login && $exit == false)
	{
		$exit = true;
		echo ("ERROR");
	}

	if(!$passwd && $exit == false)
	{
		$exit = true;
		echo ("ERROR");
	}

	if($login && $exit == false)
	{
		$_SESSION['login'] = $login;
	}

	if($passwd  && $exit == false)
	{
		$_SESSION['passwd'] = $passwd;
	}
}

?>

<html>
	<body>
		<form >
			Login : <input type="text" name="login" value="<?= $_SESSION['login'] ?>" />
			<br/>
			Mot de passe : <input type="text" name="passwd" 	value="<?= $_SESSION['passwd'] ?>" />
			<br/>
			<input type="submit" name="submit"  value="OK"/>
		</form>
	</body>
</html>

