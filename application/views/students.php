<?php $this->load->view('includes/header'); ?>

<style>
/* Student Portal Responsive Mobile Styling & Alignment */
@media (max-width: 768px) {
    .student-slider {
        min-height: auto !important;
        margin-top: 70px !important;
        padding-top: 1.5rem !important;
        padding-bottom: 2.2rem !important;
    }
    .student-hero-content {
        padding: 0.25rem 0.75rem 0.5rem 0.75rem !important;
    }
    .student-hero-content .section-badge {
        padding: 0.22rem 0.68rem !important;
        font-size: 0.68rem !important;
        margin-bottom: 0.35rem !important;
    }
    .student-hero-heading {
        font-size: 1.35rem !important;
        line-height: 1.22 !important;
        margin-top: 0.2rem !important;
        margin-bottom: 0.35rem !important;
    }
    .hero-br {
        display: none !important;
    }
    .student-hero-heading span.highlight-text {
        display: block !important;
        margin-top: 0.15rem !important;
    }
    .student-hero-desc {
        font-size: 0.82rem !important;
        line-height: 1.4 !important;
        margin: 0 auto 0.65rem auto !important;
        max-width: 100% !important;
    }
    .support-badge-wrapper {
        margin-bottom: 0.65rem !important;
    }
    .support-type-badge {
        display: inline-flex !important;
        flex-direction: row !important;
        flex-wrap: wrap !important;
        justify-content: center !important;
        align-items: center !important;
        gap: 0.2rem 0.45rem !important;
        padding: 0.25rem 0.65rem !important;
        border-radius: 20px !important;
        border: 1px solid #059669 !important;
        font-size: 0.68rem !important;
        font-weight: 700 !important;
        text-align: center !important;
        line-height: 1.35 !important;
        width: auto !important;
        max-width: 100% !important;
        box-sizing: border-box !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.25) !important;
    }
    .support-badge-divider {
        display: inline !important;
        color: rgba(255, 255, 255, 0.45) !important;
        font-size: 0.65rem !important;
    }
    .hero-action-buttons {
        flex-direction: column !important;
        width: 100% !important;
        gap: 0.35rem !important;
        align-items: center !important;
    }
    .hero-action-buttons .btn {
        width: 100% !important;
        max-width: 240px !important;
        text-align: center !important;
        justify-content: center !important;
        padding: 0.44rem 0.9rem !important;
        font-size: 0.76rem !important;
        font-weight: 700 !important;
        border-radius: 25px !important;
        box-sizing: border-box !important;
    }

    /* About Section Mobile Alignment */
    .about-container {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
    .about-section {
        padding: 2.5rem 1rem !important;
    }

    /* Beyond Academic Marks Section Mobile Alignment */
    .whole-story-section {
        padding: 2.5rem 1rem !important;
    }
    .story-glass-card {
        padding: 1.85rem 1.1rem !important;
        border-radius: 18px !important;
    }
    .story-heading {
        font-size: 1.75rem !important;
        line-height: 1.28 !important;
        margin-bottom: 1rem !important;
    }
    .story-desc-1 {
        font-size: 0.98rem !important;
        line-height: 1.55 !important;
        margin-bottom: 1rem !important;
    }
    .story-desc-2 {
        font-size: 0.92rem !important;
        line-height: 1.55 !important;
        margin-bottom: 1.35rem !important;
    }
    .story-pills-container {
        flex-direction: column !important;
        width: 100% !important;
        gap: 0.65rem !important;
        margin-bottom: 1.35rem !important;
        align-items: stretch !important;
    }
    .story-pill {
        width: 100% !important;
        justify-content: center !important;
        padding: 0.7rem 1rem !important;
        font-size: 0.88rem !important;
        box-sizing: border-box !important;
        border-radius: 25px !important;
    }
    .story-highlight-box {
        display: block !important;
        width: 100% !important;
        padding: 1rem 1.1rem !important;
        margin-bottom: 1.5rem !important;
        box-sizing: border-box !important;
        border-radius: 14px !important;
        text-align: center !important;
    }
    .story-highlight-box p {
        font-size: 0.95rem !important;
        line-height: 1.5 !important;
    }
    .story-cta-wrapper {
        width: 100% !important;
    }
    .story-cta-btn {
        width: 100% !important;
        justify-content: center !important;
        text-align: center !important;
        padding: 0.9rem 1.25rem !important;
        font-size: 1rem !important;
        box-sizing: border-box !important;
    }

    /* Stepper Section Mobile Alignment */
    .registration-container {
        padding: 2rem 1.1rem !important;
        border-radius: 18px !important;
    }
    .registration-process-section {
        padding: 2.5rem 1rem !important;
    }
    .stepper-overview-flex {
        flex-direction: row !important;
        flex-wrap: wrap !important;
        justify-content: center !important;
        gap: 1.25rem 0.5rem !important;
    }
    .stepper-step-node {
        width: 45% !important;
        max-width: 140px !important;
    }
    .stepper-line-bg {
        display: none !important;
    }
}

@media (max-width: 480px) {
    .student-slider {
        margin-top: 68px !important;
        padding-top: 1.25rem !important;
        padding-bottom: 2rem !important;
    }
    .student-hero-content {
        padding: 0.2rem 0.5rem 0.5rem 0.5rem !important;
    }
    .student-hero-content .section-badge {
        font-size: 0.64rem !important;
        padding: 0.2rem 0.6rem !important;
        margin-bottom: 0.3rem !important;
    }
    .student-hero-heading {
        font-size: 1.25rem !important;
        line-height: 1.2 !important;
        margin-bottom: 0.3rem !important;
    }
    .student-hero-desc {
        font-size: 0.78rem !important;
        line-height: 1.38 !important;
        margin-bottom: 0.55rem !important;
    }
    .support-badge-wrapper {
        margin-bottom: 0.55rem !important;
    }
    .support-type-badge {
        font-size: 0.64rem !important;
        padding: 0.22rem 0.55rem !important;
        gap: 0.18rem 0.35rem !important;
    }
    .hero-action-buttons {
        gap: 0.35rem !important;
    }
    .hero-action-buttons .btn {
        max-width: 230px !important;
        padding: 0.42rem 0.8rem !important;
        font-size: 0.74rem !important;
        border-radius: 25px !important;
    }
    .story-heading {
        font-size: 1.4rem !important;
    }
}

/* What Happens Next - 7 Step Cards Hover Animation */
.sub-step-card {
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.35s ease, background 0.35s ease !important;
    cursor: pointer;
}
.sub-step-card:hover {
    transform: translateY(-8px) scale(1.03) !important;
    box-shadow: 0 16px 35px rgba(15, 23, 42, 0.12), 0 4px 14px rgba(5, 150, 105, 0.08) !important;
    border-color: #059669 !important;
}
.sub-step-card .sub-step-icon {
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
    display: inline-block;
}
.sub-step-card:hover .sub-step-icon {
    transform: scale(1.25) rotate(6deg) !important;
}
.sub-step-card .sub-step-num {
    transition: transform 0.35s ease, box-shadow 0.35s ease !important;
}
.sub-step-card:hover .sub-step-num {
    transform: scale(1.1) !important;
    box-shadow: 0 4px 10px rgba(5, 150, 105, 0.2) !important;
}
</style>

