console.log("script.js loaded v2");
const canvas = document.getElementById("previewCanvas");
const ctx = canvas ? canvas.getContext("2d") : null;

const photoInput = document.getElementById("photoInput");
const zoomRange = document.getElementById("zoomRange");
const frameUpload = document.getElementById("frameUpload");
const downloadBtn = document.getElementById("downloadBtn");
const frameButtons = document.querySelectorAll(".frame-btn");

const canvasSize = 1024;
let userImage = null;
let frameImage = new Image();
let currentShape = "square"; // 'square' or 'round'

let zoom = 1;
let offsetX = 0;
let offsetY = 0;
let isDragging = false;
let dragStartX = 0;
let dragStartY = 0;
let dragStartOffsetX = 0;
let dragStartOffsetY = 0;

// Initialize frame from the currently active button (set by PHP)
document.addEventListener("DOMContentLoaded", () => {
  const activeBtn = document.querySelector(".frame-btn.active");
  if (activeBtn) {
    currentShape = activeBtn.getAttribute("data-shape") === "round" ? "round" : "square";
    frameImage.src = activeBtn.getAttribute("data-frame");
    frameImage.onload = () => {
      draw();
    };
  } else if (frameButtons.length > 0) {
    const firstBtn = frameButtons[0];
    firstBtn.classList.add("active");
    currentShape = firstBtn.getAttribute("data-shape") === "round" ? "round" : "square";
    frameImage.src = firstBtn.getAttribute("data-frame");
    frameImage.onload = () => {
      draw();
    };
  }
});

if (photoInput) {
  photoInput.addEventListener("change", (event) => {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (e) => {
      userImage = new Image();
      userImage.onload = () => {
        zoom = zoomRange ? parseFloat(zoomRange.value) : 1;
        offsetX = 0;
        offsetY = 0;
        draw();
        if (downloadBtn) downloadBtn.disabled = false;
      };
      userImage.src = e.target.result;
    };
    reader.readAsDataURL(file);
  });
}

if (zoomRange) {
  zoomRange.addEventListener("input", (e) => {
    zoom = parseFloat(e.target.value);
    if (userImage) draw();
  });
}

frameButtons.forEach((btn) => {
  btn.addEventListener("click", () => {
    frameButtons.forEach((b) => b.classList.remove("active"));
    btn.classList.add("active");

    currentShape = btn.getAttribute("data-shape") === "round" ? "round" : "square";

    const src = btn.getAttribute("data-frame");
    frameImage = new Image();
    frameImage.src = src;
    frameImage.onload = () => draw();
  });
});

if (frameUpload) {
  frameUpload.addEventListener("change", (event) => {
    const file = event.target.files[0];
    if (!file) return;

    if (file.type !== "image/png") {
      showAlertModal("Please upload a PNG frame (512×512).");
      return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
      frameButtons.forEach((b) => b.classList.remove("active"));
      frameImage = new Image();
      frameImage.onload = () => {
        detectShapeFromFrame();
        draw();
      };
      frameImage.src = e.target.result;
    };
    reader.readAsDataURL(file);
  });
}

function detectShapeFromFrame() {
  if (!frameImage || !frameImage.complete) return;
  try {
    const off = document.createElement("canvas");
    off.width = off.height = canvasSize;
    const octx = off.getContext("2d");
    octx.clearRect(0, 0, canvasSize, canvasSize);
    octx.drawImage(frameImage, 0, 0, canvasSize, canvasSize);
    const imgData = octx.getImageData(0, 0, canvasSize, canvasSize);
    function alphaAt(x, y) {
      const ix = (Math.floor(y) * canvasSize + Math.floor(x)) * 4 + 3;
      return imgData.data[ix];
    }
    const pts = [
      [10, 10],
      [canvasSize - 10, 10],
      [10, canvasSize - 10],
      [canvasSize - 10, canvasSize - 10],
    ];
    let allTransparent = pts.every(([x, y]) => alphaAt(x, y) < 20);
    currentShape = allTransparent ? "round" : "square";
  } catch (e) {
    currentShape = "square";
  }
}

function getCanvasCoords(evt) {
  if (!canvas) return { x: 0, y: 0 };
  const rect = canvas.getBoundingClientRect();
  let clientX, clientY;

  if (evt.touches && evt.touches.length > 0) {
    clientX = evt.touches[0].clientX;
    clientY = evt.touches[0].clientY;
  } else {
    clientX = evt.clientX;
    clientY = evt.clientY;
  }

  const x = ((clientX - rect.left) / rect.width) * canvas.width;
  const y = ((clientY - rect.top) / rect.height) * canvas.height;
  return { x, y };
}

