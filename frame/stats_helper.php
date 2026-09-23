<?php
function increment_stat($stat_name) {
    $statsFile = __DIR__ . '/assets/stats.json';
    
    // Ensure assets dir exists
    if (!is_dir(__DIR__ . '/assets')) {
        mkdir(__DIR__ . '/assets', 0755, true);
    }
    
    $stats = ['total_shares' => 0, 'total_views' => 0];
    if (file_exists($statsFile)) {
        $stats = json_decode(file_get_contents($statsFile), true);
    }
    
    if (isset($stats[$stat_name])) {
        $stats[$stat_name]++;
    } else {
        $stats[$stat_name] = 1;
    }
    
    file_put_contents($statsFile, json_encode($stats));
}

function get_stats() {
    $statsFile = __DIR__ . '/assets/stats.json';
    if (file_exists($statsFile)) {
        return json_decode(file_get_contents($statsFile), true);
    }
    return ['total_shares' => 0, 'total_views' => 0];
}

function cleanup_uploads() {
    $targetDir = __DIR__ . '/uploads/';
    if (!is_dir($targetDir)) return;

    $now = time();
    $twoDaysInSeconds = 2 * 24 * 60 * 60; // 172,800 seconds

    $files = scandir($targetDir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        
        $filePath = $targetDir . $file;
        if (is_file($filePath)) {
            if ($now - filemtime($filePath) > $twoDaysInSeconds) {
                unlink($filePath);
            }
        }
    }
}

// Auto-run cleanup occasionally (max once per hour)
$cleanupLog = __DIR__ . '/assets/last_cleanup.txt';
$shouldCleanup = true;
if (file_exists($cleanupLog)) {
    $lastCleanup = (int)file_get_contents($cleanupLog);
    if (time() - $lastCleanup < 3600) { // 1 hour
        $shouldCleanup = false;
    }
}

if ($shouldCleanup) {
    cleanup_uploads();
    file_put_contents($cleanupLog, time());
}
