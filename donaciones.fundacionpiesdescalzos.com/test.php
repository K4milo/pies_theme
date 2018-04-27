<?php

	require "vendor/autoload.php";

	$db = new \IP2Location\Database('./geodatabase/IP2LOCATION-LITE-DB1.BIN', \IP2Location\Database::FILE_IO);
	$records = $db->lookup('181.49.65.60', \IP2Location\Database::ALL);

	print_r($records);