<!-- Student Page Hero Section -->
<section class="student-slider"
    style="margin-top: 85px; position: relative; width: 100%; min-height: 560px; background-color: #0f172a; overflow: hidden; display: flex; align-items: center; justify-content: center; border-radius: 0; max-width: 100%; margin-left: 0; margin-right: 0;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
        <img src="<?php echo base_url('assets/images/student_portal_slider.png'); ?>"
            alt="Student Support Portal Banner"
            style="width: 100%; height: 100%; object-fit: cover; object-position: center 20%;">
    </div>
    <div class="student-slider-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(180deg, rgba(15, 23, 42, 0.55) 0%, rgba(15, 23, 42, 0.40) 50%, rgba(15, 23, 42, 0.75) 100%); z-index: 2;"></div>
    <div class="student-hero-content reveal"
        style="position: relative; z-index: 3; text-align: center; padding: 6rem 1.5rem 5.5rem; max-width: 950px; margin: 0 auto; width: 100%;">
        <span class="section-badge hero-slider-badge badge-student">
            🎓 STUDENT SUPPORT PORTAL
        </span>
        <h1 class="student-hero-heading"
            style="color: #ffffff; font-size: 3.4rem; font-weight: 800; line-height: 1.18; margin-bottom: 1.25rem; text-shadow: 0 4px 18px rgba(15, 23, 42, 0.95), 0 2px 6px rgba(0, 0, 0, 1);">
            Your Education. Your Future.<br class="hero-br">
            <span class="highlight-text"
                style="color: #facc15; background: none; -webkit-text-fill-color: #facc15; text-shadow: 0 3px 15px rgba(0, 0, 0, 0.95), 0 0 25px rgba(250, 204, 21, 0.8);">Your
                Opportunity.</span>
        </h1>
        <p class="student-hero-desc"
            style="color: #ffffff; font-size: 1.18rem; font-weight: 600; max-width: 820px; margin: 0 auto 1.5rem; line-height: 1.6; text-shadow: 0 2px 14px rgba(0, 0, 0, 0.95), 0 1px 4px rgba(0, 0, 0, 1);">
            Financial difficulties or lack of proper guidance should not stop a student from pursuing higher education.
            Sindhikum Samugam helps students find the right educational path and access the support they may need.
        </p>

        <!-- Support Types Badge Bar -->
        <div class="support-badge-wrapper" style="margin-bottom: 2rem;">
            <span class="support-type-badge hero-slider-badge badge-student"
                style="display: inline-flex; background: rgba(15, 23, 42, 0.85); color: #ffffff; padding: 0.65rem 1.6rem; border-radius: 50px; font-weight: 800; font-size: 0.95rem; border: 2px solid #059669; box-shadow: 0 10px 30px rgba(5, 150, 105, 0.4);">
                <span style="color: #34d399;">Educational Guidance</span> <span class="support-badge-divider">•</span> <span style="color: #fbbf24;">Fee
                    Assistance</span> <span class="support-badge-divider">•</span> <span style="color: #38bdf8;">Career Direction</span>
            </span>
        </div>

        <div class="hero-action-buttons" style="display: flex; gap: 1.25rem; justify-content: center; flex-wrap: wrap; align-items: center;">
            <a href="javascript:void(0)" onclick="openRegistrationModal()" class="btn btn-primary">
                Register for Educational Support →
            </a>
            <a href="#registerSection" class="btn btn-secondary">
                Check Application Status
            </a>
        </div>
    </div>
</section>

<!-- Why Sindhikum Samugam Section -->
<section class="about-section" style="padding: 3.5rem 1.5rem; background: #ffffff;">
    <div class="about-container"
        style="max-width: 1250px; margin: 0 auto; display: grid; grid-template-columns: 1.2fr 1fr; gap: 3rem; align-items: center;">
        <!-- Content on the Left -->
        <div class="about-content reveal-left">
            <div class="premium-section-header text-left" style="margin-bottom: 1rem;">
                <span class="section-badge"
                    style="background: #e0f2fe; color: #0284c7; border: 1px solid rgba(2, 132, 199, 0.25);">About
                    Us</span>
                <h2>Why <span class="gradient-text">Sindhikum Samugam</span></h2>
            </div>
            <p class="section-description"
                style="color: #475569; font-size: 1.02rem; line-height: 1.6; margin-bottom: 0.65rem;">
                Sindhikum Samugam is committed to helping students pursue higher education despite financial or personal
                challenges. We provide educational guidance and need-based fee assistance to students who genuinely need
                support to move forward.
            </p>
            <p class="section-description"
                style="color: #475569; font-size: 1.02rem; line-height: 1.6; margin-bottom: 1.25rem;">
                We believe that a student's future should not be limited by their financial circumstances. What matters
                is their determination to learn, grow and build a better life.
            </p>

            <ul class="about-features"
                style="list-style: none; margin-bottom: 1.5rem; padding: 0; display: flex; flex-direction: column; gap: 0.85rem;">
                <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                    <span class="feature-icon"
                        style="width: 24px; height: 24px; border-radius: 50%; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: bold; flex-shrink: 0; margin-top: 0.15rem;">✓</span>
                    <div>
                        <strong
                            style="display: block; font-size: 1rem; color: #0f172a; font-weight: 700; margin-bottom: 0.1rem;">Educational
                            Guidance & Direction</strong>
                        <span style="color: #64748b; font-size: 0.92rem; line-height: 1.45; display: block;">Helping
                            students make informed decisions about their education and future.</span>
                    </div>
                </li>
                <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                    <span class="feature-icon"
                        style="width: 24px; height: 24px; border-radius: 50%; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: bold; flex-shrink: 0; margin-top: 0.15rem;">✓</span>
                    <div>
                        <strong
                            style="display: block; font-size: 1rem; color: #0f172a; font-weight: 700; margin-bottom: 0.1rem;">Need-Based
                            Fee Assistance</strong>
                        <span style="color: #64748b; font-size: 0.92rem; line-height: 1.45; display: block;">Supporting
                            eligible students facing genuine financial difficulties with their higher education
                            fees.</span>
                    </div>
                </li>
                <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                    <span class="feature-icon"
                        style="width: 24px; height: 24px; border-radius: 50%; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: bold; flex-shrink: 0; margin-top: 0.15rem;">✓</span>
                    <div>
                        <strong
                            style="display: block; font-size: 1rem; color: #0f172a; font-weight: 700; margin-bottom: 0.1rem;">Every
                            Student Deserves an Opportunity</strong>
                        <span style="color: #64748b; font-size: 0.92rem; line-height: 1.45; display: block;">We look
                            beyond academic marks and consider the student's circumstances, determination and genuine
                            need.</span>
                    </div>
                </li>
            </ul>

            <a href="javascript:void(0)" onclick="openRegistrationModal()" class="btn btn-primary"
                style="font-size: 1rem; padding: 0.85rem 2rem; display: inline-flex; font-weight: 700; border-radius: 12px;">
                <span class="btn-text">Register for Educational Support →</span>
            </a>
        </div>

        <!-- Image on the Right -->
        <div class="about-image-wrapper reveal-right">
            <div class="image-card"
                style="overflow: hidden; border-radius: 1.5rem; box-shadow: var(--shadow-lg); aspect-ratio: 4/3;">
                <img src="<?php echo base_url('assets/images/studentabout.png'); ?>"
                    alt="Graduating students celebrating"
                    style="width: 100%; height: 100%; object-fit: cover; object-position: center 25%; display: block;">
            </div>
        </div>
    </div>
</section>

