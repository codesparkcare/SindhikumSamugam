<div class="container-fluid py-4 px-4" style="background: #f8fafc; min-height: 100vh;">

    <!-- Flash Notification Messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 14px; background: #d1fae5; color: #047857;">
            <i class="fa-solid fa-circle-check me-2"></i> <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 14px; background: #fee2e2; color: #dc2626;">
            <i class="fa-solid fa-triangle-exclamation me-2"></i> <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Top Header & Action Controls -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h3 class="fw-extrabold mb-1" style="color: #0f172a; letter-spacing: -0.02em;">Educational Item Listings</h3>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Review item submissions from donors, approve live listings with countdown timers, or add new items.
            </p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="<?php echo site_url('products'); ?>" target="_blank" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-1.5" style="border-radius: 10px; font-weight: 600; padding: 0.55rem 0.95rem;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Public Portal
            </a>
            <a href="<?php echo site_url('admin/export_products_excel?status=' . urlencode($current_filter) . '&date_from=' . urlencode($date_from ?? '') . '&date_to=' . urlencode($date_to ?? '')); ?>" class="btn btn-outline-success btn-sm d-flex align-items-center gap-1.5" style="border-radius: 10px; font-weight: 600; padding: 0.55rem 0.95rem;">
                <i class="fa-solid fa-file-excel"></i> Export CSV
            </a>
            <button type="button" class="btn btn-primary btn-sm d-flex align-items-center gap-1.5" data-bs-toggle="modal" data-bs-target="#addNewProductModal" style="border-radius: 10px; font-weight: 700; padding: 0.55rem 1.1rem; background: linear-gradient(135deg, #059669, #047857); border: none; box-shadow: 0 4px 12px rgba(5, 150, 105, 0.25);">
                <i class="fa-solid fa-plus"></i> + Add New Item
            </button>
        </div>
    </div>

    <!-- 5 Summary Metric Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-2 col-6" style="flex: 1;">
            <div class="card border-0 shadow-sm" style="border-radius: 18px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.7rem; letter-spacing: 0.05em;">Total Listings</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #0f172a;"><?php echo isset($stats['total']) ? number_format($stats['total']) : '0'; ?></h3>
                    </div>
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: #e0e7ff; color: #4338ca; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2 col-6" style="flex: 1;">
            <div class="card border-0 shadow-sm" style="border-radius: 18px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.7rem; letter-spacing: 0.05em;">Pending Review</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #d97706;"><?php echo isset($stats['pending']) ? number_format($stats['pending']) : '0'; ?></h3>
                    </div>
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: #fef3c7; color: #d97706; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2 col-6" style="flex: 1;">
            <div class="card border-0 shadow-sm" style="border-radius: 18px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.7rem; letter-spacing: 0.05em;">Live Showcase</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #059669;"><?php echo isset($stats['active']) ? number_format($stats['active']) : '0'; ?></h3>
                    </div>
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: #d1fae5; color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2 col-6" style="flex: 1;">
            <div class="card border-0 shadow-sm" style="border-radius: 18px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.7rem; letter-spacing: 0.05em;">Expired</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #64748b;"><?php echo isset($stats['expired']) ? number_format($stats['expired']) : '0'; ?></h3>
                    </div>
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: #f1f5f9; color: #64748b; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2 col-6" style="flex: 1;">
            <div class="card border-0 shadow-sm" style="border-radius: 18px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.7rem; letter-spacing: 0.05em;">Rejected</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #e11d48;"><?php echo isset($stats['rejected']) ? number_format($stats['rejected']) : '0'; ?></h3>
                    </div>
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: #ffe4e6; color: #e11d48; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 18px; border: 1px solid #e2e8f0; background: #ffffff;">
        <div class="card-body p-3.5">
            <form method="GET" action="<?php echo site_url('admin/manage_products'); ?>" class="row g-2 align-items-center">
                <!-- Status Pills -->
                <div class="col-lg-6 col-12 d-flex flex-wrap gap-1.5 align-items-center">
                    <span class="fw-bold text-muted me-1" style="font-size: 0.8rem; text-transform: uppercase;">Status:</span>
                    <a href="<?php echo site_url('admin/manage_products'); ?>" class="btn btn-sm <?php echo ($current_filter == 'All') ? 'btn-dark' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">All (<?php echo isset($stats['total']) ? $stats['total'] : 0; ?>)</a>
                    <a href="<?php echo site_url('admin/manage_products?status=pending'); ?>" class="btn btn-sm <?php echo ($current_filter == 'pending') ? 'btn-warning text-dark' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">
                        ⏳ Pending (<?php echo isset($stats['pending']) ? $stats['pending'] : 0; ?>)
                    </a>
                    <a href="<?php echo site_url('admin/manage_products?status=approved'); ?>" class="btn btn-sm <?php echo ($current_filter == 'approved') ? 'btn-success' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">
                        🟢 Live (<?php echo isset($stats['active']) ? $stats['active'] : 0; ?>)
                    </a>
                    <a href="<?php echo site_url('admin/manage_products?status=expired'); ?>" class="btn btn-sm <?php echo ($current_filter == 'expired') ? 'btn-secondary' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">
                        ⏱️ Expired (<?php echo isset($stats['expired']) ? $stats['expired'] : 0; ?>)
                    </a>
                    <a href="<?php echo site_url('admin/manage_products?status=rejected'); ?>" class="btn btn-sm <?php echo ($current_filter == 'rejected') ? 'btn-danger' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">
                        ❌ Rejected (<?php echo isset($stats['rejected']) ? $stats['rejected'] : 0; ?>)
                    </a>
                </div>

                <!-- Search Input & Dates -->
                <div class="col-lg-6 col-12">
                    <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                        <div class="input-group" style="max-width: 260px;">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;"><i class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" name="search" class="form-control border-start-0" placeholder="Search title, donor, city..." value="<?php echo htmlspecialchars($search ?? ''); ?>" style="border-radius: 0 10px 10px 0; font-size: 0.88rem;">
                        </div>
                        <?php if(!empty($current_filter) && $current_filter !== 'All'): ?>
                            <input type="hidden" name="status" value="<?php echo htmlspecialchars($current_filter); ?>">
                        <?php endif; ?>
                        <button type="submit" class="btn btn-dark btn-sm px-3" style="border-radius: 10px; font-weight: 600;">Filter</button>
                        <?php if (!empty($search) || !empty($date_from) || !empty($date_to) || ($current_filter !== 'All')): ?>
                            <a href="<?php echo site_url('admin/manage_products'); ?>" class="btn btn-outline-danger btn-sm" style="border-radius: 10px;" title="Reset Filters"><i class="fa-solid fa-rotate-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Listings Table Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 20px; border: 1px solid #e2e8f0; background: #ffffff; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.88rem;">
                <thead style="background: #f1f5f9; color: #475569; font-weight: 700; text-transform: uppercase; font-size: 0.74rem; letter-spacing: 0.04em;">
                    <tr>
                        <th style="padding: 1rem 1.25rem;">Item / Photo</th>
                        <th>Category & Condition</th>
                        <th>Donor / Seller Info</th>
                        <th>Showcase Duration</th>
                        <th>Status</th>
                        <th>Submitted On</th>
                        <th class="text-end" style="padding-right: 1.25rem;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $p): ?>
                            <?php 
                                $status_badge = 'bg-secondary';
                                $status_text = ucfirst($p['status']);
                                if ($p['status'] === 'approved') {
                                    $status_badge = 'bg-success';
                                    $status_text = 'Live / Active';
                                } elseif ($p['status'] === 'pending') {
                                    $status_badge = 'bg-warning text-dark';
                                    $status_text = 'Pending Review';
                                } elseif ($p['status'] === 'expired') {
                                    $status_badge = 'bg-secondary';
                                    $status_text = 'Expired';
                                } elseif ($p['status'] === 'rejected') {
                                    $status_badge = 'bg-danger';
                                    $status_text = 'Rejected';
                                }

                                $img_src = !empty($p['image']) ? base_url('uploads/products/' . $p['image']) : base_url('assets/images/logo.png');
                                $phone_clean = preg_replace('/[^0-9]/', '', $p['seller_phone'] ?? '');
                                if (strlen($phone_clean) == 10) { $phone_clean = '91' . $phone_clean; }
                            ?>
                            <tr>
                                <td style="padding: 1rem 1.25rem;">
                                    <div class="d-flex align-items-center gap-2.5">
                                        <div style="width: 52px; height: 52px; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; flex-shrink: 0; background: #f8fafc; display: flex; align-items: center; justify-content: center;">
                                            <img src="<?php echo $img_src; ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='<?php echo base_url('assets/images/logo.png'); ?>';">
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark" style="font-size: 0.92rem; line-height: 1.35;"><?php echo htmlspecialchars($p['title']); ?></div>
                                            <span class="text-muted" style="font-size: 0.75rem;">ID: #<?php echo $p['id']; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge" style="background: #e0f2fe; color: #0369a1; border-radius: 6px; font-weight: 700; font-size: 0.72rem;">
                                        <?php echo htmlspecialchars($p['category']); ?>
                                    </span>
                                    <div class="mt-1">
                                        <span class="badge" style="background: #f1f5f9; color: #475569; border-radius: 6px; font-size: 0.7rem; font-weight: 600;">
                                            Condition: <?php echo htmlspecialchars($p['condition_type'] ?? 'Good'); ?>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark"><?php echo htmlspecialchars($p['seller_name']); ?></div>
                                    <div class="d-flex align-items-center gap-2 mt-0.5">
                                        <span class="text-muted" style="font-size: 0.8rem;"><?php echo htmlspecialchars($p['seller_phone']); ?></span>
                                        <?php if (!empty($phone_clean)): ?>
                                            <a href="https://wa.me/<?php echo $phone_clean; ?>?text=<?php echo urlencode('Hello ' . $p['seller_name'] . ', regarding your donated item on Sindhikum Samugam: ' . $p['title']); ?>" target="_blank" class="badge bg-success text-white text-decoration-none" style="padding: 2px 6px; font-size: 0.68rem;" title="Chat on WhatsApp">
                                                <i class="fa-brands fa-whatsapp"></i> Chat
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($p['seller_city'])): ?>
                                        <div class="text-muted" style="font-size: 0.75rem;"><i class="fa-solid fa-location-dot me-1"></i> <?php echo htmlspecialchars($p['seller_city']); ?></div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-1.5">
                                        <i class="fa-regular fa-clock text-primary"></i>
                                        <span class="fw-bold"><?php echo htmlspecialchars($p['duration_hours'] ?? 72); ?> Hours</span>
                                    </div>
                                    <?php if ($p['status'] === 'approved' && !empty($p['expires_at'])): ?>
                                        <?php 
                                            $remaining_secs = strtotime($p['expires_at']) - time();
                                            if ($remaining_secs > 0) {
                                                $hrs_left = floor($remaining_secs / 3600);
                                                $mins_left = floor(($remaining_secs % 3600) / 60);
                                                echo '<span class="badge bg-success-subtle text-success border border-success-subtle mt-1" style="font-size: 0.7rem;">⏳ ' . $hrs_left . 'h ' . $mins_left . 'm left</span>';
                                            } else {
                                                echo '<span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle mt-1" style="font-size: 0.7rem;">Expired</span>';
                                            }
                                        ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge <?php echo $status_badge; ?>" style="font-size: 0.78rem; font-weight: 700; padding: 0.35rem 0.65rem; border-radius: 8px;">
                                        <?php echo $status_text; ?>
                                    </span>
                                    <?php if ($p['status'] === 'rejected' && !empty($p['rejection_reason'])): ?>
                                        <div class="text-danger mt-1" style="font-size: 0.72rem;" title="<?php echo htmlspecialchars($p['rejection_reason']); ?>">
                                            Reason: <?php echo htmlspecialchars(mb_strimwidth($p['rejection_reason'], 0, 25, '...')); ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="text-muted" style="font-size: 0.8rem;">
                                        <?php echo date('d M Y, h:i A', strtotime($p['created_at'])); ?>
                                    </span>
                                </td>
                                <td class="text-end" style="padding-right: 1.25rem;">
                                    <div class="d-flex justify-content-end align-items-center gap-1.5">
                                        <!-- Quick Approve if Pending -->
                                        <?php if ($p['status'] === 'pending' || $p['status'] === 'expired'): ?>
                                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#approveModal_<?php echo $p['id']; ?>" title="Approve & Go Live" style="border-radius: 8px; font-weight: 700; font-size: 0.78rem; padding: 0.35rem 0.75rem;">
                                                <i class="fa-solid fa-check me-1"></i> Approve
                                            </button>
                                        <?php endif; ?>

                                        <?php if ($p['status'] === 'pending'): ?>
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#rejectModal_<?php echo $p['id']; ?>" title="Reject Listing" style="border-radius: 8px; font-weight: 600; font-size: 0.78rem; padding: 0.35rem 0.75rem;">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        <?php endif; ?>

                                        <!-- View Details Modal Trigger -->
                                        <button type="button" class="btn btn-sm btn-light border" data-bs-toggle="modal" data-bs-target="#viewModal_<?php echo $p['id']; ?>" title="View Full Details" style="border-radius: 8px; font-size: 0.8rem; padding: 0.35rem 0.65rem;">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>

                                        <!-- Delete Trigger -->
                                        <a href="<?php echo site_url('admin/delete_product/' . $p['id']); ?>" onclick="return confirm('Are you sure you want to delete listing #<?php echo $p['id']; ?> (<?php echo htmlspecialchars(addslashes($p['title'])); ?>)?');" class="btn btn-sm btn-outline-danger" title="Delete Listing" style="border-radius: 8px; font-size: 0.8rem; padding: 0.35rem 0.65rem;">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>

                                    <!-- Approve Modal -->
                                    <div class="modal fade text-start" id="approveModal_<?php echo $p['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow" style="border-radius: 20px;">
                                                <form method="POST" action="<?php echo site_url('admin/approve_product/' . $p['id']); ?>">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-bold text-dark"><i class="fa-solid fa-circle-check text-success me-2"></i> Approve & Publish Item</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body py-3">
                                                        <p class="text-muted" style="font-size: 0.9rem;">
                                                            You are approving <strong><?php echo htmlspecialchars($p['title']); ?></strong> to appear on the public educational items portal. The live countdown will begin immediately.
                                                        </p>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold text-secondary" style="font-size: 0.82rem; text-transform: uppercase;">Showcase Time Limit</label>
                                                            <select name="duration_hours" class="form-select" style="border-radius: 10px; font-weight: 600;">
                                                                <option value="24" <?php echo ($p['duration_hours'] == 24) ? 'selected' : ''; ?>>24 Hours (1 Day)</option>
                                                                <option value="48" <?php echo ($p['duration_hours'] == 48) ? 'selected' : ''; ?>>48 Hours (2 Days)</option>
                                                                <option value="72" <?php echo ($p['duration_hours'] == 72 || empty($p['duration_hours'])) ? 'selected' : ''; ?>>72 Hours (3 Days - Standard)</option>
                                                                <option value="120" <?php echo ($p['duration_hours'] == 120) ? 'selected' : ''; ?>>120 Hours (5 Days)</option>
                                                                <option value="168" <?php echo ($p['duration_hours'] == 168) ? 'selected' : ''; ?>>168 Hours (7 Days)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0 pt-0">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="border-radius: 10px;">Cancel</button>
                                                        <button type="submit" class="btn btn-success fw-bold" style="border-radius: 10px; background: linear-gradient(135deg, #059669, #047857); border: none;">
                                                            Confirm & Make Live 🚀
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reject Modal -->
                                    <div class="modal fade text-start" id="rejectModal_<?php echo $p['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow" style="border-radius: 20px;">
                                                <form method="POST" action="<?php echo site_url('admin/reject_product/' . $p['id']); ?>">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-bold text-danger"><i class="fa-solid fa-circle-xmark me-2"></i> Reject Item Listing</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body py-3">
                                                        <p class="text-muted" style="font-size: 0.9rem;">
                                                            Provide a reason for rejecting <strong><?php echo htmlspecialchars($p['title']); ?></strong>:
                                                        </p>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold text-secondary" style="font-size: 0.82rem; text-transform: uppercase;">Rejection Reason</label>
                                                            <textarea name="rejection_reason" class="form-control" rows="3" placeholder="e.g. Inappropriate item, missing verification details, or not suitable for students." style="border-radius: 10px;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0 pt-0">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="border-radius: 10px;">Cancel</button>
                                                        <button type="submit" class="btn btn-danger fw-bold" style="border-radius: 10px;">Confirm Rejection</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- View Details Modal -->
                                    <div class="modal fade text-start" id="viewModal_<?php echo $p['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content border-0 shadow" style="border-radius: 24px;">
                                                <div class="modal-header border-0 pb-0">
                                                    <div>
                                                        <span class="badge <?php echo $status_badge; ?> mb-1"><?php echo $status_text; ?></span>
                                                        <h5 class="modal-title fw-bold text-dark"><?php echo htmlspecialchars($p['title']); ?></h5>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body py-3">
                                                    <div class="row g-4">
                                                        <div class="col-md-5">
                                                            <div style="border-radius: 16px; overflow: hidden; border: 1px solid #e2e8f0; background: #f8fafc; height: 260px; display: flex; align-items: center; justify-content: center;">
                                                                <img src="<?php echo $img_src; ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                                            </div>
                                                            <div class="mt-3 p-3" style="background: #f8fafc; border-radius: 14px; border: 1px solid #e2e8f0;">
                                                                <div class="fw-bold text-dark mb-1" style="font-size: 0.85rem;"><i class="fa-solid fa-user-circle text-primary me-1"></i> Donor Information</div>
                                                                <div style="font-size: 0.84rem;"><strong>Name:</strong> <?php echo htmlspecialchars($p['seller_name']); ?></div>
                                                                <div style="font-size: 0.84rem;"><strong>Phone:</strong> <?php echo htmlspecialchars($p['seller_phone']); ?></div>
                                                                <?php if (!empty($p['seller_email'])): ?>
                                                                    <div style="font-size: 0.84rem;"><strong>Email:</strong> <?php echo htmlspecialchars($p['seller_email']); ?></div>
                                                                <?php endif; ?>
                                                                <?php if (!empty($p['seller_city'])): ?>
                                                                    <div style="font-size: 0.84rem;"><strong>City:</strong> <?php echo htmlspecialchars($p['seller_city']); ?></div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="row g-2 mb-3">
                                                                <div class="col-6">
                                                                    <div class="p-2.5 bg-light rounded-3">
                                                                        <div class="text-muted text-uppercase fw-bold" style="font-size: 0.68rem;">Category</div>
                                                                        <div class="fw-bold text-dark" style="font-size: 0.85rem;"><?php echo htmlspecialchars($p['category']); ?></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="p-2.5 bg-light rounded-3">
                                                                        <div class="text-muted text-uppercase fw-bold" style="font-size: 0.68rem;">Condition</div>
                                                                        <div class="fw-bold text-dark" style="font-size: 0.85rem;"><?php echo htmlspecialchars($p['condition_type'] ?? 'Good'); ?></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="p-2.5 bg-light rounded-3">
                                                                        <div class="text-muted text-uppercase fw-bold" style="font-size: 0.68rem;">Time Limit</div>
                                                                        <div class="fw-bold text-dark" style="font-size: 0.85rem;"><?php echo htmlspecialchars($p['duration_hours'] ?? 72); ?> Hours</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="p-2.5 bg-light rounded-3">
                                                                        <div class="text-muted text-uppercase fw-bold" style="font-size: 0.68rem;">Submitted Date</div>
                                                                        <div class="fw-bold text-dark" style="font-size: 0.85rem;"><?php echo date('d M Y, h:i A', strtotime($p['created_at'])); ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="fw-bold text-secondary text-uppercase mb-1" style="font-size: 0.75rem;">Description & Details</label>
                                                                <div class="p-3 bg-light rounded-3" style="font-size: 0.88rem; line-height: 1.6; max-height: 140px; overflow-y: auto;">
                                                                    <?php echo nl2br(htmlspecialchars($p['description'])); ?>
                                                                </div>
                                                            </div>

                                                            <?php if (!empty($p['rejection_reason'])): ?>
                                                                <div class="alert alert-danger p-2.5" style="border-radius: 10px; font-size: 0.82rem;">
                                                                    <strong>Rejection Reason:</strong> <?php echo htmlspecialchars($p['rejection_reason']); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 10px;">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div style="font-size: 3rem; opacity: 0.4;">📦</div>
                                <h5 class="fw-bold mt-2 text-dark">No Product Listings Found</h5>
                                <p class="text-muted mb-0" style="font-size: 0.88rem;">There are no items matching your active filter criteria.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add New Product Modal (Form 1 Mirror for Admin) -->
