<?php $this->load->view('includes/header'); ?>

<!-- Hero Section with Background Image Slider -->
<main class="hero-section" style="position: relative; overflow: hidden; background-color: #0f172a;">
    <!-- Home Background Slider Images -->
    <div class="home-slider-bg">
        <img src="<?php echo base_url('assets/images/homeslider1.jpg'); ?>" class="home-bg-slide active"
            alt="Empowering Students 1">
        <img src="<?php echo base_url('assets/images/slide2.png'); ?>" class="home-bg-slide"
            alt="Empowering Students 2">
        <img src="<?php echo base_url('assets/images/slide3.png'); ?>" class="home-bg-slide"
            alt="Empowering Students 3">
        <div class="home-slider-overlay"></div>

        <!-- Home Slider Dot Indicators (Mobile Overlay) -->
        <div class="home-slider-dots mobile-dots" style="gap: 10px; align-items: center;">
            <button type="button" onclick="setHomeSlide(0)" class="home-slider-dot active" aria-label="Slide 1"
                style="width: 28px; height: 10px; border-radius: 12px; border: none; background: #ffffff; cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
            <button type="button" onclick="setHomeSlide(1)" class="home-slider-dot" aria-label="Slide 2"
                style="width: 10px; height: 10px; border-radius: 50%; border: none; background: rgba(255, 255, 255, 0.4); cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
            <button type="button" onclick="setHomeSlide(2)" class="home-slider-dot" aria-label="Slide 3"
                style="width: 10px; height: 10px; border-radius: 50%; border: none; background: rgba(255, 255, 255, 0.4); cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
        </div>
    </div>

    <!-- Slider Side Navigation Arrows (High Z-Index Overlay) -->
    <button type="button" class="slider-arrow prev-arrow" onclick="prevHomeSlide()" aria-label="Previous Slide"
        style="z-index: 50;">‹</button>
    <button type="button" class="slider-arrow next-arrow" onclick="nextHomeSlide()" aria-label="Next Slide"
        style="z-index: 50;">›</button>

    <div class="hero-container" style="position: relative; z-index: 2;">
        <!-- Left Side: Text and Buttons -->
        <div class="hero-text-content">
            <div class="home-text-wrapper" style="position: relative; width: 100%;">
                <!-- Slide 1 Text Content -->
                <div class="home-text-slide active" style="transition: opacity 0.5s ease;">
                    <span class="badge"
                        style="background: rgba(255, 255, 255, 0.15); color: #ffffff; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3);">Main
                        Identity</span>
                    <h1 style="color: #ffffff; text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);">
                        A Chance Can <br>
                        <span class="highlight"
                            style="color: #facc15 !important; -webkit-text-fill-color: #facc15 !important; background: none !important; font-weight: 800; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.95), 0 0 20px rgba(250, 204, 21, 0.65);">Change
                            a Life.</span>
                    </h1>
                    <p style="color: rgba(255, 255, 255, 0.9); text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                        We support students facing financial and personal challenges in pursuing higher education.
                    </p>
                    <div class="hero-buttons" style="margin-bottom: 1.5rem;">
                        <a href="<?php echo base_url('students#registerForm'); ?>" class="btn btn-outline"
                            style="color: white; border-color: rgba(255, 255, 255, 0.5);">Get Educational Support</a>
                        <a href="<?php echo base_url('donors#donorForm'); ?>" class="btn btn-primary">
                            <span class="btn-text">Support Our Mission</span>
                            <span class="btn-icon">🤲</span>
                        </a>
                    </div>
                </div>

                <!-- Slide 2 Text Content -->
                <div class="home-text-slide" style="display: none; opacity: 0; transition: opacity 0.5s ease;">
                    <span class="badge"
                        style="background: rgba(255, 255, 255, 0.15); color: #ffffff; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3);">Guidance</span>
                    <h1 style="color: #ffffff; text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);">
                        The Right Guidance <br>Can Change the <br>
                        <span class="highlight"
                            style="color: #facc15 !important; -webkit-text-fill-color: #facc15 !important; background: none !important; font-weight: 800; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.95), 0 0 20px rgba(250, 204, 21, 0.65);">Direction
                            of a Life.</span>
                    </h1>
                    <p style="color: rgba(255, 255, 255, 0.9); text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                        Helping students make the right choices for their education, career and future.
                    </p>
                    <div class="hero-buttons" style="margin-bottom: 1.5rem;">
                        <a href="<?php echo base_url('#who-we-help'); ?>" class="btn btn-primary">
                            <span class="btn-text">Get Guidance</span>
                            <span class="btn-icon">→</span>
                        </a>
                    </div>
                </div>

                <!-- Slide 3 Text Content -->
                <div class="home-text-slide" style="display: none; opacity: 0; transition: opacity 0.5s ease;">
                    <span class="badge"
                        style="background: rgba(255, 255, 255, 0.15); color: #ffffff; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3);">Direct
                        Fee Support</span>
                    <h1 style="color: #ffffff; text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);">
                        Education Support. <br>
                        <span class="highlight"
                            style="color: #facc15 !important; -webkit-text-fill-color: #facc15 !important; background: none !important; font-weight: 800; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.95), 0 0 20px rgba(250, 204, 21, 0.65);">With
                            Transparency.</span>
                    </h1>
                    <p style="color: rgba(255, 255, 255, 0.9); text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">
                        For eligible students, education fees are paid directly to the institution — ensuring every
                        contribution reaches its intended purpose.
                    </p>
                    <div class="hero-buttons" style="margin-bottom: 1.5rem;">
                        <a href="<?php echo base_url('#our-process'); ?>" class="btn btn-primary">
                            <span class="btn-text">How We Help</span>
                            <span class="btn-icon">→</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Home Slider Dot Indicators (Desktop) -->
            <div class="home-slider-dots desktop-dots" style="display: flex; gap: 10px; align-items: center;">
                <button type="button" onclick="setHomeSlide(0)" class="home-slider-dot active" aria-label="Slide 1"
                    style="width: 28px; height: 10px; border-radius: 12px; border: none; background: #ffffff; cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
                <button type="button" onclick="setHomeSlide(1)" class="home-slider-dot" aria-label="Slide 2"
                    style="width: 10px; height: 10px; border-radius: 50%; border: none; background: rgba(255, 255, 255, 0.4); cursor: pointer; transition: all 0.3s ease; padding: 0;"></button>
                <button type="button" onclick="setHomeSlide(2)" class="home-slider-dot" aria-label="Slide 3"
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
        const textSlides = document.querySelectorAll('.home-text-slide');
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

            textSlides.forEach((tslide, idx) => {
                if (idx === index) {
                    tslide.style.display = 'block';
                    setTimeout(() => {
                        tslide.classList.add('active');
                        tslide.style.opacity = '1';
                    }, 20);
                } else {
                    tslide.classList.remove('active');
                    tslide.style.opacity = '0';
                    tslide.style.display = 'none';
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
<section class="about-section" style="padding: 5.5rem 4.5rem; background: #ffffff;">
    <div class="premium-section-header text-center" style="max-width: 900px; margin: 0 auto 3.5rem;">
        <span class="section-badge"
            style="background: #ecfdf5; color: #059669; border: 1px solid rgba(5, 150, 105, 0.25); padding: 0.45rem 1.25rem; font-size: 0.82rem;">Our
            Core Purpose</span>
        <h2>Why We <span class="gradient-text">Exist</span></h2>
        <h3 style="color: #0f172a; font-weight: 800; font-size: 1.85rem; margin-top: 0.85rem; line-height: 1.35;">
            Every Student Deserves a Chance to Move Forward.
        </h3>
    </div>
    <div class="about-container">
        <!-- Left Side: Content & Pillars -->
        <div class="about-content">
            <p class="section-description"
                style="color: #334155; font-size: 1.05rem; line-height: 1.75; font-weight: 500; margin-bottom: 1.25rem;">
                Financial hardship, difficult family circumstances, or lack of proper guidance can prevent a student
                from pursuing higher education.
            </p>
            <p style="color: #334155; font-size: 1.05rem; line-height: 1.75; font-weight: 500; margin-bottom: 2.25rem;">
                Sindhikum Samugam exists to remove these barriers — by providing the right educational guidance and
                supporting eligible students with their higher education fees, so that financial circumstances do not
                have to decide their future.
            </p>

            <div class="about-pillars"
                style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2.25rem;">
                <div class="about-pillar-item" style="display: flex; gap: 1rem; align-items: center;">
                    <div
                        style="width: 38px; height: 38px; border-radius: 10px; background: rgba(5, 150, 105, 0.12); color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.15rem; flex-shrink: 0;">
                        💡
                    </div>
                    <h4 style="color: #0f172a; font-weight: 700; font-size: 1.1rem; margin: 0;">Guidance</h4>
                </div>

                <div class="about-pillar-item" style="display: flex; gap: 1rem; align-items: center;">
                    <div
                        style="width: 38px; height: 38px; border-radius: 10px; background: rgba(2, 132, 199, 0.12); color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 1.15rem; flex-shrink: 0;">
                        🤲
                    </div>
                    <h4 style="color: #0f172a; font-weight: 700; font-size: 1.1rem; margin: 0;">Need-Based Support</h4>
                </div>

                <div class="about-pillar-item" style="display: flex; gap: 1rem; align-items: center;">
                    <div
                        style="width: 38px; height: 38px; border-radius: 10px; background: rgba(217, 119, 6, 0.12); color: #d97706; display: flex; align-items: center; justify-content: center; font-size: 1.15rem; flex-shrink: 0;">
                        🌟
                    </div>
                    <h4 style="color: #0f172a; font-weight: 700; font-size: 1.1rem; margin: 0;">Opportunity for All</h4>
                </div>
            </div>

            <a href="<?php echo base_url('welcome/mission'); ?>" class="btn btn-primary">
                <span class="btn-text">Learn More</span>
                <span class="btn-icon">→</span>
            </a>
        </div>

        <!-- Right Side: Graphic Card Image -->
        <div class="about-image-wrapper"
            style="display: flex; justify-content: center; align-items: center; width: 100%;">
            <div style="position: relative; width: 100%; max-width: 600px;">
                <img src="<?php echo base_url('assets/images/why-we-exist.png'); ?>"
                    alt="Why We Exist - Empowering Students"
                    style="width: 100%; height: auto; object-fit: contain; display: block; filter: drop-shadow(0 25px 50px rgba(15, 23, 42, 0.12)); border-radius: 22px;">
            </div>
        </div>
    </div>
</section>

<!-- Know Our Vision Section -->
<section class="vision-section"
    style="padding: 5.5rem 4.5rem; background: linear-gradient(180deg, #ffffff 0%, #f0f9ff 100%); position: relative;">
    <div class="premium-section-header text-center" style="max-width: 850px; margin: 0 auto 3.5rem;">
        <span class="section-badge"
            style="background: #e0f2fe; color: #0284c7; border: 1px solid rgba(2, 132, 199, 0.25); padding: 0.45rem 1.25rem; font-size: 0.82rem;">OUR
            VISION</span>
        <h2 style="font-size: 2.25rem; font-weight: 800; color: #0f172a; margin-top: 0.5rem;">
            A Future Where Every Student <span class="gradient-text">Can Move Forward</span>
        </h2>
        <p style="color: #64748b; max-width: 720px; margin: 0.85rem auto 0; font-size: 1.1rem; line-height: 1.65;">
            We envision a future where financial circumstances or lack of proper guidance do not stand between a student
            and higher education.
        </p>
    </div>

    <div class="about-container about-container-reverse"
        style="max-width: 1320px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 3.5rem; align-items: center;">
        <!-- Left Side Image -->
        <div class="about-image-wrapper"
            style="display: flex; justify-content: center; align-items: center; width: 100%;">
            <div style="position: relative; width: 100%; max-width: 600px;">
                <img src="<?php echo base_url('assets/images/our-vision.png'); ?>"
                    alt="Our Vision - Student Empowerment"
                    style="width: 100%; height: auto; object-fit: contain; display: block; filter: drop-shadow(0 25px 50px rgba(15, 23, 42, 0.14)); border-radius: 22px;">
            </div>
        </div>

        <!-- Right Side Vision Pillars -->
        <div class="vision-content">
            <div class="vision-pillars" style="display: flex; flex-direction: column; gap: 1.35rem;">
                <!-- 01 Card -->
                <div class="vision-pillar-card"
                    style="background: #ffffff; padding: 1.4rem 1.6rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -5px rgba(15, 23, 42, 0.05); display: flex; gap: 1.25rem; align-items: flex-start; transition: transform 0.3s ease;">
                    <div
                        style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0; font-size: 1.2rem;">
                        01
                    </div>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.1rem; margin-bottom: 0.35rem;">Equal
                            Educational Opportunity</h4>
                        <p style="color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0;">
                            Creating opportunities for students who face genuine financial or personal barriers to
                            pursuing higher education.
                        </p>
                    </div>
                </div>

                <!-- 02 Card -->
                <div class="vision-pillar-card"
                    style="background: #ffffff; padding: 1.4rem 1.6rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -5px rgba(15, 23, 42, 0.05); display: flex; gap: 1.25rem; align-items: flex-start; transition: transform 0.3s ease;">
                    <div
                        style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, var(--secondary), #0284c7); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0; font-size: 1.2rem;">
                        02
                    </div>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.1rem; margin-bottom: 0.35rem;">
                            Guidance & Direction</h4>
                        <p style="color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0;">
                            Helping students make informed decisions about their education, career and future.
                        </p>
                    </div>
                </div>

                <!-- 03 Card -->
                <div class="vision-pillar-card"
                    style="background: #ffffff; padding: 1.4rem 1.6rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px -5px rgba(15, 23, 42, 0.05); display: flex; gap: 1.25rem; align-items: flex-start; transition: transform 0.3s ease;">
                    <div
                        style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, #0f172a, #334155); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0; font-size: 1.2rem;">
                        03
                    </div>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.1rem; margin-bottom: 0.35rem;">
                            Transparent Educational Support</h4>
                        <p style="color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0;">
                            Providing eligible fee assistance directly to educational institutions with transparency and
                            accountability.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sponsors Videos Section -->
<section class="video-requests-section" style="background-color: transparent; padding-top: 5rem; padding-bottom: 3rem;">
    <div class="premium-section-header text-center" style="max-width: 850px; margin: 0 auto 3rem;">
        <span class="section-badge"
            style="background: #ecfdf5; color: #059669; border: 1px solid rgba(5, 150, 105, 0.25); padding: 0.45rem 1.25rem; font-size: 0.82rem; text-transform: uppercase;">OUR
            SPONSORS</span>
        <h2 style="font-size: 2.3rem; font-weight: 800; color: #0f172a; margin-top: 0.5rem;">Sponsors <span
                class="gradient-text">Videos</span></h2>
        <p style="color: #64748b; max-width: 650px; margin: 0.75rem auto 0; font-size: 1.05rem; line-height: 1.6;">
            Hear directly from our generous sponsors who believe in education and student empowerment.
        </p>
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
                        <div class="sponsor-info-overlay">
                            <h4 class="sponsor-name">Mr. A. Rahman</h4>
                            <p class="sponsor-profession">Business Owner</p>
                        </div>
                    </div>
                </div>

                <!-- Sponsor Video Card 2 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <div class="play-btn-overlay">
                            <div class="play-icon">▶</div>
                        </div>
                        <div class="sponsor-info-overlay">
                            <h4 class="sponsor-name">Mrs. Fathima Naz</h4>
                            <p class="sponsor-profession">Educator & Philanthropist</p>
                        </div>
                    </div>
                </div>

                <!-- Sponsor Video Card 3 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <div class="play-btn-overlay">
                            <div class="play-icon">▶</div>
                        </div>
                        <div class="sponsor-info-overlay">
                            <h4 class="sponsor-name">Mr. K. Ibrahim</h4>
                            <p class="sponsor-profession">Entrepreneur</p>
                        </div>
                    </div>
                </div>

                <!-- Sponsor Video Card 4 -->
                <div class="video-card">
                    <div class="video-thumbnail">
                        <div class="play-btn-overlay">
                            <div class="play-icon">▶</div>
                        </div>
                        <div class="sponsor-info-overlay">
                            <h4 class="sponsor-name">Mr. Mohamed Ali</h4>
                            <p class="sponsor-profession">Community Leader</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-btn next-btn">›</button>
    </div>

    <!-- Bottom Pagination Bar -->
    <div class="video-pagination-bar"
        style="display: flex; justify-content: center; align-items: center; gap: 8px; margin-top: 2rem;">
        <span class="pagination-pill active"
            style="width: 32px; height: 6px; background: #059669; border-radius: 10px; cursor: pointer; transition: all 0.3s ease;"></span>
        <span class="pagination-pill"
            style="width: 10px; height: 6px; background: #cbd5e1; border-radius: 10px; cursor: pointer; transition: all 0.3s ease; opacity: 0.5;"></span>
        <span class="pagination-pill"
            style="width: 10px; height: 6px; background: #cbd5e1; border-radius: 10px; cursor: pointer; transition: all 0.3s ease; opacity: 0.5;"></span>
        <span class="pagination-pill"
            style="width: 10px; height: 6px; background: #cbd5e1; border-radius: 10px; cursor: pointer; transition: all 0.3s ease; opacity: 0.5;"></span>
    </div>
</section>

<!-- Who We Help Section -->
<section id="who-we-help" class="about-section" style="padding: 5.5rem 4.5rem; background: #ffffff;">
    <div class="premium-section-header text-center" style="max-width: 900px; margin: 0 auto 3.5rem;">
        <span class="section-badge"
            style="background: #e0f2fe; color: #0284c7; border: 1px solid rgba(2, 132, 199, 0.25); padding: 0.45rem 1.25rem; font-size: 0.82rem; text-transform: uppercase;">Our
            Impact</span>
        <h2 style="font-size: 2.3rem; font-weight: 800; color: #0f172a; margin-top: 0.5rem;">Who We <span
                class="gradient-text">Help</span></h2>
        <p style="color: #64748b; max-width: 720px; margin: 0.75rem auto 0; font-size: 1.1rem; line-height: 1.65;">
            We support students who face genuine financial, family or personal barriers to pursuing higher education.
        </p>
    </div>

    <div class="about-container about-container-reverse"
        style="max-width: 1240px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1.1fr; gap: 4rem; align-items: center;">
        <!-- Image on the Left -->
        <div class="about-image-wrapper"
            style="display: flex; justify-content: center; align-items: center; width: 100%;">
            <div style="position: relative; width: 100%; max-width: 620px;">
                <img src="<?php echo base_url('assets/images/whowehelp.png'); ?>"
                    alt="Empowering students - Who We Help"
                    style="width: 100%; max-height: 520px; object-fit: cover; display: block; filter: drop-shadow(0 25px 50px rgba(15, 23, 42, 0.14)); border-radius: 24px;">
            </div>
        </div>

        <!-- Content on the Right: Bullet List -->
        <div class="about-content">
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1.35rem;">
                <!-- Bullet 01 -->
                <li style="display: flex; gap: 1.1rem; align-items: flex-start;">
                    <span
                        style="width: 32px; height: 32px; border-radius: 50%; background: #ecfdf5; color: #059669; display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.88rem; flex-shrink: 0; margin-top: 2px;">
                        01
                    </span>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.08rem; margin: 0 0 0.25rem 0;">Orphans
                        </h4>
                        <p style="color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0;">
                            Students who have lost parental support and need assistance to continue their education.
                        </p>
                    </div>
                </li>

                <!-- Bullet 02 -->
                <li style="display: flex; gap: 1.1rem; align-items: flex-start;">
                    <span
                        style="width: 32px; height: 32px; border-radius: 50%; background: #e0f2fe; color: #0284c7; display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.88rem; flex-shrink: 0; margin-top: 2px;">
                        02
                    </span>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.08rem; margin: 0 0 0.25rem 0;">
                            Students from Single-Parent Families</h4>
                        <p style="color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0;">
                            Students whose educational journey is affected by the financial responsibilities of a
                            single-parent household.
                        </p>
                    </div>
                </li>

                <!-- Bullet 03 -->
                <li style="display: flex; gap: 1.1rem; align-items: flex-start;">
                    <span
                        style="width: 32px; height: 32px; border-radius: 50%; background: #fef3c7; color: #d97706; display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.88rem; flex-shrink: 0; margin-top: 2px;">
                        03
                    </span>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.08rem; margin: 0 0 0.25rem 0;">
                            Students with Disabilities</h4>
                        <p style="color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0;">
                            Students who face additional financial or personal challenges in pursuing higher education.
                        </p>
                    </div>
                </li>

                <!-- Bullet 04 -->
                <li style="display: flex; gap: 1.1rem; align-items: flex-start;">
                    <span
                        style="width: 32px; height: 32px; border-radius: 50%; background: #f1f5f9; color: #334155; display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.88rem; flex-shrink: 0; margin-top: 2px;">
                        04
                    </span>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.08rem; margin: 0 0 0.25rem 0;">
                            Students Facing Genuine Financial Hardship</h4>
                        <p style="color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0;">
                            Students whose financial circumstances make it difficult to continue their higher education.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Centered Statement Box -->
    <div style="max-width: 950px; margin: 3.5rem auto 0;">
        <div
            style="background: #ecfdf5; border-left: 5px solid #059669; border-radius: 14px; padding: 1.25rem 2rem; box-shadow: 0 4px 20px -5px rgba(5, 150, 105, 0.08); text-align: center;">
            <h3
                style="color: #047857; font-size: 1.18rem; font-weight: 700; margin: 0; line-height: 1.5; text-align: center;">
                We look beyond marks. We look at the circumstances behind the student.
            </h3>
        </div>
    </div>
</section>

<!-- Dual Banner Section -->
<section class="dual-banner-section">
    <div class="dual-banner-container">
        <!-- Banner 1: For Donors -->
        <div class="promo-banner banner-primary"
            style="background-image: linear-gradient(90deg, rgba(15, 23, 42, 0.92) 0%, rgba(15, 23, 42, 0.75) 45%, rgba(15, 23, 42, 0.15) 100%), url('<?php echo base_url('assets/images/banner_donor.jpg'); ?>'); background-size: cover; background-position: center right;">
            <div class="promo-content">
                <span class="promo-badge">FOR DONORS</span>
                <h3>Support a Student's Education</h3>
                <p>Your contribution can help a student overcome financial barriers and continue their higher education.</p>
                <a href="<?php echo base_url('donors#donorForm'); ?>" class="btn btn-primary">
                    <span class="btn-text">Donate Now</span>
                    <span class="btn-icon">→</span>
                </a>
            </div>
        </div>

        <!-- Banner 2: For Students -->
        <div class="promo-banner banner-secondary"
            style="background-image: linear-gradient(90deg, rgba(4, 78, 57, 0.92) 0%, rgba(4, 120, 87, 0.75) 45%, rgba(4, 120, 87, 0.15) 100%), url('<?php echo base_url('assets/images/banner_student.jpg'); ?>'); background-size: cover; background-position: center;">
            <div class="promo-content">
                <span class="promo-badge promo-badge-student">FOR STUDENTS</span>
                <h3>Need Support for Higher Education?</h3>
                <p>If you need educational guidance or financial assistance for your higher education, you can register with us.</p>
                <a href="<?php echo base_url('students#registerForm'); ?>" class="btn btn-secondary"
                    style="background: #ffffff; color: #047857; font-weight: 600;">
                    <span class="btn-text">Register as a Student</span>
                    <span class="btn-icon">→</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Our Process Section -->
<section id="our-process" class="process-section" style="padding: 5.5rem 2rem; background: #f8fafc; position: relative;">
    <div class="premium-section-header text-center" style="max-width: 850px; margin: 0 auto 4rem;">
        <span class="section-badge" style="background: #ede9fe; color: #059669; border: 1px solid rgba(5, 150, 105, 0.2); padding: 0.45rem 1.25rem; font-size: 0.82rem; text-transform: uppercase; font-weight: 700; border-radius: 50px;">HOW IT WORKS</span>
        <h2 style="font-size: 2.3rem; font-weight: 800; color: #0f172a; margin-top: 0.5rem;">Our <span class="gradient-text">Process</span></h2>
    </div>

    <div class="process-container" style="max-width: 1300px; margin: 0 auto;">
        <div class="process-track">
            <!-- Step 1 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number" style="background: #0284c7; color: white;">1</div>
                    <div class="step-icon">✍️</div>
                </div>
                <h4 class="step-title" style="font-weight: 700; color: #0f172a;">Student Registration</h4>
            </div>
            <div class="step-connector"></div>

            <!-- Step 2 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number" style="background: #0284c7; color: white;">2</div>
                    <div class="step-icon">🔍</div>
                </div>
                <h4 class="step-title" style="font-weight: 700; color: #0f172a;">Document Verification</h4>
            </div>
            <div class="step-connector"></div>

            <!-- Step 3 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number" style="background: #0284c7; color: white;">3</div>
                    <div class="step-icon">💬</div>
                </div>
                <h4 class="step-title" style="font-weight: 700; color: #0f172a;">Counselling & Guidance</h4>
            </div>
            <div class="step-connector"></div>

            <!-- Step 4 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number" style="background: #0284c7; color: white;">4</div>
                    <div class="step-icon">📋</div>
                </div>
                <h4 class="step-title" style="font-weight: 700; color: #0f172a;">Eligibility Review</h4>
            </div>
            <div class="step-connector"></div>

            <!-- Step 5 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number" style="background: #0284c7; color: white;">5</div>
                    <div class="step-icon">✅</div>
                </div>
                <h4 class="step-title" style="font-weight: 700; color: #0f172a;">Support Approval</h4>
            </div>
            <div class="step-connector"></div>

            <!-- Step 6 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number" style="background: #0284c7; color: white;">6</div>
                    <div class="step-icon">🏛️</div>
                </div>
                <h4 class="step-title" style="font-weight: 700; color: #0f172a;">Direct Fee Payment</h4>
            </div>
            <div class="step-connector"></div>

            <!-- Step 7 -->
            <div class="process-step">
                <div class="step-icon-wrapper">
                    <div class="step-number" style="background: #0284c7; color: white;">7</div>
                    <div class="step-icon">🤝</div>
                </div>
                <h4 class="step-title" style="font-weight: 700; color: #0f172a;">Follow-up & Support</h4>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var section = document.querySelector('.video-requests-section');
        if (!section) return;

        var wrapper = section.querySelector('.video-track-wrapper');
        var prevBtn = section.querySelector('.prev-btn');
        var nextBtn = section.querySelector('.next-btn');
        var pills = section.querySelectorAll('.pagination-pill');
        var cards = section.querySelectorAll('.video-card');

        function updatePagination() {
            if (!wrapper || !pills.length || !cards.length) return;
            var scrollLeft = wrapper.scrollLeft;
            var cardWidth = cards[0].offsetWidth;
            var gap = 15;
            var activeIndex = Math.round(scrollLeft / (cardWidth + gap));
            activeIndex = Math.max(0, Math.min(activeIndex, pills.length - 1));

            pills.forEach(function (pill, index) {
                if (index === activeIndex) {
                    pill.classList.add('active');
                    pill.style.width = '32px';
                    pill.style.background = '#059669';
                    pill.style.opacity = '1';
                } else {
                    pill.classList.remove('active');
                    pill.style.width = '10px';
                    pill.style.background = '#cbd5e1';
                    pill.style.opacity = '0.5';
                }
            });
        }

        if (wrapper && prevBtn && nextBtn) {
            prevBtn.addEventListener('click', function () {
                var cardWidth = cards[0]?.offsetWidth || 220;
                wrapper.scrollBy({ left: -(cardWidth + 15), behavior: 'smooth' });
            });
            nextBtn.addEventListener('click', function () {
                var cardWidth = cards[0]?.offsetWidth || 220;
                wrapper.scrollBy({ left: (cardWidth + 15), behavior: 'smooth' });
            });

            wrapper.addEventListener('scroll', updatePagination);
        }

        pills.forEach(function (pill, index) {
            pill.addEventListener('click', function () {
                if (cards[index]) {
                    cards[index].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
                }
            });
        });
    });
</script>

<?php $this->load->view('includes/footer'); ?>