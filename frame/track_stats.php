<?php
require_once 'stats_helper.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'increment' && isset($_GET['stat'])) {
        increment_stat($_GET['stat']);
        echo json_encode(['status' => 'success', 'count' => get_stats()[$_GET['stat']]]);
    } elseif ($_GET['action'] === 'get') {
        echo json_encode(get_stats());
    }
}