<div class="modal fade" id="addNewProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 24px;">
            <form method="POST" action="<?php echo site_url('admin/add_product_admin'); ?>" enctype="multipart/form-data">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h4 class="modal-title fw-bold text-dark">
                            <i class="fa-solid fa-box-open text-success me-2"></i> Add Educational Item Listing
                        </h4>
                        <p class="text-muted mb-0" style="font-size: 0.85rem;">Create a donated educational item directly as an administrator.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body py-3">
                    <div class="alert alert-info border-0 d-flex align-items-center gap-2 mb-3" style="border-radius: 12px; background: #e0f2fe; color: #0369a1; font-size: 0.85rem;">
                        <i class="fa-solid fa-shield-halved fa-lg"></i>
                        <span>Admin listings can be set directly to <strong>Live / Approved</strong> with automatic countdown timer.</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Product Name / Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" required class="form-control" placeholder="e.g. Oxford English Dictionary / Casio Calculator" style="border-radius: 10px;">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Category <span class="text-danger">*</span></label>
                            <select name="category" required class="form-select" style="border-radius: 10px;">
                                <option value="Books & Study Materials">Books & Study Materials</option>
                                <option value="Laptops & Gadgets">Laptops & Gadgets</option>
                                <option value="Uniforms & Lab Coats">Uniforms & Lab Coats</option>
                                <option value="Stationery & Engineering Tools">Stationery & Tools</option>
                                <option value="Transport & Cycles">Transport & Cycles</option>
                                <option value="Other Essentials">Other Essentials</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Condition <span class="text-danger">*</span></label>
                            <select name="condition_type" class="form-select" style="border-radius: 10px;">
                                <option value="Like New">Like New</option>
                                <option value="Good" selected>Good</option>
                                <option value="Fair">Fair</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Showcase Time Limit <span class="text-danger">*</span></label>
                            <select name="duration_hours" class="form-select" style="border-radius: 10px;">
                                <option value="24">24 Hours (1 Day)</option>
                                <option value="48">48 Hours (2 Days)</option>
                                <option value="72" selected>72 Hours (3 Days - Recommended)</option>
                                <option value="120">120 Hours (5 Days)</option>
                                <option value="168">168 Hours (7 Days)</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Initial Status</label>
                            <select name="status" class="form-select" style="border-radius: 10px;">
                                <option value="approved" selected>🟢 Live / Approved Immediately</option>
                                <option value="pending">⏳ Pending Review</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Donor Name <span class="text-danger">*</span></label>
                            <input type="text" name="seller_name" required class="form-control" placeholder="e.g. Sindhikum Samugam Trust" style="border-radius: 10px;">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">WhatsApp / Mobile Phone <span class="text-danger">*</span></label>
                            <input type="text" name="seller_phone" required class="form-control" placeholder="e.g. 9841234567" style="border-radius: 10px;">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Location / City</label>
                            <input type="text" name="seller_city" class="form-control" placeholder="e.g. Tirunelveli / Chennai" style="border-radius: 10px;">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Email Address (Optional)</label>
                            <input type="email" name="seller_email" class="form-control" placeholder="donor@example.com" style="border-radius: 10px;">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Product Photo (JPG/PNG, max 5MB)</label>
                            <input type="file" name="product_image" accept="image/*" class="form-control" style="border-radius: 10px;">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Description & Details <span class="text-danger">*</span></label>
                            <textarea name="description" required rows="4" class="form-control" placeholder="Describe the item condition, textbooks editions, accessories included, and who it helps best..." style="border-radius: 10px;"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="border-radius: 10px;">Cancel</button>
                    <button type="submit" class="btn btn-success fw-bold px-4" style="border-radius: 10px; background: linear-gradient(135deg, #059669, #047857); border: none;">
                        <i class="fa-solid fa-cloud-arrow-up me-1.5"></i> Publish Listing 🚀
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
