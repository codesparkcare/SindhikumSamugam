<div class="container-fluid py-4">
    <!-- Header Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-extrabold mb-1" style="color: #0f172a; letter-spacing: -0.02em;">System Settings & API Integrations</h3>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Manage payment gateway parameters (Razorpay) and automated email server credentials (SMTP).</p>
        </div>
        <div>
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#testEmailModal">
                <i class="fa-solid fa-paper-plane me-1"></i> Send Test Email
            </button>
        </div>
    </div>

    <!-- Alert Flash Messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fa-solid fa-circle-exclamation me-2"></i> <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="<?php echo site_url('admin/save_settings'); ?>" method="POST">
        <div class="row g-4">
            
            <!-- Left Side: Nav Tabs -->
            <div class="col-md-3">
                <div class="card border-0 shadow-sm p-2 sticky-top" style="top: 80px;">
                    <div class="nav flex-column nav-pills gap-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active text-start py-3 px-3 d-flex align-items-center gap-2 fw-semibold" id="v-pills-razorpay-tab" data-bs-toggle="pill" data-bs-target="#v-pills-razorpay" type="button" role="tab">
                            <i class="fa-solid fa-credit-card text-primary fs-5"></i>
                            <div>
                                <div style="font-size: 0.95rem;">Razorpay Gateway</div>
                                <div class="text-muted fw-normal" style="font-size: 0.75rem;">Payment API keys & Checkout</div>
                            </div>
                        </button>
                        <button class="nav-link text-start py-3 px-3 d-flex align-items-center gap-2 fw-semibold" id="v-pills-email-tab" data-bs-toggle="pill" data-bs-target="#v-pills-email" type="button" role="tab">
                            <i class="fa-solid fa-envelope-open-text text-info fs-5"></i>
                            <div>
                                <div style="font-size: 0.95rem;">SMTP Email Settings</div>
                                <div class="text-muted fw-normal" style="font-size: 0.75rem;">Server credentials & Receipts</div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Side: Tab Contents -->
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">

                    <!-- Razorpay Settings Tab -->
                    <div class="tab-pane fade show active" id="v-pills-razorpay" role="tabpanel" aria-labelledby="v-pills-razorpay-tab">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-dark">
                                    <i class="fa-solid fa-bolt me-2 text-primary"></i>Razorpay Gateway Configuration
                                </h5>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" role="switch" id="razorpay_enabled" name="razorpay_enabled" value="1" <?php echo (!empty($settings['razorpay_enabled']) && $settings['razorpay_enabled'] == '1') ? 'checked' : ''; ?>>
                                    <label class="form-check-label fw-bold text-secondary" for="razorpay_enabled" style="font-size: 0.88rem;">Enable Razorpay</label>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">Gateway Environment Mode</label>
                                        <select name="razorpay_environment" class="form-select">
                                            <option value="sandbox" <?php echo ($settings['razorpay_environment'] == 'sandbox' || empty($settings['razorpay_environment'])) ? 'selected' : ''; ?>>Sandbox / Test Mode (rzp_test_...)</option>
                                            <option value="live" <?php echo ($settings['razorpay_environment'] == 'live') ? 'selected' : ''; ?>>Production / Live Mode (rzp_live_...)</option>
                                        </select>
                                        <div class="form-text" style="font-size: 0.78rem;">Use Sandbox mode for test payments before going live.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">Razorpay Key ID *</label>
                                        <input type="text" name="razorpay_key_id" value="<?php echo htmlspecialchars($settings['razorpay_key_id']); ?>" class="form-control font-monospace" placeholder="rzp_test_1234567890abcdef">
                                        <div class="form-text" style="font-size: 0.78rem;">Found in your Razorpay Dashboard -> API Keys.</div>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">Razorpay Key Secret *</label>
                                        <div class="input-group">
                                            <input type="password" name="razorpay_key_secret" id="razorpayKeySecret" value="<?php echo htmlspecialchars($settings['razorpay_key_secret']); ?>" class="form-control font-monospace" placeholder="••••••••••••••••">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassVisibility('razorpayKeySecret', this)">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">Webhook Signing Secret (Optional)</label>
                                        <input type="text" name="razorpay_webhook_secret" value="<?php echo htmlspecialchars($settings['razorpay_webhook_secret']); ?>" class="form-control font-monospace" placeholder="whsec_123456">
                                        <div class="form-text" style="font-size: 0.78rem;">Used to verify incoming payment webhooks safely.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SMTP Email Settings Tab -->
                    <div class="tab-pane fade" id="v-pills-email" role="tabpanel" aria-labelledby="v-pills-email-tab">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-dark">
                                    <i class="fa-solid fa-paper-plane me-2 text-info"></i>SMTP Email Server Settings
                                </h5>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" role="switch" id="email_enabled" name="email_enabled" value="1" <?php echo (!empty($settings['email_enabled']) && $settings['email_enabled'] == '1') ? 'checked' : ''; ?>>
                                    <label class="form-check-label fw-bold text-secondary" for="email_enabled" style="font-size: 0.88rem;">Enable Email Sending</label>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">SMTP Server Host *</label>
                                        <input type="text" name="smtp_host" value="<?php echo htmlspecialchars($settings['smtp_host']); ?>" class="form-control" placeholder="smtp.gmail.com or mail.sindhikum.org">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">SMTP Port *</label>
                                        <input type="number" name="smtp_port" value="<?php echo htmlspecialchars(!empty($settings['smtp_port']) ? $settings['smtp_port'] : '587'); ?>" class="form-control" placeholder="587">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">Encryption Protocol</label>
                                        <select name="smtp_crypto" class="form-select">
                                            <option value="tls" <?php echo ($settings['smtp_crypto'] == 'tls' || empty($settings['smtp_crypto'])) ? 'selected' : ''; ?>>TLS (Port 587)</option>
                                            <option value="ssl" <?php echo ($settings['smtp_crypto'] == 'ssl') ? 'selected' : ''; ?>>SSL (Port 465)</option>
                                            <option value="none" <?php echo ($settings['smtp_crypto'] == 'none') ? 'selected' : ''; ?>>None / Standard (Port 25)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">SMTP Username / Email *</label>
                                        <input type="text" name="smtp_user" value="<?php echo htmlspecialchars($settings['smtp_user']); ?>" class="form-control" placeholder="donations@sindhikum.org">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">SMTP Password / App Password *</label>
                                        <div class="input-group">
                                            <input type="password" name="smtp_pass" id="smtpPass" value="<?php echo htmlspecialchars($settings['smtp_pass']); ?>" class="form-control" placeholder="••••••••••••">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassVisibility('smtpPass', this)">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <h6 class="fw-bold text-dark mb-3">Sender Identity & Notifications</h6>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">From Sender Name</label>
                                        <input type="text" name="mail_from_name" value="<?php echo htmlspecialchars(!empty($settings['mail_from_name']) ? $settings['mail_from_name'] : 'Sindhikum Samugam Educational Trust'); ?>" class="form-control" placeholder="Sindhikum Samugam Educational Trust">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">From Sender Address</label>
                                        <input type="email" name="mail_from_address" value="<?php echo htmlspecialchars(!empty($settings['mail_from_address']) ? $settings['mail_from_address'] : 'noreply@sindhikum.org'); ?>" class="form-control" placeholder="noreply@sindhikum.org">
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">Admin Alert Receiver Email</label>
                                        <input type="email" name="admin_notification_email" value="<?php echo htmlspecialchars($settings['admin_notification_email']); ?>" class="form-control" placeholder="trustee@sindhikum.org">
                                        <div class="form-text" style="font-size: 0.78rem;">Email address that receives instant alerts for new student applications and donor pledges.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Global Save Button Footer -->
                <div class="card border-0 shadow-sm p-3 d-flex flex-row justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Save All Settings
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>

