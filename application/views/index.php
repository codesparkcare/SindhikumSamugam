<?php $this->load->view('includes/header'); ?>

<!-- Hero Section with Background Image Slider -->
<main class="hero-section" style="position: relative; overflow: hidden; background-color: #0f172a;">
    <!-- Home Background Slider Images -->
    <div class="home-slider-bg">
        <img src="<?php echo base_url('assets/images/homeslider1.jpg'); ?>" class="home-bg-slide active"
            alt="Empowering Students 1">
        <img src="<?php echo base_url('assets/images/homeslider2.jpg'); ?>" class="home-bg-slide"
            alt="Empowering Students 2">
        <div class="home-slider-overlay"></div>

        <!-- Slider Navigation Arrows -->
        <button type="button" class="slider-arrow prev-arrow" onclick="prevHomeSlide()" aria-label="Previous Slide">‹</button>
        <button type="button" class="slider-arrow next-arrow" onclick="nextHomeSlide()" aria-label="Next Slide">›</button>

        <!-- Home Slider Dot Indicators (Mobile Overlay) -->
        <div class="home-slider-dots mobile-dots" style="gap: 10px; align-items: center;">
            <button type="button" onclick="setHomeSlide(0)" class="home-slider-dot active" aria-label="Slide 1"
                style="width: 28px; height: 10px; border-radius: 12px; border: none; background: #ffffff; cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
            <button type="button" onclick="setHomeSlide(1)" class="home-slider-dot" aria-label="Slide 2"
                style="width: 10px; height: 10px; border-radius: 50%; border: none; background: rgba(255, 255, 255, 0.4); cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
        </div>
    </div>

    <div class="hero-container" style="position: relative; z-index: 2;">
        <!-- Left Side: Text and Buttons -->
        <div class="hero-text-content">
            <span class="badge"
                style="background: rgba(255, 255, 255, 0.15); color: #ffffff; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3);">Transforming
                Lives Through Education</span>
            <h1 style="color: #ffffff; text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);">Empower the <br>Next Generation<br>
                of
                <span class="highlight"
                    style="color: #facc15 !important; -webkit-text-fill-color: #facc15 !important; background: none !important; font-weight: 800; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.95), 0 0 20px rgba(250, 204, 21, 0.65);">Leaders</span>
            </h1>
            <p style="color: rgba(255, 255, 255, 0.9); text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">Your contribution
                can change a student's life forever. Join us in making education accessible to
                everyone with a premium and transparent platform.</p>
            <div class="hero-buttons" style="margin-bottom: 1.5rem;">
                <a href="<?php echo base_url('students#registerForm'); ?>" class="btn btn-outline"
                    style="color: white; border-color: rgba(255, 255, 255, 0.5);">Register as a Student</a>
                <a href="<?php echo base_url('donors#donorForm'); ?>" class="btn btn-primary">
                    <span class="btn-text">Donate Now</span>
                    <span class="btn-icon">🤲</span>
                </a>
            </div>

            <!-- Home Slider Dot Indicators (Desktop) -->
            <div class="home-slider-dots desktop-dots" style="display: flex; gap: 10px; align-items: center;">
                <button type="button" onclick="setHomeSlide(0)" class="home-slider-dot active" aria-label="Slide 1"
                    style="width: 28px; height: 10px; border-radius: 12px; border: none; background: #ffffff; cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
                <button type="button" onclick="setHomeSlide(1)" class="home-slider-dot" aria-label="Slide 2"
                    style="width: 10px; height: 10px; border-radius: 50%; border: none; background: rgba(255, 255, 255, 0.4); cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
            </div>
        </div>

        <!-- Right Side: Stat Card -->
        <div class="hero-image-content">
            <div class="stat-card"
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.4); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);">
                <div class="stat-group">
                    <span class="stat-label">Currently Waiting</span>
                    <div class="stat-value-container">
                        <span
                            class="stat-value"><?php echo isset($stats['pending']) ? number_format($stats['pending']) : '0'; ?></span>
                        <span class="stat-unit">Students</span>
                    </div>
                </div>

                <hr class="stat-divider">

                <div class="stat-group">
                    <span class="stat-label">Need This Month</span>
                    <div class="stat-value-container">
                        <span
                            class="stat-value text-primary">₹<?php echo isset($stats['need_this_month']) ? number_format($stats['need_this_month']) : '0'; ?></span>
                    </div>
                </div>

                <hr class="stat-divider">

                <div class="stat-footer">
                    <p>You can be the reason for someone's future</p>
                    <a href="<?php echo base_url('students'); ?>" class="btn btn-dark w-100 justify-center">Support
                        Now</a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentHomeSlide = 0;
        const homeSlides = document.querySelectorAll('.home-bg-slide');
        const homeDots = document.querySelectorAll('.home-slider-dot');
        let autoSlideTimer = null;

        window.setHomeSlide = function (index) {
            if (!homeSlides.length) return;
            if (index < 0) index = homeSlides.length - 1;
            if (index >= homeSlides.length) index = 0;

            homeSlides.forEach((slide, idx) => {
                if (idx === index) {
                    slide.classList.add('active');
                    slide.style.opacity = '1';
                } else {
                    slide.classList.remove('active');
                    slide.style.opacity = '0';
                }
            });

            homeDots.forEach((dot, idx) => {
                const isCurrentSlide = (idx % homeSlides.length) === index;
                if (isCurrentSlide) {
                    dot.classList.add('active');
                    dot.style.background = '#ffffff';
                    dot.style.width = '28px';
                    dot.style.borderRadius = '12px';
                } else {
                    dot.classList.remove('active');
                    dot.style.background = 'rgba(255, 255, 255, 0.4)';
                    dot.style.width = '10px';
                    dot.style.borderRadius = '50%';
                }
            });
            currentHomeSlide = index;
        };

        window.nextHomeSlide = function () {
            setHomeSlide(currentHomeSlide + 1);
            restartAutoSlide();
        };

        window.prevHomeSlide = function () {
            setHomeSlide(currentHomeSlide - 1);
            restartAutoSlide();
        };

        function startAutoSlide() {
            if (autoSlideTimer) clearInterval(autoSlideTimer);
            autoSlideTimer = setInterval(function () {
                if (homeSlides.length > 0) {
                    setHomeSlide((currentHomeSlide + 1) % homeSlides.length);
                }
            }, 5000);
        }

        function restartAutoSlide() {
            startAutoSlide();
        }

        startAutoSlide();

        // Touch Swipe Support
        const heroElement = document.querySelector('.hero-section');
        if (heroElement) {
            let touchStartX = 0;
            let touchEndX = 0;

            heroElement.addEventListener('touchstart', function (e) {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            heroElement.addEventListener('touchend', function (e) {
                touchEndX = e.changedTouches[0].screenX;
                const threshold = 40;
                if (touchEndX < touchStartX - threshold) {
                    nextHomeSlide();
                } else if (touchEndX > touchStartX + threshold) {
                    prevHomeSlide();
                }
            }, { passive: true });
        }
    });