if (canvas) {
  // Zoom functionality
  canvas.addEventListener("wheel", (e) => {
    if (!userImage) return;
    e.preventDefault();

    const zoomStep = 0.05;
    const delta = e.deltaY > 0 ? -zoomStep : zoomStep;
    let newZoom = zoom + delta;

    const minZoom = zoomRange ? parseFloat(zoomRange.min) : 0.3;
    const maxZoom = zoomRange ? parseFloat(zoomRange.max) : 3;
    newZoom = Math.min(Math.max(newZoom, minZoom), maxZoom);

    zoom = newZoom;
    if (zoomRange) zoomRange.value = zoom;
    draw();
  }, { passive: false });

  // Drag Handling
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

  // Touch Handling
  let initialPinchDistance = null;
  let lastZoom = 1;

  canvas.addEventListener("touchstart", (e) => {
    if (!userImage) return;

    if (e.touches.length === 1) {
      isDragging = true;
      const pos = getCanvasCoords(e);
      dragStartX = pos.x;
      dragStartY = pos.y;
      dragStartOffsetX = offsetX;
      dragStartOffsetY = offsetY;
    } else if (e.touches.length === 2) {
      isDragging = false;
      initialPinchDistance = getPinchDistance(e.touches);
      lastZoom = zoom;
    }
  });

  canvas.addEventListener("touchmove", (e) => {
    if (!userImage) return;
    e.preventDefault();

    if (e.touches.length === 1 && isDragging) {
      const pos = getCanvasCoords(e);
      const dx = pos.x - dragStartX;
      const dy = pos.y - dragStartY;
      offsetX = dragStartOffsetX + dx;
      offsetY = dragStartOffsetY + dy;
      draw();
    } else if (e.touches.length === 2 && initialPinchDistance) {
      const currentDistance = getPinchDistance(e.touches);
      const scale = currentDistance / initialPinchDistance;
      let newZoom = lastZoom * scale;

      const minZoom = zoomRange ? parseFloat(zoomRange.min) : 0.3;
      const maxZoom = zoomRange ? parseFloat(zoomRange.max) : 3;
      newZoom = Math.min(Math.max(newZoom, minZoom), maxZoom);

      zoom = newZoom;
      if (zoomRange) zoomRange.value = zoom;
      draw();
    }
  }, { passive: false });

  canvas.addEventListener("touchend", () => {
    isDragging = false;
    initialPinchDistance = null;
  });
}

function getPinchDistance(touches) {
  const dx = touches[0].clientX - touches[1].clientX;
  const dy = touches[0].clientY - touches[1].clientY;
  return Math.sqrt(dx * dx + dy * dy);
}

function draw() {
  if (!ctx) return;
  ctx.clearRect(0, 0, canvasSize, canvasSize);

  if (userImage) {
    const iw = userImage.width;
    const ih = userImage.height;

    const baseScale = Math.max(canvasSize / iw, canvasSize / ih);
    const finalScale = baseScale * zoom;

    const newW = iw * finalScale;
    const newH = ih * finalScale;

    const centerX = canvasSize / 2;
    const centerY = canvasSize / 2;

    const dx = centerX - newW / 2 + offsetX;
    const dy = centerY - newH / 2 + offsetY;

    if (currentShape === "round") {
      ctx.save();
      ctx.beginPath();
      ctx.arc(centerX, centerY, canvasSize / 2, 0, Math.PI * 2);
      ctx.clip();
      ctx.drawImage(userImage, dx, dy, newW, newH);
      ctx.restore();
    } else {
      ctx.fillStyle = "#000000";
      ctx.fillRect(0, 0, canvasSize, canvasSize);
      ctx.drawImage(userImage, dx, dy, newW, newH);
    }
  } else {
    ctx.fillStyle = "#ffffff";
    ctx.fillRect(0, 0, canvasSize, canvasSize);
  }

  if (frameImage && frameImage.complete) {
    ctx.drawImage(frameImage, 0, 0, canvasSize, canvasSize);
  }
}

if (downloadBtn) {
  downloadBtn.addEventListener("click", () => {
    if (!userImage) {
      showAlertModal("Please upload your photo");
      return;
    }
    if (!canvas) return;
    const link = document.createElement("a");
    link.download = "profile-512x512.png";
    link.href = canvas.toDataURL("image/png");
    link.click();
  });
}

