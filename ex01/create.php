<?php

if (!file_exists('../private/'))
{
	mkdir ('../private/', 0777, true);
}

$login = $_POST['login'];
$passwd = $_POST['passwd'];
$submit = $_POST['submit'];

$exit = "FALSE";

if($submit != 'OK')
{
	$exit = "TRUE";
	echo ("ERROR\n");
}

if(!$login && $exit == "FALSE")
{
	$exit = "TRUE";
	echo ("ERROR\n");
}

if(!$passwd && $exit == "FALSE")
{
	$exit = "TRUE";
	echo ("ERROR\n");
}

$file = "../private/passwd";

if ($exit == "FALSE")
{
	if (file_exists($file)) 
	{
		$fileContent = file_get_contents($file);
		if ($fileContent) 
		{
			$fileContent = unserialize($fileContent);
		} 
		else 
		{
			$fileContent = [];
		}
	} 
	else 
	{
		$fileContent = [];
	}
	foreach ($fileContent as $key => $value)
	{		
		if ($value['login'] === $login)
		{
			$exit = "TRUE";
			echo ("ERROR\n");
		}
	}
	if ($exit == "FALSE")
	{
		$newArray['login'] = $login;
		$newArray['passwd'] = hash('whirlpool', $passwd);
		$fileContent[] = $newArray;
		file_put_contents($file, serialize($fileContent));
		$exit = "TRUE";
		echo ("OK\n");
	}
}
?>