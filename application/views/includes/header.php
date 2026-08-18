<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sindhikum Samugam - Premium Student Donation Platform</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/faviicon.png'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css?v=' . time()); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="site-header">
        <!-- Main Header Navigation -->
        <div class="main-header-bar">
            <div class="header-container">
                <a href="<?php echo base_url(); ?>" class="logo" style="gap: 0.85rem;">
                    <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Sindhikum Samugam Foundation Logo"
                        class="logo-img" style="height: 56px; width: auto; object-fit: contain;">
                    <span class="logo-text-stacked"
                        style="display: flex; flex-direction: column; line-height: 1.1; font-weight: 800;">
                        <span
                            style="display: flex; align-items: center; gap: 0.35rem; font-size: 1.35rem; letter-spacing: -0.01em;">
                            <span style="color: #0f172a;">Sindhikum</span>
                            <span class="highlight"
                                style="background: linear-gradient(135deg, #059669, #D97706); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Samugam</span>
                        </span>
                        <span
                            style="color: #059669; font-size: 0.92rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.22em; margin-top: 2px;">Foundation</span>
                    </span>
                </a>

                <button class="hamburger-toggle" id="mobileMenuToggle" aria-label="Toggle Navigation Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <nav class="main-nav" id="mainNav">
                    <ul class="nav-list">
                        <li class="nav-item"><a href="<?php echo base_url(); ?>" class="nav-link active">Home</a></li>
                        <li class="nav-item"><a href="<?php echo base_url('donors'); ?>" class="nav-link">Donor Page</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo base_url('students'); ?>" class="nav-link">Students</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo base_url('welcome/contact'); ?>"
                                class="nav-link">Contact Us</a></li>
                    </ul>
                </nav>

                <div class="header-actions">
                    <a href="<?php echo base_url('students#registerForm'); ?>" class="btn btn-outline">Register
                        Student</a>
                    <a href="<?php echo base_url('donors#donorForm'); ?>" class="btn btn-primary">
                        <span class="btn-text">Donate Now</span>
                        <span class="btn-icon">🤲</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Side Drawer Navigation -->
    <div class="side-nav-overlay" id="sideNavOverlay"></div>
    <aside class="side-nav-drawer" id="sideNavDrawer">
        <div class="drawer-header">
            <a href="<?php echo base_url(); ?>" class="logo" style="gap: 0.75rem;">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Sindhikum Samugam Foundation Logo"
                    class="logo-img"
                    style="height: 44px; width: auto; object-fit: contain; filter: drop-shadow(0 3px 8px rgba(0, 0, 0, 0.15));">
                <span class="logo-text-stacked"
                    style="display: flex; flex-direction: column; line-height: 1.1; font-weight: 800;">
                    <span
                        style="display: flex; align-items: center; gap: 0.3rem; font-size: 1.15rem; letter-spacing: -0.01em;">
                        <span style="color: #0f172a;">Sindhikum</span>
                        <span class="highlight"
                            style="background: linear-gradient(135deg, #059669, #D97706); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Samugam</span>
                    </span>
                    <span
                        style="color: #059669; font-size: 0.62rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.2em; margin-top: 1px;">Foundation</span>
                </span>
            </a>
            <button class="drawer-close-btn" id="drawerCloseBtn" aria-label="Close menu">&times;</button>
        </div>
        <div class="drawer-body">
            <ul class="drawer-nav-list">
                <li><a href="<?php echo base_url(); ?>" class="drawer-link active">Home</a></li>
                <li><a href="<?php echo base_url('donors'); ?>" class="drawer-link">Donor Page</a></li>
                <li><a href="<?php echo base_url('students'); ?>" class="drawer-link">Students</a></li>
                <li><a href="<?php echo base_url('welcome/contact'); ?>" class="drawer-link">Contact Us</a></li>
            </ul>
        </div>
        <div class="drawer-footer">
            <a href="<?php echo base_url('students#registerForm'); ?>"
                class="btn btn-outline w-100 justify-center mb-2">Register as a Student</a>
            <a href="<?php echo base_url('donors#donorForm'); ?>" class="btn btn-primary w-100 justify-center">
                <span class="btn-text">Donate Now</span>
                <span class="btn-icon">🤲</span>
            </a>
        </div>
    </aside>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toggleBtn = document.getElementById('mobileMenuToggle');
            var closeBtn = document.getElementById('drawerCloseBtn');
            var drawer = document.getElementById('sideNavDrawer');
            var overlay = document.getElementById('sideNavOverlay');

            function openDrawer() {
                if (drawer && overlay) {
                    drawer.classList.add('active');
                    overlay.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            }

            function closeDrawer() {
                if (drawer && overlay) {
                    drawer.classList.remove('active');
                    overlay.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }

            if (toggleBtn) toggleBtn.addEventListener('click', openDrawer);
            if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
            if (overlay) overlay.addEventListener('click', closeDrawer);
        });
    </script>