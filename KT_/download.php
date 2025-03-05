<?php
$file = 'files/kt_cv.pdf';
$filepath = __DIR__ . '/' . $file; 

if (file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));

    readfile($filepath);
    exit;
} else {
    echo "File not found.";
}
?>