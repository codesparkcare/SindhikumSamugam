<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Codespark Software Company-Profile DB</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    .appcontainer {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 30px;
      border-radius: 24px;
      max-width: 680px;
      width: 100%;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
      text-align: center;
      border: 1px solid rgba(255, 255, 255, 0.4);
    }

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



    /* Footer / Follow Us Section */
    .footer-section {
      margin-top: 50px;
      padding: 40px 20px;
      background: rgba(255, 255, 255, 0.4);
      backdrop-filter: blur(10px);
      border-radius: 24px;
      border: 1px solid rgba(255, 255, 255, 0.3);
      display: flex;
      flex-direction: column;
      gap: 25px;
    }

    .footer-label {
      text-transform: uppercase;
      letter-spacing: 1.5px;
      font-size: 14px;
      font-weight: 800;
      color: #1e293b;
      margin-bottom: 5px;
      position: relative;
      display: inline-block;
    }

    .brand-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #f1f5f9;
      padding: 18px 26px;
      border-radius: 20px;
      border: 1px solid #e2e8f0;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .brand-row:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
      background: #ffffff;
      border-color: #3b82f6;
    }

    .brand-info {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .brand-logo {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      object-fit: cover;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .social-links {
      display: flex;
      gap: 12px;
    }

    .social-icon {
      width: 42px;
      height: 42px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #ffffff;
      text-decoration: none;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-size: 19px;
      border: 1px solid #e2e8f0;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
    }

    /* Default Icon Colors */
    .social-icon.fb {
      color: #1877f2;
    }

    .social-icon.insta {
      color: #e4405f;
    }

    .social-icon.yt {
      color: #ff0000;
    }

    .social-icon:hover {
      transform: translateY(-4px);
      color: #ffffff !important;
      border-color: transparent;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
    }

    /* Hover Backgrounds */
    .social-icon.fb:hover {
      background: #1877f2;
    }

    .social-icon.insta:hover {
      background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    }

    .social-icon.yt:hover {
      background: #ff0000;
    }

    .contact-box {
      display: flex;
      align-items: center;
      gap: 15px;
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      padding: 16px 24px;
      border-radius: 20px;
      color: #fff;
      margin-top: 10px;
      box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
    }

    .contact-text small {
      display: block;
      color: rgba(255, 255, 255, 0.8);
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .contact-text span {
      color: #fff;
      font-size: 15px;
      font-weight: 700;
    }

    .contact-number {
      margin-left: auto;
      color: #10b981;
      font-family: 'Inter', sans-serif;
      font-weight: 700;
      font-size: 14px;
      background: #fff;
      padding: 10px 18px;
      border-radius: 12px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
    }

    .contact-number:hover {
      transform: scale(1.05);
      background: #f8fafc;
      color: #059669;
    }

    @media (max-width: 576px) {
      .brand-row {
        flex-direction: column;
        gap: 15px;
        padding: 20px;
        text-align: center;
      }

      .brand-info {
        flex-direction: column;
      }

      .contact-box {
        flex-direction: column;
        text-align: center;
        padding: 24px;
      }

      .contact-number {
        margin-left: 0;
        width: 100%;
        justify-content: center;
      }
    }

    /* Header Styles */
    .app-header {
      margin-bottom: 30px;
    }

    .app-title {
      font-size: 2.8rem;
      font-weight: 800;
      background: linear-gradient(135deg, #2563eb, #7c3aed);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin: 0;
      letter-spacing: -1px;
      line-height: 1.2;
    }

    .app-subtitle {
      color: #486581;
      font-size: 0.95rem;
      margin-top: 8px;
      font-weight: 500;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }
  </style>
</head>

<body>
  <div class="appcontainer">
    <div class="app-header">
      <h1 class="app-title">DP MAKER</h1>
      <p class="app-subtitle">Create Perfect Profile Pictures</p>
    </div>

    <div class="controls">
      <label class="file-label primary">
        Choose YourPhoto
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
      <canvas id="previewCanvas" width="512" height="512"></canvas>
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



    </div>

    <div class="footer-section">
      <div class="footer-label">Follow Us On</div>

      <!-- Brand 1 -->
      <div class="brand-row">
        <div class="brand-info">
          <img src="logo1.jpeg" alt="Logo" class="brand-logo">
        </div>
        <div class="social-links">
          <a href="#" class="social-icon fb"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social-icon insta"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-icon yt"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <!-- Brand 2 -->
      <div class="brand-row">
        <div class="brand-info">
          <img src="logo2.jpeg" alt="Logo" class="brand-logo">
        </div>
        <div class="social-links">
          <a href="#" class="social-icon fb"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social-icon insta"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-icon yt"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <!-- Quran Contact Section -->
      <div class="contact-box">
        <img src="quran.jpeg" alt="Quran" class="brand-logo" style="border-radius: 12px; width: 50px; height: 50px;">
        <div class="contact-text">
          <small>Free Gift (Non-Muslims Only)</small>
          <span>Contact us for a FREE Quran</span>
        </div>
        <a href="tel:+918734388382" class="contact-number">
          <i class="fas fa-phone-alt"></i>
          +91 87343 88382
        </a>
      </div>

      <!-- Footer Credit -->
      <div class="footer-credit">
        <a href="https://sindhikumsamugam.com" class="codes" target="_blank"
          style="color: #64748b; font-weight: 500;">Developed by Codespark</a>
      </div>

    </div>



    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script>
      canvas.addEventListener("mousedown", (e) => {
        if (!userImage) return;
        isDragging = true;
        const pos = getCanvasCoords(e);
        dragStartX = pos.x;
        dragStartY = pos.y;
        dragStartOffsetX = offsetX;
        dragStartOffsetY = offsetY;
      });

      canvas.addEventListener("mousemove", (e) => {
        if (!isDragging) return;
        const pos = getCanvasCoords(e);
        const dx = pos.x - dragStartX;
        const dy = pos.y - dragStartY;
        offsetX = dragStartOffsetX + dx;
        offsetY = dragStartOffsetY + dy;
        draw();
      });

      canvas.addEventListener("mouseup", () => {
        isDragging = false;
      });

      canvas.addEventListener("mouseleave", () => {
        isDragging = false;
      });

      canvas.addEventListener("touchstart", (e) => {
        if (!userImage) return;
        isDragging = true;
        const pos = getCanvasCoords(e);
        dragStartX = pos.x;
        dragStartY = pos.y;
        dragStartOffsetX = offsetX;
        dragStartOffsetY = offsetY;
      });

      canvas.addEventListener("touchmove", (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const pos = getCanvasCoords(e);
        const dx = pos.x - dragStartX;
        const dy = pos.y - dragStartY;
        offsetX = dragStartOffsetX + dx;
        offsetY = dragStartOffsetY + dy;
        draw();
      }, { passive: false });

      canvas.addEventListener("touchend", () => {
        isDragging = false;
      });

    </script>

    <script>

      function downloadCanvasImage(filename = "profile-picture.png") {
        const canvas = document.getElementById("previewCanvas");
        if (!canvas || !canvas.toDataURL) {
          // alert removed
          return;
        }

        const imageURL = canvas.toDataURL("image/png");

        // If running locally (file://), open in new tab for manual save
        if (window.location.protocol === "file:") {
          const w = window.open();
          w.document.write(`<img src="${imageURL}" style="width:512px;height:512px;" />`);
          // alert removed
          return;
        }

        // Trigger automatic download
        const a = document.createElement("a");
        a.href = imageURL;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
      }

      // Attach download to all social links
      document.addEventListener("DOMContentLoaded", () => {
        const socialDownloadLinks = document.querySelectorAll(".social .download-btn");

        socialDownloadLinks.forEach(link => {
          link.addEventListener("click", (e) => {
            e.preventDefault();
            const filename = link.dataset.filename || "profile-picture.png";
            downloadCanvasImage(filename);
          });
        });
      });

    </script>
    <script>

      function uploadCanvasAndGetURL(callback) {
        const canvas = document.getElementById("previewCanvas");
        if (!canvas) return;

        canvas.toBlob(function (blob) {
          const formData = new FormData();
          formData.append("profilePic", blob, "profile.png");

          fetch("upload_canvas.php", { method: "POST", body: formData })
            .then(res => res.json())
            .then(data => {
              if (data.url) {
                callback(data.url); // returns public URL
              } else {
                alert("Upload failed");
              }
            })
            .catch(err => alert("Upload error"));
        });
      }

      document.addEventListener("DOMContentLoaded", () => {




        // Facebook



        // Generic Native Share
        const shareBtn = document.getElementById("shareGenericBtn");
        if (shareBtn) {
          shareBtn.addEventListener("click", (e) => {
            e.preventDefault();

            const canvas = document.getElementById("previewCanvas");
            if (!canvas) return;

            // Try direct file share first for immediate action
            if (navigator.canShare && navigator.share) {
              canvas.toBlob((blob) => {
                if (!blob) return;
                const file = new File([blob], "my-dp.png", { type: "image/png" });

                if (navigator.canShare({ files: [file] })) {
                  navigator.share({
                    files: [file],
                    title: 'Check out my new DP!',
                    text: 'Created with Click & Create your own dp',
                  }).catch(err => {
                    if (err.name !== 'AbortError') console.error('Share failed:', err);
                  });
                } else {
                  // Fallback to URL sharing if file sharing not supported
                  uploadCanvasAndGetURL(url => {
                    navigator.share({
                      title: 'Check out my new DP!',
                      text: 'Created with Click & Create your own dp',
                      url: url
                    }).catch(console.error);
                  });
                }
              }, "image/png");
            } else {
              // Browser doesn't support navigator.share at all
              uploadCanvasAndGetURL(url => {
                prompt("Copy this link to share:", url);
              });
            }
          });
        }

      });
    </script>





</body>

</html>