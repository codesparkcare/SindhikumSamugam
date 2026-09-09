<!-- Cyber-SaaS Executive Admin Dashboard View -->
<div class="container-fluid py-4 px-4" style="background: #f8fafc; min-height: 100vh;">

    <!-- 4 High-Impact Metric Cards Row (Cyber-SaaS Theme) -->
    <div class="row g-4 mb-4">
        
        <!-- Card 1: Total Applications (Electric Sapphire Indigo) -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 24px; background: #ffffff; border: 1px solid #e2e8f0; position: relative; overflow: hidden; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px -10px rgba(99, 102, 241, 0.25)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.05)';">
                <!-- Background Accent Glow Circle -->
                <div style="position: absolute; top: -30px; right: -30px; width: 110px; height: 110px; background: rgba(99, 102, 241, 0.12); border-radius: 50%; filter: blur(25px); pointer-events: none;"></div>
                
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <div style="min-width: 0;">
                            <span class="text-uppercase fw-extrabold text-muted text-truncate d-block" style="font-size: 0.72rem; letter-spacing: 0.08em; color: #64748b;">Total Applications</span>
                            <h2 class="fw-extrabold mb-0 mt-1" style="color: #0f172a; font-size: 1.85rem; letter-spacing: -0.02em;"><?php echo isset($stats['total']) ? number_format($stats['total']) : '0'; ?></h2>
                        </div>
                        <div style="width: 48px; height: 48px; min-width: 48px; flex-shrink: 0; border-radius: 16px; background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; box-shadow: 0 10px 20px rgba(99, 102, 241, 0.35);">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Scholarships Approved (Vibrant Emerald Green) -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 24px; background: #ffffff; border: 1px solid #e2e8f0; position: relative; overflow: hidden; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px -10px rgba(16, 185, 129, 0.25)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.05)';">
                <!-- Background Accent Glow Circle -->
                <div style="position: absolute; top: -30px; right: -30px; width: 110px; height: 110px; background: rgba(16, 185, 129, 0.12); border-radius: 50%; filter: blur(25px); pointer-events: none;"></div>

                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <div style="min-width: 0;">
                            <span class="text-uppercase fw-extrabold text-muted text-truncate d-block" style="font-size: 0.72rem; letter-spacing: 0.08em; color: #64748b;">Approved Scholarships</span>
                            <h2 class="fw-extrabold mb-0 mt-1" style="color: #059669; font-size: 1.85rem; letter-spacing: -0.02em;"><?php echo isset($stats['approved']) ? number_format($stats['approved']) : '0'; ?></h2>
                        </div>
                        <div style="width: 48px; height: 48px; min-width: 48px; flex-shrink: 0; border-radius: 16px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; box-shadow: 0 10px 20px rgba(16, 185, 129, 0.35);">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Pending Verification (Glowing Warm Amber) -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 24px; background: #ffffff; border: 1px solid #e2e8f0; position: relative; overflow: hidden; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px -10px rgba(245, 158, 11, 0.25)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.05)';">
                <!-- Background Accent Glow Circle -->
                <div style="position: absolute; top: -30px; right: -30px; width: 110px; height: 110px; background: rgba(245, 158, 11, 0.12); border-radius: 50%; filter: blur(25px); pointer-events: none;"></div>

                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <div style="min-width: 0;">
                            <span class="text-uppercase fw-extrabold text-muted text-truncate d-block" style="font-size: 0.72rem; letter-spacing: 0.08em; color: #64748b;">Pending Verification</span>
                            <h2 class="fw-extrabold mb-0 mt-1" style="color: #d97706; font-size: 1.85rem; letter-spacing: -0.02em;"><?php echo isset($stats['pending']) ? number_format($stats['pending']) : '0'; ?></h2>
                        </div>
                        <div style="width: 48px; height: 48px; min-width: 48px; flex-shrink: 0; border-radius: 16px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; box-shadow: 0 10px 20px rgba(245, 158, 11, 0.35);">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Fees Paid (Royal Violet Magenta) -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 24px; background: #ffffff; border: 1px solid #e2e8f0; position: relative; overflow: hidden; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px -10px rgba(139, 92, 246, 0.25)';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.05)';">
                <!-- Background Accent Glow Circle -->
                <div style="position: absolute; top: -30px; right: -30px; width: 110px; height: 110px; background: rgba(139, 92, 246, 0.12); border-radius: 50%; filter: blur(25px); pointer-events: none;"></div>

                <div class="card-body p-3.5 px-4">
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <div style="min-width: 0;">
                            <span class="text-uppercase fw-extrabold text-muted text-truncate d-block" style="font-size: 0.72rem; letter-spacing: 0.08em; color: #64748b;">Fees Paid</span>
                            <h2 class="fw-extrabold mb-0 mt-1 text-nowrap" style="color: #7c3aed; font-size: 1.45rem; letter-spacing: -0.02em;">₹<?php echo isset($stats['fees_paid']) ? number_format($stats['fees_paid']) : '0'; ?></h2>
                        </div>
                        <div style="width: 44px; height: 44px; min-width: 44px; flex-shrink: 0; border-radius: 14px; background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 1.15rem; box-shadow: 0 8px 18px rgba(139, 92, 246, 0.35);">
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Scholarship Growth Analytics Curve Chart (Full Width) -->
    <div class="row g-4 mb-4">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm" style="border-radius: 26px; background: #ffffff; border: 1px solid #e2e8f0; position: relative; overflow: hidden;">
                
                <div class="card-header bg-transparent border-0 p-4 pb-0 d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div>
                        <div class="d-inline-flex align-items-center gap-2 mb-1">
                            <span style="width: 8px; height: 8px; background: #6366f1; border-radius: 50%; display: inline-block; box-shadow: 0 0 10px #6366f1;"></span>
                            <span class="text-uppercase fw-extrabold text-muted" style="font-size: 0.72rem; letter-spacing: 0.1em;">Disbursement Trends & Growth Analytics</span>
                        </div>
                        <h4 class="fw-extrabold mb-0" style="color: #0f172a; letter-spacing: -0.01em;">
                            <i class="fa-solid fa-chart-area me-2" style="color: #6366f1;"></i> Monthly Scholarship Growth (2026)
                        </h4>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge px-3 py-2" style="background: #e0e7ff; color: #4338ca; border-radius: 50px; font-weight: 700; font-size: 0.82rem;">
                            <i class="fa-solid fa-circle me-1.5" style="font-size: 0.55rem; color: #6366f1;"></i> Live Real-Time Analytics
                        </span>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Chart.js Interactive Bar Chart -->
                    <div style="position: relative; width: 100%; height: 350px;">
                        <canvas id="growthChart"></canvas>
                    </div>
                    
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const ctx = document.getElementById('growthChart').getContext('2d');
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: <?php echo json_encode(isset($monthly_analytics) ? $monthly_analytics['labels'] : []); ?>,
                                    datasets: [
                                        {
                                            label: 'Applications Received',
                                            data: <?php echo json_encode(isset($monthly_analytics) ? $monthly_analytics['applications'] : []); ?>,
                                            backgroundColor: '#6366f1',
                                            borderRadius: 6,
                                            barPercentage: 0.6,
                                            categoryPercentage: 0.8
                                        },
                                        {
                                            label: 'Direct Aid Disbursed',
                                            data: <?php echo json_encode(isset($monthly_analytics) ? $monthly_analytics['disbursed'] : []); ?>,
                                            backgroundColor: '#10b981',
                                            borderRadius: 6,
                                            barPercentage: 0.6,
                                            categoryPercentage: 0.8
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            position: 'bottom',
                                            labels: {
                                                padding: 20,
                                                font: {
                                                    family: "'Inter', sans-serif",
                                                    size: 13,
                                                    weight: 'bold'
                                                },
                                                usePointStyle: true,
                                                boxWidth: 10
                                            }
                                        },
                                        tooltip: {
                                            backgroundColor: '#0f172a',
                                            titleFont: { size: 14, family: "'Inter', sans-serif" },
                                            bodyFont: { size: 13, family: "'Inter', sans-serif" },
                                            padding: 12,
                                            cornerRadius: 8,
                                            displayColors: true
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            grid: {
                                                color: '#f1f5f9',
                                                drawBorder: false
                                            },
                                            ticks: {
                                                font: { family: "'Inter', sans-serif", size: 12 },
                                                color: '#64748b'
                                            }
                                        },
                                        x: {
                                            grid: {
                                                display: false,
                                                drawBorder: false
                                            },
                                            ticks: {
                                                font: { family: "'Inter', sans-serif", size: 12, weight: '500' },
                                                color: '#64748b'
                                            }
                                        }
                                    }
                                }
                            });
                        });
                    </script>

                </div>
            </div>
    <!-- Recent Contact Form Enquiries Section -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 24px; background: #ffffff; border: 1px solid #e2e8f0; overflow: hidden;">
        <div class="card-header bg-transparent border-0 p-4 pb-0 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h5 class="fw-bold mb-1" style="color: #0f172a; font-size: 1.1rem; display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fa-solid fa-comments text-primary"></i> Recent Contact Form Enquiries
                </h5>
                <p class="text-muted mb-0" style="font-size: 0.88rem;">Messages submitted by visitors via the public website contact form.</p>
            </div>
            <a href="<?php echo base_url('admin/contact_enquiries'); ?>" class="btn btn-sm btn-outline-primary fw-bold" style="border-radius: 10px;">
                View All Enquiries (<?php echo isset($enquiry_stats['total']) ? $enquiry_stats['total'] : 0; ?>) →
            </a>
        </div>
        <div class="card-body p-4">
            <?php if (!empty($recent_enquiries)): ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="font-size: 0.88rem;">
                        <thead class="table-light">
                            <tr>
                                <th>Sender Name</th>
                                <th>Email Address</th>
                                <th>Phone</th>
                                <th style="width: 35%;">Message</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_enquiries as $req): ?>
                                <tr>
                                    <td class="fw-bold text-dark"><?php echo htmlspecialchars($req['name']); ?></td>
                                    <td><a href="mailto:<?php echo htmlspecialchars($req['email']); ?>" class="text-decoration-none text-primary"><?php echo htmlspecialchars($req['email']); ?></a></td>
                                    <td><?php echo htmlspecialchars($req['phone']); ?></td>
                                    <td><div class="text-truncate" style="max-width: 280px;"><?php echo htmlspecialchars($req['message']); ?></div></td>
                                    <td>
                                        <?php if ($req['status'] == 'Replied'): ?>
                                            <span class="badge bg-success">Replied</span>
                                        <?php elseif ($req['status'] == 'Read'): ?>
                                            <span class="badge bg-info text-white">Read</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">New</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-muted" style="font-size: 0.8rem;"><?php echo date('d M Y, h:i A', strtotime($req['created_at'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-4 text-muted">
                    <i class="fa-solid fa-envelope-open fa-2x mb-2 d-block opacity-50"></i>
                    No contact form enquiries received yet.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Dynamic Website Hero Display Stats Settings Card (Placed at bottom of Dashboard) -->
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

</div>
