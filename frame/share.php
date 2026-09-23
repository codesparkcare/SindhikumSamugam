<?php
require_once 'stats_helper.php';
increment_stat('total_views');

// Get image filename safely
$image = isset($_GET['img']) ? basename($_GET['img']) : '';
$allowed = ['jpg', 'jpeg', 'png', 'webp'];
$ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

// Validate image
$imageExists = true;

if (empty($image))
    $imageExists = false;
if (!in_array($ext, $allowed))
    $imageExists = false;
if (!file_exists(__DIR__ . "/uploads/" . $image))
    $imageExists = false;

// Extension → MIME map (CRITICAL)
$mimeMap = [
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'webp' => 'image/webp'
];
$imageMime = $mimeMap[$ext] ?? 'image/png';

// URLs
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$scriptPath = dirname($_SERVER['PHP_SELF']);
$scriptPath = rtrim($scriptPath, '/\\');
$baseURL = $protocol . "://" . $host . $scriptPath;
$imageURL = $baseURL . "/uploads/" . $image;
$ogImageURL = $baseURL . "/og_image.php?img=" . urlencode($image);
$pageURL = $baseURL . "/share.php?img=" . urlencode($image);

// Meta text (Keep them clean and concise for Facebook)
$settingsFile = 'assets/share_settings.json';
$settings = ['desc1' => '', 'desc2' => ''];
if (file_exists($settingsFile)) {
    $settings = json_decode(file_get_contents($settingsFile), true);
}

$title = "Click & Create your own dp";
$ogTitle = "*Click & Create your own dp*";

// Use dynamic desc2 for meta description if available, otherwise fallback
$description = !empty($settings['desc2']) ? strip_tags($settings['desc2']) : "சூனியம் என்பது பொய் பித்தலாட்டம்.";

