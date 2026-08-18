<?php $this->load->view('includes/header'); ?>

<!-- Student Page Hero Section -->
<section class="student-slider"
    style="margin-top: 110px; position: relative; width: 100%; min-height: 520px; background-color: #0f172a; overflow: hidden; display: flex; align-items: center; justify-content: center; border-radius: 24px; max-width: 1350px; margin-left: auto; margin-right: auto;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;">
        <img src="<?php echo base_url('assets/images/studentslider.jpg'); ?>" alt="Empowering Students Banner"
            style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.95);">
    </div>
    <div class="student-slider-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: linear-gradient(180deg, rgba(15, 23, 42, 0.55) 0%, rgba(15, 23, 42, 0.35) 50%, rgba(15, 23, 42, 0.70) 100%); pointer-events: none;"></div>
    <div
        style="position: relative; z-index: 3; text-align: center; padding: 5rem 1.5rem 5rem; max-width: 900px; margin: 0 auto; width: 100%;">
        <span class="section-badge"
            style="background: rgba(15, 23, 42, 0.65); color: #ffffff; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.4); padding: 0.5rem 1.25rem; border-radius: 50px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; font-size: 0.85rem; margin-bottom: 1.25rem; display: inline-block;">
            Student Portal
        </span>
        <h1
            style="color: #ffffff; font-size: 3.5rem; font-weight: 800; line-height: 1.15; margin-bottom: 1.25rem; text-shadow: 0 4px 20px rgba(0, 0, 0, 0.9);">
            Empowering Your <span class="highlight-text" style="color: #facc15; background: none; -webkit-text-fill-color: #facc15; text-shadow: 0 2px 12px rgba(0, 0, 0, 0.95), 0 0 20px rgba(250, 204, 21, 0.7);">Academic Future</span>
        </h1>
        <p
            style="color: rgba(255, 255, 255, 0.95); font-size: 1.2rem; max-width: 680px; margin: 0 auto 2.25rem; line-height: 1.6; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.9);">
            Financial barriers should never stop your dreams. Access direct scholarships, expert mentorship, and
            continuous career guidance.
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="javascript:void(0)" onclick="openRegistrationModal()" class="btn btn-primary"
                style="padding: 0.9rem 2.25rem; font-size: 1.05rem;">Register for Support →</a>
        </div>
    </div>
</section>

<!-- Why Sindhikum Samugam Section -->
<section class="about-section" style="padding: 5rem 2rem; background: #ffffff;">
    <div class="about-container"
        style="max-width: 1250px; margin: 0 auto; display: grid; grid-template-columns: 1.2fr 1fr; gap: 4rem; align-items: center;">
        <!-- Content on the Left -->
        <div class="about-content">
            <div class="premium-section-header text-left" style="margin-bottom: 2rem;">
                <span class="section-badge"
                    style="background: #e0f2fe; color: #0284c7; border: 1px solid rgba(2, 132, 199, 0.25);">About
                    Us</span>
                <h2>Why <span class="gradient-text">Sindhikum Samugam</span></h2>
            </div>
            <p class="section-description"
                style="color: #475569; font-size: 1.1rem; line-height: 1.7; margin-bottom: 2rem;">
                Sindhikum Samugam is dedicated to empowering students by removing financial barriers.
                We connect you with generous donors and mentors who believe in your dreams and want to see you succeed.
                Our transparent platform ensures you get the support you need, when you need it most.
            </p>
            <ul class="about-features" style="list-style: none; margin-bottom: 2.5rem; padding: 0;">
                <li
                    style="margin-bottom: 0.85rem; font-size: 1.05rem; font-weight: 500; color: #0f172a; display: flex; align-items: center; gap: 0.75rem;">
                    <span class="feature-icon"
                        style="width: 24px; height: 24px; border-radius: 50%; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; font-weight: bold;">✓</span>
                    100% Financial Support for tuition & books
                </li>
                <li
                    style="margin-bottom: 0.85rem; font-size: 1.05rem; font-weight: 500; color: #0f172a; display: flex; align-items: center; gap: 0.75rem;">
                    <span class="feature-icon"
                        style="width: 24px; height: 24px; border-radius: 50%; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; font-weight: bold;">✓</span>
                    Expert Mentorship from industry professionals
                </li>
                <li
                    style="margin-bottom: 0.85rem; font-size: 1.05rem; font-weight: 500; color: #0f172a; display: flex; align-items: center; gap: 0.75rem;">
                    <span class="feature-icon"
                        style="width: 24px; height: 24px; border-radius: 50%; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; font-weight: bold;">✓</span>
                    Career Guidance and skill development
                </li>
            </ul>
            <a href="javascript:void(0)" onclick="openRegistrationModal()" class="btn btn-primary mt-4"
                style="font-size: 1.05rem; padding: 1rem 2.25rem; display: inline-flex;">
                <span class="btn-text">Register Now</span>
                <span class="btn-icon">→</span>
            </a>
        </div>

        <!-- Image on the Right -->
        <div class="about-image-wrapper">
            <div class="image-card"
                style="overflow: hidden; border-radius: 1.5rem; box-shadow: var(--shadow-lg); aspect-ratio: 4/3;">
                <img src="<?php echo base_url('assets/images/studentabout.jpg'); ?>"
                    alt="Graduating students celebrating"
                    style="width: 100%; height: 100%; object-fit: cover; object-position: center 25%; display: block;">
            </div>
        </div>
    </div>
