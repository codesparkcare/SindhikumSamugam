<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin - Frame Management</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
  <style>
    body {
      background: #0f172a;
      color: #f8fafc;
      font-family: 'Outfit', sans-serif;
      display: flex;
      justify-content: center;
      padding: 40px 20px;
    }
    .admin-card {
      background: #1e293b;
      padding: 30px;
      border-radius: 20px;
      max-width: 800px;
      width: 100%;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
      border: 1px solid rgba(255,255,255,0.1);
    }
    h1 { font-size: 24px; font-weight: 800; margin-bottom: 30px; text-align: center; background: linear-gradient(to right, #60a5fa, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .upload-section {
      background: rgba(255,255,255,0.05);
      padding: 20px;
      border-radius: 15px;
      margin-bottom: 30px;
    }
    .frame-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
      gap: 15px;
      margin-top: 20px;
    }
    .frame-item {
      position: relative;
      border-radius: 12px;
      overflow: hidden;
      aspect-ratio: 1;
      border: 2px solid transparent;
      cursor: pointer;
      transition: all 0.2s;
    }
    .frame-item.active {
      border-color: #3b82f6;
      box-shadow: 0 0 15px rgba(59, 130, 246, 0.4);
    }
    .frame-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .btn-primary { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); border: none; font-weight: 600; padding: 10px 20px; border-radius: 10px; }
    .btn-danger { background: #ef4444; border: none; font-weight: 600; padding: 10px 20px; border-radius: 10px; width: 100%; margin-top: 20px; }
    .logout-link { display: block; text-align: center; margin-top: 20px; color: #94a3b8; text-decoration: none; font-size: 14px; }
    .logout-link:hover { color: #f8fafc; }
    .frame-item { cursor: grab; }
    .frame-item:active { cursor: grabbing; }
    .sortable-ghost { opacity: 0.4; background: #3b82f6; }
    .sort-handle {
      position: absolute;
      top: 5px;
      left: 5px;
      background: rgba(0,0,0,0.5);
      color: white;
      padding: 2px 5px;
      border-radius: 4px;
      font-size: 10px;
      z-index: 10;
      pointer-events: none;
    }
  </style>
</head>
<body>

  <div class="admin-card">
    <h1>Frame Management Panel</h1>
    
    <!-- Stats Section -->
    <div class="row g-3 mb-4">
      <div class="col-md-6">
        <div class="p-3 rounded-4 bg-primary bg-opacity-10 border border-primary border-opacity-25 text-center">
          <small class="text-primary fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 1px;">Total Shares</small>
          <div id="totalShares" class="fs-2 fw-bold text-primary">0</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-3 rounded-4 bg-info bg-opacity-10 border border-info border-opacity-25 text-center">
          <small class="text-info fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 1px;">Total Views</small>
          <div id="totalViews" class="fs-2 fw-bold text-info">0</div>
        </div>
      </div>
    </div>

    <!-- Upload Section -->
    <div class="upload-section">
      <h5 class="mb-3">Upload New Frame(s) (PNG only)</h5>
      <form action="upload_frame.php" method="POST" enctype="multipart/form-data" class="d-flex gap-2 align-items-center">
        <input type="file" name="frameFile[]" class="form-control" accept="image/png" multiple required>
        <button class="btn btn-primary" type="submit">Upload</button>
      </form>
    </div>

    <!-- Share Page Settings Section -->
    <div class="upload-section">
      <h5 class="mb-3">Share Page Settings</h5>
      <?php
      $settingsFile = 'assets/share_settings.json';
      $settings = ['desc1' => '', 'desc2' => ''];
      if (file_exists($settingsFile)) {
        $settings = json_decode(file_get_contents($settingsFile), true);
      }
      ?>
      <div class="mb-3">
        <label class="form-label d-flex justify-content-between">
          Description 1 (Top Block)
          <span id="desc1Count" class="text-secondary small">0 / 246</span>
        </label>
        <textarea id="desc1" class="form-control bg-dark text-white border-secondary" rows="3" maxlength="246"><?= htmlspecialchars($settings['desc1'] ?? '') ?></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label d-flex justify-content-between">
          Description 2 (Bottom Block)
          <span id="desc2Count" class="text-secondary small">0 / 391</span>
        </label>
        <textarea id="desc2" class="form-control bg-dark text-white border-secondary" rows="3" maxlength="391"><?= htmlspecialchars($settings['desc2'] ?? '') ?></textarea>
      </div>
      <button id="saveSettingsBtn" class="btn btn-primary w-100">
        <i class="fa fa-save me-2"></i> Save Settings
      </button>
    </div>

    <!-- Frame List Section -->
    <h5 class="mt-4">Current Frames</h5>
    <div class="frame-grid" id="frameGrid">
      <?php
      $folder = "assets/frames/";
      if (!is_dir($folder)) mkdir($folder, 0755, true);
      $allowed = ['png', 'jpg', 'jpeg', 'webp'];
      
      // Get actual files on disk
      $actualFiles = array_diff(scandir($folder), array('..', '.'));
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

      // Merge: files in order first, then any new ones not in order
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

      foreach ($finalFiles as $file) {
          echo "
          <div class='frame-item' data-file='{$file}'>
            <div class='sort-handle'><i class='fa fa-arrows-alt'></i></div>
            <img src='{$folder}{$file}' alt='{$file}' />
          </div>";
      }
      ?>
    </div>

    <div class="d-flex gap-2">
      <button id="saveOrderBtn" class="btn btn-primary mt-3 w-100" style="display:none;">
        <i class="fa fa-save me-2"></i> Save New Order
      </button>
      <button id="deleteFrameBtn" class="btn btn-danger" style="display:none;">
        <i class="fa fa-trash me-2"></i> Delete Selected
      </button>
    </div>

    <a href="index.php" class="logout-link">Back to Website</a>
  </div>

  <script>
    let selectedFrameFile = null;

    // Handle frame selection
    document.querySelectorAll(".frame-item").forEach(item => {
      item.addEventListener("click", function () {
        selectedFrameFile = this.dataset.file;

        // Highlight selected
        document.querySelectorAll(".frame-item").forEach(el => el.classList.remove("active"));
        this.classList.add("active");

        // Show delete button
        document.getElementById("deleteFrameBtn").style.display = "block";
      });
    });

    // Initialize Sortable
    const grid = document.getElementById('frameGrid');
    const saveOrderBtn = document.getElementById('saveOrderBtn');

    new Sortable(grid, {
      animation: 150,
      ghostClass: 'sortable-ghost',
      onEnd: function() {
        saveOrderBtn.style.display = 'block';
      }
    });

    // Handle saving order
    saveOrderBtn.addEventListener("click", function() {
      const order = [];
      document.querySelectorAll(".frame-item").forEach(item => {
        order.push(item.dataset.file);
      });

      const formData = new URLSearchParams();
      order.forEach(file => formData.append("order[]", file));

      fetch("save_order.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.status === "success") {
          saveOrderBtn.style.display = 'none';
          alert("Order saved successfully!");
        } else {
          alert("Error: " + data.message);
        }
      })
      .catch(err => alert("Error saving order"));
    });

    // Handle saving settings
    document.getElementById("saveSettingsBtn").addEventListener("click", function() {
      const desc1 = document.getElementById("desc1").value;
      const desc2 = document.getElementById("desc2").value;

      const formData = new URLSearchParams();
      formData.append("desc1", desc1);
      formData.append("desc2", desc2);

      fetch("save_settings.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.status === "success") {
          alert("Settings saved successfully!");
        } else {
          alert("Error: " + data.message);
        }
      })
      .catch(err => alert("Error saving settings"));
    });

    // Character counters
    const d1 = document.getElementById('desc1');
    const d2 = document.getElementById('desc2');
    const d1c = document.getElementById('desc1Count');
    const d2c = document.getElementById('desc2Count');

    function updateCounts() {
      d1c.textContent = `${d1.value.length} / 246`;
      d2c.textContent = `${d2.value.length} / 391`;
    }

    d1.addEventListener('input', updateCounts);
    d2.addEventListener('input', updateCounts);
    updateCounts();

    // Auto-update sharing stats
    function fetchLiveStats() {
      fetch("track_stats.php?action=get")
        .then(res => res.json())
        .then(data => {
          document.getElementById('totalShares').textContent = data.total_shares || 0;
          document.getElementById('totalViews').textContent = data.total_views || 0;
        })
        .catch(err => console.error("Stats fetch failed:", err));
    }

    // Initial fetch and set interval (5 seconds)
    fetchLiveStats();
    setInterval(fetchLiveStats, 5000);

    // Handle deletion
    document.getElementById("deleteFrameBtn").addEventListener("click", function () {
      if (!selectedFrameFile) return;

      if (!confirm("Are you sure you want to delete this frame?")) return;

      const formData = new URLSearchParams();
      formData.append("file", selectedFrameFile);

      fetch("delete_frame.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: formData
      })
      .then(res => res.text())
      .then(data => {
        // Simple reload to refresh the list
        location.reload();
      })
      .catch(err => alert("Error deleting frame"));
    });
  </script>
</body>
</html>
