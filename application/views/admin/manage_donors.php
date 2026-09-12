<div class="container-fluid py-4">
    <!-- Header Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-extrabold mb-1" style="color: #0f172a; letter-spacing: -0.02em;">Donor Pledges & Contributions</h3>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Review donor pledges and track payment verifications.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="<?php echo site_url('donors'); ?>" target="_blank" class="btn btn-outline-primary btn-sm">
                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Public Donor Page
            </a>
        </div>
    </div>

    <!-- Alert Flash Messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="fa-solid fa-circle-exclamation me-2"></i> <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Summary Stats Row (2 cards only) -->
    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-3" style="background: linear-gradient(135deg, #059669, #047857); color: white;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-white-50 text-uppercase fw-bold" style="font-size: 0.75rem;">Total Pledges</span>
                        <h2 class="fw-bold mb-0 mt-1">₹<?php echo number_format(isset($donor_stats['total_amount']) ? $donor_stats['total_amount'] : 0); ?></h2>
                    </div>
                    <div style="font-size: 2.2rem; opacity: 0.8;">💰</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-3" style="background: linear-gradient(135deg, #d97706, #b45309); color: white;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-white-50 text-uppercase fw-bold" style="font-size: 0.75rem;">Total Donors</span>
                        <h2 class="fw-bold mb-0 mt-1"><?php echo isset($donor_stats['total_pledges']) ? $donor_stats['total_pledges'] : 0; ?> Supporters</h2>
                    </div>
                    <div style="font-size: 2.2rem; opacity: 0.8;">🤝</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Filters -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-3 d-flex gap-2 flex-wrap align-items-center">
            <span class="fw-bold text-secondary me-2" style="font-size: 0.85rem;">Filter Pledges:</span>
            <a href="<?php echo site_url('admin/manage_donors'); ?>" class="btn btn-sm <?php echo ($current_filter == 'All') ? 'btn-dark' : 'btn-light'; ?>">All Pledges</a>
            <a href="<?php echo site_url('admin/manage_donors?status=Pledged'); ?>" class="btn btn-sm <?php echo ($current_filter == 'Pledged') ? 'btn-warning text-dark' : 'btn-light'; ?>">Pending Verification</a>
            <a href="<?php echo site_url('admin/manage_donors?status=Completed'); ?>" class="btn btn-sm <?php echo ($current_filter == 'Completed') ? 'btn-success' : 'btn-light'; ?>">Verified & Completed</a>
        </div>
    </div>

    <!-- Excel Export with Date Filter -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px; border: 1px solid #e2e8f0;">
        <div class="card-body p-3">
            <form method="GET" action="<?php echo site_url('admin/export_donors_excel'); ?>" class="d-flex flex-wrap gap-3 align-items-end">
                <div>
                    <label class="form-label fw-bold text-secondary mb-1" style="font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.05em;"><i class="fa-solid fa-calendar-days me-1"></i> From Date</label>
                    <input type="date" name="date_from" class="form-control form-control-sm" style="border-radius: 8px; min-width: 150px;" value="<?php echo isset($_GET['date_from']) ? htmlspecialchars($_GET['date_from']) : ''; ?>">
                </div>
                <div>
                    <label class="form-label fw-bold text-secondary mb-1" style="font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.05em;"><i class="fa-solid fa-calendar-days me-1"></i> To Date</label>
                    <input type="date" name="date_to" class="form-control form-control-sm" style="border-radius: 8px; min-width: 150px;" value="<?php echo isset($_GET['date_to']) ? htmlspecialchars($_GET['date_to']) : ''; ?>">
                </div>
                <div>
                    <button type="submit" class="btn btn-success btn-sm fw-bold px-4" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(5,150,105,0.2);">
                        <i class="fa-solid fa-file-excel me-1"></i> Export to Excel
                    </button>
                </div>
                <div class="text-muted" style="font-size: 0.8rem; align-self: center;">Leave dates blank to export all records</div>
            </form>
        </div>
    </div>

    <!-- Search Field & Table Header Controls -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px; background: white; border: 1px solid #e2e8f0;">
        <div class="card-body p-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="text-muted" style="font-size: 0.88rem;">
                <i class="fa-solid fa-hand-holding-heart text-success me-1"></i> Showing donor pledges &amp; contributions (<strong><?php echo !empty($donors) ? count($donors) : 0; ?></strong> total)
            </div>
            <!-- Search Field -->
            <div class="position-relative" style="min-width: 320px;">
                <input type="text" id="donorSearchInput" onkeyup="filterDonorsTable()" class="form-control form-control-sm" placeholder="Search donor name, phone, email, PAN..." style="border-radius: 10px; font-size: 0.88rem; border: 1px solid #cbd5e1; padding: 0.45rem 1rem 0.45rem 2.4rem;">
                <i class="fa-solid fa-magnifying-glass position-absolute" style="left: 14px; top: 11px; color: #94a3b8; font-size: 0.85rem;"></i>
            </div>
        </div>
    </div>

    <!-- Donors Table -->
    <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden; border: 1px solid #e2e8f0;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="donorsTable" style="font-size: 0.9rem;">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">#</th>
                        <th>Donor Name & Type</th>
                        <th>Contact Information</th>
                        <th>Contribution Amount</th>
                        <th>Fund Target / Student</th>
                        <th>PAN Number</th>
                        <th>Status</th>
                        <th>Pledged Date</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody id="donorsTableBody">
                    <?php if (!empty($donors)): ?>
                        <?php foreach ($donors as $idx => $d): ?>
                            <tr>
                                <td class="ps-3 fw-bold text-muted row-index"><?php echo $idx + 1; ?></td>
                                <td>
                                    <div class="fw-bold text-dark"><?php echo htmlspecialchars($d['donor_name']); ?></div>
                                    <span class="badge bg-secondary" style="font-size: 0.7rem;"><?php echo htmlspecialchars($d['donor_type']); ?></span>
                                    <?php if ($d['is_anonymous']): ?>
                                        <span class="badge bg-dark" style="font-size: 0.68rem;">Anonymous</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div><i class="fa-solid fa-envelope me-1 text-muted" style="font-size: 0.8rem;"></i><?php echo !empty($d['email']) ? htmlspecialchars($d['email']) : '<span class="text-muted fst-italic">N/A</span>'; ?></div>
                                    <div><i class="fa-solid fa-phone me-1 text-muted" style="font-size: 0.8rem;"></i><?php echo htmlspecialchars($d['phone']); ?></div>
                                </td>
                                <td>
                                    <div class="fw-extrabold text-success" style="font-size: 1rem;">₹<?php echo number_format($d['amount']); ?></div>
                                    <span class="text-muted" style="font-size: 0.78rem;"><?php echo htmlspecialchars($d['frequency']); ?></span>
                                </td>
                                <td>
                                    <span class="fw-semibold text-dark"><?php echo htmlspecialchars(!empty($d['student_name']) ? $d['student_name'] : 'General Fund'); ?></span>
                                </td>
                                <td>
                                    <?php if (!empty($d['pan_number'])): ?>
                                        <span class="badge bg-light text-dark border font-monospace"><?php echo htmlspecialchars($d['pan_number']); ?></span>
                                    <?php else: ?>
                                        <span class="text-muted" style="font-size: 0.8rem;">—</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($d['payment_status'] == 'Completed'): ?>
                                        <span class="badge bg-success">Completed</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">Pledged</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="text-muted" style="font-size: 0.82rem;"><?php echo date('d M Y, h:i A', strtotime($d['created_at'])); ?></span>
                                </td>
                                <td class="text-end pe-3">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $d['id']; ?>">
                                        <i class="fa-solid fa-pen"></i> Status
                                    </button>
                                    <a href="javascript:void(0)" onclick="showAppConfirm('Are you sure you want to delete this donor pledge record?', 'Delete Donor Pledge', '<?php echo site_url('admin/delete_donor/' . $d['id']); ?>')" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>

                                    <!-- Status Update Modal -->
                                    <div class="modal fade text-start" id="updateModal<?php echo $d['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                             <div class="modal-content">
                                                <form action="<?php echo site_url('admin/update_donor_status'); ?>" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold">Update Pledge Status</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="mb-2">Donor: <strong><?php echo htmlspecialchars($d['donor_name']); ?></strong> (₹<?php echo number_format($d['amount']); ?>)</p>
                                                        
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold">Pledge Payment Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="Pledged" <?php echo ($d['payment_status'] == 'Pledged') ? 'selected' : ''; ?>>Pledged (Pending Bank Verification)</option>
                                                                <option value="Completed" <?php echo ($d['payment_status'] == 'Completed') ? 'selected' : ''; ?>>Completed (Verified & Receipt Sent)</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold">Bank Transaction Reference / UTR</label>
                                                            <input type="text" name="transaction_ref" value="<?php echo htmlspecialchars($d['transaction_ref']); ?>" class="form-control" placeholder="e.g. UTR123456789">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save Status</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr class="no-records-row">
                            <td colspan="9" class="text-center py-4 text-muted">No donor pledges found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination & Entries Summary Footer -->
        <div class="p-3 px-4 d-flex flex-wrap align-items-center justify-content-between gap-3" style="background: #f8fafc; border-top: 1px solid #e2e8f0; font-size: 0.88rem; color: #64748b;">
            <div class="d-flex align-items-center gap-2" id="paginationSummary">
                <span>Showing <strong id="pageStart" class="text-dark">1</strong> to <strong id="pageEnd" class="text-dark"><?php echo !empty($donors) ? min(50, count($donors)) : 0; ?></strong> of <strong id="totalEntries" class="text-dark"><?php echo !empty($donors) ? count($donors) : 0; ?></strong> donors</span>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-1.5">
                    <label class="text-muted mb-0" style="font-size: 0.82rem; white-space: nowrap;">Rows:</label>
                    <select id="rowsPerPageSelect" onchange="changeRowsPerPage(this.value)" class="form-select form-select-sm" style="width: 76px; border-radius: 8px; font-size: 0.85rem; padding: 0.25rem 0.5rem; border: 1px solid #cbd5e1;">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50" selected>50</option>
                        <option value="100">100</option>
                        <option value="all">All</option>
                    </select>
                </div>

                <nav aria-label="Donors pagination">
                    <ul class="pagination pagination-sm mb-0 gap-1" id="paginationControls">
                        <!-- Dynamic pagination buttons will be rendered here -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
let currentPage = 1;
let rowsPerPage = 50; // Default 50 per page as requested

function getTableRows() {
    const table = document.getElementById("donorsTable");
    if (!table) return [];
    const tbody = table.querySelector("tbody");
    if (!tbody) return [];
    return Array.from(tbody.querySelectorAll("tr:not(.no-records-row)"));
}

function renderPagination() {
    const searchInput = document.getElementById("donorSearchInput");
    const filterText = searchInput ? searchInput.value.toLowerCase().trim() : "";
    const allRows = getTableRows();
    const table = document.getElementById("donorsTable");
    const tbody = table ? table.querySelector("tbody") : null;
    if (!tbody) return;

    // Filter matching rows
    const matchedRows = [];
    allRows.forEach(row => {
        const text = row.innerText.toLowerCase();
        if (filterText === "" || text.indexOf(filterText) > -1) {
            matchedRows.push(row);
        } else {
            row.style.display = "none";
        }
    });

    // Remove any dynamic empty-state row if present
    const existingEmpty = tbody.querySelector(".dynamic-empty-row");
    if (existingEmpty) existingEmpty.remove();

    const total = matchedRows.length;
    const effectiveRowsPerPage = (rowsPerPage === 'all') ? (total > 0 ? total : 50) : rowsPerPage;
    const totalPages = Math.max(1, Math.ceil(total / effectiveRowsPerPage));

    if (currentPage > totalPages) currentPage = totalPages;
    if (currentPage < 1) currentPage = 1;

    const startIdx = (currentPage - 1) * effectiveRowsPerPage;
    const endIdx = Math.min(startIdx + effectiveRowsPerPage, total);

    matchedRows.forEach((row, index) => {
        if (index >= startIdx && index < endIdx) {
            row.style.display = "";
            const indexCell = row.querySelector(".row-index");
            if (indexCell) {
                indexCell.textContent = index + 1;
            }
        } else {
            row.style.display = "none";
        }
    });

    if (total === 0) {
        // If there are rows in the table but none matched search
        if (allRows.length > 0) {
            const emptyTr = document.createElement("tr");
            emptyTr.className = "dynamic-empty-row";
            emptyTr.innerHTML = `
                <td colspan="9" class="text-center py-5 text-muted">
                    <i class="fa-solid fa-magnifying-glass mb-2 text-secondary" style="font-size: 2rem; opacity: 0.5;"></i>
                    <div class="fw-bold" style="font-size: 0.95rem; color: #475569;">No donor pledges matched your search</div>
                    <div style="font-size: 0.82rem;">Try searching with a different name, email, phone number, or PAN.</div>
                </td>
            `;
            tbody.appendChild(emptyTr);
        }
    }

    // Update Summary
    const pageStartEl = document.getElementById("pageStart");
    const pageEndEl = document.getElementById("pageEnd");
    const totalEntriesEl = document.getElementById("totalEntries");
    if (pageStartEl) pageStartEl.innerText = total === 0 ? 0 : (startIdx + 1);
    if (pageEndEl) pageEndEl.innerText = endIdx;
    if (totalEntriesEl) totalEntriesEl.innerText = total;

    // Build Pagination Navigation
    const controls = document.getElementById("paginationControls");
    if (!controls) return;
    controls.innerHTML = "";

    if (total === 0) return;

    if (totalPages <= 1) {
        const singleLi = document.createElement("li");
        singleLi.className = "page-item active";
        singleLi.innerHTML = `<span class="page-link" style="border-radius: 8px; font-weight: 700; padding: 0.28rem 0.65rem; background: #059669; border-color: #059669; color: white;">1</span>`;
        controls.appendChild(singleLi);
        return;
    }

    // Previous Button
    const prevLi = document.createElement("li");
    prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
    prevLi.innerHTML = `<a class="page-link" href="javascript:void(0)" onclick="goToPage(${currentPage - 1})" aria-label="Previous" style="border-radius: 8px; border: 1px solid #cbd5e1; font-weight: 600; padding: 0.28rem 0.65rem;"><i class="fa-solid fa-chevron-left" style="font-size: 0.72rem;"></i></a>`;
    controls.appendChild(prevLi);

    // Page Numbers with Ellipsis
    let startPage = Math.max(1, currentPage - 2);
    let endPage = Math.min(totalPages, currentPage + 2);

    if (startPage > 1) {
        const p1 = document.createElement("li");
        p1.className = "page-item";
        p1.innerHTML = `<a class="page-link" href="javascript:void(0)" onclick="goToPage(1)" style="border-radius: 8px; border: 1px solid #cbd5e1; font-weight: 600; padding: 0.28rem 0.65rem;">1</a>`;
        controls.appendChild(p1);
        if (startPage > 2) {
            const dots = document.createElement("li");
            dots.className = "page-item disabled";
            dots.innerHTML = `<span class="page-link" style="border: none; background: transparent; padding: 0.28rem 0.4rem;">...</span>`;
            controls.appendChild(dots);
        }
    }

    for (let p = startPage; p <= endPage; p++) {
        const pageLi = document.createElement("li");
        const isActive = p === currentPage;
        pageLi.className = `page-item ${isActive ? 'active' : ''}`;
        pageLi.innerHTML = `<a class="page-link" href="javascript:void(0)" onclick="goToPage(${p})" style="border-radius: 8px; font-weight: 700; padding: 0.28rem 0.65rem; ${isActive ? 'background: #059669; border-color: #059669; color: white;' : 'border: 1px solid #cbd5e1; color: #334155;'}">${p}</a>`;
        controls.appendChild(pageLi);
    }

    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            const dots = document.createElement("li");
            dots.className = "page-item disabled";
            dots.innerHTML = `<span class="page-link" style="border: none; background: transparent; padding: 0.28rem 0.4rem;">...</span>`;
            controls.appendChild(dots);
        }
        const lastLi = document.createElement("li");
        lastLi.className = "page-item";
        lastLi.innerHTML = `<a class="page-link" href="javascript:void(0)" onclick="goToPage(${totalPages})" style="border-radius: 8px; border: 1px solid #cbd5e1; font-weight: 600; padding: 0.28rem 0.65rem;">${totalPages}</a>`;
        controls.appendChild(lastLi);
    }

    // Next Button
    const nextLi = document.createElement("li");
    nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
    nextLi.innerHTML = `<a class="page-link" href="javascript:void(0)" onclick="goToPage(${currentPage + 1})" aria-label="Next" style="border-radius: 8px; border: 1px solid #cbd5e1; font-weight: 600; padding: 0.28rem 0.65rem;"><i class="fa-solid fa-chevron-right" style="font-size: 0.72rem;"></i></a>`;
    controls.appendChild(nextLi);
}

function goToPage(page) {
    currentPage = page;
    renderPagination();
    const tableEl = document.getElementById("donorsTable");
    if (tableEl) {
        tableEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
}

function changeRowsPerPage(val) {
    if (val === 'all') {
        rowsPerPage = 'all';
    } else {
        rowsPerPage = parseInt(val) || 50;
    }
    currentPage = 1;
    renderPagination();
}

function filterDonorsTable() {
    currentPage = 1;
    renderPagination();
}

document.addEventListener("DOMContentLoaded", function() {
    // Check URL parameters if page or per_page was passed
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('page')) {
        const p = parseInt(urlParams.get('page'));
        if (!isNaN(p) && p > 0) currentPage = p;
    }
    if (urlParams.has('per_page')) {
        const pp = urlParams.get('per_page');
        if (pp === 'all' || !isNaN(parseInt(pp))) {
            rowsPerPage = (pp === 'all') ? 'all' : parseInt(pp);
            const sel = document.getElementById("rowsPerPageSelect");
            if (sel) sel.value = pp;
        }
    }
    renderPagination();
});
</script>
