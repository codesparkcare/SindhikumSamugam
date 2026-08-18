<!-- Cyber-SaaS Sidebar Navigation -->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Logo" style="height: 38px; width: auto; filter: drop-shadow(0 2px 8px rgba(255,255,255,0.15));">
        <div>
            <h6 class="mb-0 fw-extrabold text-white" style="font-size: 1rem; letter-spacing: -0.01em;">Sindhikum Admin</h6>
            <span class="badge px-2 py-0.5" style="background: rgba(99, 102, 241, 0.2); color: #818cf8; font-size: 0.68rem; font-weight: 700;">Executive Trust</span>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-title">Control Portal</li>
        <li>
            <a href="<?php echo base_url('admin/index'); ?>" class="<?php echo ($this->uri->segment(2) == 'index' || $this->uri->segment(2) == '') ? 'active' : ''; ?>">
                <i class="fa-solid fa-chart-pie" style="font-size: 1.05rem;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/student_enquiries'); ?>" class="<?php echo ($this->uri->segment(2) == 'student_enquiries') ? 'active' : ''; ?>">
                <i class="fa-solid fa-user-graduate" style="font-size: 1.05rem;"></i>
                <span>Student Applications</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/manage_donors'); ?>" class="<?php echo ($this->uri->segment(2) == 'manage_donors') ? 'active' : ''; ?>">
                <i class="fa-solid fa-hand-holding-heart" style="font-size: 1.05rem;"></i>
                <span>Donor Management</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/settings'); ?>" class="<?php echo ($this->uri->segment(2) == 'settings') ? 'active' : ''; ?>">
                <i class="fa-solid fa-sliders" style="font-size: 1.05rem;"></i>
                <span>Settings & Integrations</span>
            </a>
        </li>
        <li class="mt-4">
            <a href="<?php echo base_url('admin/logout'); ?>" style="color: #ef4444; background: rgba(239, 68, 68, 0.08);">
                <i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 1.05rem;"></i>
                <span>Sign Out</span>
            </a>
        </li>
    </ul>
</nav>

<!-- Page Content Holder -->
<div id="content">

    <!-- Top Executive Navbar -->
    <header class="top-navbar">
        <div class="d-flex align-items-center gap-3">
            <button type="button" id="sidebarCollapse" class="navbar-btn">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>
            <div>
                <span class="fw-bold" style="color: #0f172a; font-size: 0.95rem;">Executive Control Panel</span>
            </div>
        </div>
    </header>