<!-- Section: Beyond Academic Marks -->
<section class="whole-story-section"
    style="padding: 5rem 1.5rem; background: linear-gradient(135deg, #ecfdf5 0%, #f0f9ff 100%); position: relative; overflow: hidden; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
    <!-- Background Glow Effect -->
    <div
        style="position: absolute; top: -50px; right: -50px; width: 350px; height: 350px; background: rgba(5, 150, 105, 0.08); border-radius: 50%; filter: blur(60px); pointer-events: none;">
    </div>
    <div
        style="position: absolute; bottom: -50px; left: -50px; width: 350px; height: 350px; background: rgba(2, 132, 199, 0.08); border-radius: 50%; filter: blur(60px); pointer-events: none;">
    </div>

    <div style="max-width: 1100px; margin: 0 auto; position: relative; z-index: 2;">
        <div class="story-glass-card reveal-zoom"
            style="background: #ffffff; border: 1px solid rgba(5, 150, 105, 0.18); border-radius: 24px; padding: 3.5rem 2.5rem; box-shadow: 0 20px 45px -10px rgba(15, 23, 42, 0.06);">
            <div style="text-align: center; max-width: 850px; margin: 0 auto;">

                <span class="section-badge story-badge"
                    style="background: #ecfdf5; color: #059669; border: 1px solid rgba(5, 150, 105, 0.25); padding: 0.45rem 1.25rem; border-radius: 50px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; display: inline-block; margin-bottom: 1.25rem;">
                    EQUAL OPPORTUNITY FOR ALL
                </span>

                <h2 class="story-heading"
                    style="font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 1.25rem; line-height: 1.25;">
                    Your Marks Don't Tell <span
                        style="background: linear-gradient(135deg, #059669, #0284c7); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Your
                        Whole Story.</span>
                </h2>

                <p class="story-desc-1"
                    style="color: #334155; font-size: 1.15rem; font-weight: 600; line-height: 1.7; margin-bottom: 1rem; max-width: 780px; margin-left: auto; margin-right: auto;">
                    We do not believe that academic marks alone should determine whether a student deserves an opportunity.
                </p>

                <p class="story-desc-2" style="color: #64748b; font-size: 1.08rem; line-height: 1.8; margin-bottom: 2.25rem; max-width: 800px; margin-left: auto; margin-right: auto;">
                    We look at the complete picture — your <strong style="color: #0284c7; font-weight: 700;">personal circumstances</strong>, <strong style="color: #059669; font-weight: 700;">educational goals</strong>, <strong style="color: #d97706; font-weight: 700;">genuine financial need</strong>, and the true <strong style="color: #db2777; font-weight: 700;">determination & grit</strong> you possess.
                </p>

                <div class="story-highlight-box"
                    style="background: linear-gradient(135deg, #059669 0%, #047857 100%); border-radius: 18px; padding: 1.35rem 2.25rem; color: #ffffff; box-shadow: 0 12px 28px -6px rgba(5, 150, 105, 0.35); max-width: 780px; margin: 0 auto; display: inline-flex; align-items: center; justify-content: center; gap: 0.85rem; border: 1px solid rgba(255, 255, 255, 0.2);">
                    <span style="font-size: 1.4rem;">✨</span>
                    <p style="color: #ffffff; font-size: 1.12rem; font-weight: 700; margin: 0; line-height: 1.5;">
                        If you have the determination to learn and move forward, you can reach out to us.
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Registration Process Section -->
<section id="registerSection" class="registration-process-section" style="padding: 4.5rem 1.5rem; background: #f8fafc;">
    <div class="registration-container"
        style="max-width: 1050px; margin: 0 auto; padding: 3.5rem 2.5rem; background: #ffffff; border-radius: 24px; border: 1px solid #e2e8f0; box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.08);">
        <div class="premium-section-header" style="text-align: center; margin-bottom: 3rem;">
            <span class="section-badge"
                style="background: #e0f2fe; color: #0284c7; padding: 0.4rem 1.1rem; border-radius: 50px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; display: inline-block; margin-bottom: 0.85rem;">
                HOW TO APPLY
            </span>
            <h2 style="font-size: 2.4rem; font-weight: 800; color: #0f172a; margin-bottom: 0.6rem; line-height: 1.2;">
                Simple Steps. <span class="gradient-text"
                    style="background: linear-gradient(135deg, #059669, #D97706); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Clear
                    Process.</span>
            </h2>
            <p style="color: #64748b; font-size: 1.05rem; max-width: 680px; margin: 0 auto; line-height: 1.6;">
                Complete your application with accurate information and supporting documents. Our team will review your
                request and guide you through the next steps.
            </p>
        </div>

        <!-- 5-Step Horizontal Stepper Overview -->
        <div style="margin-bottom: 3.5rem; position: relative; padding: 1rem 0;">
            <div class="stepper-overview-flex"
                style="display: flex; justify-content: space-between; align-items: flex-start; position: relative; z-index: 2; max-width: 950px; margin: 0 auto; flex-wrap: wrap; gap: 1rem;">
                <!-- Step 01 -->
                <div class="stepper-step-node"
                    style="display: flex; flex-direction: column; align-items: center; width: 140px; text-align: center;">
                    <div
                        style="width: 52px; height: 52px; border-radius: 50%; background: #059669; color: #FFFFFF; font-weight: 800; font-size: 1.2rem; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(5, 150, 105, 0.4);">
                        01
                    </div>
                    <span style="margin-top: 0.85rem; font-size: 0.92rem; font-weight: 700; color: #0F172A;">Basic
                        Details</span>
                </div>
                <!-- Step 02 -->
                <div class="stepper-step-node"
                    style="display: flex; flex-direction: column; align-items: center; width: 140px; text-align: center;">
                    <div
                        style="width: 52px; height: 52px; border-radius: 50%; background: #FFFFFF; border: 2px solid #CBD5E1; color: #475569; font-weight: 800; font-size: 1.2rem; display: flex; align-items: center; justify-content: center;">
                        02
                    </div>
                    <span
                        style="margin-top: 0.85rem; font-size: 0.92rem; font-weight: 600; color: #475569;">Education</span>
                </div>
                <!-- Step 03 -->
                <div class="stepper-step-node"
                    style="display: flex; flex-direction: column; align-items: center; width: 140px; text-align: center;">
                    <div
                        style="width: 52px; height: 52px; border-radius: 50%; background: #FFFFFF; border: 2px solid #CBD5E1; color: #475569; font-weight: 800; font-size: 1.2rem; display: flex; align-items: center; justify-content: center;">
                        03
                    </div>
                    <span style="margin-top: 0.85rem; font-size: 0.92rem; font-weight: 600; color: #475569;">Family &
                        Circumstances</span>
                </div>
                <!-- Step 04 -->
                <div class="stepper-step-node"
                    style="display: flex; flex-direction: column; align-items: center; width: 140px; text-align: center;">
                    <div
                        style="width: 52px; height: 52px; border-radius: 50%; background: #FFFFFF; border: 2px solid #CBD5E1; color: #475569; font-weight: 800; font-size: 1.2rem; display: flex; align-items: center; justify-content: center;">
                        04
                    </div>
                    <span style="margin-top: 0.85rem; font-size: 0.92rem; font-weight: 600; color: #475569;">Supporting
                        Documents</span>
                </div>
                <!-- Step 05 -->
                <div class="stepper-step-node"
                    style="display: flex; flex-direction: column; align-items: center; width: 140px; text-align: center;">
                    <div
                        style="width: 52px; height: 52px; border-radius: 50%; background: #FFFFFF; border: 2px solid #CBD5E1; color: #475569; font-weight: 800; font-size: 1.2rem; display: flex; align-items: center; justify-content: center;">
                        05
                    </div>
                    <span style="margin-top: 0.85rem; font-size: 0.92rem; font-weight: 600; color: #475569;">Submit
                        Application</span>
                </div>
            </div>
            <!-- Connecting line behind number nodes -->
            <div class="stepper-line-bg"
                style="position: absolute; top: 36px; left: 12%; right: 12%; height: 2px; background: #E2E8F0; z-index: 1;">
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="hero-action-buttons" style="display: flex; flex-direction: column; gap: 1.25rem; max-width: 480px; margin: 0 auto;">
            <button type="button" onclick="openRegistrationModal()" class="btn btn-primary" style="width: 100%;">
                Start Registration <span style="margin-left: 0.5rem; font-size: 1.2rem;">→</span>
            </button>
            <button type="button" onclick="openStatusModal()" class="btn btn-outline" style="width: 100%;">
                Check Application Status
            </button>
        </div>
    </div>
