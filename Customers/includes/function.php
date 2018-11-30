<?php

	function __autoload($file)
	{

		$file = strtolower($file);
		$exists = file_exists($file);

		if($exists) {
			require_once($file);
		} else {
			echo "The file ".$file." does not exist";
		}

	}

?>