$siteName = "Sindhikum samugam";
?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Social Media Meta Tags - Place early for crawlers -->
    <meta property="fb:app_id" content="966242223397117" />
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars($pageURL) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($ogTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($description) ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($siteName) ?>">

    <?php if ($imageExists): ?>
        <?php 
            $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
            $isWhatsApp = (stripos($ua, 'WhatsApp') !== false);
            $ogW = $isWhatsApp ? 600 : 1200;
            $ogH = $isWhatsApp ? 600 : 630;
        ?>
        <meta property="og:image" content="<?= htmlspecialchars(trim($ogImageURL)) ?>">
        <?php if ($protocol === 'https'): ?>
            <meta property="og:image:secure_url" content="<?= htmlspecialchars(trim($ogImageURL)) ?>">
        <?php endif; ?>
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="<?= $ogW ?>">
        <meta property="og:image:height" content="<?= $ogH ?>">
        <meta property="og:image:alt" content="Profile Picture Preview">
        <meta itemprop="image" content="<?= htmlspecialchars(trim($imageURL)) ?>">
    <?php endif; ?>

    <!-- Twitter (optional) -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= htmlspecialchars($title) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($description) ?>">
    <?php if ($imageExists): ?>
        <meta name="twitter:image" content="<?= htmlspecialchars($imageURL) ?>">
    <?php endif; ?>

    <link rel="canonical" href="<?= htmlspecialchars($pageURL) ?>">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .cta-button {
            display: inline-block;
            padding: 14px 28px;
            background: linear-gradient(135deg, #00aaff 0%, #0066cc 100%);
            color: #fff !important;
            font-size: 18px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(0, 170, 255, 0.3);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 170, 255, 0.5);
        }
    </style>
</head>

<body style="margin:0; padding:20px 0; display: flex; flex-direction: column; min-height: 100vh; align-items: center;">

    <div class="appcontainer">

        <!-- Header Section -->
        <div class="app-header">
            <img src="assets/image.png" alt="Banner"
                style="max-width: 100%; width: 280px; margin-bottom: 15px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); transition: transform 0.3s ease;">
            <!--<h1 class="app-title">DP MAKER</h1>-->
            <p class="app-subtitle">Create Perfect Profile Pictures</p>
        </div>



        <!-- Main Content Container -->
        <?php if ($imageExists): ?>

            <div
                style="text-align: left; background: rgba(255, 255, 255, 0.5); padding: 20px; border-radius: 10px; margin-bottom: 30px; border-left: 4px solid #00aaff; box-shadow: 0 4px 12px rgba(0,0,0,0.05); max-width: 600px; width: 90%;">
                <p style="margin: 0; font-size: 14px; line-height: 1.8; color: #1e293b;">
                    <?php if (!empty($settings['desc1'])): ?>
                        <?= nl2br($settings['desc1']) ?>
                    <?php else: ?>
                        அவர்கள் இந்தக் குர்ஆனைச் சிந்திக்க மாட்டார்களா? இது அல்லாஹ் அல்லாதவரிடமிருந்து வந்திருந்தால் இதில்
                        ஏராளமான முரண்பாடுகளைக் கண்டிருப்பார்கள்.
                        <br><br>
                        <span style="display:block; text-align:right; font-weight:bold; color: #2563eb;">[அல்குர்ஆன்
                            4:82]</span>
                    <?php endif; ?>
                </p>
            </div>

            <div style="margin-bottom: 30px;">
                <img src="<?= htmlspecialchars($imageURL) ?>"
                    style="max-width: 100%; width: 300px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
            </div>
            <div style="margin-top: 20px;">
                <a href="<?= $baseURL ?>/" target="_blank" class="cta-button">
                    Create Your Own DP
                </a>
            </div>
            <br>
            <div
                style="text-align: left; background: rgba(255, 255, 255, 0.5); padding: 20px; border-radius: 10px; margin-bottom: 30px; border-left: 4px solid #00aaff; box-shadow: 0 4px 12px rgba(0,0,0,0.05); max-width: 600px; width: 90%;">
                <p style="margin: 0; font-size: 14px; line-height: 1.8; color: #1e293b;">
                    <?php if (!empty($settings['desc2'])): ?>
                        <?= nl2br($settings['desc2']) ?>
                    <?php else: ?>
                        <span style="display:block; text-align:left; font-weight:bold; color: #2563eb;">[சூனியம் என்பது பொய்
                            பித்தலாட்டம்]</span>
                        நப்பிமார்கள் அல்லாஹ்வின் நாட்ட படி தெளிவான சான்றுகளை கொண்டுவந்தார்கள். ஆனால் இறைமறுபாளர்களோ அதை இது
                        தெளிவான சூனியம் என்று கூறி மறுத்தார்கள். மக்களிடம் உண்மையை நபிமார்கள் கொண்டுவந்தால் அது உண்மை இல்லை
                        வெறும் சூனியம் என்றே மக்கள் மறுத்ததாக அல்லாஹ் திருமறையில் பேசுகிறான். <br><br>
                    <?php endif; ?>
                </p>
            </div>







        <?php else: ?>
            <h1 style="color: #ef4444;">⚠️ Image Not Found</h1>
            <p style="color: #cbd5e1;">The image you are looking for is invalid or has been deleted.</p>
            <a href="https://codespark.online/dp/" class="cta-button" style="margin-top:20px;">Go to DP Maker</a>
        <?php endif; ?>

        <!-- Footer -->
        <footer
            style="width: 100%; background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(10px); padding: 40px 20px; border-top: 1px solid rgba(255,255,255,0.3); margin-top: 30px; border-radius: 15px;">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">

                <h6
                    style="color: #1e293b; letter-spacing: 1px; margin-bottom: 20px; font-size: 14px; font-weight: 800;">
                    FOLLOW US ON</h6>

                <div class="footer-grid">

                    <!-- Group 1 -->
                    <div class="footer-item no-hover">
                        <img src="logo1.jpeg" alt="logo1" class="brand-logo">
                        <div class="social-links">
                            <a href="https://www.facebook.com/earshath/" target="_blank"><img src="fb.png" alt="fb"></a>
                            <a href="https://www.instagram.com/sindhika_maatirgala/" target="_blank"><img
                                    src="insta.png" alt="insta"></a>
                            <a href="https://www.youtube.com/@SindhikaMaatirgala-mp1st-youtube" target="_blank"><img
                                    src="youtube.png" alt="youtube"></a>
                        </div>
                    </div>

                    <!-- Group 2 -->
                    <div class="footer-item no-hover">
                        <img src="logo2.jpeg" alt="logo2" class="brand-logo">
                        <div class="social-links">
                            <a href="https://www.facebook.com/earshath/" target="_blank"><img src="fb.png" alt="fb"></a>
                            <a href="https://www.instagram.com/sindhikum_samugam/" target="_blank"><img src="insta.png"
                                    alt="insta"></a>
                            <a href="https://www.youtube.com/@SindhikaMaatirgala-mp1st-youtube" target="_blank"><img
                                    src="youtube.png" alt="youtube"></a>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="footer-item"
                        style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 20px; padding: 16px 24px; color: #fff; box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);">
                        <img src="quran.jpeg" alt="quran"
                            style="width: 50px; height: 50px; border-radius: 12px; object-fit: cover; flex-shrink: 0;">
                        <div style="text-align: left;">
                            <p
                                style="margin: 0; font-size: 14px; color: rgba(255,255,255,0.95); font-family: 'Outfit', sans-serif; font-weight: 600; letter-spacing: 0.3px; line-height: 1.4;">
                                Contact us For FREE Tamil Quran</p>
                            <span style="font-size: 13px; color: #fff; font-weight: bold;"><i
                                    class="fa-brands fa-whatsapp" style="margin-right: 5px; font-size: 16px;"></i>
                                +91-8939041923</span>
                        </div>
                    </div>

                </div>

                <p style="margin-top: 40px; color: #64748b; font-size: 12px; font-weight: 500;">&copy; <?= date('Y') ?>
                    Sindhikum Samugam Trust. All rights reserved.</p>
            </div>
        </footer>
    </div>

</body>

</html>