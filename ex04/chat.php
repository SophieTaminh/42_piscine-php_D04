<?php

date_default_timezone_set('Europe/Paris');

	if (file_exists("../private/chat") == TRUE)
	{
		$test = unserialize(file_get_contents("../private/chat"));
		foreach ($test as $value)
		{
			echo "<br>".$value['login']." à ".date("H:i", $value['time'])."<br>";
			echo $value['msg']."<br>";
		}
	}
	else
	{
		echo "Conversation vide";
	}