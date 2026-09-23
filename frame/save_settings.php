<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $desc1 = $_POST['desc1'] ?? '';
    $desc2 = $_POST['desc2'] ?? '';
    
    $settings = [
        'desc1' => $desc1,
        'desc2' => $desc2
    ];
    
    if (file_put_contents('assets/share_settings.json', json_encode($settings, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT))) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save settings']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
