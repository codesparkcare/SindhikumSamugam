<?php $this->load->view('includes/header'); ?>

<!-- Custom CSS for Mission Page Hover Effects & Mobile Responsiveness -->
<style>
.badge-mission {
    font-size: 1.15rem;
    padding: 0.75rem 2.2rem;
    letter-spacing: 0.08em;
    font-weight: 800;
    box-shadow: 0 10px 30px rgba(5, 150, 105, 0.45);
}
@media (max-width: 768px) {
    .mission-hero {
        margin-top: 68px !important;
        padding: 4rem 1rem 2rem !important;
    }
    .badge-mission {
        font-size: 0.68rem !important;
        padding: 0.25rem 0.72rem !important;
        letter-spacing: 0.04em !important;
        margin-bottom: 0.45rem !important;
    }
    .mission-hero h1 {
        font-size: 1.55rem !important;
        line-height: 1.22 !important;
        margin-bottom: 0.75rem !important;
    }
    .mission-hero p {
        font-size: 0.84rem !important;
        line-height: 1.45 !important;
    }
}
.mission-card {
    transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.4s ease !important;
}
.mission-card:hover {
    transform: translateY(-6px) !important;
    box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08) !important;
    border-color: #059669 !important;
}
.mission-pill-item {
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease, background 0.3s ease !important;
    cursor: default;
}
.mission-pill-item:hover {
    transform: translateY(-3px) scale(1.02) !important;
    border-color: #059669 !important;
    background: #ecfdf5 !important;
}
</style>

<!-- Our Mission Hero Banner -->
<section class="mission-hero" style="margin-top: 70px; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 5rem 1.5rem 4rem; text-align: center; color: #ffffff; position: relative; overflow: hidden;">
    <div class="reveal" style="max-width: 900px; margin: 0 auto; position: relative; z-index: 2;">
        <span class="section-badge hero-slider-badge badge-mission">
            🚀 OUR MISSION
        </span>
        <h1 style="font-size: 2.75rem; font-weight: 800; line-height: 1.2; margin-bottom: 1.25rem; color: #ffffff;">
            Every Student Deserves a Chance to <span style="background: linear-gradient(135deg, #34d399, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Move Forward.</span>
        </h1>
        <p style="font-size: 1.1rem; color: rgba(255, 255, 255, 0.9); max-width: 720px; margin: 0 auto 2rem; line-height: 1.7;">
            Education can change a life. But for many students, financial hardship, family circumstances, or lack of proper guidance can stand in the way of higher education.
        </p>
        
        <div style="background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.2); padding: 1.25rem 1.75rem; border-radius: 16px; max-width: 780px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);">
            <p style="color: #fbbf24; font-size: 1.05rem; font-weight: 600; margin: 0; line-height: 1.6;">
                ✨ Sindhikum Samugam exists to help remove these barriers and create meaningful opportunities for students to build a better future.
            </p>
        </div>
    </div>
</section>

