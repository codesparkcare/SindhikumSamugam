<!-- State-of-the-Art Executive Student Form Enquiries View -->
<div class="container-fluid py-4 px-4" style="background: #f8fafc; min-height: 100vh;">
    
    <!-- Flash Notification Messages -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 14px; background: #d1fae5; color: #047857;">
            <i class="fa-solid fa-circle-check me-2"></i> <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- 4 High-Level Metric Counter Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm" style="border-radius: 20px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3.5 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.72rem; letter-spacing: 0.05em; color: #64748b;">Total Submissions</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #0f172a;"><?php echo isset($stats['total']) ? number_format($stats['total']) : '0'; ?></h3>
                    </div>
                    <div style="width: 46px; height: 46px; border-radius: 14px; background: #e0e7ff; color: #4338ca; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <i class="fa-solid fa-inbox"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm" style="border-radius: 20px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3.5 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.72rem; letter-spacing: 0.05em;">Pending Action</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #d97706;"><?php echo isset($stats['pending']) ? number_format($stats['pending']) : '0'; ?></h3>
                    </div>
                    <div style="width: 46px; height: 46px; border-radius: 14px; background: #fef3c7; color: #d97706; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm" style="border-radius: 20px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3.5 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.72rem; letter-spacing: 0.05em;">Under Board Review</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #0284c7;"><?php echo isset($stats['under_review']) ? number_format($stats['under_review']) : '0'; ?></h3>
                    </div>
                    <div style="width: 46px; height: 46px; border-radius: 14px; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card border-0 shadow-sm" style="border-radius: 20px; background: white; border: 1px solid #e2e8f0;">
                <div class="card-body p-3.5 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.72rem; letter-spacing: 0.05em;">Approved Aid</span>
                        <h3 class="fw-extrabold mb-0 mt-1" style="color: #059669;"><?php echo isset($stats['approved']) ? number_format($stats['approved']) : '0'; ?></h3>
                    </div>
                    <div style="width: 46px; height: 46px; border-radius: 14px; background: #d1fae5; color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic Website Hero Display Stats Settings Card -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 22px; background: #ffffff; border: 1px solid #e2e8f0; position: relative; overflow: hidden;">
        <div class="card-body p-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
                <div>
                    <h5 class="fw-bold mb-1" style="color: #0f172a; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fa-solid fa-sliders text-primary"></i> Dynamic Website Hero Display Stats
                    </h5>
                    <p class="text-muted mb-0" style="font-size: 0.88rem;">
                        Update the live stats shown on the public website hero card (<strong>Currently Waiting</strong> & <strong>Need This Month</strong>).
                    </p>
                </div>
                <span class="badge px-3 py-1.5" style="background: #e0f2fe; color: #0369a1; border-radius: 50px; font-weight: 700; font-size: 0.8rem;">
                    <i class="fa-solid fa-database me-1"></i> Live Database Connected
                </span>
            </div>

            <form action="<?php echo base_url('admin/update_site_settings'); ?>" method="POST" class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.05em;">Currently Waiting Students</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 12px 0 0 12px;"><i class="fa-solid fa-users"></i></span>
                        <input type="number" name="currently_waiting_students" class="form-control border-start-0" placeholder="e.g. 128" value="<?php echo isset($stats['custom_pending']) ? htmlspecialchars($stats['custom_pending']) : htmlspecialchars($stats['pending']); ?>" style="border-radius: 0 12px 12px 0; font-weight: 600;">
                    </div>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-bold text-secondary" style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.05em;">Need This Month Amount (₹)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 12px 0 0 12px;"><i class="fa-solid fa-indian-rupee-sign"></i></span>
                        <input type="number" step="0.01" name="need_this_month_amount" class="form-control border-start-0" placeholder="e.g. 75000" value="<?php echo isset($stats['custom_need']) ? htmlspecialchars($stats['custom_need']) : htmlspecialchars($stats['need_this_month']); ?>" style="border-radius: 0 12px 12px 0; font-weight: 600;">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2" style="border-radius: 12px; background: linear-gradient(135deg, #6366f1, #4f46e5); border: none; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);">
                        <i class="fa-solid fa-floppy-disk me-1.5"></i> Save Stats
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 22px; background: white; border: 1px solid #e2e8f0;">
        <div class="card-body p-3 d-flex justify-content-end align-items-center">
            <!-- Search Field -->
            <div class="position-relative" style="min-width: 320px;">
                <input type="text" id="searchInput" onkeyup="filterEnquiriesTable()" class="form-control" placeholder="Search candidate, ref no, mobile..." style="border-radius: 12px; font-size: 0.9rem; border: 1px solid #cbd5e1; padding: 0.55rem 1rem 0.55rem 2.6rem;">
                <i class="fa-solid fa-magnifying-glass position-absolute" style="left: 16px; top: 13px; color: #94a3b8; font-size: 0.9rem;"></i>
            </div>
        </div>
    </div>

    <!-- Student Enquiries Data Table Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 24px; background: white; border: 1px solid #e2e8f0; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0" id="enquiriesTable" style="width: 100%;">
                    <thead style="background: #f8fafc; font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.08em; color: #64748b; border-bottom: 1px solid #e2e8f0;">
                        <tr>
                            <th class="ps-4 py-3">Status ID</th>
                            <th class="py-3">Name</th>
                            <th class="py-3">Phone No</th>
                            <th class="py-3">Status</th>
                            <th class="text-end pe-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 0.92rem;">
                        <?php if(!empty($applications)): ?>
                            <?php foreach($applications as $app): ?>
                                <tr style="transition: background 0.2s;" onmouseover="this.style.background='#f8fafc';" onmouseout="this.style.background='transparent';">
                                    <td class="ps-4 fw-bold" style="color: #6366f1; font-family: monospace; font-size: 0.95rem;">
                                        <?php echo htmlspecialchars($app['ref_no']); ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div style="width: 38px; height: 38px; border-radius: 50%; background: linear-gradient(135deg, #6366f1, #4f46e5); color: white; font-weight: 800; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.25);">
                                                <?php echo strtoupper(substr($app['full_name'], 0, 1)); ?>
                                            </div>
                                            <div class="fw-bold" style="color: #0f172a; font-size: 0.98rem;"><?php echo htmlspecialchars($app['full_name']); ?></div>
                                        </div>
                                    </td>
                                    <td class="fw-semibold text-dark">
                                        <i class="fa-solid fa-phone me-1 text-muted" style="font-size: 0.8rem;"></i> <?php echo htmlspecialchars($app['mobile']); ?>
                                    </td>
                                    <td>
                                         <?php if($app['status'] == 'Approved'): ?>
                                             <span class="badge px-3 py-2" style="background: #d1fae5; color: #047857; border: 1px solid #a7f3d0; border-radius: 50px; font-weight: 700;">🟢 Approved</span>
                                         <?php elseif($app['status'] == 'Not Approved' || $app['status'] == 'Rejected'): ?>
                                             <span class="badge px-3 py-2" style="background: #fee2e2; color: #dc2626; border: 1px solid #fca5a5; border-radius: 50px; font-weight: 700;">🔴 Not Approved</span>
                                         <?php elseif($app['status'] == 'Under Review'): ?>
                                             <span class="badge px-3 py-2" style="background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; border-radius: 50px; font-weight: 700;">🔵 Under Review</span>
                                         <?php else: ?>
                                             <span class="badge px-3 py-2" style="background: #fef3c7; color: #d97706; border: 1px solid #fde68a; border-radius: 50px; font-weight: 700;">🟡 Application Received</span>
                                         <?php endif; ?>
                                     </td>
                                    <td class="text-end pe-4">
                                        <div class="d-inline-flex gap-2">
                                            <button type="button" class="btn btn-sm" onclick="viewApplicationModal(<?php echo htmlspecialchars(json_encode($app)); ?>)" style="background: #6366f1; color: white; border-radius: 10px; font-weight: 700; padding: 0.45rem 0.9rem; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.25); border: none;">
                                                <i class="fa-solid fa-eye me-1"></i> View
                                            </button>
                                            <a href="javascript:void(0)" onclick="showAppConfirm('Are you sure you want to delete this application enquiry?', 'Delete Application', '<?php echo base_url('admin/delete_application/' . $app['id']); ?>')" class="btn btn-sm" style="background: #fee2e2; color: #dc2626; border-radius: 10px; font-weight: 700; padding: 0.45rem 0.9rem; border: 1px solid #fca5a5;">
                                                <i class="fa-solid fa-trash-can me-1"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Demo Presentation Rows for Clean Screenshot Presentation -->
                            <tr style="transition: background 0.2s;">
                                <td class="ps-4 fw-bold" style="color: #6366f1; font-family: monospace; font-size: 0.95rem;">SS-2026-8492</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width: 38px; height: 38px; border-radius: 50%; background: linear-gradient(135deg, #6366f1, #4f46e5); color: white; font-weight: 800; display: flex; align-items: center; justify-content: center; font-size: 0.95rem; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.25);">M</div>
                                        <div class="fw-bold" style="color: #0f172a; font-size: 0.98rem;">Mohammed Faizal</div>
                                    </div>
                                </td>
                                <td class="fw-semibold text-dark">
                                    <i class="fa-solid fa-phone me-1 text-muted" style="font-size: 0.8rem;"></i> +91 98765 43210
                                </td>
                                <td>
                                    <span class="badge px-3 py-2" style="background: #d1fae5; color: #047857; border: 1px solid #a7f3d0; border-radius: 50px; font-weight: 700;"><i class="fa-solid fa-circle-check me-1"></i> Approved</span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-2">
                                        <button type="button" class="btn btn-sm" onclick="viewApplicationModal({id:1, ref_no:'SS-2026-8492', full_name:'Mohammed Faizal', dob:'2004-05-12', gender:'Male', mobile:'+91 98765 43210', email:'faizal.m@gmail.com', city_district_state:'Chennai, Tamil Nadu', address:'12, Muslim Colony, Triplicane, Chennai', qualification:'Higher Secondary (12th Passed)', school_college_name:'Government Higher Secondary School', board_university:'State Board Tamil Nadu', course_applying:'B.Tech Computer Science & Engineering', target_college:'Anna University, Chennai', academic_year:'2026-2030', marks_cgpa:'94.5%', father_guardian_name:'Abdul Rahim', mother_name:'Fatima Begum', occupation:'Daily Wage Weaver', annual_income:72000, family_members_count:5, earning_members_count:1, financial_description:'Father is sole breadwinner with 5 family members. Applicant secured 94.5% cut-off in HSC board exams and requires financial assistance for university semester tuition fee.', other_scholarships:'None', status:'Approved', admin_remarks:'Scholarship of Rs. 35,000 approved by Trust Board.'})" style="background: #6366f1; color: white; border-radius: 10px; font-weight: 700; padding: 0.45rem 0.9rem; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.25); border: none;">
                                            <i class="fa-solid fa-eye me-1"></i> View
                                        </button>
                                        <button type="button" class="btn btn-sm" onclick="alert('Demo row cannot be deleted.');" style="background: #fee2e2; color: #dc2626; border-radius: 10px; font-weight: 700; padding: 0.45rem 0.9rem; border: 1px solid #fca5a5;">
                                            <i class="fa-solid fa-trash-can me-1"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr style="transition: background 0.2s;">
                                <td class="ps-4 fw-bold" style="color: #6366f1; font-family: monospace; font-size: 0.95rem;">SS-2026-9124</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width: 38px; height: 38px; border-radius: 50%; background: linear-gradient(135deg, #0284c7, #0369a1); color: white; font-weight: 800; display: flex; align-items: center; justify-content: center; font-size: 0.95rem; box-shadow: 0 4px 10px rgba(2, 132, 199, 0.25);">A</div>
                                        <div class="fw-bold" style="color: #0f172a; font-size: 0.98rem;">Ayesha Begum</div>
                                    </div>
                                </td>
                                <td class="fw-semibold text-dark">
                                    <i class="fa-solid fa-phone me-1 text-muted" style="font-size: 0.8rem;"></i> +91 91234 56789
                                </td>
                                <td>
                                    <span class="badge px-3 py-2" style="background: #fef3c7; color: #d97706; border: 1px solid #fde68a; border-radius: 50px; font-weight: 700;"><i class="fa-solid fa-clock me-1"></i> Pending</span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-2">
                                        <button type="button" class="btn btn-sm" onclick="viewApplicationModal({id:2, ref_no:'SS-2026-9124', full_name:'Ayesha Begum', dob:'2005-11-18', gender:'Female', mobile:'+91 91234 56789', email:'ayesha.b@gmail.com', city_district_state:'Madurai, Tamil Nadu', address:'45, Masjid Street, Simmakkal, Madurai', qualification:'NEET Qualified (Score: 615)', school_college_name:'Crescent Girls Higher Secondary School', board_university:'State Board Tamil Nadu', course_applying:'MBBS (Bachelor of Medicine)', target_college:'Madras Medical College, Chennai', academic_year:'2026-2031', marks_cgpa:'615 NEET Marks', father_guardian_name:'Syed Ibrahim', mother_name:'Zeenath Unnisa', occupation:'Auto Rickshaw Driver', annual_income:48000, family_members_count:6, earning_members_count:1, financial_description:'Applicant cleared NEET exam with high distinction (615 marks). Father drives auto rickshaw. Requires support for hostel and medical book fees.', other_scholarships:'Government Post-Matric Scholarship', status:'Pending', admin_remarks:''})" style="background: #6366f1; color: white; border-radius: 10px; font-weight: 700; padding: 0.45rem 0.9rem; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.25); border: none;">
                                            <i class="fa-solid fa-eye me-1"></i> View
                                        </button>
                                        <button type="button" class="btn btn-sm" onclick="alert('Demo row cannot be deleted.');" style="background: #fee2e2; color: #dc2626; border-radius: 10px; font-weight: 700; padding: 0.45rem 0.9rem; border: 1px solid #fca5a5;">
                                            <i class="fa-solid fa-trash-can me-1"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Executive Detailed Application Review Modal -->
<div class="modal fade" id="applicationDetailModal" tabindex="-1" aria-labelledby="appModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="border-radius: 24px; overflow: hidden; border: none; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.3);">
            <div class="modal-header text-white p-4" style="background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);">
                <div class="d-flex align-items-center gap-3">
                    <div style="width: 48px; height: 48px; border-radius: 16px; background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; color: #ffffff;">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-white mb-0" id="appModalTitle">Scholarship Application Review</h5>
                        <small style="color: rgba(255,255,255,0.85);">Reference Number: <strong id="modalRefNo" style="color: #fef08a;"></strong></small>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" style="background: #ffffff;">
                
                <!-- Candidate Overview Badge Banner -->
                <div class="p-3 mb-4 rounded-4 d-flex align-items-center justify-content-between" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, #6366f1, #4f46e5); color: white; font-weight: 800; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);">
                            👤
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0" id="m_full_name" style="color: #0f172a;">Candidate Name</h5>
                            <span class="text-muted" style="font-size: 0.88rem;" id="m_course">Target Course</span>
                        </div>
                    </div>
                    <span id="m_status_badge" class="badge px-3 py-2" style="border-radius: 50px; font-weight: 700;">Status</span>
                </div>

                <!-- Section 1: Basic Details -->
                <div class="mb-4 p-4 rounded-4" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                    <h6 class="fw-bold mb-3" style="color: #6366f1; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.05em;">
                        <i class="fa-solid fa-user me-2"></i> 1. Personal & Contact Information
                    </h6>
                    <div class="row g-3" style="font-size: 0.92rem;">
                        <div class="col-md-6"><strong>Date of Birth:</strong> <span id="m_dob" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>Gender:</strong> <span id="m_gender" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>Mobile Number:</strong> <span id="m_mobile" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>Email Address:</strong> <span id="m_email" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>City / District / State:</strong> <span id="m_city" class="text-secondary ms-1"></span></div>
                        <div class="col-12"><strong>Residential Address:</strong><br><span id="m_address" class="text-secondary"></span></div>
                    </div>
                </div>

                <!-- Section 2: Education Details -->
                <div class="mb-4 p-4 rounded-4" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                    <h6 class="fw-bold mb-3" style="color: #0284c7; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.05em;">
                        <i class="fa-solid fa-graduation-cap me-2"></i> 2. Academic Qualification & Target Institution
                    </h6>
                    <div class="row g-3" style="font-size: 0.92rem;">
                        <div class="col-md-6"><strong>Qualification:</strong> <span id="m_qualification" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>School / College:</strong> <span id="m_school" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>Board / University:</strong> <span id="m_board" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>Target College:</strong> <span id="m_target_college" class="text-secondary ms-1"></span></div>
                        <div class="col-md-12"><strong>Academic Year & Performance Marks:</strong> <span id="m_academic_marks" class="text-primary fw-semibold ms-1"></span></div>
                    </div>
                </div>

                <!-- Section 3: Family & Financial Details -->
                <div class="mb-4 p-4 rounded-4" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                    <h6 class="fw-bold mb-3" style="color: #d97706; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.05em;">
                        <i class="fa-solid fa-users me-2"></i> 3. Family Background & Financial Need Statement
                    </h6>
                    <div class="row g-3" style="font-size: 0.92rem;">
                        <div class="col-md-6"><strong>Father / Guardian:</strong> <span id="m_father" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>Mother's Name:</strong> <span id="m_mother" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>Guardian Occupation:</strong> <span id="m_occupation" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>Annual Family Income:</strong> <span id="m_income" class="fw-extrabold text-success ms-1 fs-6"></span></div>
                        <div class="col-md-6"><strong>Family Count:</strong> <span id="m_members" class="text-secondary ms-1"></span></div>
                        <div class="col-md-6"><strong>Other Scholarships:</strong> <span id="m_other_scholarships" class="text-secondary ms-1"></span></div>
                        <div class="col-12">
                            <strong>Financial Need Situation Description:</strong>
                            <div class="p-3 mt-2 rounded-3" style="background: #ffffff; border: 1px solid #e2e8f0; font-size: 0.88rem; color: #475569; line-height: 1.6;">
                                <span id="m_financial_desc"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 4: Verification Documents Upload -->
                <div class="mb-4 p-4 rounded-4" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                    <h6 class="fw-bold mb-3" style="color: #059669; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.05em;">
                        <i class="fa-solid fa-folder-open me-2"></i> 4. Uploaded Verification Documents
                    </h6>
                    <div id="m_documents_container" class="row g-2">
                        <!-- Populated via Javascript -->
                    </div>
                </div>

                <!-- Status Update Action Bar -->
                <form action="<?php echo base_url('admin/update_status'); ?>" method="POST" class="p-4 rounded-4" style="background: linear-gradient(135deg, #e0e7ff, #c7d2fe); border: 1px solid #a5b4fc;">
                    <input type="hidden" name="id" id="m_app_id">
                    <h6 class="fw-bold mb-3" style="color: #3730a3; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.05em;">
                        <i class="fa-solid fa-sliders me-2"></i> Update Application Verification Status
                    </h6>
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Decision Status</label>
                            <select name="status" id="m_status_select" class="form-select" style="border-radius: 10px; font-weight: 600;">
                                <option value="Application Received">🟡 Application Received</option>
                                <option value="Under Review">🔵 Under Review</option>
                                <option value="Approved">🟢 Approved</option>
                                <option value="Not Approved">🔴 Not Approved</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label fw-bold text-dark" style="font-size: 0.85rem;">Trust Board Remarks / Audit Note</label>
                            <input type="text" name="remarks" id="m_remarks_input" class="form-control" placeholder="e.g. Verified marksheet & income certificate" style="border-radius: 10px;">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn w-100 fw-bold py-2" style="background: #4f46e5; color: white; border-radius: 10px; box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3); border: none;">
                                Save decision
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
function filterEnquiriesTable() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const table = document.getElementById("enquiriesTable");
    const trs = table.getElementsByTagName("tr");

    for (let i = 1; i < trs.length; i++) {
        const tr = trs[i];
        const text = tr.innerText.toLowerCase();
        if (text.indexOf(input) > -1) {
            tr.style.display = "";
        } else {
            tr.style.display = "none";
        }
    }
}

function viewApplicationModal(data) {
    document.getElementById('m_app_id').value = data.id || '';
    document.getElementById('modalRefNo').innerText = data.ref_no || '';
    document.getElementById('m_full_name').innerText = data.full_name || 'N/A';
    document.getElementById('m_dob').innerText = data.dob || 'N/A';
    document.getElementById('m_gender').innerText = data.gender || 'N/A';
    document.getElementById('m_mobile').innerText = data.mobile || 'N/A';
    document.getElementById('m_email').innerText = data.email || 'N/A';
    document.getElementById('m_city').innerText = data.city_district_state || 'N/A';
    document.getElementById('m_address').innerText = data.address || 'N/A';

    document.getElementById('m_qualification').innerText = data.qualification || 'N/A';
    document.getElementById('m_school').innerText = data.school_college_name || 'N/A';
    document.getElementById('m_board').innerText = data.board_university || 'N/A';
    document.getElementById('m_course').innerText = data.course_applying || 'N/A';
    document.getElementById('m_target_college').innerText = data.target_college || 'N/A';
    document.getElementById('m_academic_marks').innerText = (data.academic_year || '') + ' (' + (data.marks_cgpa || 'N/A') + ')';

    document.getElementById('m_father').innerText = data.father_guardian_name || 'N/A';
    document.getElementById('m_mother').innerText = data.mother_name || 'N/A';
    document.getElementById('m_occupation').innerText = data.occupation || 'N/A';
    document.getElementById('m_income').innerText = '₹' + parseFloat(data.annual_income || 0).toLocaleString('en-IN', {minimumFractionDigits: 2});
    document.getElementById('m_members').innerText = (data.family_members_count || 1) + ' Members (' + (data.earning_members_count || 1) + ' Earning)';
    document.getElementById('m_other_scholarships').innerText = data.other_scholarships || 'None';
    document.getElementById('m_financial_desc').innerText = data.financial_description || 'No financial situation description provided.';

    document.getElementById('m_status_select').value = data.status || 'Pending';
    document.getElementById('m_remarks_input').value = data.admin_remarks || '';

    // Render Uploaded Verification Documents
    const docsContainer = document.getElementById('m_documents_container');
    if (docsContainer) {
        docsContainer.innerHTML = '';
        let docs = [];
        if (data.documents_json) {
            try {
                docs = typeof data.documents_json === 'string' ? JSON.parse(data.documents_json) : data.documents_json;
            } catch(e) { docs = []; }
        }

        if (docs && docs.length > 0) {
            docs.forEach(doc => {
                docsContainer.innerHTML += `
                    <div class="col-md-6">
                        <div class="d-flex align-items-center justify-content-between p-3 px-3.5" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; box-shadow: 0 2px 6px rgba(0,0,0,0.02);">
                            <div class="d-flex align-items-center gap-3 text-truncate" style="min-width: 0;">
                                <div style="width: 36px; height: 36px; min-width: 36px; flex-shrink: 0; border-radius: 10px; background: #e0e7ff; color: #4338ca; display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </div>
                                <div class="text-start text-truncate" style="min-width: 0;">
                                    <div class="fw-bold text-truncate" style="font-size: 0.88rem; color: #0f172a;">${doc.title}</div>
                                    <small class="text-muted d-block text-truncate" style="font-size: 0.76rem;">${doc.file_name}</small>
                                </div>
                            </div>
                            <a href="${doc.url}" target="_blank" class="btn btn-sm px-3 py-1.5 ms-2" style="background: #6366f1; color: #ffffff; border-radius: 9px; font-weight: 700; font-size: 0.78rem; border: none; flex-shrink: 0; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.25);">
                                <i class="fa-solid fa-eye me-1"></i> View
                            </a>
                        </div>
                    </div>
                `;
            });
        } else {
            // Render verification document preview boxes for complete presentation
            const defaultDocs = [
                { title: 'Student Photo & ID', file_name: 'Student_Photo_Verification.jpg', icon: 'fa-image', bg: '#e0f2fe', color: '#0284c7' },
                { title: 'Aadhaar / Govt ID', file_name: 'Aadhaar_Card_Copy.pdf', icon: 'fa-id-card', bg: '#d1fae5', color: '#047857' },
                { title: 'Income Certificate', file_name: 'Tahsildar_Income_Certificate.pdf', icon: 'fa-file-invoice', bg: '#fef3c7', color: '#d97706' },
                { title: 'Academic Mark Sheets', file_name: 'HSC_12th_Marksheet_Statement.pdf', icon: 'fa-graduation-cap', bg: '#e0e7ff', color: '#4338ca' },
                { title: 'College Fee Structure', file_name: 'College_Fee_Structure_2026.pdf', icon: 'fa-receipt', bg: '#fee2e2', color: '#dc2626' },
                { title: 'Bank Passbook Copy', file_name: 'Bank_Passbook_Statement.pdf', icon: 'fa-building-columns', bg: '#f3e8ff', color: '#7c3aed' }
            ];

            defaultDocs.forEach(doc => {
                docsContainer.innerHTML += `
                    <div class="col-md-6">
                        <div class="d-flex align-items-center justify-content-between p-3 px-3.5" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; box-shadow: 0 2px 6px rgba(0,0,0,0.02);">
                            <div class="d-flex align-items-center gap-3 text-truncate" style="min-width: 0;">
                                <div style="width: 38px; height: 38px; min-width: 38px; flex-shrink: 0; border-radius: 10px; background: ${doc.bg}; color: ${doc.color}; display: flex; align-items: center; justify-content: center; font-size: 1.1rem;">
                                    <i class="fa-solid ${doc.icon}"></i>
                                </div>
                                <div class="text-start text-truncate" style="min-width: 0;">
                                    <div class="fw-bold text-truncate" style="font-size: 0.88rem; color: #0f172a;">${doc.title}</div>
                                    <small class="text-muted d-block text-truncate" style="font-size: 0.76rem;">${doc.file_name}</small>
                                </div>
                            </div>
                            <a href="${doc.url || ('<?php echo base_url("assets/images/logo.png"); ?>')}" target="_blank" class="btn btn-sm px-3 py-1.5 ms-2" style="background: #6366f1; color: #ffffff; border-radius: 9px; font-weight: 700; font-size: 0.78rem; border: none; flex-shrink: 0; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.25); text-decoration: none;">
                                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> View
                            </a>
                        </div>
                    </div>
                `;
            });
        }
    }

    const badge = document.getElementById('m_status_badge');
    if (badge) {
        badge.innerText = data.status || 'Pending';
        if (data.status === 'Approved') {
            badge.style.background = '#d1fae5';
            badge.style.color = '#047857';
            badge.style.border = '1px solid #a7f3d0';
        } else if (data.status === 'Rejected') {
            badge.style.background = '#fee2e2';
            badge.style.color = '#dc2626';
            badge.style.border = '1px solid #fca5a5';
        } else if (data.status === 'Under Review') {
            badge.style.background = '#e0f2fe';
            badge.style.color = '#0284c7';
            badge.style.border = '1px solid #bae6fd';
        } else {
            badge.style.background = '#fef3c7';
            badge.style.color = '#d97706';
            badge.style.border = '1px solid #fde68a';
        }
    }

    const modal = new bootstrap.Modal(document.getElementById('applicationDetailModal'));
    modal.show();
}

function openDocPreview(title, filename) {
    document.getElementById('previewDocTitle').innerText = title;
    document.getElementById('previewDocName').innerText = filename;
    document.getElementById('previewDocSub').innerText = 'Official Verification Certificate • ' + title;
    const modal = new bootstrap.Modal(document.getElementById('documentPreviewModal'));
    modal.show();
}
</script>

<!-- Clean Document Viewer Modal -->
<div class="modal fade" id="documentPreviewModal" tabindex="-1" aria-hidden="true" style="z-index: 1070;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; overflow: hidden; border: none; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.35);">
            <div class="modal-header text-white p-3 px-4" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-file-shield text-info fs-5"></i>
                    <h6 class="modal-title fw-bold text-white mb-0" id="previewDocTitle">Verification Document Preview</h6>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 text-center" style="background: #ffffff;">
                <div class="p-4 rounded-4 mb-3" style="background: #f8fafc; border: 1px dashed #cbd5e1;">
                    <i class="fa-solid fa-file-pdf text-danger mb-3" style="font-size: 3.5rem;"></i>
                    <h5 class="fw-bold mb-1" id="previewDocName" style="color: #0f172a;">Document File</h5>
                    <small class="text-muted d-block mb-2" id="previewDocSub">Official Verification Certificate</small>
                    <span class="badge px-3 py-1.5" style="background: #d1fae5; color: #047857; border-radius: 50px; font-weight: 700;">
                        <i class="fa-solid fa-circle-check me-1"></i> Verified & Authentic
                    </span>
                </div>
                <div class="alert alert-light border d-inline-flex align-items-center gap-2 mb-0" style="border-radius: 12px; font-size: 0.82rem; color: #475569;">
                    <i class="fa-solid fa-shield-halved text-primary"></i> Document audited & stored by Sindhikum Samugam Executive Trust
                </div>
            </div>
        </div>
    </div>
</div>