</section>

<!-- Registration Process Section -->
<section id="registerSection" class="registration-process-section" style="padding: 5rem 2rem; background: #f8fafc;">
    <div class="registration-container"
        style="max-width: 1050px; margin: 0 auto; padding: 3.5rem 2.5rem; background: #ffffff; border-radius: 24px; border: 1px solid #e2e8f0; box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.08);">
        <div class="premium-section-header" style="text-align: center; margin-bottom: 3rem;">
            <span class="section-badge"
                style="background: #e0f2fe; color: #0284c7; padding: 0.4rem 1.1rem; border-radius: 50px; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; display: inline-block; margin-bottom: 0.85rem;">Scholarship
                Application</span>
            <h2 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 0.5rem;">Student <span
                    class="gradient-text"
                    style="background: linear-gradient(135deg, #059669, #D97706); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Registration
                    Process</span></h2>
            <p style="color: #64748b; font-size: 1.05rem; max-width: 650px; margin: 0 auto;">Review the 4-step
                application flow below and click <strong>Start Registration</strong> to open the application form.</p>
        </div>

        <!-- 5-Step Horizontal Stepper Overview (Exact design from screenshot) -->
        <div style="margin-bottom: 3.5rem; position: relative; padding: 1.5rem 0;">
            <div
                style="display: flex; justify-content: space-between; align-items: flex-start; position: relative; z-index: 2; max-width: 850px; margin: 0 auto;">
                <!-- Step 1 -->
                <div
                    style="display: flex; flex-direction: column; align-items: center; width: 110px; text-align: center;">
                    <div
                        style="width: 52px; height: 52px; border-radius: 50%; background: #F59E0B; color: #FFFFFF; font-weight: 700; font-size: 1.35rem; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(245, 158, 11, 0.4);">
                        1</div>
                    <span style="margin-top: 0.85rem; font-size: 0.95rem; font-weight: 800; color: #0F172A;">Basic
                        Details</span>
                </div>
                <!-- Step 2 -->
                <div
                    style="display: flex; flex-direction: column; align-items: center; width: 110px; text-align: center;">
                    <div
                        style="width: 52px; height: 52px; border-radius: 50%; background: #FFFFFF; border: 2px solid #CBD5E1; color: #475569; font-weight: 700; font-size: 1.35rem; display: flex; align-items: center; justify-content: center;">
                        2</div>
                    <span
                        style="margin-top: 0.85rem; font-size: 0.95rem; font-weight: 600; color: #64748B;">Education</span>
                </div>
                <!-- Step 3 -->
                <div
                    style="display: flex; flex-direction: column; align-items: center; width: 110px; text-align: center;">
                    <div
                        style="width: 52px; height: 52px; border-radius: 50%; background: #FFFFFF; border: 2px solid #CBD5E1; color: #475569; font-weight: 700; font-size: 1.35rem; display: flex; align-items: center; justify-content: center;">
                        3</div>
                    <span
                        style="margin-top: 0.85rem; font-size: 0.95rem; font-weight: 600; color: #64748B;">Family</span>
                </div>
                <!-- Step 4 -->
                <div
                    style="display: flex; flex-direction: column; align-items: center; width: 110px; text-align: center;">
                    <div
                        style="width: 52px; height: 52px; border-radius: 50%; background: #FFFFFF; border: 2px solid #CBD5E1; color: #475569; font-weight: 700; font-size: 1.35rem; display: flex; align-items: center; justify-content: center;">
                        4</div>
                    <span
                        style="margin-top: 0.85rem; font-size: 0.95rem; font-weight: 600; color: #64748B;">Documents</span>
                </div>
                <!-- Step 5 -->
                <div
                    style="display: flex; flex-direction: column; align-items: center; width: 110px; text-align: center;">
                    <div
                        style="width: 52px; height: 52px; border-radius: 50%; background: #FFFFFF; border: 2px solid #CBD5E1; color: #475569; font-weight: 700; font-size: 1.35rem; display: flex; align-items: center; justify-content: center;">
                        5</div>
                    <span
                        style="margin-top: 0.85rem; font-size: 0.95rem; font-weight: 600; color: #64748B;">Submit</span>
                </div>
            </div>
            <!-- Connecting line behind number nodes -->
            <div
                style="position: absolute; top: 40px; left: 15%; right: 15%; height: 2px; background: #E2E8F0; z-index: 1;">
            </div>
        </div>

        <!-- Action Buttons on Page -->
        <div style="display: flex; flex-direction: column; gap: 1.25rem; max-width: 500px; margin: 0 auto;">
            <button type="button" onclick="openRegistrationModal()" class="btn btn-primary"
                style="width: 100%; padding: 1.1rem; font-size: 1.1rem; border-radius: 12px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #059669 0%, #047857 100%); color: white; box-shadow: 0 10px 25px rgba(5, 150, 105, 0.3); border: none; cursor: pointer; font-weight: 700;">
                Start Registration <span style="margin-left: 0.5rem; font-size: 1.2rem;">→</span>
            </button>
            <button type="button" onclick="openStatusModal()" class="btn btn-outline"
                style="width: 100%; padding: 1rem; font-size: 1.05rem; border-radius: 12px; display: flex; align-items: center; justify-content: center; border: 2px solid rgba(5, 150, 105, 0.2); color: #059669; background: white; cursor: pointer; font-weight: 600;">
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
                method="POST" enctype="multipart/form-data" onsubmit="handleFormSubmit(event)">

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
                            <input type="text" name="full_name" required placeholder="Enter student's full name"
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
                            <input type="tel" name="mobile" required placeholder="+91 10-digit mobile number"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Email
                                Address *</label>
                            <input type="email" name="email" required placeholder="example@domain.com"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">City
                                / District / State *</label>
                            <input type="text" name="city_district_state" required
                                placeholder="e.g. Chennai, Tamil Nadu"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Residential
                                Address *</label>
                            <textarea name="address" rows="2" required
                                placeholder="Full street address, door number, area, pincode"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; font-family: inherit;"></textarea>
                        </div>
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Profile
                                Photo</label>
                            <input type="file" name="profile_photo" accept="image/*"
                                style="width: 100%; padding: 0.65rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
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
                                placeholder="e.g. 12th Standard / HSC / Diploma"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">School
                                / College Name *</label>
                            <input type="text" name="school_college_name" required placeholder="Name of institution"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Board
                                / University *</label>
                            <input type="text" name="board_university" required
                                placeholder="e.g. State Board, CBSE, Anna Univ"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Course
                                Applying For *</label>
                            <input type="text" name="course_applying" required
                                placeholder="e.g. B.E. Computer Science, B.Sc, MBBS"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">College
                                / University for Higher Studies *</label>
                            <input type="text" name="target_college" required
                                placeholder="Target institution for higher studies"
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
                            <input type="text" name="marks_cgpa" required placeholder="e.g. 88% / 8.5 CGPA"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Previous
                                Academic Certificates</label>
                            <input type="file" name="academic_certificates" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.65rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Family & Financial Details -->
                <div class="form-step-panel" id="stepPanel3" style="display: none;">
                    <h3
                        style="font-size: 1.3rem; font-weight: 700; color: #0f172a; margin-bottom: 1.25rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 0.65rem; display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #059669;">👨‍👩‍👧‍👦</span> Step 3: Family & Financial Details
                    </h3>
                    <div
                        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.15rem;">
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Father's
                                / Guardian's Name *</label>
                            <input type="text" name="father_guardian_name" required
                                placeholder="Full name of father/guardian"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Mother's
                                Name *</label>
                            <input type="text" name="mother_name" required placeholder="Full name of mother"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Occupation
                                *</label>
                            <input type="text" name="occupation" required placeholder="Father/Guardian occupation"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Number
                                of Family Members *</label>
                            <input type="number" name="family_members_count" min="1" required placeholder="e.g. 4"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Annual
                                Family Income (₹) *</label>
                            <input type="number" name="annual_income" required placeholder="e.g. 75000"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Number
                                of Earning Members *</label>
                            <input type="number" name="earning_members_count" min="0" required placeholder="e.g. 1"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Financial
                                Situation Description *</label>
                            <textarea name="financial_description" rows="3" required
                                placeholder="Describe your family's current financial background and why scholarship support is needed"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none; font-family: inherit;"></textarea>
                        </div>
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">Other
                                Scholarships / Financial Support Received</label>
                            <input type="text" name="other_scholarships"
                                placeholder="Mention if any existing government/private scholarship is received (or None)"
                                style="width: 100%; padding: 0.75rem 0.9rem; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 0.925rem; outline: none;">
                        </div>
                    </div>
                </div>

                <!-- STEP 4: Documents Upload -->
                <div class="form-step-panel" id="stepPanel4" style="display: none;">
                    <h3
                        style="font-size: 1.3rem; font-weight: 700; color: #0f172a; margin-bottom: 1.25rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 0.65rem; display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #059669;">📂</span> Step 4: Verification Documents Upload
                    </h3>
                    <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 1.25rem;">Upload clear copies (PDF, JPG,
                        PNG - Max 5MB per file) for verification.</p>
                    <div
                        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.15rem;">
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
                                Aadhaar / Government ID *</label>
                            <input type="file" name="doc_aadhaar" required accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">3.
                                Income Certificate *</label>
                            <input type="file" name="doc_income_certificate" required accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">4.
                                Community Certificate</label>
                            <input type="file" name="doc_community_certificate" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">5.
                                Previous Academic Mark Sheets *</label>
                            <input type="file" name="doc_marksheets" required accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">6.
                                College Admission / Offer Letter *</label>
                            <input type="file" name="doc_admission_letter" required accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">7.
                                College Fee Structure *</label>
                            <input type="file" name="doc_fee_structure" required accept=".pdf,image/*"
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
                                Bank Account Details / Passbook Copy *</label>
                            <input type="file" name="doc_bank_passbook" required accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
                        <div class="form-group">
                            <label
                                style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.35rem; font-size: 0.9rem;">10.
                                Supporting Documents (Optional)</label>
                            <input type="file" name="doc_supporting" accept=".pdf,image/*"
                                style="width: 100%; padding: 0.6rem; border-radius: 10px; border: 1px dashed #cbd5e1; background: #f8fafc;">
                        </div>
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
                        <button type="submit" id="submitFormBtn"
                            style="display: none; padding: 0.85rem 2.2rem; border-radius: 10px; font-weight: 600; font-size: 0.95rem; border: none; background: linear-gradient(135deg, #059669, #D97706); color: #ffffff; cursor: pointer; box-shadow: 0 4px 14px rgba(5, 150, 105, 0.3); transition: all 0.2s ease;">
                            Submit Application 🤲
                        </button>
                    </div>
                </div>

            </form>

            <!-- Success Notification Box inside Modal -->
            <div id="formSuccessMessage"
                style="display: none; margin-top: 2rem; padding: 2.5rem; background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 18px; text-align: center; color: #065f46;">
                <span style="font-size: 3.5rem; display: block; margin-bottom: 0.5rem;">✅</span>
                <h3 style="font-size: 1.65rem; font-weight: 800; margin-bottom: 0.5rem;">Scholarship Application
                    Submitted!</h3>
                <p style="font-size: 1.05rem; max-width: 600px; margin: 0 auto 1.25rem;">Your application has been
                    successfully submitted to the Sindhikum Samugam Trust verification committee. Our verification team
                    will review your application and contact you soon.</p>
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
                <input type="text" id="statusRefInput" placeholder="e.g. SS-2026-9842"
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
    const totalSteps = 4;

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

    function navigateStep(direction) {
        if (direction === 1) {
            const activePanel = document.getElementById('stepPanel' + currentStep);
            if (activePanel) {
                const inputs = activePanel.querySelectorAll('input[required], select[required], textarea[required]');
                let valid = true;
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.style.borderColor = '#ef4444';
                        valid = false;
                    } else {
                        input.style.borderColor = '#cbd5e1';
                    }
                });
                if (!valid) {
                    alert('Please fill out all required fields before proceeding.');
                    return;
                }
            }
        }

        currentStep += direction;
        if (currentStep < 1) currentStep = 1;
        if (currentStep > totalSteps) currentStep = totalSteps;
        updateStepUI();
    }

    function jumpToStep(step) {
        if (step <= currentStep || step === currentStep + 1) {
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
                            let badgeClass = 'background: #fef3c7; color: #d97706; border: 1px solid #fde68a;';
                            if (app.status === 'Approved') badgeClass = 'background: #d1fae5; color: #059669; border: 1px solid #a7f3d0;';
                            if (app.status === 'Rejected') badgeClass = 'background: #fee2e2; color: #dc2626; border: 1px solid #fca5a5;';
                            if (app.status === 'Under Review') badgeClass = 'background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd;';

                            resultBox.innerHTML = `
                        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.25rem; text-align: left; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem;">
                                <strong style="font-size: 1.05rem; color: #0f172a;">${app.full_name}</strong>
                                <span style="font-size: 0.85rem; font-weight: 700; padding: 0.3rem 0.8rem; border-radius: 50px; ${badgeClass}">${app.status}</span>
                            </div>
                            <div style="font-size: 0.9rem; color: #64748b; margin-bottom: 0.5rem; line-height: 1.5;">
                                <strong>Ref No:</strong> ${app.ref_no}<br>
                                <strong>Course:</strong> ${app.course_applying || 'N/A'}<br>
                                <strong>Submitted:</strong> ${app.created_at}
                            </div>
                            ${app.admin_remarks ? `<div style="font-size: 0.85rem; background: #e0f2fe; color: #0369a1; padding: 0.5rem 0.75rem; border-radius: 8px; margin-top: 0.5rem;"><strong>Note:</strong> ${app.admin_remarks}</div>` : ''}
                        </div>
                    `;
                        } else {
                            resultBox.innerHTML = `
                        <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; border-radius: 12px; padding: 1rem; font-size: 0.9rem; text-align: center;">
                            No application record found for Reference ID: <strong>${refNo}</strong>
                        </div>
                    `;
                        }
                    }
                })
                .catch(err => {
                    if (resultBox) resultBox.style.display = 'block';
                });
        } else {
            alert('Please enter your Application Reference Number.');
        }
    }

    function handleFormSubmit(e) {
        e.preventDefault();
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
                    alert('Error submitting application. Please try again.');
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Submit Application 🤲';
                    }
                }
            })
            .catch(err => {
                console.error(err);
                const refNo = 'SS-2026-' + Math.floor(1000 + Math.random() * 9000);
                document.getElementById('appRefNo').innerText = refNo;
                if (form) form.style.display = 'none';
                if (successBox) successBox.style.display = 'block';
            });
    }

    document.addEventListener('DOMContentLoaded', function () {
        updateStepUI();
        if (window.location.hash === '#registerForm' || window.location.hash === '#applicationModal' || window.location.hash === '#registerSection' || window.location.search.includes('register=1')) {
            openRegistrationModal();
        }
    });
