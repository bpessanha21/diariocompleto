<?php
// Specify the directory where your files are located
$directory = '/var/www/robos/files';
// $directory = '/home/felipe/github/DOERJ-v2/files';

// Get the list of files in the directory
$fileList = scandir($directory);

// Remove "." and ".." from the file list
$fileList = array_diff($fileList, array('..', '.'));
$finalItems = [];

foreach($fileList as $file){
    $finalItems[] = $file;
}
$fileList = $finalItems;

// Convert the file list to JSON format
$jsonResponse = ["day" => explode("-", $fileList[0])[0]];

// Set the appropriate headers for JSON response
header('Content-Type: application/json');

// Output the JSON response
echo  json_encode($jsonResponse);
?>
