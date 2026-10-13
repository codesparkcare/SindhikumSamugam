<!-- Cyber-SaaS Sidebar Navigation -->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="<?php echo base_url('assets/images/logo.png?v=' . time()); ?>" alt="Logo" style="height: 38px; width: auto; filter: drop-shadow(0 2px 8px rgba(255,255,255,0.15));">
        <div>
            <h6 class="mb-0 fw-extrabold text-white" style="font-size: 0.82rem; letter-spacing: -0.01em; line-height: 1.2;"><span style="color: #4ade80;">Sindhikum Samugam</span> Foundation Admin</h6>
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
            <a href="<?php echo base_url('admin/contact_enquiries'); ?>" class="<?php echo ($this->uri->segment(2) == 'contact_enquiries') ? 'active' : ''; ?>">
                <i class="fa-solid fa-comments" style="font-size: 1.05rem;"></i>
                <span>Contact Enquiries</span>
            </a>
        </li>
        <li class="menu-title mt-2">Item Donation Portal</li>
        <li>
            <a href="<?php echo base_url('admin/manage_products'); ?>" class="<?php echo ($this->uri->segment(2) == 'manage_products' || $this->uri->segment(2) == 'products') ? 'active' : ''; ?>">
                <i class="fa-solid fa-box-open" style="font-size: 1.05rem;"></i>
                <div class="d-flex justify-content-between align-items-center w-100">
                    <span>Educational Items</span>
                    <?php 
                        $ci =& get_instance();
                        $p_pending = $ci->db->where('status', 'pending')->count_all_results('products');
                        if ($p_pending > 0): 
                    ?>
                        <span class="badge bg-warning text-dark px-1.5 py-0.5 ms-2" style="font-size: 0.68rem; font-weight: 700;"><?php echo $p_pending; ?></span>
                    <?php endif; ?>
                </div>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/product_applications'); ?>" class="<?php echo ($this->uri->segment(2) == 'product_applications') ? 'active' : ''; ?>">
                <i class="fa-solid fa-clipboard-list" style="font-size: 1.05rem;"></i>
                <div class="d-flex justify-content-between align-items-center w-100">
                    <span>Product Applications</span>
                    <?php 
                        $a_pending = $ci->db->where('status', 'Pending')->count_all_results('product_applications');
                        if ($a_pending > 0): 
                    ?>
                        <span class="badge bg-info text-white px-1.5 py-0.5 ms-2" style="font-size: 0.68rem; font-weight: 700;"><?php echo $a_pending; ?></span>
                    <?php endif; ?>
                </div>
            </a>
        </li>
        <li class="menu-title mt-2">Platform Administration</li>
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
                <span class="fw-bold" style="color: #0f172a; font-size: 0.95rem;"><span style="color: #059669;">Sindhikum Samugam</span> Foundation</span>
            </div>
        </div>
    </header>