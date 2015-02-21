Individual oneliner install .sh files for caskroom.io 

The idea is any of these you want just chekout the repo then drag/drop any you want to your terminal window (after having installed caskroom). 

You can also fork, delete what you don't need, then commit.

yes I WAS that bored here's what i did:
1. brew cask search '/[\s\S]*/' > cask.txt
1. did a find and replace of "\n" => "\nbrew cask install" (i used Sublime using regex replacements)
1. removed the first text reading: "==> Regexp matches"
1. saved it, making a long list of install commands
1. ran a (and yes PHP because that's what im super quick at) script that reads the text file and writes a new file for each line

```php

<?php
  $ofile = "cask.txt";
	$handle = fopen($ofile, "r");
	if ($handle) {
	    while (($line = fgets($handle)) !== false) {
	        $filename = trim(str_ireplace("brew cask install","",$line));
			file_put_contents("$filename.sh", $line); 
		} 
		fclose($handle);
	} else {
		throw new exception("$ofile = bad filename");
	}

```

If i can get the caskroom guys to PR me when they add new apps (or even fork/assume ownership) this could be a wonderful supporting tool =D