function downloadCanvasImage(filename = "profile-picture.png") {
  if (!userImage) {
    showAlertModal("Please upload your photo");
    return;
  }
  if (!canvas || !canvas.toDataURL) {
    return;
  }

  const imageURL = canvas.toDataURL("image/png");

  if (window.location.protocol === "file:") {
    const w = window.open();
    w.document.write(`<img src="${imageURL}" style="width:512px;height:512px;" />`);
    showAlertModal("Right-click the image and choose 'Save image as...' to download.");
    return;
  }

  const a = document.createElement("a");
  a.href = imageURL;
  a.download = filename;
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
}

let cachedShareURL = null;
let cachedBlob = null;
let prepareTimer = null;

// Debounced function to pre-upload the canvas for faster/instant sharing
function prepareShare() {
  if (!userImage || !canvas) return;

  // We need both the blob (for sharing files) and the URL (for sharing links)
  canvas.toBlob((blob) => {
    if (!blob) return;
    cachedBlob = blob;

    const formData = new FormData();
    formData.append("profilePic", blob, "profile.jpg");

    fetch("upload_canvas.php", { method: "POST", body: formData })
      .then(res => res.json())
      .then(data => {
        if (data.url) {
          cachedShareURL = data.url;
          console.log("Share ready:", data.url);
        }
      })
      .catch(err => console.error("Pre-upload failed:", err));
  }, "image/jpeg", 0.85);
}

function invalidateCachedShare() {
  cachedShareURL = null;
  cachedBlob = null;
  clearTimeout(prepareTimer);
  prepareTimer = setTimeout(prepareShare, 1500); // Wait 1.5s after last edit to pre-upload
}

// Hook into interaction events to prepare share
if (zoomRange) {
  zoomRange.addEventListener("change", invalidateCachedShare);
}
if (canvas) {
  canvas.addEventListener("mouseup", invalidateCachedShare);
  canvas.addEventListener("touchend", invalidateCachedShare);
}
frameButtons.forEach(btn => btn.addEventListener("click", invalidateCachedShare));
if (photoInput) {
  photoInput.addEventListener("change", invalidateCachedShare);
}