<!-- Test Email Modal -->
<div class="modal fade" id="testEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-dark">
                    <i class="fa-solid fa-paper-plane me-2 text-primary"></i>Test SMTP Connection
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted" style="font-size: 0.9rem;">
                    Enter a recipient email address to send a sample notification email using your current SMTP configuration.
                </p>
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.85rem;">Recipient Email Address</label>
                    <input type="email" id="testRecipientEmail" class="form-control" placeholder="yourname@gmail.com">
                </div>
                <div id="testEmailResult" class="d-none mt-3"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" id="sendTestEmailBtn" onclick="runTestEmail()" class="btn btn-primary">
                    Send Test Email 🚀
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassVisibility(inputId, btn) {
    var input = document.getElementById(inputId);
    var icon = btn.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'fa-solid fa-eye-slash';
    } else {
        input.type = 'password';
        icon.className = 'fa-solid fa-eye';
    }
}

function runTestEmail() {
    var emailInput = document.getElementById('testRecipientEmail');
    var resDiv = document.getElementById('testEmailResult');
    var btn = document.getElementById('sendTestEmailBtn');

    if (!emailInput.value) {
        alert('Please enter a recipient email address.');
        return;
    }

    btn.disabled = true;
    btn.innerText = 'Sending Email...';
    resDiv.className = 'alert alert-info border-0 shadow-sm text-dark';
    resDiv.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i> Connecting to SMTP server...';

    var formData = new FormData();
    formData.append('test_email', emailInput.value);

    fetch('<?php echo site_url("admin/send_test_email"); ?>', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        btn.disabled = false;
        btn.innerText = 'Send Test Email 🚀';
        if (data.status === 'success') {
            resDiv.className = 'alert alert-success border-0 shadow-sm';
            resDiv.innerHTML = '<i class="fa-solid fa-circle-check me-2"></i>' + data.message;
        } else {
            resDiv.className = 'alert alert-danger border-0 shadow-sm';
            resDiv.innerHTML = '<i class="fa-solid fa-circle-exclamation me-2"></i>' + data.message + (data.debug ? '<br><small class="text-muted font-monospace mt-1 d-block">' + data.debug + '</small>' : '');
        }
    })
    .catch(err => {
        btn.disabled = false;
        btn.innerText = 'Send Test Email 🚀';
        resDiv.className = 'alert alert-danger border-0 shadow-sm';
        resDiv.innerHTML = '<i class="fa-solid fa-circle-exclamation me-2"></i> Network error connecting to admin email backend.';
    });
}
</script>