</script>

<!-- Trust & Transparency Pillars Banner -->
<div class="stats-banner">
    <div class="stats-banner-container">
        <div class="banner-stat-item">
            <div class="banner-icon">🎓</div>
            <div class="banner-text">
                <span class="banner-number">100% Direct</span>
                <span class="banner-label">College Fee Transfer</span>
            </div>
        </div>

        <div class="banner-divider"></div>

        <div class="banner-stat-item">
            <div class="banner-icon">🔍</div>
            <div class="banner-text">
                <span class="banner-number">Verified</span>
                <span class="banner-label">Document Audits</span>
            </div>
        </div>

        <div class="banner-divider"></div>

        <div class="banner-stat-item">
            <div class="banner-icon">💡</div>
            <div class="banner-text">
                <span class="banner-number">0% Admin Cut</span>
                <span class="banner-label">Direct Impact</span>
            </div>
        </div>

        <div class="banner-divider"></div>

        <div class="banner-stat-item">
            <div class="banner-icon">📜</div>
            <div class="banner-text">
                <span class="banner-number">Registered</span>
                <span class="banner-label">Non-Profit Trust</span>
            </div>
        </div>

        <div class="banner-divider"></div>

        <div class="banner-stat-item">
            <div class="banner-icon">🤝</div>
            <div class="banner-text">
                <span class="banner-number">Open Support</span>
                <span class="banner-label">Academic Year 2026-27</span>
            </div>
        </div>
    </div>