</section>

<!-- POPUP MODAL: Scholarship Application Form -->
<div id="applicationModal"
    style="display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(8px); z-index: 99999; overflow-y: auto; padding: 2rem 1rem;">
    <div
        style="max-width: 950px; margin: 2rem auto; background: #ffffff; border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.3); position: relative; overflow: hidden; border: 1px solid #cbd5e1;">
        <!-- Modal Top Bar -->
        <div
            style="background: #0f172a; color: white; padding: 1.25rem 2rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #059669;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo" style="height: 38px;">
                <span style="font-weight: 800; font-size: 1.25rem;"> Registration Form</span>
            </div>
            <button type="button" onclick="closeRegistrationModal()"
                style="background: rgba(255, 255, 255, 0.15); border: none; color: white; font-size: 1.5rem; width: 36px; height: 36px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.2s ease;">✕</button>
        </div>

        <div style="padding: 2.5rem 2.5rem 3rem;">
            <!-- 5-Step Progress Stepper inside Modal -->
            <div class="form-stepper-wrapper" style="margin-bottom: 2.5rem; position: relative;">
                <div class="form-stepper-bar"
                    style="display: flex; justify-content: space-between; position: relative; z-index: 2;">
                    <!-- Step 1 Indicator -->
                    <div class="form-step-item active" id="stepIndicator1" onclick="jumpToStep(1)"
                        style="display: flex; flex-direction: column; align-items: center; cursor: pointer; flex: 1;">
                        <div class="step-num"
                            style="width: 44px; height: 44px; border-radius: 50%; background: #F59E0B; color: #ffffff; font-weight: 700; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; box-shadow: 0 4px 12px rgba(245, 158, 11, 0.35); transition: all 0.3s ease;">
                            1</div>
                        <span class="step-title"
                            style="margin-top: 0.45rem; font-size: 0.85rem; font-weight: 700; color: #0F172A;">Basic
                            Details</span>
                    </div>
                    <!-- Step 2 Indicator -->
                    <div class="form-step-item" id="stepIndicator2" onclick="jumpToStep(2)"
                        style="display: flex; flex-direction: column; align-items: center; cursor: pointer; flex: 1;">
                        <div class="step-num"
                            style="width: 44px; height: 44px; border-radius: 50%; background: #ffffff; border: 2px solid #cbd5e1; color: #64748b; font-weight: 700; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; transition: all 0.3s ease;">
                            2</div>
                        <span class="step-title"
                            style="margin-top: 0.45rem; font-size: 0.85rem; font-weight: 600; color: #64748b;">Education</span>
                    </div>
                    <!-- Step 3 Indicator -->
                    <div class="form-step-item" id="stepIndicator3" onclick="jumpToStep(3)"
                        style="display: flex; flex-direction: column; align-items: center; cursor: pointer; flex: 1;">
                        <div class="step-num"
                            style="width: 44px; height: 44px; border-radius: 50%; background: #ffffff; border: 2px solid #cbd5e1; color: #64748b; font-weight: 700; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; transition: all 0.3s ease;">
                            3</div>
                        <span class="step-title"
                            style="margin-top: 0.45rem; font-size: 0.85rem; font-weight: 600; color: #64748b;">Family</span>
                    </div>
                    <!-- Step 4 Indicator -->
                    <div class="form-step-item" id="stepIndicator4" onclick="jumpToStep(4)"
                        style="display: flex; flex-direction: column; align-items: center; cursor: pointer; flex: 1;">
                        <div class="step-num"
                            style="width: 44px; height: 44px; border-radius: 50%; background: #ffffff; border: 2px solid #cbd5e1; color: #64748b; font-weight: 700; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; transition: all 0.3s ease;">
                            4</div>
                        <span class="step-title"
                            style="margin-top: 0.45rem; font-size: 0.85rem; font-weight: 600; color: #64748b;">Documents</span>
                    </div>
                    <!-- Step 5 Indicator -->
                    <div class="form-step-item" id="stepIndicator5" onclick="jumpToStep(5)"
                        style="display: flex; flex-direction: column; align-items: center; cursor: pointer; flex: 1;">
                        <div class="step-num"
                            style="width: 44px; height: 44px; border-radius: 50%; background: #ffffff; border: 2px solid #cbd5e1; color: #64748b; font-weight: 700; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; transition: all 0.3s ease;">
                            5</div>
                        <span class="step-title"
                            style="margin-top: 0.45rem; font-size: 0.85rem; font-weight: 600; color: #64748b;">Submit</span>
                    </div>
                </div>
                <!-- Connecting line -->
                <div
                    style="position: absolute; top: 22px; left: 10%; right: 10%; height: 2px; background: #e2e8f0; z-index: 1;">
                    <div id="stepProgressBar"
                        style="height: 100%; width: 0%; background: #F59E0B; transition: width 0.4s ease;"></div>
                </div>
            </div>

            <!-- Form Container -->
            <form id="scholarshipApplicationForm" action="<?php echo base_url('welcome/save_application'); ?>"
                method="POST" enctype="multipart/form-data" novalidate onsubmit="handleFormSubmit(event)">

                <!-- STEP 1: Basic Details -->
                <div class="form-step-panel active" id="stepPanel1">
                    <h3
                        style="font-size: 1.3rem; font-weight: 700; color: #0f172a; margin-bottom: 1.25rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 0.65rem; display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #059669;">👤</span> Step 1: Basic Details
                    </h3>
                    <div
                        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.15rem;">
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Full
                                Name *</label>
                            <input type="text" name="full_name" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Date
                                of Birth *</label>
                            <input type="date" name="dob" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Gender
                                *</label>
                            <select name="gender" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; background: white;">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Mobile
                                Number *</label>
                            <input type="tel" name="mobile" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Email
                                Address *</label>
                            <input type="email" name="email" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">City
                                / District / State *</label>
                            <input type="text" name="city_district_state" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Residential
                                Address *</label>
                            <textarea name="address" rows="2" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; font-family: inherit;"></textarea>
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Profile
                                Photo</label>
                            <input type="file" name="profile_photo" accept="image/*"
                                style="width: 100%; padding: 0.65rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Parent
                                / Guardian Contact Number *</label>
                            <input type="tel" name="parent_contact" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Preferred
                                Language *</label>
                            <select name="preferred_language" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; background: white;">
                                <option value="">Select Preferred Language</option>
                                <option value="Tamil">Tamil</option>
                                <option value="English">English</option>
                                <option value="Both">Both Tamil & English</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Education Details -->
                <div class="form-step-panel" id="stepPanel2" style="display: none;">
                    <h3
                        style="font-size: 1.3rem; font-weight: 700; color: #0f172a; margin-bottom: 1.25rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 0.65rem; display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #059669;">🎓</span> Step 2: Education Details
                    </h3>
                    <div
                        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.15rem;">
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Current
                                / Last Completed Qualification *</label>
                            <input type="text" name="qualification" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">School
                                / College Name *</label>
                            <input type="text" name="school_college_name" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Board
                                / University *</label>
                            <input type="text" name="board_university" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Course
                                Applying For *</label>
                            <input type="text" name="course_applying" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">College
                                / University for Higher Studies *</label>
                            <input type="text" name="target_college" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Academic
                                Year *</label>
                            <select name="academic_year" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; background: white;">
                                <option value="2026-2027">2026 - 2027</option>
                                <option value="2025-2026">2025 - 2026</option>
                                <option value="2024-2025">2024 - 2025</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Marks
                                / Percentage / CGPA *</label>
                            <input type="text" name="marks_cgpa" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Previous
                                Academic Certificates</label>
                            <input type="file" name="academic_certificates" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.65rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Admission
                                Status *</label>
                            <select name="admission_status" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; background: white;">
                                <option value="">Select Status</option>
                                <option value="Not Yet Admitted">Not Yet Admitted</option>
                                <option value="Applied">Applied</option>
                                <option value="Admission Confirmed">Admission Confirmed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Annual
                                Tuition Fee (₹) *</label>
                            <input type="number" name="annual_tuition_fee" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Hostel
                                / Accommodation Required? *</label>
                            <select name="hostel_required" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; background: white;">
                                <option value="">Select Option</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Are
                                you a First Graduate? *</label>
                            <select name="is_first_graduate" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; background: white;">
                                <option value="">Select Option</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Academic
                                / Career Goal *</label>
                            <textarea name="career_goal" rows="2" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; font-family: inherit;"></textarea>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Family & Financial Details -->
                <div class="form-step-panel" id="stepPanel3" style="display: none;">
                    <h3
                        style="font-size: 1.3rem; font-weight: 700; color: #0f172a; margin-bottom: 1rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 0.65rem; display: flex; align-items: center; gap: 0.5rem;">
                        Step 3: Family & Financial Details
                    </h3>

                    <!-- Important Guidance Callout -->
                    <div
                        style="background: #eff6ff; border-left: 4px solid #0284c7; padding: 0.85rem 1.1rem; border-radius: 8px; margin-bottom: 1.25rem; font-size: 0.9rem; color: #0369a1; font-weight: 600;">
                        💡 <strong>Important Note:</strong> The financial section focuses on understanding your actual
                        circumstances and genuine need, not only family income.
                    </div>

                    <div
                        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.15rem;">
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Father's
                                / Guardian's Name *</label>
                            <input type="text" name="father_guardian_name" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Mother's
                                Name *</label>
                            <input type="text" name="mother_name" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Father's
                                / Guardian's Occupation *</label>
                            <input type="text" name="father_occupation" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Mother's
                                Occupation</label>
                            <input type="text" name="mother_occupation"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Number
                                of Family Members *</label>
                            <input type="number" name="family_members_count" min="1" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Number
                                of Earning Members *</label>
                            <input type="number" name="earning_members_count" min="0" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Annual
                                Family Income (₹) *</label>
                            <input type="number" name="annual_income" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Father's
                                / Guardian's Monthly Income (₹)</label>
                            <input type="number" name="father_monthly_income"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Family's
                                Major Financial Commitments</label>
                            <input type="text" name="financial_commitments"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Why
                                are you seeking financial support for your education? *</label>
                            <textarea name="why_seeking_support" rows="3" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; font-family: inherit;"></textarea>
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">How
                                much financial support do you require? (₹) *</label>
                            <input type="number" name="required_support_amount" required
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Other
                                Scholarships / Financial Support Received</label>
                            <input type="text" name="other_scholarships"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Additional
                                Information About Your Financial Situation</label>
                            <textarea name="additional_financial_info" rows="2"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; font-family: inherit;"></textarea>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: Verification Documents -->
                <div class="form-step-panel" id="stepPanel4" style="display: none;">
                    <h3
                        style="font-size: 1.3rem; font-weight: 700; color: #0f172a; margin-bottom: 0.5rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 0.65rem; display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #059669;">📂</span> Step 4: Verification Documents
                    </h3>
                    <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 1rem;">
                        Please upload clear and valid documents for application verification. Accepted formats: PDF,
                        JPG, PNG (Max 5MB per file).
                    </p>

                    <!-- Important Documents Callout -->
                    <div
                        style="background: #f0fdf4; border-left: 4px solid #059669; padding: 0.85rem 1.1rem; border-radius: 8px; margin-bottom: 1.25rem; font-size: 0.88rem; color: #065f46; font-weight: 500; line-height: 1.5;">
                        ℹ️ <strong>Note on Fee Payment:</strong>Since Sindhikum Samugam provides eligible educational
                        fee support directly to the institution, student bank details should not be required during the
                        initial application.

                        Government ID and other sensitive documents can be used strictly for verification purposes.
                    </div>

                    <div
                        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.15rem;">

                        <!-- Mandatory Documents Header -->
                        <div
                            style="grid-column: 1 / -1; font-weight: 700; color: #0f172a; font-size: 0.98rem; margin-top: 0.25rem;">
                            Mandatory Documents (1 & 2):
                        </div>

                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">1.
                                Student Photo *</label>
                            <input type="file" name="doc_student_photo" required accept="image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">2.
                                Government ID *</label>
                            <input type="file" name="doc_gov_id" required accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>

                        

                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">3.
                                Income Certificate</label>
                            <input type="file" name="doc_income_certificate" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">4.
                                Previous Academic Mark Sheets</label>
                            <input type="file" name="doc_marksheets" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">5.
                                College Admission / Offer Letter</label>
                            <input type="file" name="doc_admission_letter" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">6.
                                College Fee Structure</label>
                            <input type="file" name="doc_fee_structure" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>

                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">7.
                                Community Certificate</label>
                            <input type="file" name="doc_community_certificate" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">8.
                                Bonafide Certificate</label>
                            <input type="file" name="doc_bonafide" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">9.
                                Supporting Documents</label>
                            <input type="file" name="doc_supporting" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                    </div>
                </div>

                <!-- STEP 5: Declaration & Submit -->
                <div class="form-step-panel" id="stepPanel5" style="display: none;">
                    <h3
                        style="font-size: 1.3rem; font-weight: 700; color: #0f172a; margin-bottom: 1rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 0.65rem; display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #059669;">✍️</span> Step 5: Declaration & Submission
                    </h3>
                    <p style="color: #64748b; font-size: 0.92rem; margin-bottom: 1.5rem;">
                        Before submitting the application, please review and confirm the following statements:
                    </p>

                    <div
                        style="display: flex; flex-direction: column; gap: 1.15rem; background: #f8fafc; padding: 1.5rem; border-radius: 16px; border: 1px solid #e2e8f0;">
                        <label style="display: flex; align-items: flex-start; gap: 0.75rem; cursor: pointer;">
                            <input type="checkbox" name="decl_true_info" required
                                style="width: 18px; height: 18px; margin-top: 0.15rem; accent-color: #059669;">
                            <span style="color: #1e293b; font-size: 0.95rem; font-weight: 600; line-height: 1.5;">
                                I confirm that the information provided in this application is true and complete to the
                                best of my knowledge. *
                            </span>
                        </label>

                        <label style="display: flex; align-items: flex-start; gap: 0.75rem; cursor: pointer;">
                            <input type="checkbox" name="decl_no_guarantee" required
                                style="width: 18px; height: 18px; margin-top: 0.15rem; accent-color: #059669;">
                            <span style="color: #1e293b; font-size: 0.95rem; font-weight: 600; line-height: 1.5;">
                                I understand that submitting an application does not guarantee financial assistance. *
                            </span>
                        </label>

                        <label style="display: flex; align-items: flex-start; gap: 0.75rem; cursor: pointer;">
                            <input type="checkbox" name="decl_consent" required
                                style="width: 18px; height: 18px; margin-top: 0.15rem; accent-color: #059669;">
                            <span style="color: #1e293b; font-size: 0.95rem; font-weight: 600; line-height: 1.5;">
                                I consent to Sindhikum Samugam verifying the information and documents provided for the
                                purpose of assessing my application. *
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Form Navigation & Control Buttons -->
                <div
                    style="margin-top: 2.5rem; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f5f9; padding-top: 1.5rem;">
                    <button type="button" id="prevBtn" onclick="navigateStep(-1)"
                        style="display: none; padding: 0.85rem 1.8rem; border-radius: 10px; font-weight: 600; font-size: 0.95rem; border: 1px solid #cbd5e1; background: #ffffff; color: #475569; cursor: pointer; transition: all 0.2s ease;">
                        ← Previous Step
                    </button>
                    <div style="margin-left: auto; display: flex; gap: 1rem;">
                        <button type="button" id="nextBtn" onclick="navigateStep(1)"
                            style="padding: 0.85rem 2.2rem; border-radius: 10px; font-weight: 600; font-size: 0.95rem; border: none; background: linear-gradient(135deg, #059669, #047857); color: #ffffff; cursor: pointer; box-shadow: 0 4px 14px rgba(5, 150, 105, 0.3); transition: all 0.2s ease;">
                            Save & Next →
                        </button>
                        <button type="submit" id="submitFormBtn" onclick="handleFormSubmit(event)"
                            style="display: none; padding: 0.85rem 2.2rem; border-radius: 10px; font-weight: 600; font-size: 0.95rem; border: none; background: linear-gradient(135deg, #059669, #D97706); color: #ffffff; cursor: pointer; box-shadow: 0 4px 14px rgba(5, 150, 105, 0.3); transition: all 0.2s ease;">
                            Submit Application →
                        </button>
                    </div>
                </div>

            </form>

            <!-- Success Notification Box inside Modal -->
            <div id="formSuccessMessage"
                style="display: none; margin-top: 2rem; padding: 2.5rem; background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 18px; text-align: center; color: #065f46;">
                <span style="font-size: 3.5rem; display: block; margin-bottom: 0.5rem;">✅</span>
                <h3 style="font-size: 1.65rem; font-weight: 800; margin-bottom: 0.5rem;">Application Submitted
                    Successfully</h3>
                <p style="font-size: 1.05rem; max-width: 600px; margin: 0 auto 1.25rem;">Your application has been
                    received successfully.
                    Our team will review your application and contact you if any additional information or documents are
                    required.</p>
                <p style="font-weight: 700; color: #047857; font-size: 1.1rem; margin-bottom: 1.5rem;">Application
                    Reference No: <span id="appRefNo"
                        style="background: #ffffff; padding: 0.4rem 1rem; border-radius: 8px; border: 1.5px solid #6ee7b7; font-family: monospace; font-size: 1.15rem;">SS-2026-9842</span>
                </p>
                <button type="button" onclick="closeRegistrationModal()" class="btn btn-primary"
                    style="padding: 0.8rem 2rem; border-radius: 10px;">Close Window</button>
            </div>
        </div>
    </div>
