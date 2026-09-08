<div class="container-fluid py-4">
    <!-- Header Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-extrabold mb-1" style="color: #0f172a; letter-spacing: -0.02em;">Contact Form Enquiries</h3>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Review, track, and respond to messages submitted via the public contact form.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="<?php echo site_url('welcome/contact'); ?>" target="_blank" class="btn btn-outline-primary btn-sm" style="border-radius: 10px; font-weight: 600;">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Public Contact Page
            </a>
        </div>
    </div>

    <!-- Alert Flash Messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px; background: #d1fae5; color: #047857;">
            <i class="fa-solid fa-circle-check me-2"></i> <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px; background: #fee2e2; color: #dc2626;">
            <i class="fa-solid fa-circle-exclamation me-2"></i> <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Summary Stats Row -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3" style="background: linear-gradient(135deg, #6366f1, #4f46e5); color: white; border-radius: 18px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-white-50 text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Total Enquiries</span>
                        <h2 class="fw-bold mb-0 mt-1" style="font-size: 1.85rem; color: #ffffff;"><?php echo isset($stats['total']) ? $stats['total'] : 0; ?></h2>
                    </div>
                    <div style="font-size: 2rem; opacity: 0.85;">📬</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3" style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white; border-radius: 18px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-white-50 text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">New Messages</span>
                        <h2 class="fw-bold mb-0 mt-1" style="font-size: 1.85rem; color: #ffffff;"><?php echo isset($stats['new']) ? $stats['new'] : 0; ?></h2>
                    </div>
                    <div style="font-size: 2rem; opacity: 0.85;">🔔</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3" style="background: linear-gradient(135deg, #8b5cf6, #6d28d9); color: white; border-radius: 18px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-white-50 text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Read / Reviewing</span>
                        <h2 class="fw-bold mb-0 mt-1" style="font-size: 1.85rem; color: #ffffff;"><?php echo isset($stats['read']) ? $stats['read'] : 0; ?></h2>
                    </div>
                    <div style="font-size: 2rem; opacity: 0.85;">👁️</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3" style="background: linear-gradient(135deg, #10b981, #059669); color: white; border-radius: 18px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-white-50 text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Replied / Addressed</span>
                        <h2 class="fw-bold mb-0 mt-1" style="font-size: 1.85rem; color: #ffffff;"><?php echo isset($stats['replied']) ? $stats['replied'] : 0; ?></h2>
                    </div>
                    <div style="font-size: 2rem; opacity: 0.85;">✅</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Filters -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
        <div class="card-body p-3 d-flex gap-2 flex-wrap align-items-center">
            <span class="fw-bold text-secondary me-2" style="font-size: 0.85rem;">Filter Messages:</span>
            <a href="<?php echo site_url('admin/contact_enquiries'); ?>" class="btn btn-sm <?php echo ($current_filter == 'All') ? 'btn-dark' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">All Messages</a>
            <a href="<?php echo site_url('admin/contact_enquiries?status=New'); ?>" class="btn btn-sm <?php echo ($current_filter == 'New') ? 'btn-warning text-dark' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">🟡 New</a>
            <a href="<?php echo site_url('admin/contact_enquiries?status=Read'); ?>" class="btn btn-sm <?php echo ($current_filter == 'Read') ? 'btn-info text-white' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">🟣 Read</a>
            <a href="<?php echo site_url('admin/contact_enquiries?status=Replied'); ?>" class="btn btn-sm <?php echo ($current_filter == 'Replied') ? 'btn-success' : 'btn-light'; ?>" style="border-radius: 8px; font-weight: 600;">🟢 Replied</a>
        </div>
    </div>

    <!-- Enquiries Table -->
    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden; border: 1px solid #e2e8f0;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.9rem;">
                <thead style="background: #f8fafc; color: #475569; font-weight: 700; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em;">
                    <tr>
                        <th class="ps-4 py-3">#</th>
                        <th class="py-3">Sender Name</th>
                        <th class="py-3">Contact Info</th>
                        <th class="py-3" style="width: 32%;">Message</th>
                        <th class="py-3">Status</th>
                        <th class="py-3">Received Date</th>
                        <th class="text-end pe-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($enquiries)): ?>
                        <?php foreach ($enquiries as $idx => $eq): ?>
                            <tr style="<?php echo ($eq['status'] == 'New') ? 'background: #fefce8;' : ''; ?>">
                                <td class="ps-4 fw-bold text-muted"><?php echo $idx + 1; ?></td>
                                <td>
                                    <div class="fw-bold text-dark" style="font-size: 0.95rem;"><?php echo htmlspecialchars($eq['name']); ?></div>
                                    <?php if ($eq['status'] == 'New'): ?>
                                        <span class="badge bg-warning text-dark px-2 py-0.5" style="font-size: 0.65rem;">NEW ENQUIRY</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div><a href="mailto:<?php echo htmlspecialchars($eq['email']); ?>" class="text-decoration-none text-primary fw-semibold"><i class="fa-solid fa-envelope me-1.5 text-muted"></i><?php echo htmlspecialchars($eq['email']); ?></a></div>
                                    <?php if (!empty($eq['phone'])): ?>
                                        <div class="text-secondary mt-0.5"><a href="tel:<?php echo htmlspecialchars($eq['phone']); ?>" class="text-decoration-none text-secondary"><i class="fa-solid fa-phone me-1.5 text-muted"></i><?php echo htmlspecialchars($eq['phone']); ?></a></div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="text-dark" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; max-height: 2.8em; line-height: 1.4;">
                                        <?php echo htmlspecialchars($eq['message']); ?>
                                    </div>
                                </td>
                                <td>
                                    <?php if ($eq['status'] == 'Replied'): ?>
                                        <span class="badge px-3 py-1.5" style="background: #d1fae5; color: #047857; border-radius: 8px; font-weight: 700;">🟢 Replied</span>
                                    <?php elseif ($eq['status'] == 'Read'): ?>
                                        <span class="badge px-3 py-1.5" style="background: #f3e8ff; color: #6b21a8; border-radius: 8px; font-weight: 700;">🟣 Read</span>
                                    <?php else: ?>
                                        <span class="badge px-3 py-1.5" style="background: #fef3c7; color: #b45309; border-radius: 8px; font-weight: 700;">🟡 New Enquiry</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="text-muted fw-medium" style="font-size: 0.82rem;"><?php echo date('d M Y, h:i A', strtotime($eq['created_at'])); ?></span>
                                </td>
                                <td class="text-end pe-4">
                                    <button type="button" class="btn btn-sm btn-primary px-3" onclick="openEnquiryModal(<?php echo $eq['id']; ?>)" style="border-radius: 8px; font-weight: 600;">
                                        <i class="fa-solid fa-eye me-1"></i> View Details
                                    </button>
                                     <a href="javascript:void(0)" onclick="showAppConfirm('Are you sure you want to delete this enquiry message?', 'Delete Contact Enquiry', '<?php echo site_url('admin/delete_enquiry/' . $eq['id']); ?>')" class="btn btn-sm btn-outline-danger ms-1" style="border-radius: 8px;">
                                         <i class="fa-solid fa-trash"></i>
                                     </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-inbox fa-2x mb-2 d-block opacity-50"></i>
                                No contact form enquiries found under this filter.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: View Enquiry Details & Update Status -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: #f8fafc;">
                <div>
                    <span class="badge bg-primary px-2.5 py-1 mb-1" style="font-size: 0.72rem; letter-spacing: 0.05em; font-weight: 700;">CONTACT ENQUIRY</span>
                    <h4 class="modal-title fw-extrabold text-dark mb-0" id="modalSenderName">Loading...</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="<?php echo site_url('admin/update_enquiry_status'); ?>" method="POST">
                <input type="hidden" name="id" id="modalEnquiryId">
                
                <div class="modal-body p-4">
                    <!-- Contact Metadata Cards -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="p-3 rounded-3" style="background: #f1f5f9; border: 1px solid #e2e8f0;">
                                <span class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.68rem;">Email Address</span>
                                <a id="modalSenderEmail" href="#" class="fw-bold text-primary text-break" style="font-size: 0.9rem;">-</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3" style="background: #f1f5f9; border: 1px solid #e2e8f0;">
                                <span class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.68rem;">Phone Number</span>
                                <a id="modalSenderPhone" href="#" class="fw-bold text-dark" style="font-size: 0.9rem;">-</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 rounded-3" style="background: #f1f5f9; border: 1px solid #e2e8f0;">
                                <span class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.68rem;">Submitted Date</span>
                                <span id="modalSubmittedDate" class="fw-bold text-dark" style="font-size: 0.9rem;">-</span>
                            </div>
                        </div>
                    </div>

                    <!-- Message Body -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Message Content</label>
                        <div id="modalMessageContent" class="p-3.5 rounded-3" style="background: #f8fafc; border: 1px solid #cbd5e1; font-size: 0.95rem; line-height: 1.6; color: #0f172a; white-space: pre-wrap; min-height: 100px;">
                            Loading message content...
                        </div>
                    </div>

                    <!-- Admin Status Update & Notes -->
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label class="form-label fw-bold text-secondary text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Update Status</label>
                            <select name="status" id="modalStatusSelect" class="form-select fw-bold py-2" style="border-radius: 10px;">
                                <option value="New">🟡 New Enquiry</option>
                                <option value="Read">🟣 Read / Reviewing</option>
                                <option value="Replied">🟢 Replied / Resolved</option>
                                <option value="Archived">⚪ Archived</option>
                            </select>
                        </div>
                        <div class="col-md-7">
                            <label class="form-label fw-bold text-secondary text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.05em;">Admin Notes / Action Taken</label>
                            <input type="text" name="admin_notes" id="modalAdminNotes" class="form-control py-2" placeholder="e.g. Called sender on phone / Emailed response" style="border-radius: 10px;">
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 px-4 pb-4 pt-0 d-flex justify-content-between">
                    <div>
                        <a id="modalEmailBtn" href="#" class="btn btn-outline-secondary btn-sm fw-bold px-3 py-2" style="border-radius: 10px;">
                            <i class="fa-solid fa-reply me-1"></i> Reply via Email
                        </a>
                        <a id="modalPhoneBtn" href="#" class="btn btn-outline-secondary btn-sm fw-bold px-3 py-2 ms-1" style="border-radius: 10px;">
                            <i class="fa-solid fa-phone me-1"></i> Call Phone
                        </a>
                    </div>
                    <div>
                        <button type="button" class="btn btn-light fw-bold px-3 py-2" data-bs-dismiss="modal" style="border-radius: 10px;">Close</button>
                        <button type="submit" class="btn btn-primary fw-bold px-4 py-2 ms-1" style="border-radius: 10px; background: linear-gradient(135deg, #6366f1, #4f46e5); border: none;">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openEnquiryModal(id) {
    const modal = new bootstrap.Modal(document.getElementById('enquiryModal'));
    document.getElementById('modalEnquiryId').value = id;
    document.getElementById('modalSenderName').innerText = 'Loading...';
    document.getElementById('modalMessageContent').innerText = 'Loading message content...';
    
    fetch('<?php echo site_url("admin/get_enquiry_details/"); ?>' + id)
        .then(response => response.json())
        .then(res => {
            if (res.status === 'success') {
                const data = res.data;
                document.getElementById('modalSenderName').innerText = data.name || 'Anonymous';
                document.getElementById('modalSenderEmail').innerText = data.email || 'N/A';
                document.getElementById('modalSenderEmail').href = 'mailto:' + (data.email || '');
                document.getElementById('modalEmailBtn').href = 'mailto:' + (data.email || '');
                
                document.getElementById('modalSenderPhone').innerText = data.phone || 'N/A';
                document.getElementById('modalSenderPhone').href = 'tel:' + (data.phone || '');
                document.getElementById('modalPhoneBtn').href = 'tel:' + (data.phone || '');
                
                document.getElementById('modalSubmittedDate').innerText = data.created_at || '-';
                document.getElementById('modalMessageContent').innerText = data.message || '(No message content)';
                document.getElementById('modalStatusSelect').value = data.status || 'New';
                document.getElementById('modalAdminNotes').value = data.admin_notes || '';
            } else {
                alert('Could not fetch enquiry details: ' + res.message);
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error loading enquiry details.');
        });
        
    modal.show();
}
</script>
