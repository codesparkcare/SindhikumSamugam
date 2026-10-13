<?php $this->load->view('includes/header'); ?>

<!-- Compact Styling for Upload Product Page -->
<style>
    :root {
        --up-primary: #059669;
        --up-primary-hover: #047857;
        --up-dark: #0f172a;
        --up-border: #e2e8f0;
        --up-bg: #f8fafc;
        --up-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.06), 0 4px 6px -4px rgba(15, 23, 42, 0.03);
    }

    /* Compact Header Bar */
    .compact-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        color: #ffffff;
        padding: 5.5rem 1.25rem 1.25rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .compact-hero-container {
        max-width: 1040px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .compact-hero-left h1 {
        font-size: 1.55rem;
        font-weight: 800;
        margin: 0 0 0.2rem;
        letter-spacing: -0.01em;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .compact-hero-left p {
        font-size: 0.88rem;
        color: #94a3b8;
        margin: 0;
    }

    .btn-back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.45rem 1rem;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffffff;
        font-size: 0.82rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-back-link:hover {
        background: rgba(255, 255, 255, 0.2);
        color: #34d399;
    }

    /* Main Form Section */
    .compact-section {
        background: var(--up-bg);
        padding: 1.5rem 1.25rem 3rem;
    }

    .compact-container {
        max-width: 1040px;
        margin: 0 auto;
    }

    /* Main Card */
    .compact-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid var(--up-border);
        box-shadow: var(--up-shadow);
        padding: 1.75rem 2rem;
    }

    /* Single-line Notice Banner */
    .compact-notice {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 10px;
        padding: 0.6rem 1rem;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
        font-size: 0.84rem;
        color: #166534;
    }

    .compact-notice strong {
        color: #059669;
    }

    /* Grid Form System */
    .form-row-3 {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
        margin-bottom: 0.85rem;
    }

    .form-row-2-1 {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 1rem;
        margin-bottom: 0.85rem;
    }

    .form-row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 0.85rem;
    }

    .form-field {
        display: flex;
        flex-direction: column;
    }

    .form-field label {
        font-size: 0.82rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.3rem;
    }

    .form-field label .req {
        color: #ef4444;
    }

    .form-field .input-ctrl {
        width: 100%;
        padding: 0.62rem 0.85rem;
        border: 1.5px solid var(--up-border);
        border-radius: 10px;
        font-size: 0.88rem;
        font-family: inherit;
        background: #ffffff;
        color: var(--up-dark);
        transition: all 0.2s ease;
        box-sizing: border-box;
    }

    .form-field .input-ctrl:focus {
        border-color: var(--up-primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.12);
    }

    /* Compact Dropzone */
    .compact-dropzone {
        border: 2px dashed #cbd5e1;
        border-radius: 10px;
        padding: 0.75rem;
        text-align: center;
        background: #f8fafc;
        cursor: pointer;
        position: relative;
        height: 84px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .compact-dropzone:hover {
        border-color: var(--up-primary);
        background: #ecfdf5;
    }

    .compact-dropzone input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .dropzone-inner {
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .dropzone-inner span.icon {
        font-size: 1.4rem;
    }

    .dropzone-inner span.text {
        font-size: 0.82rem;
        font-weight: 600;
        color: #334155;
    }

    .dropzone-preview-thumb {
        display: none;
        max-height: 64px;
        border-radius: 6px;
        object-fit: cover;
    }

    /* Compact Action Buttons */
    .form-submit-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-top: 1.25rem;
        padding-top: 1rem;
        border-top: 1px solid var(--up-border);
    }

    .btn-submit-now {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 2rem;
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: #ffffff;
        font-weight: 700;
        font-size: 0.95rem;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        box-shadow: 0 8px 18px rgba(5, 150, 105, 0.3);
        transition: all 0.2s ease;
    }

    .btn-submit-now:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 22px rgba(5, 150, 105, 0.45);
    }

    /* Alert */
    .alert-banner {
        padding: 0.65rem 1rem;
        border-radius: 10px;
        margin-bottom: 1rem;
        font-size: 0.88rem;
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }
    .alert-success { background: #dcfce7; color: #15803d; border: 1px solid #86efac; }
    .alert-danger { background: #fee2e2; color: #b91c1c; border: 1px solid #fca5a5; }

    @media (max-width: 768px) {
        .form-row-3, .form-row-2-1, .form-row-2 {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
        .compact-card {
            padding: 1.25rem 1rem;
        }
        .form-submit-row {
            flex-direction: column;
            gap: 0.75rem;
        }
        .btn-submit-now {
            width: 100%;
        }
    }

    /* Allied Product Process Colorful Section */
    .allied-process-wrapper {
        margin-top: 2rem;
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid var(--up-border);
        box-shadow: var(--up-shadow);
        padding: 1.6rem 1.8rem;
        position: relative;
        overflow: hidden;
    }

    .allied-process-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981 0%, #6366f1 33%, #f59e0b 66%, #ec4899 100%);
    }

    .allied-process-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.35rem;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .allied-process-title-group h3 {
        font-size: 1.15rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 0.2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .allied-process-title-group p {
        margin: 0;
        font-size: 0.84rem;
        color: #64748b;
    }

    .allied-process-badge {
        font-size: 0.75rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 100%);
        color: #059669;
        border: 1px solid #a7f3d0;
        padding: 0.35rem 0.85rem;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }

    .allied-process-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.1rem;
    }

    .process-step-card {
        border-radius: 14px;
        padding: 1.25rem 1.1rem;
        transition: all 0.28s cubic-bezier(0.25, 0.8, 0.25, 1);
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .process-step-card:hover {
        transform: translateY(-5px);
    }

    /* Step 1 Colors (Emerald) */
    .step-card-1 {
        background: linear-gradient(180deg, #f0fdf4 0%, #ffffff 100%);
        border: 1.5px solid #bbf7d0;
    }
    .step-card-1:hover {
        box-shadow: 0 10px 22px rgba(16, 185, 129, 0.18);
        border-color: #86efac;
    }
    .step-badge-1 {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        box-shadow: 0 5px 12px rgba(16, 185, 129, 0.35);
    }
    .step-tag-1 { color: #059669; }

    /* Step 2 Colors (Indigo) */
    .step-card-2 {
        background: linear-gradient(180deg, #eef2ff 0%, #ffffff 100%);
        border: 1.5px solid #c7d2fe;
    }
    .step-card-2:hover {
        box-shadow: 0 10px 22px rgba(99, 102, 241, 0.18);
        border-color: #a5b4fc;
    }
    .step-badge-2 {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        box-shadow: 0 5px 12px rgba(99, 102, 241, 0.35);
    }
    .step-tag-2 { color: #4f46e5; }

    /* Step 3 Colors (Amber / Orange) */
    .step-card-3 {
        background: linear-gradient(180deg, #fffbeb 0%, #ffffff 100%);
        border: 1.5px solid #fde68a;
    }
    .step-card-3:hover {
        box-shadow: 0 10px 22px rgba(245, 158, 11, 0.18);
        border-color: #fcd34d;
    }
    .step-badge-3 {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        box-shadow: 0 5px 12px rgba(245, 158, 11, 0.35);
    }
    .step-tag-3 { color: #d97706; }

    /* Step 4 Colors (Pink / Rose) */
    .step-card-4 {
        background: linear-gradient(180deg, #fdf2f8 0%, #ffffff 100%);
        border: 1.5px solid #fbcfe8;
    }
    .step-card-4:hover {
        box-shadow: 0 10px 22px rgba(236, 72, 153, 0.18);
        border-color: #f472b6;
    }
    .step-badge-4 {
        background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
        box-shadow: 0 5px 12px rgba(236, 72, 153, 0.35);
    }
    .step-tag-4 { color: #db2777; }

    .step-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0.75rem;
    }

    .process-step-num {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
        font-weight: 800;
        flex-shrink: 0;
    }

    .step-pill-tag {
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .process-step-card h4 {
        margin: 0 0 0.25rem;
        font-size: 0.92rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.3;
    }

    .process-step-card p {
        margin: 0;
        font-size: 0.78rem;
        color: #64748b;
        line-height: 1.45;
    }

    @media (max-width: 900px) {
        .allied-process-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.85rem;
        }
        .allied-process-wrapper {
            padding: 1.25rem 1.25rem;
        }
    }

    @media (max-width: 520px) {
        .allied-process-grid {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
    }
</style>

<!-- Compact Top Header -->
<div class="compact-hero">
    <div class="compact-hero-container">
        <div class="compact-hero-left">
            <h1><span>📦</span> Upload Your Product</h1>
            <p>Admin verified & displayed with a live countdown timer</p>
        </div>
        <a href="<?php echo base_url('products'); ?>" class="btn-back-link">
            <span>← Back to Products</span>
        </a>
    </div>
</div>

<!-- Compact Form Section -->
<section class="compact-section">
    <div class="compact-container">

        <!-- Flash Notifications -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert-banner alert-success">
                <span>🎉</span>
                <span><?php echo $this->session->flashdata('success'); ?></span>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-banner alert-danger">
                <span>⚠️</span>
                <span><?php echo $this->session->flashdata('error'); ?></span>
            </div>
        <?php endif; ?>

        <div class="compact-card">
            <!-- 1-line verification notice -->
            <div class="compact-notice">
                <div>
                    <strong>🛡️ Verification Notice:</strong> Items are reviewed by admin trustees before going live with the countdown timer.
                </div>
                <span style="font-size: 0.78rem; color: #047857;">⏱️ Fast 24-hr approval</span>
            </div>

            <form method="POST" action="<?php echo base_url('welcome/upload_product'); ?>" enctype="multipart/form-data">
                
                <!-- ROW 1: Product Title (2/3) + Category (1/3) -->
                <div class="form-row-2-1">
                    <div class="form-field">
                        <label for="prodTitle">Product Name / Title <span class="req">*</span></label>
                        <input type="text" class="input-ctrl" id="prodTitle" name="title" required>
                    </div>

                    <div class="form-field">
                        <label for="prodCategory">Category <span class="req">*</span></label>
                        <select class="input-ctrl" id="prodCategory" name="category" required>
                            <option value="Books & Study Materials">Books & Study Materials</option>
                            <option value="Laptops & Gadgets">Laptops & Gadgets</option>
                            <option value="Uniforms & Lab Coats">Uniforms & Lab Coats</option>
                            <option value="Stationery & Engineering Tools">Stationery & Tools</option>
                            <option value="Transport & Cycles">Transport & Cycles</option>
                            <option value="Other Essentials">Other Essentials</option>
                        </select>
                    </div>
                </div>

                <!-- ROW 2: Condition (1/3) + Duration (1/3) + Location (1/3) -->
                <div class="form-row-3">
                    <div class="form-field">
                        <label for="prodCondition">Condition <span class="req">*</span></label>
                        <select class="input-ctrl" id="prodCondition" name="condition_type" required>
                            <option value="Brand New">Brand New (Unused)</option>
                            <option value="Like New" selected>Like New</option>
                            <option value="Good">Good Condition</option>
                            <option value="Fair">Fair / Functional</option>
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="prodDuration">Showcase Time Limit <span class="req">*</span></label>
                        <select class="input-ctrl" id="prodDuration" name="duration_hours" required>
                            <option value="24">24 Hours (Flash Listing)</option>
                            <option value="48">48 Hours (2 Days)</option>
                            <option value="72" selected>72 Hours (3 Days - Recommended)</option>
                            <option value="168">7 Days (1 Week)</option>
                            <option value="360">15 Days</option>
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="sellerCity">Location / City <span class="req">*</span></label>
                        <input type="text" class="input-ctrl" id="sellerCity" name="seller_city" required>
                    </div>
                </div>

                <!-- ROW 3: Contributor Name (1/3) + WhatsApp (1/3) + Email (1/3) -->
                <div class="form-row-3">
                    <div class="form-field">
                        <label for="sellerName">Your Name <span class="req">*</span></label>
                        <input type="text" class="input-ctrl" id="sellerName" name="seller_name" required>
                    </div>

                    <div class="form-field">
                        <label for="sellerPhone">WhatsApp / Mobile Phone <span class="req">*</span></label>
                        <input type="tel" class="input-ctrl" id="sellerPhone" name="seller_phone" required>
                    </div>

                    <div class="form-field">
                        <label for="sellerEmail">Email Address (Optional)</label>
                        <input type="email" class="input-ctrl" id="sellerEmail" name="seller_email">
                    </div>
                </div>

                <!-- ROW 4: Compact Photo Dropzone (1/2) + Description (1/2) -->
                <div class="form-row-2">
                    <div class="form-field">
                        <label>Product Photo</label>
                        <div class="compact-dropzone" id="compactDropzone">
                            <input type="file" id="compactImageInput" name="product_image" accept="image/jpeg,image/png,image/webp">
                            <div class="dropzone-inner" id="dropzoneText">
                                <span class="icon">📷</span>
                                <span class="text">Click or drag image (JPG, PNG, max 5MB)</span>
                            </div>
                            <img id="compactThumb" class="dropzone-preview-thumb" alt="Preview">
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="prodDesc">Description & Details <span class="req">*</span></label>
                        <textarea class="input-ctrl" id="prodDesc" name="description" rows="3" style="height: 84px; resize: none;" required></textarea>
                    </div>
                </div>

                <!-- SUBMIT ROW -->
                <div class="form-submit-row">
                    <span style="font-size: 0.8rem; color: #64748b;">
                        🔒 All listings are free to share with students and community members.
                    </span>
                    <button type="submit" class="btn-submit-now">
                        <span>Submit for Admin Approval 🚀</span>
                    </button>
                </div>
            </form>
        </div> <!-- end .compact-card -->

        <!-- ==============================================
             ALLIED PRODUCT PROCESS (AFTER FORM - ATTRACTIVE & COLORFUL)
             ============================================== -->
        <div class="allied-process-wrapper">
            <div class="allied-process-header">
                <div class="allied-process-title-group">
                    <h3>
                        <span>✨</span> Allied Product Process
                    </h3>
                    <p>Transparent community workflow connecting generous contributors with students</p>
                </div>
                <span class="allied-process-badge">
                    <span>⚡</span> 4 Simple Steps
                </span>
            </div>

            <div class="allied-process-grid">
                <!-- Step 1: Emerald -->
                <div class="process-step-card step-card-1">
                    <div class="step-card-top">
                        <div class="process-step-num step-badge-1">1</div>
                        <span class="step-pill-tag step-tag-1">Step 01</span>
                    </div>
                    <h4>📤 Upload Product</h4>
                    <p>Share photos and details of your textbooks, laptops, lab coats, or stationery tools.</p>
                </div>

                <!-- Step 2: Indigo -->
                <div class="process-step-card step-card-2">
                    <div class="step-card-top">
                        <div class="process-step-num step-badge-2">2</div>
                        <span class="step-pill-tag step-tag-2">Step 02</span>
                    </div>
                    <h4>🛡️ Trustee Review</h4>
                    <p>Our trustees verify product authenticity, usable condition, and genuine educational value.</p>
                </div>

                <!-- Step 3: Amber -->
                <div class="process-step-card step-card-3">
                    <div class="step-card-top">
                        <div class="process-step-num step-badge-3">3</div>
                        <span class="step-pill-tag step-tag-3">Step 03</span>
                    </div>
                    <h4>⏱️ Live Countdown</h4>
                    <p>Your item is showcased on the public portal with an active countdown timer.</p>
                </div>

                <!-- Step 4: Pink / Rose -->
                <div class="process-step-card step-card-4">
                    <div class="step-card-top">
                        <div class="process-step-num step-badge-4">4</div>
                        <span class="step-pill-tag step-tag-4">Step 04</span>
                    </div>
                    <h4>🎁 Applied & Delivered</h4>
                    <p>Deserving students apply online and receive the educational resource for free.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Image Preview Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('compactImageInput');
    const thumb = document.getElementById('compactThumb');
    const textWrap = document.getElementById('dropzoneText');

    if (fileInput) {
        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (thumb) {
                        thumb.src = e.target.result;
                        thumb.style.display = 'block';
                    }
                    if (textWrap) textWrap.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });
    }
});
</script>

<?php $this->load->view('includes/footer'); ?>
