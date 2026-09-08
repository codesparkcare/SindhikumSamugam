<?php $this->load->view('includes/header'); ?>

<!-- Custom CSS for Donor Page -->
<style>
    .donor-hero {
        position: relative;
        background: linear-gradient(rgba(15, 23, 42, 0.48), rgba(15, 23, 42, 0.52)), url('<?php echo base_url('assets/images/banner_donor.jpg'); ?>');
        background-size: cover;
        background-position: center;
        padding: 10.5rem 1.5rem 4rem 1.5rem;
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
        margin-bottom: 0.75rem;
    }

    .donor-hero-title {
        font-size: 2.8rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 0.75rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
    }

    .donor-hero-desc {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 680px;
        margin-bottom: 0.75rem;
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
            padding-bottom: 3rem !important;
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

    .transparency-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 2rem 1.65rem;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.03);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .transparency-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(5, 150, 105, 0.12);
        border-color: #059669;
    }

    .transparency-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1.75rem;
    }

    @media (max-width: 768px) {
        .transparency-grid {
            display: flex !important;
            overflow-x: auto !important;
            scroll-snap-type: x mandatory !important;
            -webkit-overflow-scrolling: touch !important;
            gap: 1.25rem !important;
            padding: 0.5rem 1.5rem 1.5rem 1.5rem !important;
            margin-left: -1.5rem !important;
            margin-right: -1.5rem !important;
            scrollbar-width: none;
        }

        .transparency-grid::-webkit-scrollbar {
            display: none;
        }

        .transparency-card {
            flex: 0 0 85% !important;
            min-width: 85% !important;
            max-width: 85% !important;
            scroll-snap-align: center !important;
            box-sizing: border-box !important;
        }
    }
