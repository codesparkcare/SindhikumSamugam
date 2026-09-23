<?php
require_once 'stats_helper.php';
// Clear all cookies on every visit to the home page
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time() - 3600);
        setcookie($name, '', time() - 3600, '/');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script>
    // Clear browser storage to ensure a clean session on the home page
    localStorage.clear();
    sessionStorage.clear();
    
    // Client-side cookie clearing for immediate effect
    document.cookie.split(";").forEach(function(c) { 
        document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); 
    });
  </script>
  <meta charset="UTF-8" />
  <title>sindhikum samugam</title>
  <link rel="icon" type="images/jpeg" href="assets/faviicon.jpeg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    button.mybttn {
      all: unset;
      /* FULL reset */
      display: inline-block;
      padding: 10px 20px;
      background: linear-gradient(45deg, #6a5af9, #6264ecff);
      color: #fff;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s ease;
      text-align: center;
    }


    button.mybttn:hover {
      opacity: 0.85;
    }

    .codes {
      color: white;
      text-decoration: none;
      font-size: 13px;
    }

    .mydelbtn {
      margin-top: 10px;
      border-radius: 50px;
      height: 40px;
    }

    @media (max-width: 600px) {
      .mydelbtn {
        margin-left: 0;
        width: 100%;
      }
    }

    .footer-credit {
      margin-top: 20px;
      text-align: center;
      width: 100%;
    }

    /* Wrap if screen is small */
    /* Social appcontainer */
    .social {
      display: flex;
      flex-wrap: nowrap;
      /* Keep in one row */
      justify-content: center;
      /* Center aligned */
      align-items: center;
      gap: 25px;
      /* Space between buttons */
      margin-top: 40px;
      width: 100%;
    }

    /* Social buttons – Smaller pill shape */
    .fp-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      padding: 6px 12px;
      /* Reduced size */
      border-radius: 25px;
      /* Smaller pill */
      font-size: 12px;
      /* Smaller text */
      font-weight: 600;
      color: #fff;
      text-decoration: none;
      min-width: 130px;
      /* Makes all buttons equal width */
      height: 40px;
      /* Uniform height */
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
      transition: 0.3s ease;
    }

    .fp-btn i {
      margin: 0;
      line-height: 1;
    }

    .fp-btn {
      position: relative;
      overflow: hidden;
    }


    .fp-btn span {
      display: flex;
      align-items: center;
      gap: 4px;
    }

    /* Social gradients */

    .share-generic {
      background: linear-gradient(135deg, #6a5af9, #8e8af9);
    }

    .download-generic {
      background: linear-gradient(135deg, #38bdf8, #2563eb);
    }





    .fp-btn::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.15);
      opacity: 0.3;
      transition: 0.3s;
      border-radius: 40px;
    }

    .fp-btn:hover {
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
    }

    .fp-btn:hover::before {
      opacity: 0.5;
    }

    .fp-btn i {
      font-size: 16px;
    }

    .fp-btn span a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      margin-right: 6px;
    }

    .fp-btn span a:hover {
      opacity: 0.85;
    }

    @media (max-width: 480px) {

      .social {
        display: flex;
        flex-wrap: wrap;
        /* IMPORTANT */
        gap: 10px;
      }


      .fp-btn {
        width: 100%;
        padding: 12px;
        justify-content: center;
        font-size: 16px;
      }


    }

    /*my code*/
  </style>
</head>

