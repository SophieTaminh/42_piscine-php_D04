<?php

$login = $_POST['login'];
$oldpw = $_POST['oldpw'];
$newpw = $_POST['newpw'];
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

if(!$oldpw  && $exit == "FALSE")
{	
	$exit = "TRUE";
	echo ("ERROR\n");
}

if(!$newpw  && $exit == "FALSE")
{
	$exit = "TRUE";
	echo ("ERROR\n");
}

$file = "../private/passwd";

if(!$file  && $exit == "FALSE")
{
	$exit = "TRUE";
	echo ("ERROR\n");
}

if ($exit == "FALSE")
{
	$fileContent = [];
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

	$oldpw = hash('whirlpool', $oldpw);

	foreach ($fileContent as $key => $value)
	{	
		if ($value['login'] === $login  && $exit == "FALSE")
		{
			if ($value['passwd'] === $oldpw)
			{	
				$fileContent[$key]['passwd'] = hash('whirlpool', $newpw);
				file_put_contents($file, serialize($fileContent));
				$exit = "TRUE";
				//echo ("OK\n");
				header('Location: index.html');
			}
			if ($value['passwd'] !== $oldpw)
			{
				$exit = "TRUE";
				echo ("ERROR\n");
			}
		}
	}
	if ($exit == "FALSE")
	{
	$exit = "TRUE";
	echo ("ERROR\n");
	}
}

?>