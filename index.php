<?php
	$handle = fopen("/Users/jeremy/Sites/cask/cask", "r");
	if ($handle) {
	    while (($line = fgets($handle)) !== false) {
	        $filename = trim(str_ireplace("brew cask install","",$line));
			file_put_contents("$filename.sh", $line); 
		} 
		fclose($handle);
	} else {
		throw new exception('bad filename');
	}