</div>

<!-- Why We Exist Section -->
<section class="about-section">
    <div class="premium-section-header">
        <span class="section-badge">Our Mission</span>
        <h2>Why We <span class="gradient-text">Exist</span></h2>
    </div>
    <div class="about-container">
        <div class="about-content">
            <p class="section-description">
                Millions of bright minds are forced to abandon their education due to financial constraints. We
                believe that money should never be a barrier to learning. Our platform connects passionate students
                with generous donors, ensuring that potential is never wasted and dreams are fully realized.
            </p>
            <ul class="about-features">
                <li><span class="feature-icon">✓</span> 100% Transparency in all donations</li>
                <li><span class="feature-icon">✓</span> Direct impact on a student's life</li>
                <li><span class="feature-icon">✓</span> Verified student profiles and needs</li>
            </ul>
            <a href="#" class="btn btn-primary mt-4">
                <span class="btn-text">Learn More</span>
                <span class="btn-icon">→</span>
            </a>
        </div>

        <div class="about-image-wrapper"
            style="display: flex; justify-content: center; align-items: center; padding: 1rem;">
            <img src="<?php echo base_url('assets/images/whyweexisit.png'); ?>" alt="Sindhikum Samugam Logo"
                style="width: 100%; max-width: 400px; height: auto; object-fit: contain; display: block; filter: drop-shadow(0 15px 35px rgba(0, 0, 0, 0.2)); border-radius: 50%;">
        </div>
    </div>
</section>

<!-- Know Our Vision Section -->
<section class="vision-section"
    style="padding: 5rem 2rem; background: linear-gradient(180deg, #ffffff 0%, #f0f9ff 100%); position: relative;">
    <div class="premium-section-header">
        <span class="section-badge"
            style="background: #e0f2fe; color: #0284c7; border: 1px solid rgba(2, 132, 199, 0.25);">Future Goals</span>
        <h2>Know Our <span class="gradient-text">Vision</span></h2>
        <p style="color: #64748b; max-width: 600px; margin: 0.5rem auto 0; font-size: 1.05rem;">
            Paving the path toward an inclusive world where every deserving student has the power to shape their own
            future through education.
        </p>
    </div>

    <div class="about-container about-container-reverse">
        <!-- Left Side Image -->
        <div class="about-image-wrapper">
            <div class="image-card"
                style="overflow: hidden; border-radius: 1.5rem; box-shadow: var(--shadow-lg); aspect-ratio: 1/1;">
                <img src="<?php echo base_url('assets/images/knowourvision.jpg'); ?>"
                    alt="Students walking towards campus"
                    style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block;">
            </div>
        </div>

        <!-- Right Side Vision Pillars -->
        <div class="vision-content">
            <div class="vision-pillars" style="display: flex; flex-direction: column; gap: 1.5rem;">
                <div class="vision-pillar-card"
                    style="background: #ffffff; padding: 1.5rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -5px rgba(15, 23, 42, 0.05); display: flex; gap: 1.25rem; align-items: flex-start; transition: transform 0.3s ease;">
                    <div
                        style="width: 50px; height: 50px; border-radius: 12px; background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0; font-size: 1.25rem;">
                        01
                    </div>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.15rem; margin-bottom: 0.35rem;">Equal
                            Educational Opportunity</h4>
                        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                            Bridging the economic divide by empowering underprivileged students from every corner with
                            equal access to higher education and skill training.
                        </p>
                    </div>
                </div>

                <div class="vision-pillar-card"
                    style="background: #ffffff; padding: 1.5rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -5px rgba(15, 23, 42, 0.05); display: flex; gap: 1.25rem; align-items: flex-start; transition: transform 0.3s ease;">
                    <div
                        style="width: 50px; height: 50px; border-radius: 12px; background: linear-gradient(135deg, var(--secondary), #0284c7); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0; font-size: 1.25rem;">
                        02
                    </div>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.15rem; margin-bottom: 0.35rem;">Global
                            Donor Movement</h4>
                        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                            Building a global network of empathetic donors, mentors, and institutions committed to
                            long-term social impact and student mentorship.
                        </p>
                    </div>
                </div>

                <div class="vision-pillar-card"
                    style="background: #ffffff; padding: 1.5rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -5px rgba(15, 23, 42, 0.05); display: flex; gap: 1.25rem; align-items: flex-start; transition: transform 0.3s ease;">
                    <div
                        style="width: 50px; height: 50px; border-radius: 12px; background: linear-gradient(135deg, #0f172a, #334155); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0; font-size: 1.25rem;">
                        03
                    </div>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.15rem; margin-bottom: 0.35rem;">
                            Transparent & Direct Philanthropy</h4>
                        <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                            Ensuring 100% of contributions directly reach verified student tuition, academic fees, and
                            essential living support with full accountability.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sponsors Videos Section -->
