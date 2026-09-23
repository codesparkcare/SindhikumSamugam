<?php
$targetDir = "uploads/";

// Make sure the folder exists and is writable
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

if (!empty($_FILES["profilePic"]["name"])) {
    $fileName = time() . "_" . basename($_FILES["profilePic"]["name"]);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFile)) {
        // Dynamically determine the base URL
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $scriptPath = dirname($_SERVER['PHP_SELF']);
        // Clean up scriptPath to avoid double slashes and ensure it's correct
        $scriptPath = rtrim($scriptPath, '/\\');
        
        $shareURL = $protocol . "://" . $host . $scriptPath . "/share.php?img=" . $fileName;
        
        echo json_encode(["status" => "success", "url" => $shareURL]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to move uploaded file. Check folder permissions."]);
    }
} else {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "No file uploaded or file too large."]);
}
?>