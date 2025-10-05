<?php
// Specify the directory where your files are located
$directory = '/var/www/robos/files';
$directory = '/home/felipe/github/DOERJ-v2/files';

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
$jsonResponse = json_encode(array_map(function($file) use ($directory) {
    return array(
        'name' => $file,
        'size' => filesize($directory . '/' . $file),
        'url' => 'http://195.35.43.158:8080/' . $file
    );
}, $fileList));

// Set the appropriate headers for JSON response
header('Content-Type: application/json');

// Output the JSON response
echo  $jsonResponse;
?>
