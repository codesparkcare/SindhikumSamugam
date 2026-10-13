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
            <h3 class="fw-extrabold mb-1" style="color: #0f172a; letter-spacing: -0.02em;">Student Product Applications</h3>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                Review student applications for donated educational items, verify academic needs, and allocate items.
            </p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="<?php echo site_url('products'); ?>" target="_blank" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-1.5" style="border-radius: 10px; font-weight: 600; padding: 0.55rem 0.95rem;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Public Portal
            </a>
            <a href="<?php echo site_url('admin/export_product_applications_excel?status=' . urlencode($current_filter) . '&date_from=' . urlencode($date_from ?? '') . '&date_to=' . urlencode($date_to ?? '')); ?>" class="btn btn-outline-success btn-sm d-flex align-items-center gap-1.5" style="border-radius: 10px; font-weight: 600; padding: 0.55rem 0.95rem;">
                <i class="fa-solid fa-file-excel"></i> Export CSV
            </a>
        </div>
    </div>

    <!-- 5 High-Level Metric Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-2 col-6" style="flex: 1;">
            <div class="card border-0 shadow-sm" style="border-radius: 18px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.7rem; letter-spacing: 0.05em;">Total Requests</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #0f172a;"><?php echo isset($stats['total']) ? number_format($stats['total']) : '0'; ?></h3>
                    </div>
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: #e0e7ff; color: #4338ca; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-clipboard-list"></i>
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
                        <i class="fa-solid fa-clock"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2 col-6" style="flex: 1;">
            <div class="card border-0 shadow-sm" style="border-radius: 18px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.7rem; letter-spacing: 0.05em;">Approved Aid</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #059669;"><?php echo isset($stats['approved']) ? number_format($stats['approved']) : '0'; ?></h3>
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
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.7rem; letter-spacing: 0.05em;">Handed Over</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #0284c7;"><?php echo isset($stats['delivered']) ? number_format($stats['delivered']) : '0'; ?></h3>
                    </div>
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        <i class="fa-solid fa-gift"></i>
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
            <form method="GET" action="<?php echo site_url('admin/product_applications'); ?>" class="row g-2 align-items-center">
                <!-- Status Pills -->
                <div class="col-lg-6 col-12 d-flex flex-wrap gap-1.5 align-items-center">
                    <span class="fw-bold text-muted me-1" style="font-size: 0.8rem; text-transform: uppercase;">Status:</span>
                    <a href="<?php echo site_url('admin/product_applications'); ?>" class="btn btn-sm <?php echo ($current_filter == 'All') ? 'btn-dark' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">All (<?php echo isset($stats['total']) ? $stats['total'] : 0; ?>)</a>
                    <a href="<?php echo site_url('admin/product_applications?status=Pending'); ?>" class="btn btn-sm <?php echo ($current_filter == 'Pending') ? 'btn-warning text-dark' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">
                        ⏳ Pending (<?php echo isset($stats['pending']) ? $stats['pending'] : 0; ?>)
                    </a>
                    <a href="<?php echo site_url('admin/product_applications?status=Approved'); ?>" class="btn btn-sm <?php echo ($current_filter == 'Approved') ? 'btn-success' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">
                        🟢 Approved (<?php echo isset($stats['approved']) ? $stats['approved'] : 0; ?>)
                    </a>
                    <a href="<?php echo site_url('admin/product_applications?status=Delivered'); ?>" class="btn btn-sm <?php echo ($current_filter == 'Delivered') ? 'btn-info text-white' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">
                        🎁 Delivered (<?php echo isset($stats['delivered']) ? $stats['delivered'] : 0; ?>)
                    </a>
                    <a href="<?php echo site_url('admin/product_applications?status=Rejected'); ?>" class="btn btn-sm <?php echo ($current_filter == 'Rejected') ? 'btn-danger' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">
                        ❌ Rejected (<?php echo isset($stats['rejected']) ? $stats['rejected'] : 0; ?>)
                    </a>
                </div>

                <!-- Search Input & Filters -->
                <div class="col-lg-6 col-12">
                    <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                        <div class="input-group" style="max-width: 280px;">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;"><i class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" name="search" class="form-control border-start-0" placeholder="Search student, item, school..." value="<?php echo htmlspecialchars($search ?? ''); ?>" style="border-radius: 0 10px 10px 0; font-size: 0.88rem;">
                        </div>
                        <?php if(!empty($current_filter) && $current_filter !== 'All'): ?>
                            <input type="hidden" name="status" value="<?php echo htmlspecialchars($current_filter); ?>">
                        <?php endif; ?>
                        <button type="submit" class="btn btn-dark btn-sm px-3" style="border-radius: 10px; font-weight: 600;">Filter</button>
                        <?php if (!empty($search) || !empty($date_from) || !empty($date_to) || ($current_filter !== 'All')): ?>
                            <a href="<?php echo site_url('admin/product_applications'); ?>" class="btn btn-outline-danger btn-sm" style="border-radius: 10px;" title="Reset Filters"><i class="fa-solid fa-rotate-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Applications Table Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 20px; border: 1px solid #e2e8f0; background: #ffffff; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.88rem;">
                <thead style="background: #f1f5f9; color: #475569; font-weight: 700; text-transform: uppercase; font-size: 0.74rem; letter-spacing: 0.04em;">
                    <tr>
                        <th style="padding: 1rem 1.25rem;">Ref / Date</th>
                        <th>Student / Contact</th>
                        <th>Requested Item</th>
                        <th>Academic Details</th>
                        <th>Delivery City & Address</th>
                        <th>Reason for Need</th>
                        <th>Status</th>
                        <th class="text-end" style="padding-right: 1.25rem;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($applications)): ?>
                        <?php foreach ($applications as $app): ?>
                            <?php 
                                $status_badge = 'bg-secondary';
                                if ($app['status'] === 'Approved') {
                                    $status_badge = 'bg-success';
                                } elseif ($app['status'] === 'Pending') {
                                    $status_badge = 'bg-warning text-dark';
                                } elseif ($app['status'] === 'Delivered' || $app['status'] === 'Completed') {
                                    $status_badge = 'bg-info text-white';
                                } elseif ($app['status'] === 'Rejected') {
                                    $status_badge = 'bg-danger';
                                }

                                $phone_clean = preg_replace('/[^0-9]/', '', $app['applicant_phone'] ?? '');
                                if (strlen($phone_clean) == 10) { $phone_clean = '91' . $phone_clean; }
                            ?>
                            <tr>
                                <td style="padding: 1rem 1.25rem;">
                                    <div class="fw-bold text-dark">#APP-<?php echo str_pad($app['id'], 4, '0', STR_PAD_LEFT); ?></div>
                                    <span class="text-muted" style="font-size: 0.75rem;">
                                        <?php echo date('d M Y, h:i A', strtotime($app['created_at'])); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark" style="font-size: 0.92rem;"><?php echo htmlspecialchars($app['applicant_name']); ?></div>
                                    <div class="d-flex align-items-center gap-2 mt-0.5">
                                        <span class="text-muted" style="font-size: 0.8rem;"><?php echo htmlspecialchars($app['applicant_phone']); ?></span>
                                        <?php if (!empty($phone_clean)): ?>
                                            <a href="https://wa.me/<?php echo $phone_clean; ?>?text=<?php echo urlencode('Hello ' . $app['applicant_name'] . ', regarding your application for the educational item "' . $app['product_title'] . '" on Sindhikum Samugam:'); ?>" target="_blank" class="badge bg-success text-white text-decoration-none" style="padding: 2px 6px; font-size: 0.68rem;" title="Chat with Student on WhatsApp">
                                                <i class="fa-brands fa-whatsapp"></i> Chat
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($app['applicant_email'])): ?>
                                        <div class="text-muted" style="font-size: 0.75rem;"><?php echo htmlspecialchars($app['applicant_email']); ?></div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="badge" style="background: #e0f2fe; color: #0369a1; border-radius: 8px; font-weight: 700; font-size: 0.78rem; max-width: 180px; white-space: normal; text-align: left; line-height: 1.35;">
                                        <i class="fa-solid fa-box me-1"></i> <?php echo htmlspecialchars($app['product_title']); ?>
                                    </div>
                                    <div class="text-muted mt-0.5" style="font-size: 0.7rem;">Item ID: #<?php echo $app['product_id']; ?></div>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark" style="font-size: 0.84rem;">
                                        <?php echo !empty($app['institution']) ? htmlspecialchars($app['institution']) : '<span class="text-muted">Not specified</span>'; ?>
                                    </div>
                                    <?php if (!empty($app['course_year'])): ?>
                                        <div class="text-muted" style="font-size: 0.78rem;"><?php echo htmlspecialchars($app['course_year']); ?></div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="text-dark" style="font-size: 0.84rem; max-width: 180px;">
                                        <?php echo !empty($app['address']) ? htmlspecialchars(mb_strimwidth($app['address'], 0, 45, '...')) : '<span class="text-muted">-</span>'; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-muted" style="font-size: 0.82rem; max-width: 180px; line-height: 1.4;">
                                        <?php echo !empty($app['reason']) ? htmlspecialchars(mb_strimwidth($app['reason'], 0, 50, '...')) : '<span class="text-muted">-</span>'; ?>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge <?php echo $status_badge; ?>" style="font-size: 0.78rem; font-weight: 700; padding: 0.35rem 0.65rem; border-radius: 8px;">
                                        <?php echo htmlspecialchars($app['status']); ?>
                                    </span>
                                    <?php if (!empty($app['admin_notes'])): ?>
                                        <div class="text-secondary mt-1" style="font-size: 0.7rem;" title="<?php echo htmlspecialchars($app['admin_notes']); ?>">
                                            Notes: <?php echo htmlspecialchars(mb_strimwidth($app['admin_notes'], 0, 20, '...')); ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end" style="padding-right: 1.25rem;">
                                    <div class="d-flex justify-content-end align-items-center gap-1.5">
                                        <!-- Update Status Trigger -->
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#statusModal_<?php echo $app['id']; ?>" title="Update Application Status" style="border-radius: 8px; font-weight: 600; font-size: 0.78rem; padding: 0.35rem 0.75rem; background: linear-gradient(135deg, #6366f1, #4f46e5); border: none;">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Status
                                        </button>

                                        <!-- View Dossier Trigger -->
                                        <button type="button" class="btn btn-sm btn-light border" data-bs-toggle="modal" data-bs-target="#viewAppModal_<?php echo $app['id']; ?>" title="View Full Application" style="border-radius: 8px; font-size: 0.8rem; padding: 0.35rem 0.65rem;">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>

                                        <!-- Delete Trigger -->
                                        <a href="<?php echo site_url('admin/delete_product_application/' . $app['id']); ?>" onclick="return confirm('Are you sure you want to delete application #<?php echo $app['id']; ?> from <?php echo htmlspecialchars(addslashes($app['applicant_name'])); ?>?');" class="btn btn-sm btn-outline-danger" title="Delete Application" style="border-radius: 8px; font-size: 0.8rem; padding: 0.35rem 0.65rem;">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>

                                    <!-- Status Update Modal -->
                                    <div class="modal fade text-start" id="statusModal_<?php echo $app['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow" style="border-radius: 20px;">
                                                <form method="POST" action="<?php echo site_url('admin/update_product_application_status'); ?>">
                                                    <input type="hidden" name="id" value="<?php echo $app['id']; ?>">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-bold text-dark"><i class="fa-solid fa-pen-to-square text-primary me-2"></i> Update Application Status</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body py-3">
                                                        <p class="text-muted" style="font-size: 0.88rem;">
                                                            Applicant: <strong><?php echo htmlspecialchars($app['applicant_name']); ?></strong> for item <strong>"<?php echo htmlspecialchars($app['product_title']); ?>"</strong>
                                                        </p>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold text-secondary" style="font-size: 0.82rem; text-transform: uppercase;">Application Status</label>
                                                            <select name="status" class="form-select" style="border-radius: 10px; font-weight: 600;">
                                                                <option value="Pending" <?php echo ($app['status'] == 'Pending') ? 'selected' : ''; ?>>⏳ Pending Verification</option>
                                                                <option value="Approved" <?php echo ($app['status'] == 'Approved') ? 'selected' : ''; ?>>🟢 Approved - Item Allocated</option>
                                                                <option value="Delivered" <?php echo ($app['status'] == 'Delivered') ? 'selected' : ''; ?>>🎁 Delivered / Handed Over</option>
                                                                <option value="Rejected" <?php echo ($app['status'] == 'Rejected') ? 'selected' : ''; ?>>❌ Rejected</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold text-secondary" style="font-size: 0.82rem; text-transform: uppercase;">Trustee Admin Notes</label>
                                                            <textarea name="admin_notes" class="form-control" rows="3" placeholder="Add internal verification remarks, dispatch tracking number, or reason..." style="border-radius: 10px;"><?php echo htmlspecialchars($app['admin_notes'] ?? ''); ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0 pt-0">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="border-radius: 10px;">Cancel</button>
                                                        <button type="submit" class="btn btn-primary fw-bold" style="border-radius: 10px; background: linear-gradient(135deg, #6366f1, #4f46e5); border: none;">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- View Student Application Dossier Modal -->
                                    <div class="modal fade text-start" id="viewAppModal_<?php echo $app['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content border-0 shadow" style="border-radius: 24px;">
                                                <div class="modal-header border-0 pb-0">
                                                    <div>
                                                        <span class="badge <?php echo $status_badge; ?> mb-1"><?php echo htmlspecialchars($app['status']); ?></span>
                                                        <h5 class="modal-title fw-bold text-dark">Application #APP-<?php echo str_pad($app['id'], 4, '0', STR_PAD_LEFT); ?></h5>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body py-3">
                                                    <div class="row g-3">
                                                        <!-- Student Card -->
                                                        <div class="col-md-6">
                                                            <div class="p-3 rounded-4" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                                                <div class="fw-bold text-dark mb-2" style="font-size: 0.88rem;">
                                                                    <i class="fa-solid fa-user-graduate text-primary me-1.5"></i> Student Details
                                                                </div>
                                                                <div class="mb-1" style="font-size: 0.84rem;"><strong>Name:</strong> <?php echo htmlspecialchars($app['applicant_name']); ?></div>
                                                                <div class="mb-1" style="font-size: 0.84rem;"><strong>Phone:</strong> <?php echo htmlspecialchars($app['applicant_phone']); ?></div>
                                                                <?php if (!empty($app['applicant_email'])): ?>
                                                                    <div class="mb-1" style="font-size: 0.84rem;"><strong>Email:</strong> <?php echo htmlspecialchars($app['applicant_email']); ?></div>
                                                                <?php endif; ?>
                                                                <div class="mt-2">
                                                                    <?php if (!empty($phone_clean)): ?>
                                                                        <a href="https://wa.me/<?php echo $phone_clean; ?>" target="_blank" class="btn btn-sm btn-success fw-bold" style="border-radius: 8px; font-size: 0.78rem;">
                                                                            <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp Message
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Academic Card -->
                                                        <div class="col-md-6">
                                                            <div class="p-3 rounded-4" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                                                <div class="fw-bold text-dark mb-2" style="font-size: 0.88rem;">
                                                                    <i class="fa-solid fa-school text-primary me-1.5"></i> Academic Credentials
                                                                </div>
                                                                <div class="mb-1" style="font-size: 0.84rem;"><strong>Institution:</strong> <?php echo htmlspecialchars($app['institution'] ?? 'Not specified'); ?></div>
                                                                <div class="mb-1" style="font-size: 0.84rem;"><strong>Course / Grade:</strong> <?php echo htmlspecialchars($app['course_year'] ?? 'Not specified'); ?></div>
                                                                <div class="mb-1" style="font-size: 0.84rem;"><strong>Date Applied:</strong> <?php echo date('d M Y, h:i A', strtotime($app['created_at'])); ?></div>
                                                            </div>
                                                        </div>

                                                        <!-- Requested Item Card -->
                                                        <div class="col-12">
                                                            <div class="p-3 rounded-4" style="background: #eff6ff; border: 1px solid #bfdbfe;">
                                                                <div class="fw-bold text-primary mb-1" style="font-size: 0.88rem;">
                                                                    <i class="fa-solid fa-box text-primary me-1.5"></i> Requested Educational Item
                                                                </div>
                                                                <div class="fw-bold text-dark" style="font-size: 1rem;"><?php echo htmlspecialchars($app['product_title']); ?></div>
                                                                <div class="text-muted" style="font-size: 0.78rem;">Listing ID: #<?php echo $app['product_id']; ?></div>
                                                            </div>
                                                        </div>

                                                        <!-- Delivery Address -->
                                                        <div class="col-12">
                                                            <label class="fw-bold text-secondary text-uppercase mb-1" style="font-size: 0.75rem;">Delivery Address / City</label>
                                                            <div class="p-3 bg-light rounded-3" style="font-size: 0.88rem;">
                                                                <?php echo nl2br(htmlspecialchars($app['address'] ?? 'No address provided.')); ?>
                                                            </div>
                                                        </div>

                                                        <!-- Statement of Need -->
                                                        <div class="col-12">
                                                            <label class="fw-bold text-secondary text-uppercase mb-1" style="font-size: 0.75rem;">Why the student needs this item (Statement of Need)</label>
                                                            <div class="p-3 bg-light rounded-3" style="font-size: 0.88rem; line-height: 1.6;">
                                                                <?php echo nl2br(htmlspecialchars($app['reason'] ?? 'No explanation provided.')); ?>
                                                            </div>
                                                        </div>

                                                        <!-- Trustee Admin Notes -->
                                                        <?php if (!empty($app['admin_notes'])): ?>
                                                            <div class="col-12">
                                                                <label class="fw-bold text-secondary text-uppercase mb-1" style="font-size: 0.75rem;">Trustee Review Notes</label>
                                                                <div class="p-3 bg-warning-subtle text-dark rounded-3" style="font-size: 0.88rem;">
                                                                    <?php echo nl2br(htmlspecialchars($app['admin_notes'])); ?>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
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
                            <td colspan="8" class="text-center py-5">
                                <div style="font-size: 3rem; opacity: 0.4;">📋</div>
                                <h5 class="fw-bold mt-2 text-dark">No Product Applications Found</h5>
                                <p class="text-muted mb-0" style="font-size: 0.88rem;">There are no student item requests matching your filter criteria.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
