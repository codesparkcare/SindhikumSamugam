<?php $this->load->view('includes/header'); ?>

<!-- Custom CSS for Donor Page -->
<style>
    .donor-hero {
        position: relative;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.92) 0%, rgba(5, 150, 105, 0.85) 100%), url('<?php echo base_url('assets/images/banner_donor.jpg'); ?>');
        background-size: cover;
        background-position: center;
        padding: 9.5rem 1.5rem 5.5rem 1.5rem;
        color: #ffffff;
        overflow: hidden;
    }

    .donor-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 1rem;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        font-size: 0.88rem;
        font-weight: 600;
        margin-bottom: 1.25rem;
    }

    .donor-hero-title {
        font-size: 2.8rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 1.25rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
    }

    .donor-hero-desc {
        font-size: 1.15rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 680px;
        margin-bottom: 2rem;
    }

    .tiers-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        align-items: stretch;
    }

    .bank-card-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
    }

    .bank-info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .student-grid-donor {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
    }

    .bank-card {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        border-radius: 24px;
        color: #ffffff;
        padding: 2.5rem 2rem;
        box-shadow: 0 20px 40px rgba(15, 23, 42, 0.2);
        box-sizing: border-box;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .donor-form-bank-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 2.5rem;
        align-items: stretch;
        width: 100%;
    }

    @media (max-width: 992px) {

        .donor-hero {
            padding-top: 8.5rem !important;
        }

        .tiers-grid,
        .bank-card-grid,
        .bank-info-grid,
        .student-grid-donor,
        .donor-form-bank-grid {
            grid-template-columns: 1fr !important;
            gap: 1.5rem !important;
        }
    }

    .stat-card-donor {
        background: #ffffff;
        border-radius: 16px;
        padding: 1.75rem;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        border: 1px solid rgba(226, 232, 240, 0.8);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        align-items: center;
        gap: 1.25rem;
    }

    .stat-card-donor:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(5, 150, 105, 0.15);
    }

    .stat-icon-wrap {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        flex-shrink: 0;
    }

    .icon-emerald {
        background: rgba(5, 150, 105, 0.12);
        color: #059669;
    }

    .icon-amber {
        background: rgba(217, 119, 6, 0.12);
        color: #d97706;
    }

    .icon-blue {
        background: rgba(2, 132, 199, 0.12);
        color: #0284c7;
    }

    .icon-purple {
        background: rgba(124, 58, 237, 0.12);
        color: #7c3aed;
    }

    .stat-info-donor h3 {
        font-size: 1.75rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.1;
    }

    .stat-info-donor p {
        font-size: 0.88rem;
        color: #64748b;
        font-weight: 500;
        margin-top: 0.25rem;
    }

    .tier-card {
        background: #ffffff;
        border-radius: 20px;
        border: 2px solid #e2e8f0;
        padding: 2rem;
        transition: all 0.3s ease;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .tier-card.featured {
        border-color: #059669;
        box-shadow: 0 20px 40px rgba(5, 150, 105, 0.12);
        transform: scale(1.03);
    }

    .tier-badge {
        position: absolute;
        top: -12px;
        right: 24px;
        background: linear-gradient(135deg, #059669, #0284c7);
        color: white;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 0.35rem 0.9rem;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .tier-price {
        font-size: 2.2rem;
        font-weight: 800;
        color: #0f172a;
        margin: 1rem 0;
    }

    .tier-price span {
        font-size: 1rem;
        color: #64748b;
        font-weight: 500;
    }

    .tier-features {
        list-style: none;
        margin: 1.5rem 0 2rem 0;
        padding: 0;
        flex-grow: 1;
    }

    .tier-features li {
        padding: 0.5rem 0;
        color: #475569;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .tier-features li::before {
        content: "✓";
        color: #059669;
        font-weight: 800;
    }

    /* bank-card style managed in top stylesheet block */

    .copy-badge {
        cursor: pointer;
        background: rgba(255, 255, 255, 0.15);
        padding: 0.2rem 0.6rem;
        border-radius: 6px;
        font-size: 0.8rem;
        transition: background 0.2s;
    }

    .copy-badge:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .student-card-donor {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .student-card-donor:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
    }

    .student-card-body {
        padding: 1.5rem;
    }

    .donor-wall-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 1.5rem;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    /* Modal Overlay */
    .donor-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.75);
        backdrop-filter: blur(8px);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        padding: 1.5rem;
    }

    .donor-modal-overlay.active {
        display: flex;
    }

    .donor-modal {
        background: #ffffff;
        border-radius: 24px;
        max-width: 650px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        padding: 2.5rem;
        position: relative;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        animation: modalSlideUp 0.3s ease-out;
    }

    @keyframes modalSlideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .modal-close-btn {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: #f1f5f9;
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        font-size: 1.25rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        transition: all 0.2s;
    }

    .modal-close-btn:hover {
        background: #e2e8f0;
        color: #0f172a;
    }
</style>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<main class="main-content">
    <!-- Hero Banner -->
    <section class="donor-hero">
        <div style="max-width: 1280px; margin: 0 auto; text-align: center;">
            <span class="donor-hero-badge">
                <span>🤝</span> Empower Deserving Students Across Tamil Nadu
            </span>
            <h1 class="donor-hero-title" style="margin-top: 0.75rem;">
                Your Donation Creates<br>
                <span
                    style="background: linear-gradient(135deg, #34d399, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Future
                    Leaders & Innovators</span>
            </h1>
            <p class="donor-hero-desc" style="margin: 1rem auto 1.5rem auto;">
                Sindhikum Samugam is dedicated to ensuring no deserving student drops out of college due to financial
                constraints. 100% of your contribution goes directly towards tuition & hostel fees.
            </p>

            <!-- Razorpay Integration Notice -->
            <div
                style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); padding: 0.5rem 1.25rem; border-radius: 30px; border: 1px solid rgba(255,255,255,0.25); font-size: 0.88rem; color: #ffffff;">
                <span style="font-size: 1.1rem;">💳</span>
                <span>Accepting Online Donations via <strong>Razorpay</strong> (UPI, GPay, PhonePe, Cards &
                    NetBanking)</span>
            </div>
        </div>
    </section>

    <!-- Combined Pledge Form & Bank Details Section (1 Row, 2 Columns - Equal Width & Height) -->
    <section style="max-width: 1280px; margin: 3.5rem auto 4rem auto; padding: 0 1.5rem;">
        <div class="donor-form-bank-grid">

            <!-- Column 1: Donation & Pledge Form Box (Matches Height of Column 2) -->
            <div
                style="background: #ffffff; border-radius: 24px; box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08); border: 1px solid #e2e8f0; padding: 2.5rem 2rem; height: 100%; box-sizing: border-box; display: flex; flex-direction: column; justify-content: space-between;">
                <div style="display: flex; flex-direction: column; height: 100%; justify-content: space-between;">
                    <div style="text-align: center; margin-bottom: 1.5rem;">
                        <span class="badge"
                            style="background: rgba(5, 150, 105, 0.1); color: #059669; font-weight: 700; padding: 0.4rem 1.1rem; border-radius: 20px; font-size: 0.88rem;">
                            Official Non-Profit Contribution
                        </span>
                        <h2 style="font-size: 2.1rem; font-weight: 800; color: #0f172a; margin-top: 0.5rem;">
                            Pledge & Donate Now
                        </h2>
                        <p style="color: #64748b; font-size: 0.95rem; margin-top: 0.25rem;">
                            Fill out the form below to contribute directly via Razorpay online payment or direct bank
                            transfer.
                        </p>
                    </div>

                    <form id="donorForm" onsubmit="submitDonorPledge(event)"
                        style="display: flex; flex-direction: column; justify-content: space-between; flex-grow: 1;">
                        <input type="hidden" name="student_id" id="modalStudentId" value="">
                        <input type="hidden" name="student_name" id="modalStudentName" value="General Student Fund">

                        <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                            <div class="bank-info-grid">
                                <div>
                                    <label
                                        style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                        Full Name *
                                    </label>
                                    <input type="text" name="donor_name" required placeholder="e.g. K. Ramanathan"
                                        style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit;">
                                </div>
                                <div>
                                    <label
                                        style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                        Donor Category
                                    </label>
                                    <select name="donor_type"
                                        style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit; background: white;">
                                        <option value="Individual">Individual Well-Wisher</option>
                                        <option value="Alumni">Alumni</option>
                                        <option value="Corporate / CSR">Corporate / CSR</option>
                                        <option value="Foundation">Trust / Foundation</option>
                                    </select>
                                </div>
                            </div>

                            <div class="bank-info-grid">
                                <div>
                                    <label
                                        style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                        Email Address *
                                    </label>
                                    <input type="email" name="email" required placeholder="name@domain.com"
                                        style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit;">
                                </div>
                                <div>
                                    <label
                                        style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                        Mobile Number *
                                    </label>
                                    <input type="tel" name="phone" required placeholder="+91 98765 43210"
                                        style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit;">
                                </div>
                            </div>

                            <div>
                                <label
                                    style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                    Donation Amount (₹) *
                                </label>
                                <input type="number" name="amount" id="modalAmount" required min="100" step="100"
                                    placeholder="1000"
                                    style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit; font-weight: 700; color: #059669; font-size: 1.15rem;">
                            </div>

                            <div>
                                <label
                                    style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                    PAN Number (Optional)
                                </label>
                                <input type="text" name="pan_number" placeholder="ABCDE1234F"
                                    style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit; text-transform: uppercase;">
                            </div>

                            <div>
                                <label
                                    style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                    Encouragement Message for Student
                                </label>
                                <textarea name="message" rows="3"
                                    placeholder="Write a short message of blessing or encouragement..."
                                    style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit; resize: vertical;"></textarea>
                            </div>
                        </div>

                        <button type="submit" id="submitPledgeBtn" class="btn btn-primary w-100 justify-center"
                            style="padding: 1.1rem; font-size: 1.1rem; border-radius: 12px; font-weight: 700; margin-top: 1.25rem;">
                            Confirm & Pay Now 🤲
                        </button>
                    </form>
                </div>
            </div>

            <!-- Column 2: Bank Account & UPI Details Box -->
            <div class="donor-bank-card-box"
                style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-radius: 24px; color: #ffffff; padding: 2.5rem 2rem; box-shadow: 0 20px 40px rgba(15, 23, 42, 0.2); height: 100%; box-sizing: border-box; display: flex; flex-direction: column; justify-content: space-between; width: 100%;">
                <div>
                    <div style="text-align: center; margin-bottom: 1.75rem;">
                        <span
                            style="background: rgba(5, 150, 105, 0.25); color: #34d399; font-weight: 700; padding: 0.4rem 1.1rem; border-radius: 20px; font-size: 0.88rem; display: inline-block;">
                            Instant Direct Transfer
                        </span>
                        <h2 style="font-size: 2.1rem; font-weight: 800; margin-top: 0.5rem; line-height: 1.2;">
                            Bank Account & UPI Details
                        </h2>
                        <p style="color: #94a3b8; font-size: 0.95rem; margin-top: 0.25rem;">
                            You can directly transfer funds into our official non-profit trust account via Bank
                            NEFT/IMPS/RTGS or scan the UPI QR code.
                        </p>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.85rem; margin-bottom: 1.5rem;">
                        <div
                            style="background: rgba(255,255,255,0.06); padding: 0.85rem 1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); box-sizing: border-box;">
                            <div
                                style="font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">
                                Account Name</div>
                            <div style="font-size: 1.05rem; font-weight: 700; color: #ffffff; margin-top: 0.15rem;">
                                Sindhikum Samugam Educational Trust</div>
                        </div>
                        <div class="bank-info-grid">
                            <div
                                style="background: rgba(255,255,255,0.06); padding: 0.85rem 1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); box-sizing: border-box;">
                                <div
                                    style="font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">
                                    Bank Name</div>
                                <div style="font-size: 0.95rem; font-weight: 700; color: #ffffff; margin-top: 0.15rem;">
                                    Indian Overseas Bank</div>
                            </div>
                            <div
                                style="background: rgba(255,255,255,0.06); padding: 0.85rem 1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); box-sizing: border-box;">
                                <div
                                    style="font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">
                                    IFSC Code</div>
                                <div
                                    style="font-size: 0.95rem; font-weight: 700; color: #ffffff; display: flex; justify-content: space-between; align-items: center; margin-top: 0.15rem;">
                                    <span>IOBA0001234</span>
                                    <span class="copy-badge" onclick="copyText('IOBA0001234')">Copy</span>
                                </div>
                            </div>
                        </div>
                        <div class="bank-info-grid">
                            <div
                                style="background: rgba(255,255,255,0.06); padding: 0.85rem 1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); box-sizing: border-box;">
                                <div
                                    style="font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">
                                    Account Number</div>
                                <div
                                    style="font-size: 0.95rem; font-weight: 700; color: #ffffff; display: flex; justify-content: space-between; align-items: center; margin-top: 0.15rem;">
                                    <span>12340100005678</span>
                                    <span class="copy-badge" onclick="copyText('12340100005678')">Copy</span>
                                </div>
                            </div>
                            <div
                                style="background: rgba(255,255,255,0.06); padding: 0.85rem 1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); box-sizing: border-box;">
                                <div
                                    style="font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">
                                    Official UPI ID</div>
                                <div
                                    style="font-size: 0.95rem; font-weight: 700; color: #ffffff; display: flex; justify-content: space-between; align-items: center; margin-top: 0.15rem;">
                                    <span>sindhikum@iob</span>
                                    <span class="copy-badge" onclick="copyText('sindhikum@iob')">Copy</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- QR Code Box (Centered at bottom of card) -->
                <div
                    style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.15); border-radius: 16px; padding: 1.25rem 1.5rem; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 0.85rem; width: 100%; box-sizing: border-box;">
                    <div
                        style="background: #ffffff; padding: 0.75rem; border-radius: 14px; width: 140px; height: 140px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); box-sizing: border-box;">
                        <div
                            style="width: 100%; height: 100%; border: 2px dashed #059669; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: center; background: #f8fafc; color: #0f172a; text-align: center; padding: 0.25rem; box-sizing: border-box;">
                            <span style="font-size: 1.8rem; margin-bottom: 0.1rem;">📱</span>
                            <strong style="font-size: 0.82rem; color: #059669; line-height: 1.1;">Scan to Pay</strong>
                            <span style="font-size: 0.65rem; color: #64748b;">UPI / GPay</span>
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <h4 style="font-size: 1.05rem; font-weight: 700; color: #ffffff; margin-bottom: 0.25rem;">
                            Instant UPI QR Transfer</h4>
                        <p style="font-size: 0.85rem; color: #cbd5e1; margin: 0; line-height: 1.4;">
                            Scan QR code with GPay, PhonePe, or Paytm to contribute directly.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script>
        function copyText(text) {
            navigator.clipboard.writeText(text).then(function () {
                alert('Copied to clipboard: ' + text);
            }).catch(function () {
                alert('Code: ' + text);
            });
        }

        function payWithRazorpay(name, email, phone, amount, studentName, panNumber, message) {
            var keyId = '<?php echo !empty($razorpay_key_id) ? $razorpay_key_id : ""; ?>';

            if (!keyId) {
                alert('Razorpay Checkout Notice:\n\nYour site is configured for Razorpay online checkout! Once you enter your Razorpay Key ID in the Admin Dashboard Settings (/admin/settings), live payments will process instantly.\n\nSubmitting your pledge record now.');
                return false;
            }

            var options = {
                "key": keyId,
                "amount": Math.round(amount * 100),
                "currency": "INR",
                "name": "Sindhikum Samugam Educational Trust",
                "description": "Scholarship Contribution: " + studentName,
                "image": "<?php echo base_url('assets/images/logo.png'); ?>",
                "handler": function (response) {
                    var formData = new FormData();
                    formData.append('razorpay_payment_id', response.razorpay_payment_id);
                    formData.append('donor_name', name);
                    formData.append('email', email);
                    formData.append('phone', phone);
                    formData.append('amount', amount);
                    formData.append('student_name', studentName);
                    formData.append('pan_number', panNumber);
                    formData.append('message', message);

                    fetch('<?php echo site_url("welcome/verify_razorpay"); ?>', {
                        method: 'POST',
                        body: formData
                    })
                        .then(res => res.json())
                        .then(data => {
                            alert(data.message);
                            if (typeof closeDonorModal === 'function') closeDonorModal();
                            location.reload();
                        });
                },
                "prefill": {
                    "name": name,
                    "email": email,
                    "contact": phone
                },
                "theme": {
                    "color": "#059669"
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
            return true;
        }

        function submitDonorPledge(event) {
            event.preventDefault();
            var form = event.target;
            var btn = document.getElementById('submitPledgeBtn');
            var paymentMode = form.querySelector('input[name="payment_mode"]:checked') ? form.querySelector('input[name="payment_mode"]:checked').value : 'razorpay';

            var name = form.querySelector('input[name="donor_name"]').value;
            var email = form.querySelector('input[name="email"]').value;
            var phone = form.querySelector('input[name="phone"]').value;
            var amount = parseFloat(form.querySelector('input[name="amount"]').value);
            var studentName = form.querySelector('input[name="student_name"]').value;
            var panNumber = form.querySelector('input[name="pan_number"]').value;
            var message = form.querySelector('textarea[name="message"]').value;

            if (paymentMode === 'razorpay') {
                var launched = payWithRazorpay(name, email, phone, amount, studentName, panNumber, message);
                if (launched) {
                    return; // Razorpay handler will deal with post-payment submission
                }
            }

            btn.disabled = true;
            btn.innerText = 'Submitting Pledge...';

            var formData = new FormData(form);

            fetch('<?php echo site_url("welcome/save_donor"); ?>', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    btn.disabled = false;
                    btn.innerText = 'Confirm & Pay Now 🤲';
                    if (data.status === 'success') {
                        alert(data.message);
                        if (typeof closeDonorModal === 'function') closeDonorModal();
                        form.reset();
                        location.reload();
                    } else {
                        alert(data.message || 'Error submitting pledge');
                    }
                })
                .catch(error => {
                    btn.disabled = false;
                    btn.innerText = 'Confirm & Pay Now 🤲';
                    alert('An unexpected network error occurred. Please check connectivity.');
                });
        }
    </script>

    <?php $this->load->view('includes/footer'); ?>