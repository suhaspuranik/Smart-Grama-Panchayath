<?php
// Set the file name for the downloaded page
$fileName = 'downloaded-page.html';

// Set the appropriate headers to force download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

// Read the contents of the HTML page
$htmlContent = file_get_contents('index.php');

// Remove the download button from the HTML content
$htmlContent = preg_replace('/<input.*?name="download".*?>/', '', $htmlContent);

// Output the modified page content to the browser
echo $htmlContent;
?>