</style>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<main class="main-content">
    <!-- Hero Banner -->
    <section class="donor-hero">
        <div style="max-width: 1280px; margin: 0 auto; text-align: center;">
            <span class="donor-hero-badge">
                <span>🎓</span> SUPPORT HIGHER EDUCATION
            </span>
            <h1 class="donor-hero-title" style="margin-top: 0.5rem;">
                Your Support Can Keep a<br>
                <span
                    style="background: linear-gradient(135deg, #34d399, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Dream
                    Alive</span>
            </h1>
            <p class="donor-hero-desc" style="margin: 0.5rem auto 0.5rem auto;">
                Help students facing genuine financial barriers continue their higher education. Your contribution can
                help remove the financial obstacles standing between a student and their future.
            </p>
            <p
                style="font-size: 0.92rem; color: rgba(255, 255, 255, 0.85); max-width: 780px; margin: 0 auto 1rem auto;">
                Your contribution supports approved educational needs, with eligible fees paid directly to the
                respective educational institution.
            </p>

            <!-- Razorpay Integration Notice -->
            <div
                style="display: inline-flex; align-items: center; gap: 0.6rem; background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); padding: 0.4rem 1.1rem; border-radius: 30px; border: 1px solid rgba(255,255,255,0.25); font-size: 0.85rem; color: #ffffff;">
                <span style="font-size: 1rem;">💳</span>
                <span>Secure Online Donations via <strong>Razorpay</strong></span>
            </div>
        </div>
    </section>

    <!-- Combined Pledge Form & Bank Details Section (1 Row, 2 Columns - Equal Width & Height) -->
    <section style="max-width: 1280px; margin: 2rem auto 3.5rem auto; padding: 0 1.5rem;">
        <div class="donor-form-bank-grid">

            <!-- Column 1: Donation & Pledge Form Box (Matches Height of Column 2) -->
            <div
                style="background: #ffffff; border-radius: 24px; box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08); border: 1px solid #e2e8f0; padding: 2.5rem 2rem; height: 100%; box-sizing: border-box; display: flex; flex-direction: column; justify-content: space-between;">
                <div style="display: flex; flex-direction: column; height: 100%; justify-content: space-between;">
                    <div style="text-align: center; margin-bottom: 1.5rem;">
                        <span class="badge"
                            style="background: rgba(5, 150, 105, 0.1); color: #059669; font-weight: 700; padding: 0.4rem 1.1rem; border-radius: 20px; font-size: 0.88rem;">
                            OFFICIAL CONTRIBUTION

                        </span>
                        <h2 style="font-size: 2.1rem; font-weight: 800; color: #0f172a; margin-top: 0.5rem;">
                            Make a Difference Today
                        </h2>
                        <p style="color: #64748b; font-size: 0.95rem; margin-top: 0.25rem;">
                            Every contribution can help a student continue their education and move one step closer to a
                            better future.
                        </p>
                    </div>

                    <form id="donorForm" onsubmit="submitDonorPledge(event)"
                        style="display: flex; flex-direction: column; justify-content: space-between; flex-grow: 1;">
                        <input type="hidden" name="student_id" id="modalStudentId" value="">
                        <input type="hidden" name="student_name" id="modalStudentName" value="General Student Fund">

                        <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                            <div>
                                <label
                                    style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                    Full Name *
                                </label>
                                <input type="text" name="donor_name" required placeholder="Enter your full name"
                                    style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit;">
                                <input type="hidden" name="donor_type" value="Individual">
                            </div>

                            <div>
                                <label
                                    style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                    Email Address *
                                </label>
                                <input type="email" name="email" required placeholder="Enter your email address"
                                    style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit;">
                            </div>

                            <div>
                                <label
                                    style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                    Mobile Number *
                                </label>
                                <input type="tel" name="phone" required placeholder="Enter your mobile number"
                                    style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit;">
                            </div>

                            <div>
                                <label
                                    style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                    Donation Amount (₹) *
                                </label>
                                <input type="number" name="amount" id="modalAmount" required min="100" step="100"
                                    placeholder="Enter donation amount"
                                    style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit; color: #059669; font-size: 1.15rem;">
                            </div>

                            <div>
                                <label
                                    style="display: block; font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.35rem;">
                                    PAN Number
                                </label>
                                <input type="text" name="pan_number" placeholder="optional"
                                    style="width: 100%; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-family: inherit; text-transform: uppercase;">
                            </div>


                        </div>

                        <button type="submit" id="submitPledgeBtn" class="btn btn-primary w-100 justify-center"
                            style="padding: 1.1rem; font-size: 1.1rem; border-radius: 12px; font-weight: 700; margin-top: 1.25rem;">
                            Donate Now 🤲
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
                            DIRECT TRANSFER
                        </span>
                        <h2 style="font-size: 2.1rem; font-weight: 800; margin-top: 0.5rem; line-height: 1.2;">
                            Bank Account & UPI Details
                        </h2>
                        <p style="color: #94a3b8; font-size: 0.95rem; margin-top: 0.25rem;">
                            You can contribute directly to our official trust account through bank transfer or UPI.
                        </p>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.85rem; margin-bottom: 1.5rem;">
                        <div
                            style="background: rgba(255,255,255,0.06); padding: 0.85rem 1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); box-sizing: border-box;">
                            <div
                                style="font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">
                                Account Name</div>
                            <div style="font-size: 1.05rem; font-weight: 700; color: #ffffff; margin-top: 0.15rem;">
                                SINDHIKUM SAMUGAM FOUNDATION</div>
                        </div>
                        <div class="bank-info-grid">
                            <div
                                style="background: rgba(255,255,255,0.06); padding: 0.85rem 1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); box-sizing: border-box;">
                                <div
                                    style="font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">
                                    Bank Name</div>
                                <div style="font-size: 0.95rem; font-weight: 700; color: #ffffff; margin-top: 0.15rem;">
                                    IndusInd Bank</div>
                            </div>
                            <div
                                style="background: rgba(255,255,255,0.06); padding: 0.85rem 1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); box-sizing: border-box;">
                                <div
                                    style="font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">
                                    PAN Number</div>
                                <div
                                    style="font-size: 0.95rem; font-weight: 700; color: #ffffff; display: flex; justify-content: space-between; align-items: center; margin-top: 0.15rem;">
                                    <span>ABOTS5497E</span>
                                    <span class="copy-badge" onclick="copyText('ABOTS5497E')">Copy</span>
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
                                    <span>201037769340</span>
                                    <span class="copy-badge" onclick="copyText('201037769340')">Copy</span>
                                </div>
                            </div>
                            <div
                                style="background: rgba(255,255,255,0.06); padding: 0.85rem 1rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); box-sizing: border-box;">
                                <div
                                    style="font-size: 0.75rem; color: #94a3b8; text-transform: uppercase; font-weight: 600;">
                                    Official UPI ID</div>
                                <div
                                    style="font-size: 0.95rem; font-weight: 700; color: #ffffff; display: flex; justify-content: space-between; align-items: center; margin-top: 0.15rem;">
                                    <span>pos.5373064@indus</span>
                                    <span class="copy-badge" onclick="copyText('pos.5373064@indus')">Copy</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- QR Code Box (Centered at bottom of card) -->
                <div
                    style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.15); border-radius: 16px; padding: 1.25rem 1.5rem; text-align: center; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 0.85rem; width: 100%; box-sizing: border-box;">
                    <div
                        style="background: #ffffff; padding: 0.5rem; border-radius: 16px; max-width: 210px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); box-sizing: border-box;">
                        <img src="<?php echo base_url('assets/images/qr.jpeg'); ?>" alt="IndusInd Bank Scan & Pay QR Code" style="width: 100%; height: auto; border-radius: 10px; display: block;">
                    </div>
                    <div style="text-align: center;">
                        <h4 style="font-size: 1.1rem; font-weight: 700; color: #ffffff; margin-bottom: 0.35rem;">
                            Scan & Pay</h4>
                        <p style="font-size: 0.85rem; color: #cbd5e1; margin: 0 0 0.5rem 0; line-height: 1.4;">
                            Scan the QR code using GPay, PhonePe, Paytm, or any UPI app.
                        </p>
                        <div style="font-size: 0.78rem; font-weight: 600; color: #34d399; background: rgba(5, 150, 105, 0.2); padding: 0.3rem 0.75rem; border-radius: 20px; display: inline-block;">
                            UPI • GPay • PhonePe • Paytm
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Section 3: Transparency & Commitment Section -->
    <section style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%); padding: 4.5rem 1.5rem; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; position: relative;">
        <div style="max-width: 1280px; margin: 0 auto;">
            
            <!-- Section Header -->
            <div style="text-align: center; max-width: 760px; margin: 0 auto 3rem auto;">
                <span style="background: rgba(5, 150, 105, 0.1); color: #059669; font-weight: 700; padding: 0.45rem 1.2rem; border-radius: 50px; font-size: 0.85rem; letter-spacing: 0.05em; text-transform: uppercase; display: inline-flex; align-items: center; gap: 0.5rem; border: 1px solid rgba(5, 150, 105, 0.2);">
                    <span>🛡️</span> OUR COMMITMENT
                </span>
                <h2 style="font-size: 2.3rem; font-weight: 800; color: #0f172a; margin-top: 0.85rem; line-height: 1.2;">
                    Where Your <span style="background: linear-gradient(135deg, #059669, #0284c7); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Contribution</span> Goes
                </h2>
                <p style="color: #64748b; font-size: 1.05rem; margin-top: 0.85rem; line-height: 1.6;">
                    Your contribution helps eligible students overcome financial barriers to higher education. Approved educational fees are paid directly to the respective educational institution, ensuring transparent and responsible use of contributions.
                </p>
            </div>

            <!-- 4 Pillars Grid (Slider on Mobile) -->
            <div class="transparency-grid">
                
                <!-- Pillar 01 -->
                <div class="transparency-card">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
                        <span style="font-size: 0.9rem; font-weight: 800; color: #059669; background: rgba(5, 150, 105, 0.12); padding: 0.4rem 0.9rem; border-radius: 12px; font-family: monospace;">
                            01
                        </span>
                        <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(5, 150, 105, 0.1); color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                            📋
                        </div>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: #0f172a; margin-bottom: 0.6rem; line-height: 1.3;">
                        Verified Need
                    </h3>
                    <p style="color: #64748b; font-size: 0.94rem; line-height: 1.6; margin: 0;">
                        Student applications and supporting documents are reviewed before assistance is approved.
                    </p>
                </div>

                <!-- Pillar 02 -->
                <div class="transparency-card">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
                        <span style="font-size: 0.9rem; font-weight: 800; color: #0284c7; background: rgba(2, 132, 199, 0.12); padding: 0.4rem 0.9rem; border-radius: 12px; font-family: monospace;">
                            02
                        </span>
                        <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(2, 132, 199, 0.1); color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                            🎓
                        </div>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: #0f172a; margin-bottom: 0.6rem; line-height: 1.3;">
                        Educational Support
                    </h3>
                    <p style="color: #64748b; font-size: 0.94rem; line-height: 1.6; margin: 0;">
                        Contributions are used towards approved educational expenses of eligible students.
                    </p>
                </div>

                <!-- Pillar 03 -->
                <div class="transparency-card">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
                        <span style="font-size: 0.9rem; font-weight: 800; color: #7c3aed; background: rgba(124, 58, 237, 0.12); padding: 0.4rem 0.9rem; border-radius: 12px; font-family: monospace;">
                            03
                        </span>
                        <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(124, 58, 237, 0.1); color: #7c3aed; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                            🏛️
                        </div>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: #0f172a; margin-bottom: 0.6rem; line-height: 1.3;">
                        Direct Institutional Payment
                    </h3>
                    <p style="color: #64748b; font-size: 0.94rem; line-height: 1.6; margin: 0;">
                        Where applicable, fees are paid directly to the student's educational institution.
                    </p>
                </div>

                <!-- Pillar 04 -->
                <div class="transparency-card">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem;">
                        <span style="font-size: 0.9rem; font-weight: 800; color: #d97706; background: rgba(217, 119, 6, 0.12); padding: 0.4rem 0.9rem; border-radius: 12px; font-family: monospace;">
                            04
                        </span>
                        <div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(217, 119, 6, 0.1); color: #d97706; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                            ✨
                        </div>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: #0f172a; margin-bottom: 0.6rem; line-height: 1.3;">
                        Responsible Giving
                    </h3>
                    <p style="color: #64748b; font-size: 0.94rem; line-height: 1.6; margin: 0;">
                        Every contribution is handled with transparency, accountability and purpose.
                    </p>
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
                            if (typeof closeDonorModal === 'function') closeDonorModal();
                            window.showAppNotification(data.message, 'Thank You!', 'success', function() {
                                location.reload();
                            });
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
            var panNumber = form.querySelector('input[name="pan_number"]') ? form.querySelector('input[name="pan_number"]').value : '';
            var message = form.querySelector('textarea[name="message"]') ? form.querySelector('textarea[name="message"]').value : '';

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
                        if (typeof closeDonorModal === 'function') closeDonorModal();
                        form.reset();
                        window.showAppNotification(data.message, 'Thank You!', 'success', function() {
                            location.reload();
                        });
                    } else {
                        window.showAppNotification(data.message || 'Error submitting pledge', 'Pledge Error', 'error');
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