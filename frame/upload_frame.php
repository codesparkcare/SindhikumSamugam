<?php

$targetDir = "assets/frames/";

if (!empty($_FILES["frameFile"]["name"])) {
    $fileCount = count($_FILES["frameFile"]["name"]);

    for ($i = 0; $i < $fileCount; $i++) {
        if ($_FILES["frameFile"]["error"][$i] === UPLOAD_ERR_OK) {
            $fileName = basename($_FILES["frameFile"]["name"][$i]);
            $targetFile = $targetDir . $fileName;
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Only allow PNG frames
            if ($fileType == "png") {
                move_uploaded_file($_FILES["frameFile"]["tmp_name"][$i], $targetFile);
            }
        }
    }
    
    // Redirect back after processing all files
    header("Location: admin.php");
    exit;
}

?>