<section class="video-requests-section" style="background-color: transparent; padding-top: 5rem;">
    <div class="premium-section-header">
        <span class="section-badge">Our Sponsors</span>
        <h2>Sponsors <span class="gradient-text">Videos</span></h2>
        <p>Hear directly from our generous sponsors.</p>
    </div>

    <div class="video-carousel-container">
        <button class="carousel-btn prev-btn">‹</button>

        <div class="video-track-wrapper">
            <div class="video-track">
                <!-- Sponsor Video Card 1 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <div class="play-btn-overlay">
                            <div class="play-icon">▶</div>
                        </div>
                    </div>
                </div>
                <!-- Sponsor Video Card 2 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <div class="play-btn-overlay">
                            <div class="play-icon">▶</div>
                        </div>
                    </div>
                </div>
                <!-- Sponsor Video Card 3 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <div class="play-btn-overlay">
                            <div class="play-icon">▶</div>
                        </div>
                    </div>
                </div>
                <!-- Sponsor Video Card 4 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <div class="play-btn-overlay">
                            <div class="play-icon">▶</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-btn next-btn">›</button>
    </div>
</section>

<!-- Who We Help Section -->
<section class="about-section" style="background-color: transparent;">
    <div class="premium-section-header">
        <span class="section-badge">Our Impact</span>
        <h2>Who We <span class="gradient-text">Help</span></h2>
    </div>
    <div class="about-container about-container-reverse">
        <!-- Image on the Left -->
        <div class="about-image-wrapper">
            <div class="image-card" style="overflow: hidden; border-radius: 1.5rem; box-shadow: var(--shadow-lg);">
                <img src="<?php echo base_url('assets/images/whowehelp.png'); ?>" alt="Student studying in class"
                    style="width: 100%; height: 100%; object-fit: cover; display: block;">
            </div>
        </div>

        <!-- Content on the Right -->
        <div class="about-content">
            <p class="section-description">
                We focus on empowering students from marginalized communities who have the drive to succeed but lack
                the financial backing. Whether it's covering tuition fees, providing learning materials, or offering
                mentorship, our support system is designed to give every deserving student a fair chance.
            </p>
            <ul class="about-features">
                <li><span class="feature-icon">✓</span> High school & College students in need</li>
                <li><span class="feature-icon">✓</span> Underprivileged youths with high potential</li>
                <li><span class="feature-icon">✓</span> Students facing sudden financial hardships</li>
            </ul>
            <a href="#" class="btn btn-outline mt-4" style="border: 2px solid var(--primary); color: var(--primary);">
                <span class="btn-text">View Student Profiles</span>
                <span class="btn-icon">→</span>
            </a>
        </div>
    </div>
</section>