<body style="margin:0; padding:0; display: flex; flex-direction: column; min-height: 100vh; align-items: center;">
  <!-- Full Page Loader -->
  <div id="fullPageLoader" class="loader-overlay" style="display: none;">
    <div class="spinner"></div>
    <div class="loader-text">Generating Graphic...</div>
  </div>

  <div class="appcontainer">
    <div class="app-header">
      <img src="assets/image.png" alt="Banner"
        style="max-width: 100%; width: 280px; margin-bottom: 15px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); transition: transform 0.3s ease;">
      <!--<h1 class="app-title">DP MAKER</h1>-->
      <p class="app-subtitle">Create Perfect Profile Pictures</p>
    </div>

    <div class="controls">
      <label class="file-label primary">
        Choose Your Photo
        <input type="file" id="photoInput" accept="image/*" />
      </label>

      <div class="zoom-group">
        <label for="zoomRange">Zoom</label>
        <!--<input type="range" id="zoomRange" min="1" max="3" step="0.01" value="1" />-->
        <input type="range" id="zoomRange" min="0.3" max="3" step="0.01" value="1" />

      </div>


      <!--<form action="upload_frame.php" method="POST" enctype="multipart/form-data" class="upload-form">
     <label class="file-label secondary">Upload
    <input type="file" name="frameFile" accept="image/png" required></label>
  
    <button  class="mybttn" type="submit" >Sumbit</button>
    </form>-->


    </div>

    <div class="frame-selector">
      <div class="frame-list">
        <?php
        $folder = "assets/frames/";
        $allowed = ['png', 'jpg', 'jpeg', 'webp'];

        // Get actual files on disk
        $actualFiles = is_dir($folder) ? array_diff(scandir($folder), array('..', '.')) : [];
        $validFiles = [];
        foreach ($actualFiles as $file) {
          $ext = pathinfo($file, PATHINFO_EXTENSION);
          if (in_array(strtolower($ext), $allowed)) {
            $validFiles[] = $file;
          }
        }

        // Load order from JSON
        $orderFile = 'assets/frames_order.json';
        $orderedFiles = [];
        if (file_exists($orderFile)) {
          $orderedFiles = json_decode(file_get_contents($orderFile), true);
        }

        // Merge: files in order first, then any new ones
        $finalFiles = [];
        foreach ($orderedFiles as $file) {
          if (in_array($file, $validFiles)) {
            $finalFiles[] = $file;
          }
        }
        foreach ($validFiles as $file) {
          if (!in_array($file, $finalFiles)) {
            $finalFiles[] = $file;
          }
        }
        
        $first = true; // To set the first frame as active
        
        foreach ($finalFiles as $file) {
            // Detect frame shape from filename: "round" → round, else square
            $shape = (strpos($file, 'round') !== false) ? "round" : "square";
            $active = $first ? "active" : "";
            $first = false;

            echo "
   <div class=frame>     
<button class='frame-btn $active' 
        data-frame='{$folder}{$file}' 
        data-shape='{$shape}' 
        data-file='{$file}'>
    <img src='{$folder}{$file}' alt='{$file}' />
</button> </div>";
        }
        ?>
        <!--<button id="deleteFrameBtn" class="mydelbtn mybttn" style="display:none; background:red;">
     Delete
    </button>-->
      </div>

    </div>

    <div class="preview-wrapper">
      <canvas id="previewCanvas" width="1024" height="1024"></canvas>
    </div>


    <p class="note">
      Flow: 1️⃣ Upload photo → 2️⃣ Zoom &amp; drag → 3️⃣ Upload or pick a frame → 4️⃣ Download and share in social media
      <br />
      Shape is automatic: round frames crop to circle, square frames stay square.
    </p>



    <div class="social">







      <!-- Generic Share -->
      <div class="fp-btn share-generic" id="shareGenericBtn">
        <i class="fa fa-share-alt"></i>
        <span>
          Share
        </span>
      </div>

      <!-- Download Button -->
      <div class="fp-btn download-generic download-btn">
        <i class="fa fa-download"></i>
        <span>
          Download
        </span>
      </div>
    </div> <!-- Close .social div -->

    <!-- Footer -->
    <footer
      style="width: 100%; background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(10px); padding: 40px 20px; border-top: 1px solid rgba(255,255,255,0.3); margin-top: 30px; border-radius: 15px;">
      <div style="max-width: 800px; margin: 0 auto; text-align: center;">

        <h6 style="color: #1e293b; letter-spacing: 1px; margin-bottom: 20px; font-size: 14px; font-weight: 800;">FOLLOW
          US ON</h6>

        <div class="footer-grid">

          <!-- Group 1 -->
          <div class="footer-item no-hover">
            <img src="logo1.jpeg" alt="logo1" class="brand-logo">
            <div class="social-links">
              <a href="https://www.facebook.com/earshath/" target="_blank"><img src="fb.png" alt="fb"></a>
              <a href="https://www.instagram.com/sindhika_maatirgala/" target="_blank"><img src="insta.png"
                  alt="insta"></a>
              <a href="https://www.youtube.com/@SindhikaMaatirgala-mp1st-youtube" target="_blank"><img src="youtube.png"
                  alt="youtube"></a>
            </div>
          </div>

          <!-- Group 2 -->
          <div class="footer-item no-hover">
            <img src="logo2.jpeg" alt="logo2" class="brand-logo">
            <div class="social-links">
              <a href="https://www.facebook.com/earshath/" target="_blank"><img src="fb.png" alt="fb"></a>
              <a href="https://www.instagram.com/sindhikum_samugam/" target="_blank"><img src="insta.png"
                  alt="insta"></a>
              <a href="https://www.youtube.com/@SindhikaMaatirgala-mp1st-youtube" target="_blank"><img src="youtube.png"
                  alt="youtube"></a>
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
              <span style="font-size: 13px; color: #fff; font-weight: bold;"><i class="fa-brands fa-whatsapp"
                  style="margin-right: 5px; font-size: 16px;"></i> +91-8939041923</span>
            </div>
          </div>

        </div>

        <p style="margin-top: 40px; color: #64748b; font-size: 12px; font-weight: 500;">&copy; <?= date('Y') ?>
           Sindhikum Samugam Trust. All Rights Reserved.</p>
      </div>
    </footer>
  </div>

  <!-- Photo Alert Modal -->
  <div class="modal fade" id="photoAlertModal" tabindex="-1" aria-labelledby="photoAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content" style="border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
        <div class="modal-header" style="border-bottom: none; padding-bottom: 0;">
          <h5 class="modal-title" id="photoAlertModalLabel" style="font-weight: 700; color: #1e293b; font-size: 18px;">
            <i class="fa fa-info-circle text-primary me-2"></i>Notice
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="color: #64748b; text-align: center; padding: 20px;">
          <p id="photoAlertModalMessage" style="margin: 0; font-size: 16px; font-weight: 500;">Please upload your photo
          </p>
        </div>
        <div class="modal-footer"
          style="border-top: none; justify-content: center; padding-top: 0; padding-bottom: 20px;">
          <button type="button" class="btn" data-bs-dismiss="modal"
            style="background: linear-gradient(135deg, #6a5af9, #8e8af9); color: white; border-radius: 25px; padding: 8px 30px; font-weight: 600;">OK</button>
        </div>
      </div>
    </div>
  </div>


  <!-- iOS Share Bottom-Sheet Modal -->
  <div id="iosShareModal" style="display:none;" aria-modal="true" role="dialog" aria-label="Share options">
    <div id="iosShareBackdrop"></div>
    <div id="iosShareSheet">
      <div id="iosShareHandle"></div>
      <h5 id="iosShareTitle"><i class="fa fa-share-alt"></i> Share Your DP</h5>
      <p id="iosShareSubtitle">Choose where to share your profile picture</p>
      <div id="iosShareBtns">
        <button id="iosShareFbBtn" class="ios-share-option ios-fb">
          <i class="fa-brands fa-facebook-f"></i>
          <div><span>Share on Facebook</span><small>With image &amp; link preview</small></div>
        </button>
        <button id="iosShareWaBtn" class="ios-share-option ios-wa">
          <i class="fa-brands fa-whatsapp"></i>
          <div><span>Share on WhatsApp</span><small>Send link via WhatsApp</small></div>
        </button>
        <button id="iosShareCopyBtn" class="ios-share-option ios-copy">
          <i class="fa fa-link"></i>
          <div><span>Copy Link</span><small>Paste anywhere you like</small></div>
        </button>
      </div>
      <button id="iosShareCancelBtn">Cancel</button>
    </div>
  </div>

  <style>
    #iosShareModal { position:fixed;inset:0;z-index:9999;display:flex;align-items:flex-end;justify-content:center; }
    #iosShareBackdrop { position:absolute;inset:0;background:rgba(0,0,0,0.5);backdrop-filter:blur(4px);-webkit-backdrop-filter:blur(4px); }
    #iosShareSheet { position:relative;z-index:1;width:100%;max-width:480px;background:#fff;border-radius:24px 24px 0 0;padding:12px 20px 40px;box-shadow:0 -8px 40px rgba(0,0,0,0.18);transform:translateY(100%);transition:transform 0.32s cubic-bezier(0.34,1.1,0.64,1); }
    #iosShareModal.ios-share-visible #iosShareSheet { transform:translateY(0); }
    #iosShareHandle { width:40px;height:5px;background:#d1d5db;border-radius:3px;margin:0 auto 18px; }
    #iosShareTitle { font-family:'Outfit',sans-serif;font-size:17px;font-weight:700;color:#1e293b;margin:0 0 4px;text-align:center; }
    #iosShareSubtitle { font-size:13px;color:#64748b;text-align:center;margin-bottom:20px; }
    #iosShareBtns { display:flex;flex-direction:column;gap:10px;margin-bottom:14px; }
    .ios-share-option { display:flex;align-items:center;gap:14px;width:100%;padding:14px 18px;border:none;border-radius:16px;cursor:pointer;text-align:left;color:#fff;font-family:'Outfit',sans-serif;transition:transform 0.15s,opacity 0.15s; }
    .ios-share-option:active { transform:scale(0.97);opacity:0.9; }
    .ios-share-option i { font-size:22px;width:28px;text-align:center;flex-shrink:0; }
    .ios-share-option span { font-size:15px;font-weight:700;display:block;line-height:1.2; }
    .ios-share-option small { font-size:11px;opacity:0.85;display:block;margin-top:2px; }
    .ios-fb { background:linear-gradient(135deg,#1877f2,#0a5ecb); }
    .ios-wa { background:linear-gradient(135deg,#25d366,#128c7e); }
    .ios-copy { background:linear-gradient(135deg,#6a5af9,#8e8af9); }
    #iosShareCancelBtn { width:100%;padding:14px;background:#f1f5f9;border:none;border-radius:16px;font-family:'Outfit',sans-serif;font-size:15px;font-weight:600;color:#475569;cursor:pointer;transition:background 0.2s; }
    #iosShareCancelBtn:active { background:#e2e8f0; }
  </style>
  <script src="script.js?v=<?= time() ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>