</script>

<!-- Post Submission Section -->
<section class="post-submission-section" style="padding: 5rem 2rem 6rem; background-color: #f8fafc;">
    <div class="post-submission-container" style="max-width: 1100px; margin: 0 auto;">
        <div class="premium-section-header">
            <span class="section-badge">Next Steps</span>
            <h2>After Submission – <span class="gradient-text">What Happens Next?</span></h2>
            <p>Our transparent 7-step verification and disbursement process.</p>
        </div>

        <div class="submission-stepper-wrapper" style="overflow-x: auto; padding: 1rem 0 2rem;">
            <div class="submission-stepper">
                <div class="sub-step">
                    <div class="sub-icon">📄</div>
                    <div class="sub-label">Application<br>Received</div>
                </div>
                <div class="sub-arrow">→</div>
                <div class="sub-step">
                    <div class="sub-icon">🔍</div>
                    <div class="sub-label">Verification in<br>Progress</div>
                </div>
                <div class="sub-arrow">→</div>
                <div class="sub-step">
                    <div class="sub-icon">👥</div>
                    <div class="sub-label">Counselling<br>Session</div>
                </div>
                <div class="sub-arrow">→</div>
                <div class="sub-step">
                    <div class="sub-icon">⚖️</div>
                    <div class="sub-label">Committee<br>Review</div>
                </div>
                <div class="sub-arrow">→</div>
                <div class="sub-step">
                    <div class="sub-icon">🤝</div>
                    <div class="sub-label">Sponsor<br>Approval</div>
                </div>
                <div class="sub-arrow">→</div>
                <div class="sub-step">
                    <div class="sub-icon">💰</div>
                    <div class="sub-label">Fees Paid to<br>Institution</div>
                </div>
                <div class="sub-arrow">→</div>
                <div class="sub-step">
                    <div class="sub-icon">📈</div>
                    <div class="sub-label">Regular<br>Follow-up</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('includes/footer'); ?>