document.addEventListener("DOMContentLoaded", () => {
  const socialDownloadLinks = document.querySelectorAll(".social .download-btn");

  socialDownloadLinks.forEach(link => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const filename = link.dataset.filename || "profile-picture.png";
      downloadCanvasImage(filename);
    });
  });

  const shareBtn = document.getElementById("shareGenericBtn");
  if (shareBtn) {
    shareBtn.addEventListener("click", async (e) => {
      e.preventDefault();
      if (!userImage) {
        showAlertModal("Please upload your photo");
        return;
      }

      const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

      // On iOS, show the custom share sheet to handle WhatsApp vs Facebook correctly
      const iosModal = document.getElementById("iosShareModal");
      if (isIOS && iosModal) {
        iosModal.style.display = "flex";
        setTimeout(() => iosModal.classList.add("ios-share-visible"), 10);
        return;
      }

      // If we have a cached URL and Blob, we can trigger navigator.share IMMEDIATELY (Android / Desktop)
      if (cachedShareURL && cachedBlob && navigator.share) {
        const shareTitle = "Click & Create your own dp";
        const baseDescription = "*Click & Create your own dp*\n\nசூனியம் என்பது பொய் பித்தலாட்டம்.";
        const shareData = {
          title: shareTitle,
          text: baseDescription,
          url: cachedShareURL
        };

        // On Android (!isIOS), we always include the file for full image sharing
        if (!isIOS && navigator.canShare && navigator.canShare({ files: [new File([cachedBlob], "p.jpg", { type: "image/jpeg" })] })) {
          const file = new File([cachedBlob], "profile.jpg", { type: "image/jpeg" });
          shareData.files = [file];
        }

        try {
          await navigator.share(shareData);
          countShare();
          return;
        } catch (err) {
          console.warn("Cached share failed", err);
        }
      }

      // FULL FLOW (Fallback or first-time click)
      const loader = document.getElementById("fullPageLoader");
      if (loader) loader.style.display = "flex";

      try {
        const blob = await new Promise(resolve => canvas.toBlob(resolve, "image/jpeg", 0.85));
        if (!blob) throw new Error("Could not generate image blob");

        const formData = new FormData();
        formData.append("profilePic", blob, "profile.jpg");

        const response = await fetch("upload_canvas.php", { method: "POST", body: formData });
        const data = await response.json();

        if (loader) loader.style.display = "none";

        if (data.url) {
          if (navigator.share) {
            const shareData = {
              title: "Click & Create your own dp",
              text: "*Click & Create your own dp*\n\nசூனியம் என்பது பொய் பித்தலாட்டம்.",
              url: data.url
            };

            if (!isIOS) {
              const file = new File([blob], "profile-picture.jpg", { type: "image/jpeg" });
              shareData.files = [file];
            }

            await navigator.share(shareData);
            countShare();
          } else {
            const textArea = document.createElement("textarea");
            textArea.value = data.url;
            document.body.appendChild(textArea);
            textArea.select();
            try {
              document.execCommand("copy");
              countShare();
              showAlertModal("Link copied! Paste it in Facebook or WhatsApp.");
            } catch (err) {
              prompt("Copy this link to share:", data.url);
            }
            document.body.removeChild(textArea);
          }
        } else {
          throw new Error(data.message || "Upload failed");
        }
      } catch (err) {
        if (loader) loader.style.display = "none";
        if (err.name !== 'AbortError' && err.name !== 'NotAllowedError') {
          console.error("Share error:", err);
          showAlertModal(err.message || "Share failed");
        }
      }
    });
  }

  // --- iOS Custom Share Sheet Handlers ---
  const iosModal = document.getElementById("iosShareModal");
  if (iosModal) {
    const closeIosModal = () => {
      iosModal.classList.remove("ios-share-visible");
      setTimeout(() => iosModal.style.display = "none", 350);
    };

    document.getElementById("iosShareBackdrop")?.addEventListener("click", closeIosModal);
    document.getElementById("iosShareCancelBtn")?.addEventListener("click", closeIosModal);

    // WhatsApp Handler for iOS (Share File for Full Visibility)
    document.getElementById("iosShareWaBtn")?.addEventListener("click", async () => {
      closeIosModal();
      try {
        const blob = cachedBlob || await new Promise(resolve => canvas.toBlob(resolve, "image/jpeg", 0.9));
        if (!blob) return;

        const file = new File([blob], "profile.jpg", { type: "image/jpeg" });
        const shareData = {
          files: [file],
          title: "Click & Create your own dp",
          text: "*Click & Create your own dp*\n\nசூனியம் என்பது பொய் பித்தலாட்டம்.",
          // Some versions of iOS WhatsApp prefer URL in text or omitted if file is present
          url: cachedShareURL || "" 
        };

        if (navigator.canShare && navigator.canShare(shareData)) {
          await navigator.share(shareData);
          countShare();
        } else {
          // Fallback to URL only if file share not supported
          await navigator.share({ url: cachedShareURL });
          countShare();
        }
      } catch (err) {
        console.error("WA Share error:", err);
      }
    });

    // Facebook Handler for iOS (Share URL only for best preview)
    document.getElementById("iosShareFbBtn")?.addEventListener("click", async () => {
      closeIosModal();
      try {
        await navigator.share({
          title: "Click & Create your own dp",
          url: cachedShareURL
        });
        countShare();
      } catch (err) {
        console.error("FB Share error:", err);
      }
    });

    // Copy Link Handler
    document.getElementById("iosShareCopyBtn")?.addEventListener("click", () => {
      closeIosModal();
      if (cachedShareURL) {
        navigator.clipboard.writeText(cachedShareURL).then(() => {
          showAlertModal("Link copied! Paste it in your app.");
        });
      }
    });
  }
});

// Deprecated in favor of the integrated logic in the click handler, 
// keeping for backward compatibility if needed by other components
function uploadCanvasAndGetURL(callback) {
  if (!canvas) {
    callback(null);
    return;
  }

  canvas.toBlob(function (blob) {
    const formData = new FormData();
    formData.append("profilePic", blob, "profile.jpg");

    fetch("upload_canvas.php", { method: "POST", body: formData })
      .then(res => res.json())
      .then(data => {
        if (data.url) {
          callback(data.url);
        } else {
          showAlertModal(data.message || "Upload failed");
          callback(null);
        }
      })
      .catch(err => {
        showAlertModal("Upload error");
        callback(null);
      });
  }, "image/jpeg", 0.85);
}

// Helper to show modern alert modal instead of window.alert
function showAlertModal(message) {
  const modalEl = document.getElementById('photoAlertModal');
  if (modalEl) {
    const msgEl = document.getElementById('photoAlertModalMessage');
    if (msgEl) msgEl.innerText = message;

    // Check if Bootstrap is available
    if (typeof bootstrap !== 'undefined') {
      const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
      modal.show();
    } else {
      window.alert(message);
    }
  } else {
    window.alert(message);
  }
}
// Helper to track shares
function countShare() {
  fetch("track_stats.php?action=increment&stat=total_shares").catch(err => console.error("Tracking failed:", err));
}