</div>

<!-- POPUP MODAL: Check Application Status -->
<div id="statusModal"
    style="display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(15, 23, 42, 0.75); backdrop-filter: blur(8px); z-index: 99999; overflow-y: auto; padding: 2rem 1rem;">
    <div
        style="max-width: 550px; margin: 5rem auto; background: #ffffff; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.3); overflow: hidden; border: 1px solid #cbd5e1;">
        <div
            style="background: #0f172a; color: white; padding: 1.25rem 1.75rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #0284c7;">
            <h3 style="font-size: 1.2rem; font-weight: 700; margin: 0;">Check Application Status</h3>
            <button type="button" onclick="closeStatusModal()"
                style="background: rgba(255, 255, 255, 0.15); border: none; color: white; font-size: 1.25rem; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;">✕</button>
        </div>
        <div style="padding: 2rem;">
            <label style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.5rem;">Enter Application
                Reference Number</label>
            <div style="display: flex; gap: 0.75rem; margin-bottom: 1.5rem;">
                <input type="text" id="statusRefInput"
                    style="flex: 1; padding: 0.8rem 1rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 1rem; outline: none;">
                <button type="button" onclick="checkStatusAction()" class="btn btn-primary"
                    style="padding: 0.8rem 1.5rem; border-radius: 10px; border: none; background: #0284c7; color: white; font-weight: 700; cursor: pointer;">Track</button>
            </div>
            <div id="statusResultBox"
                style="display: none; padding: 1.25rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.5rem;">
                    <span style="font-size: 1.5rem;">🔍</span>
                    <div>
                        <strong style="color: #0f172a; display: block;">Status: In Verification</strong>
                        <span style="font-size: 0.85rem; color: #64748b;">Stage 2 of 7 – Committee Document
                            Review</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let currentStep = 1;
    const totalSteps = 5;

    function openRegistrationModal() {
        currentStep = 1;
        updateStepUI();
        const modal = document.getElementById('applicationModal');
        if (modal) {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
    }

    function closeRegistrationModal() {
        const modal = document.getElementById('applicationModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }

    function openStatusModal() {
        const modal = document.getElementById('statusModal');
        if (modal) {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
    }

    function closeStatusModal() {
        const modal = document.getElementById('statusModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }

    function updateStepUI() {
        for (let i = 1; i <= totalSteps; i++) {
            const panel = document.getElementById('stepPanel' + i);
            const indicator = document.getElementById('stepIndicator' + i);
            if (panel) {
                panel.style.display = i === currentStep ? 'block' : 'none';
            }
            if (indicator) {
                const num = indicator.querySelector('.step-num');
                const title = indicator.querySelector('.step-title');
                if (i === currentStep) {
                    num.style.background = '#F59E0B';
                    num.style.color = '#ffffff';
                    num.style.border = 'none';
                    num.style.boxShadow = '0 4px 12px rgba(245, 158, 11, 0.4)';
                    title.style.color = '#0F172A';
                    title.style.fontWeight = '800';
                } else if (i < currentStep) {
                    num.style.background = '#059669';
                    num.style.color = '#ffffff';
                    num.style.border = 'none';
                    num.style.boxShadow = '0 4px 10px rgba(5, 150, 105, 0.25)';
                    title.style.color = '#059669';
                    title.style.fontWeight = '700';
                } else {
                    num.style.background = '#ffffff';
                    num.style.border = '2px solid #cbd5e1';
                    num.style.color = '#64748b';
                    num.style.boxShadow = 'none';
                    title.style.color = '#64748b';
                    title.style.fontWeight = '600';
                }
            }
        }

        const progress = document.getElementById('stepProgressBar');
        if (progress) {
            progress.style.width = ((currentStep - 1) / (totalSteps - 1)) * 100 + '%';
        }

        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitFormBtn');

        if (prevBtn) prevBtn.style.display = currentStep > 1 ? 'block' : 'none';
        if (nextBtn) nextBtn.style.display = currentStep < totalSteps ? 'block' : 'none';
        if (submitBtn) submitBtn.style.display = currentStep === totalSteps ? 'block' : 'none';
    }

    function validateStepPanel(stepNum) {
        const panel = document.getElementById('stepPanel' + stepNum);
        if (!panel) return true;
        const inputs = panel.querySelectorAll('input[required], select[required], textarea[required]');
        let valid = true;
        inputs.forEach(input => {
            if (input.type === 'checkbox') {
                if (!input.checked) valid = false;
            } else if (!input.value.trim()) {
                input.style.borderColor = '#ef4444';
                valid = false;
            } else {
                input.style.borderColor = '#cbd5e1';
            }
        });
        return valid;
    }

    function navigateStep(direction) {
        if (direction === 1) {
            if (!validateStepPanel(currentStep)) {
                showAppNotification('Please fill out all required fields before proceeding.', 'Required Fields Missing', 'error');
                return;
            }
        }

        currentStep += direction;
        if (currentStep < 1) currentStep = 1;
        if (currentStep > totalSteps) currentStep = totalSteps;
        updateStepUI();
    }

    function jumpToStep(step) {
        if (step >= 1 && step <= totalSteps) {
            currentStep = step;
            updateStepUI();
        }
    }

    function checkStatusAction() {
        const input = document.getElementById('statusRefInput');
        const resultBox = document.getElementById('statusResultBox');
        if (input && input.value.trim()) {
            const refNo = input.value.trim();
            fetch('<?php echo base_url("welcome/check_status"); ?>?ref_no=' + encodeURIComponent(refNo))
                .then(res => res.json())
                .then(data => {
                    if (resultBox) {
                        resultBox.style.display = 'block';
                        if (data.status === 'found') {
                            const app = data.data;
                            let statusName = app.status;
                            let badgeStyle = 'background: #fef3c7; color: #d97706; border: 1px solid #fde68a;';
                            let statusEmoji = '🟡';
                            let statusDesc = 'Your application has been successfully received. Our team will review the submitted details and documents. If further information is required, we will contact you.';

                            if (app.status === 'Under Review') {
                                statusEmoji = '🔵';
                                badgeStyle = 'background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd;';
                                statusDesc = 'Your application is currently under detailed committee review and document verification. We will notify you once a decision is made.';
                            } else if (app.status === 'Approved') {
                                statusEmoji = '🟢';
                                badgeStyle = 'background: #d1fae5; color: #047857; border: 1px solid #a7f3d0;';
                                statusDesc = 'Congratulations! Your scholarship application has been approved by Sindhikum Samugam Educational Trust. Our team will coordinate fee disbursement directly with your institution.';
                            } else if (app.status === 'Not Approved' || app.status === 'Rejected') {
                                statusName = 'Not Approved';
                                statusEmoji = '🔴';
                                badgeStyle = 'background: #fee2e2; color: #dc2626; border: 1px solid #fca5a5;';
                                statusDesc = 'Thank you for applying. After careful review, we regret to inform you that your application could not be approved at this time based on available trust funds and criteria.';
                            } else {
                                statusName = 'Application Received';
                            }

                            resultBox.innerHTML = `
                        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 1.5rem; text-align: left; box-shadow: 0 10px 25px rgba(15,23,42,0.06);">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
                                <strong style="font-size: 1.1rem; color: #0f172a;">${app.full_name}</strong>
                                <span style="font-size: 0.88rem; font-weight: 700; padding: 0.35rem 0.9rem; border-radius: 50px; ${badgeStyle}">
                                    ${statusEmoji} Status: ${statusName}
                                </span>
                            </div>
                            <div style="font-size: 0.95rem; color: #334155; margin-bottom: 1rem; line-height: 1.6; background: #f8fafc; padding: 1rem; border-radius: 12px; border: 1px solid #f1f5f9;">
                                ${statusDesc}
                            </div>
                            <div style="font-size: 0.88rem; color: #64748b; line-height: 1.6;">
                                <strong>Reference No:</strong> <span style="font-family: monospace; font-weight: 700; color: #0f172a;">${app.ref_no}</span><br>
                                <strong>Course:</strong> ${app.course_applying || 'N/A'}<br>
                                <strong>Submitted On:</strong> ${app.created_at}
                            </div>
                            ${app.admin_remarks ? `<div style="font-size: 0.88rem; background: #eff6ff; color: #1e40af; padding: 0.75rem 1rem; border-radius: 10px; margin-top: 0.85rem; border: 1px solid #bfdbfe;"><strong>Trust Board Note:</strong> ${app.admin_remarks}</div>` : ''}
                        </div>
                    `;
                        } else {
                            resultBox.innerHTML = `
                        <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; border-radius: 14px; padding: 1.25rem; font-size: 0.95rem; text-align: center; font-weight: 600;">
                            ❌ No application record found for Reference ID: <strong style="font-family: monospace;">${refNo}</strong>
                        </div>
                    `;
                        }
                    }
                })
                .catch(err => {
                    if (resultBox) resultBox.style.display = 'block';
                });
        } else {
            showAppNotification('Please enter your Application Reference Number.', 'Reference ID Required', 'error');
        }
    }

    function handleFormSubmit(e) {
        e.preventDefault();
        
        // Comprehensive multi-step validation check before submitting
        for (let i = 1; i <= totalSteps; i++) {
            if (!validateStepPanel(i)) {
                currentStep = i;
                updateStepUI();
                showAppNotification('Please fill out all required fields in Step ' + i + ' before submitting your application.', 'Required Fields Missing', 'error');
                return false;
            }
        }

        const form = document.getElementById('scholarshipApplicationForm');
        const successBox = document.getElementById('formSuccessMessage');
        const submitBtn = document.getElementById('submitFormBtn');

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Submitting Application... 🤲';
        }

        const formData = new FormData(form);

        fetch('<?php echo base_url("welcome/save_application"); ?>', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('appRefNo').innerText = data.ref_no;
                    if (form) form.style.display = 'none';
                    if (successBox) successBox.style.display = 'block';
                } else {
                    showAppNotification('Error submitting application: ' + (data.message || 'Please try again.'), 'Submission Error', 'error');
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Submit Application 🤲';
                    }
                }
            })
            .catch(err => {
                console.error(err);
                showAppNotification('Network error processing application submission. Please try again.', 'Submission Error', 'error');
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Submit Application 🤲';
                }
            });
    }

    document.addEventListener('DOMContentLoaded', function () {
        updateStepUI();
        if (window.location.hash === '#registerForm' || window.location.hash === '#applicationModal' || window.location.hash === '#registerSection' || window.location.search.includes('register=1')) {
            openRegistrationModal();
        }
    });
</script>

<!-- Section: After You Apply - What Happens Next? -->
<section id="whatHappensNextSection" class="post-submission-section"
    style="padding: 5rem 1.5rem; background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%); border-top: 1px solid #e2e8f0;">
    <div class="post-submission-container" style="max-width: 1280px; margin: 0 auto;">

        <!-- Section Header -->
        <div class="premium-section-header text-center"
            style="text-align: center; max-width: 760px; margin: 0 auto 3.5rem auto;">
            <span class="section-badge"
                style="background: #e0f2fe; color: #0284c7; padding: 0.4rem 1.1rem; border-radius: 50px; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; display: inline-block; margin-bottom: 0.85rem; border: 1px solid rgba(2, 132, 199, 0.2);">
                NEXT STEPS
            </span>
            <h2 style="font-size: 2.3rem; font-weight: 800; color: #0f172a; margin-top: 0.5rem; line-height: 1.2;">
                After You Apply — <span class="gradient-text"
                    style="background: linear-gradient(135deg, #059669, #0284c7); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">What
                    Happens Next?</span>
            </h2>
            <p style="color: #64748b; font-size: 1.05rem; margin-top: 0.75rem; line-height: 1.6;">
                Our transparent process helps us understand your needs, verify your information and determine the
                appropriate support.
            </p>
        </div>

        <!-- 7 Steps Flow Container -->
        <div class="submission-stepper-wrapper" style="overflow-x: auto; padding: 0.5rem 0 1.5rem;">
            <div class="submission-stepper"
                style="display: flex; align-items: center; justify-content: space-between; min-width: 1050px; gap: 0.6rem;">

                <!-- Step 01 -->
                <div class="sub-step-card"
                    style="background: #ffffff; border-radius: 16px; padding: 1.5rem 1rem; border: 1px solid #e2e8f0; box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04); text-align: center; flex: 1; min-width: 125px;">
                    <div class="sub-step-icon" style="font-size: 1.8rem; margin-bottom: 0.4rem;">📄</div>
                    <div class="sub-step-num"
                        style="font-size: 0.8rem; font-weight: 800; color: #059669; background: rgba(5, 150, 105, 0.1); padding: 0.2rem 0.6rem; border-radius: 8px; display: inline-block; margin-bottom: 0.5rem; font-family: monospace;">
                        01</div>
                    <div style="font-size: 0.88rem; font-weight: 700; color: #0f172a; line-height: 1.3;">
                        Application<br>Received</div>
                </div>
                <div style="color: #cbd5e1; font-weight: 800; font-size: 1.2rem; flex-shrink: 0;">→</div>

                <!-- Step 02 -->
                <div class="sub-step-card"
                    style="background: #ffffff; border-radius: 16px; padding: 1.5rem 1rem; border: 1px solid #e2e8f0; box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04); text-align: center; flex: 1; min-width: 125px;">
                    <div class="sub-step-icon" style="font-size: 1.8rem; margin-bottom: 0.4rem;">🔍</div>
                    <div class="sub-step-num"
                        style="font-size: 0.8rem; font-weight: 800; color: #0284c7; background: rgba(2, 132, 199, 0.1); padding: 0.2rem 0.6rem; border-radius: 8px; display: inline-block; margin-bottom: 0.5rem; font-family: monospace;">
                        02</div>
                    <div style="font-size: 0.88rem; font-weight: 700; color: #0f172a; line-height: 1.3;">
                        Document<br>Verification</div>
                </div>
                <div style="color: #cbd5e1; font-weight: 800; font-size: 1.2rem; flex-shrink: 0;">→</div>

                <!-- Step 03 -->
                <div class="sub-step-card"
                    style="background: #ffffff; border-radius: 16px; padding: 1.5rem 1rem; border: 1px solid #e2e8f0; box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04); text-align: center; flex: 1; min-width: 125px;">
                    <div class="sub-step-icon" style="font-size: 1.8rem; margin-bottom: 0.4rem;">💬</div>
                    <div class="sub-step-num"
                        style="font-size: 0.8rem; font-weight: 800; color: #7c3aed; background: rgba(124, 58, 237, 0.1); padding: 0.2rem 0.6rem; border-radius: 8px; display: inline-block; margin-bottom: 0.5rem; font-family: monospace;">
                        03</div>
                    <div style="font-size: 0.88rem; font-weight: 700; color: #0f172a; line-height: 1.3;">Counselling
                        &<br>Guidance</div>
                </div>
                <div style="color: #cbd5e1; font-weight: 800; font-size: 1.2rem; flex-shrink: 0;">→</div>

                <!-- Step 04 -->
                <div class="sub-step-card"
                    style="background: #ffffff; border-radius: 16px; padding: 1.5rem 1rem; border: 1px solid #e2e8f0; box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04); text-align: center; flex: 1; min-width: 125px;">
                    <div class="sub-step-icon" style="font-size: 1.8rem; margin-bottom: 0.4rem;">⚖️</div>
                    <div class="sub-step-num"
                        style="font-size: 0.8rem; font-weight: 800; color: #d97706; background: rgba(217, 119, 6, 0.1); padding: 0.2rem 0.6rem; border-radius: 8px; display: inline-block; margin-bottom: 0.5rem; font-family: monospace;">
                        04</div>
                    <div style="font-size: 0.88rem; font-weight: 700; color: #0f172a; line-height: 1.3;">
                        Eligibility<br>Review</div>
                </div>
                <div style="color: #cbd5e1; font-weight: 800; font-size: 1.2rem; flex-shrink: 0;">→</div>

                <!-- Step 05 -->
                <div class="sub-step-card"
                    style="background: #ffffff; border-radius: 16px; padding: 1.5rem 1rem; border: 1px solid #e2e8f0; box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04); text-align: center; flex: 1; min-width: 125px;">
                    <div class="sub-step-icon" style="font-size: 1.8rem; margin-bottom: 0.4rem;">🎯</div>
                    <div class="sub-step-num"
                        style="font-size: 0.8rem; font-weight: 800; color: #059669; background: rgba(5, 150, 105, 0.1); padding: 0.2rem 0.6rem; border-radius: 8px; display: inline-block; margin-bottom: 0.5rem; font-family: monospace;">
                        05</div>
                    <div style="font-size: 0.88rem; font-weight: 700; color: #0f172a; line-height: 1.3;">
                        Support<br>Decision</div>
                </div>
                <div style="color: #cbd5e1; font-weight: 800; font-size: 1.2rem; flex-shrink: 0;">→</div>

                <!-- Step 06 -->
                <div class="sub-step-card"
                    style="background: #ffffff; border-radius: 16px; padding: 1.5rem 1rem; border: 1px solid #e2e8f0; box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04); text-align: center; flex: 1; min-width: 125px;">
                    <div class="sub-step-icon" style="font-size: 1.8rem; margin-bottom: 0.4rem;">🏛️</div>
                    <div class="sub-step-num"
                        style="font-size: 0.8rem; font-weight: 800; color: #0284c7; background: rgba(2, 132, 199, 0.1); padding: 0.2rem 0.6rem; border-radius: 8px; display: inline-block; margin-bottom: 0.5rem; font-family: monospace;">
                        06</div>
                    <div style="font-size: 0.88rem; font-weight: 700; color: #0f172a; line-height: 1.3;">Direct
                        Fee<br>Payment</div>
                </div>
                <div style="color: #cbd5e1; font-weight: 800; font-size: 1.2rem; flex-shrink: 0;">→</div>

                <!-- Step 07 -->
                <div class="sub-step-card"
                    style="background: #ffffff; border-radius: 16px; padding: 1.5rem 1rem; border: 1px solid #e2e8f0; box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04); text-align: center; flex: 1; min-width: 125px;">
                    <div class="sub-step-icon" style="font-size: 1.8rem; margin-bottom: 0.4rem;">🌱</div>
                    <div class="sub-step-num"
                        style="font-size: 0.8rem; font-weight: 800; color: #7c3aed; background: rgba(124, 58, 237, 0.1); padding: 0.2rem 0.6rem; border-radius: 8px; display: inline-block; margin-bottom: 0.5rem; font-family: monospace;">
                        07</div>
                    <div style="font-size: 0.88rem; font-weight: 700; color: #0f172a; line-height: 1.3;">Follow-up
                        &<br>Support</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('includes/footer'); ?>