<!-- Dual Banner Section -->
<section class="dual-banner-section">
    <div class="dual-banner-container">
        <!-- Banner 1: Become a Donor -->
        <div class="promo-banner banner-primary"
            style="background-image: linear-gradient(90deg, rgba(15, 23, 42, 0.92) 0%, rgba(15, 23, 42, 0.75) 45%, rgba(15, 23, 42, 0.15) 100%), url('<?php echo base_url('assets/images/banner_donor.jpg'); ?>'); background-size: cover; background-position: center right;">
            <div class="promo-content">
                <span class="promo-badge">For Donors</span>
                <h3>Become a Donor</h3>
                <p>Your regular contributions can fund a deserving student's entire degree and change their future.</p>
                <a href="<?php echo base_url('donors#donorForm'); ?>" class="btn btn-primary">
                    <span class="btn-text">Start Donating</span>
                    <span class="btn-icon">→</span>
                </a>
            </div>
        </div>

        <!-- Banner 2: Register as a Student -->
        <div class="promo-banner banner-secondary"
            style="background-image: linear-gradient(90deg, rgba(4, 78, 57, 0.92) 0%, rgba(4, 120, 87, 0.75) 45%, rgba(4, 120, 87, 0.15) 100%), url('<?php echo base_url('assets/images/banner_student.jpg'); ?>'); background-size: cover; background-position: center;">
            <div class="promo-content">
                <span class="promo-badge promo-badge-student">For Students</span>
                <h3>Register as a Student</h3>
                <p>Are you facing financial hurdles in your education? Register today to connect with generous donors.
                </p>
                <a href="<?php echo base_url('students#registerForm'); ?>" class="btn btn-secondary"
                    style="background: #ffffff; color: #047857; font-weight: 600;">
                    <span class="btn-text">Register Student</span>
                    <span class="btn-icon">→</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Our Process Section -->
<section class="process-section">
    <div class="premium-section-header">
        <span class="section-badge">How It Works</span>
        <h2>Our <span class="gradient-text">Process</span></h2>
    </div>

    <div class="process-container">
        <div class="process-track">
            <!-- Step 1 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number">1</div>
                    <div class="step-icon">📝</div>
                </div>
                <h4 class="step-title">Apply Online</h4>
            </div>
            <div class="step-connector"></div>
            <!-- Step 2 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number">2</div>
                    <div class="step-icon">🔍</div>
                </div>
                <h4 class="step-title">Verification</h4>
            </div>
            <div class="step-connector"></div>
            <!-- Step 3 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number">3</div>
                    <div class="step-icon">💬</div>
                </div>
                <h4 class="step-title">Counselling</h4>
            </div>
            <div class="step-connector"></div>
            <!-- Step 4 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number">4</div>
                    <div class="step-icon">👥</div>
                </div>
                <h4 class="step-title">Review Committee</h4>
            </div>
            <div class="step-connector"></div>
            <!-- Step 5 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number">5</div>
                    <div class="step-icon">✅</div>
                </div>
                <h4 class="step-title">Sponsor Approval</h4>
            </div>
            <div class="step-connector"></div>
            <!-- Step 6 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number">6</div>
                    <div class="step-icon">🏛️</div>
                </div>
                <h4 class="step-title">Fees Paid</h4>
            </div>
            <div class="step-connector"></div>
            <!-- Step 7 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number">7</div>
                    <div class="step-icon">🤝</div>
                </div>
                <h4 class="step-title">Follow-up & Support</h4>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var carousels = document.querySelectorAll('.video-carousel-container');
    carousels.forEach(function(container) {
        var wrapper = container.querySelector('.video-track-wrapper');
        var prevBtn = container.querySelector('.prev-btn');
        var nextBtn = container.querySelector('.next-btn');

        if (wrapper && prevBtn && nextBtn) {
            prevBtn.addEventListener('click', function() {
                var cardWidth = wrapper.querySelector('.video-card')?.offsetWidth || 220;
                wrapper.scrollBy({ left: -(cardWidth + 20), behavior: 'smooth' });
            });
            nextBtn.addEventListener('click', function() {
                var cardWidth = wrapper.querySelector('.video-card')?.offsetWidth || 220;
                wrapper.scrollBy({ left: (cardWidth + 20), behavior: 'smooth' });
            });
        }
    });
});
</script>

<?php $this->load->view('includes/footer'); ?>