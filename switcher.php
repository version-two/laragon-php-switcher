<?php

define('SYMLINK_FILE', 0);
define('SYMLINK_DIR', 1);
define('SYMLINK_JUNCTION', 2);
function makeSymlink ($target, $link, $flag = SYMLINK_FILE) {
    switch ($flag) {
       case SYMLINK_DIR: $pswitch = '/d'; break;
       case SYMLINK_JUNCTION: $pswitch = '/j'; break;
       case SYMLINK_FILE:
       default: $pswitch = ''; break;
    }
    /*Change / to \ because it will break otherwise.*/
    $target = str_replace('/', '\\', $target);
    $link   = str_replace('/', '\\', $link);
    return exec('mklink ' . $pswitch . ' "' . $link . '" "' . $target . '"');
}

$directories = glob(__DIR__ . '/*' , GLOB_ONLYDIR);


foreach($directories as $key =>$directory) {
    if(is_link($directory)) {
        unset($directories[$key]);
    }
}

$i = 1;
foreach($directories as $directory) {
	echo $i,': ',basename($directory),PHP_EOL;
	$i++;
}

echo "Input index of PHP you want to have as a main version: ";
$handle = fopen ("php://stdin","r");
$line   = fgets($handle);

if(((int)$line <= 0 || (int)$line > count($directories))){
    echo "ABORTING, INVALID INPUT!".PHP_EOL;
    exit;
}



echo "Input: ",$line,PHP_EOL;
echo "Dir: ",$directories[(int)$line-1],PHP_EOL,PHP_EOL;

rmdir('../../etc/php/_current');
makeSymlink($directories[(int)$line-1], '../../etc/php/_current', SYMLINK_DIR);

echo "Please add '",realpath('../../etc/php'),DIRECTORY_SEPARATOR,"_current' to PATH env. variable.",PHP_EOL,PHP_EOL;


echo "--- PRESS ENTER TO CLOSE WINDOW ---";
fgets($handle);
fclose($handle);