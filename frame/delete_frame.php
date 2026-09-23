<?php
$folder = "assets/frames/";

if (isset($_POST['file'])) {
    $file = basename($_POST['file']);
    $path = $folder . $file;

    if (file_exists($path)) {
        unlink($path);
        echo "deleted";
        exit;
    }
}

echo "error";
?>
