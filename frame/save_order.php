<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order = $_POST['order'] ?? [];
    if (!empty($order)) {
        file_put_contents('assets/frames_order.json', json_encode($order));
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No order data received']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
