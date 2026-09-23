<?php
/**
 * og_image.php
 * Generates a clean 1200x630 rectangle for Facebook Link Previews.
 * Places the square profile picture (630x630) in the center with padding.
 * This ensures square profile pictures are NEVER cropped on iOS or Desktop.
 */

// Facebook's Ideal Link Preview Dimensions (1.91:1)
// Detect WhatsApp crawler
$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
$isWhatsApp = (stripos($ua, 'WhatsApp') !== false);

if ($isWhatsApp) {
    // WhatsApp prefers square images for large previews
    $targetWidth = 600;
    $targetHeight = 600;
} else {
    // Facebook's Ideal Link Preview Dimensions (1.91:1)
    $targetWidth = 1200;
    $targetHeight = 630;
}

$imageName = isset($_GET['img']) ? basename($_GET['img']) : '';
$filePath = __DIR__ . "/uploads/" . $imageName;

if (empty($imageName) || !file_exists($filePath)) {
    header("Content-Type: image/png");
    $errImg = imagecreatetruecolor($targetWidth, $targetHeight);
    $bg = imagecolorallocate($errImg, 255, 255, 255); // White fallback
    imagefill($errImg, 0, 0, $bg);
    imagepng($errImg);
    imagedestroy($errImg);
    exit;
}

// Load original square image (likely 1024x1024 or higher)
$ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
switch ($ext) {
    case 'jpg':
    case 'jpeg':
        $src = imagecreatefromjpeg($filePath);
        break;
    case 'png':
        $src = imagecreatefrompng($filePath);
        break;
    case 'webp':
        $src = imagecreatefromwebp($filePath);
        break;
    default:
        die("Unsupported format");
}

if (!$src) die("Could not load image");

$srcWidth = imagesx($src);
$srcHeight = imagesy($src);

// Create the canvas
$dest = imagecreatetruecolor($targetWidth, $targetHeight);

// Fill with white background (Standard for frames)
$white = imagecolorallocate($dest, 255, 255, 255);
imagefill($dest, 0, 0, $white);

if ($isWhatsApp) {
    // For WhatsApp (Square): Fill entire 600x600
    imagecopyresampled($dest, $src, 0, 0, 0, 0, $targetWidth, $targetHeight, $srcWidth, $srcHeight);
} else {
    // For Facebook (Rect): Calculate square placement (630x630 square in the center)
    $squareSize = $targetHeight; // 630px
    $posX = ($targetWidth - $squareSize) / 2; // (1200 - 630) / 2 = 285px
    $posY = 0;
    imagecopyresampled($dest, $src, $posX, $posY, 0, 0, $squareSize, $squareSize, $srcWidth, $srcHeight);
}

// Output as JPEG
header("Content-Type: image/jpeg");
imagejpeg($dest, null, 90);

// Cleanup
imagedestroy($src);
imagedestroy($dest);