<!-- Mission Main Content -->
<section style="padding: 4.5rem 1.5rem 6rem; background: #f8fafc;">
    <div style="max-width: 1000px; margin: 0 auto; display: flex; flex-direction: column; gap: 2.5rem;">
        
        <!-- Section 1: Why We Started -->
        <div class="mission-card reveal-left" style="background: #ffffff; border-radius: 20px; padding: 2.5rem; box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04); border: 1px solid #e2e8f0;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
                <div style="width: 46px; height: 46px; border-radius: 12px; background: rgba(5, 150, 105, 0.12); color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; font-weight: bold; flex-shrink: 0;">
                    🌱
                </div>
                <h2 style="font-size: 1.6rem; font-weight: 800; color: #0f172a; margin: 0;">Why We Started</h2>
            </div>
            <p style="color: #0f172a; font-size: 1.1rem; font-weight: 600; line-height: 1.7; margin-bottom: 0.75rem;">
                We believe education should not be limited by circumstances.
            </p>
            <p style="color: #475569; font-size: 1.05rem; line-height: 1.75; margin: 0;">
                Our mission is to support students who genuinely need help to continue their higher education — not only through financial assistance, but also through the right guidance and direction.
            </p>
        </div>

        <!-- Section 2: What We Believe -->
        <div class="mission-card reveal-left" style="background: #ffffff; border-radius: 20px; padding: 2.5rem; box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04); border: 1px solid #e2e8f0;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
                <div style="width: 46px; height: 46px; border-radius: 12px; background: rgba(217, 119, 6, 0.12); color: #d97706; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; font-weight: bold; flex-shrink: 0;">
                    🌟
                </div>
                <h2 style="font-size: 1.6rem; font-weight: 800; color: #0f172a; margin: 0;">What We Believe</h2>
            </div>
            
            <div style="background: #fffbeb; border-left: 4px solid #d97706; padding: 1.25rem 1.5rem; border-radius: 12px; margin-bottom: 1.25rem;">
                <h3 style="color: #b45309; font-size: 1.2rem; font-weight: 700; margin: 0 0 0.5rem 0;">Marks Should Not Define a Student's Future.</h3>
                <p style="color: #78350f; font-size: 1rem; margin: 0; line-height: 1.6;">
                    We do not believe that only high-scoring students deserve support.
                </p>
            </div>
            
            <p style="color: #475569; font-size: 1.05rem; line-height: 1.75; margin: 0;">
                With the right guidance, opportunity and encouragement, every student has the potential to learn, grow and move forward.
            </p>
        </div>

        <!-- Section 3: Who We Support -->
        <div class="mission-card reveal-right" style="background: #ffffff; border-radius: 20px; padding: 2.5rem; box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04); border: 1px solid #e2e8f0;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
                <div style="width: 46px; height: 46px; border-radius: 12px; background: rgba(2, 132, 199, 0.12); color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; font-weight: bold; flex-shrink: 0;">
                    👥
                </div>
                <h2 style="font-size: 1.6rem; font-weight: 800; color: #0f172a; margin: 0;">Who We Support</h2>
            </div>
            <p style="color: #475569; font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                We primarily focus on students facing genuine educational and financial challenges, including:
            </p>

            <div class="stagger-children" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem;">
                <div class="mission-pill-item" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.1rem 1.25rem; border-radius: 14px; display: flex; align-items: center; gap: 0.85rem;">
                    <span style="font-size: 1.25rem;">🎓</span>
                    <span style="color: #0f172a; font-weight: 600; font-size: 1rem;">Orphans</span>
                </div>
                <div class="mission-pill-item" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.1rem 1.25rem; border-radius: 14px; display: flex; align-items: center; gap: 0.85rem;">
                    <span style="font-size: 1.25rem;">🏡</span>
                    <span style="color: #0f172a; font-weight: 600; font-size: 1rem;">Students from single-parent families</span>
                </div>
                <div class="mission-pill-item" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.1rem 1.25rem; border-radius: 14px; display: flex; align-items: center; gap: 0.85rem;">
                    <span style="font-size: 1.25rem;">♿</span>
                    <span style="color: #0f172a; font-weight: 600; font-size: 1rem;">Students with disabilities</span>
                </div>
                <div class="mission-pill-item" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.1rem 1.25rem; border-radius: 14px; display: flex; align-items: center; gap: 0.85rem;">
                    <span style="font-size: 1.25rem;">💼</span>
                    <span style="color: #0f172a; font-weight: 600; font-size: 1rem;">Economically disadvantaged students</span>
                </div>
                <div class="mission-pill-item" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.1rem 1.25rem; border-radius: 14px; display: flex; align-items: center; gap: 0.85rem;">
                    <span style="font-size: 1.25rem;">📜</span>
                    <span style="color: #0f172a; font-weight: 600; font-size: 1rem;">First graduate students</span>
                </div>
                <div class="mission-pill-item" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.1rem 1.25rem; border-radius: 14px; display: flex; align-items: center; gap: 0.85rem;">
                    <span style="font-size: 1.25rem;">🧭</span>
                    <span style="color: #0f172a; font-weight: 600; font-size: 1rem;">Students who lack proper guidance</span>
                </div>
            </div>
        </div>

        <!-- Section 4: How We Help -->
        <div class="mission-card reveal-right" style="background: #ffffff; border-radius: 20px; padding: 2.5rem; box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04); border: 1px solid #e2e8f0;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                <div style="width: 46px; height: 46px; border-radius: 12px; background: rgba(5, 150, 105, 0.12); color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; font-weight: bold; flex-shrink: 0;">
                    🤝
                </div>
                <h2 style="font-size: 1.6rem; font-weight: 800; color: #0f172a; margin: 0;">How We Help</h2>
            </div>

            <div class="stagger-children" style="display: flex; flex-direction: column; gap: 1.25rem;">
                <!-- Pillar 1 -->
                <div class="mission-pill-item" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.25rem 1.5rem; border-radius: 14px; display: flex; gap: 1.15rem; align-items: flex-start;">
                    <div style="width: 42px; height: 42px; border-radius: 10px; background: rgba(5, 150, 105, 0.1); color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                        🧭
                    </div>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.1rem; margin-bottom: 0.35rem;">Educational Guidance</h4>
                        <p style="color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0;">
                            Helping students make informed decisions about courses, colleges and career paths.
                        </p>
                    </div>
                </div>

                <!-- Pillar 2 -->
                <div class="mission-pill-item" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.25rem 1.5rem; border-radius: 14px; display: flex; gap: 1.15rem; align-items: flex-start;">
                    <div style="width: 42px; height: 42px; border-radius: 10px; background: rgba(2, 132, 199, 0.1); color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                        🤲
                    </div>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.1rem; margin-bottom: 0.35rem;">Fee Assistance</h4>
                        <p style="color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0;">
                            Supporting eligible students with their higher education fees based on genuine need.
                        </p>
                    </div>
                </div>

                <!-- Pillar 3 -->
                <div class="mission-pill-item" style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1.25rem 1.5rem; border-radius: 14px; display: flex; gap: 1.15rem; align-items: flex-start;">
                    <div style="width: 42px; height: 42px; border-radius: 10px; background: rgba(16, 185, 129, 0.1); color: #10b981; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                        🏦
                    </div>
                    <div>
                        <h4 style="color: #0f172a; font-weight: 700; font-size: 1.1rem; margin-bottom: 0.35rem;">Direct Institutional Payment</h4>
                        <p style="color: #64748b; font-size: 0.98rem; line-height: 1.6; margin: 0;">
                            Approved educational fees are paid directly to the respective institution, ensuring transparency and responsible use of funds.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 5: Our Commitment -->
        <div class="reveal-zoom" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-radius: 20px; padding: 3rem 2.5rem; text-align: center; color: #ffffff; box-shadow: 0 15px 35px rgba(15, 23, 42, 0.15);">
            <span class="section-badge hero-slider-badge badge-commitment" style="background: linear-gradient(135deg, rgba(217, 119, 6, 0.35), rgba(245, 158, 11, 0.35)) !important; color: #fbbf24 !important; border: 2px solid rgba(251, 191, 36, 0.7) !important; padding: 0.75rem 2.2rem !important; border-radius: 50px !important; font-weight: 800 !important; text-transform: uppercase !important; letter-spacing: 0.08em !important; font-size: 1.15rem !important; margin-bottom: 1.25rem !important; display: inline-flex !important; align-items: center !important; gap: 0.6rem !important; backdrop-filter: blur(12px) !important; box-shadow: 0 10px 30px rgba(217, 119, 6, 0.45) !important;">
                🛡️ OUR COMMITMENT
            </span>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: #ffffff; margin-bottom: 1rem;">
                Guidance. Opportunity. Transparency.
            </h2>
            <p style="color: rgba(255, 255, 255, 0.9); font-size: 1.1rem; max-width: 750px; margin: 0 auto 2rem; line-height: 1.7;">
                We are committed to helping students overcome barriers, continue their education and move towards a more independent and meaningful future.
            </p>
            
            <div style="background: rgba(5, 150, 105, 0.2); border: 1px solid rgba(52, 211, 153, 0.3); padding: 1.25rem 2rem; border-radius: 16px; display: inline-block; margin-bottom: 2.5rem;">
                <p style="color: #34d399; font-size: 1.15rem; font-weight: 700; margin: 0;">
                    Because a student's circumstances today should never decide their possibilities tomorrow.
                </p>
            </div>

            <div class="hero-action-buttons" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo base_url('students#registerForm'); ?>" class="btn btn-outline">
                    Register for Support →
                </a>
                <a href="<?php echo base_url('donors#donorForm'); ?>" class="btn btn-primary">
                    <span class="btn-text">Support Our Mission</span>
                    <span class="btn-icon">🤲</span>
                </a>
            </div>
        </div>

    </div>
</section>

<?php $this->load->view('includes/footer'); ?>

