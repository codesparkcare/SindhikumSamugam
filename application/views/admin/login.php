<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal Sign In | Sindhikum Samugam</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/faviicon.png?v=' . time()); ?>">
    <!-- Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #042f2e 50%, #064e3b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            margin: 0;
            position: relative;
            overflow-x: hidden;
        }

        /* Subtle Background Glow Circles */
        .bg-glow-1 {
            position: absolute;
            top: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            background: rgba(5, 150, 105, 0.25);
            filter: blur(120px);
            border-radius: 50%;
            pointer-events: none;
        }

        .bg-glow-2 {
            position: absolute;
            bottom: -100px;
            right: -100px;
            width: 450px;
            height: 450px;
            background: rgba(217, 119, 6, 0.2);
            filter: blur(120px);
            border-radius: 50%;
            pointer-events: none;
        }

        .login-card {
            width: 100%;
            max-width: 460px;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(20px);
            border-radius: 28px;
            box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 10;
        }

        .login-header {
            background: linear-gradient(135deg, #064e3b 0%, #047857 50%, #059669 100%);
            padding: 2.5rem 2rem 2rem;
            text-align: center;
            color: white;
            position: relative;
        }

        .login-header .logo-badge {
            width: 72px;
            height: 72px;
            background: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
            margin-bottom: 1rem;
        }

        .login-header .logo-badge img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .form-control {
            border-radius: 12px;
            padding: 0.75rem 1rem 0.75rem 2.8rem;
            border: 1px solid #cbd5e1;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #059669;
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.15);
        }

        .input-group-text-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
            z-index: 5;
        }

        .btn-login {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            color: white;
            font-weight: 700;
            border-radius: 12px;
            padding: 0.85rem;
            font-size: 1rem;
            border: none;
            box-shadow: 0 8px 20px rgba(5, 150, 105, 0.35);
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #047857 0%, #064e3b 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(5, 150, 105, 0.45);
        }

        .demo-credentials-box {
            background: #f0fdf4;
            border: 1px dashed #86efac;
            border-radius: 14px;
            padding: 0.85rem 1rem;
            font-size: 0.85rem;
            color: #166534;
        }
    </style>
</head>
<body>

    <!-- Ambient Glowing Orbs -->
    <div class="bg-glow-1"></div>
    <div class="bg-glow-2"></div>

    <!-- Login Card Container -->
    <div class="login-card">
        
        <!-- Header Banner -->
        <div class="login-header">
            <div class="logo-badge">
                <img src="<?php echo base_url('assets/images/logo.png?v=' . time()); ?>" alt="Sindhikum Samugam Logo">
            </div>
            <h4 class="fw-extrabold mb-1" style="letter-spacing: -0.01em;">Sindhikum Samugam</h4>
            <p class="mb-0 text-white-50" style="font-size: 0.88rem; font-weight: 500;">Scholarship Trust Admin Control Portal</p>
        </div>

        <!-- Form Body -->
        <div class="p-4 p-md-5">

            <!-- Flash Error Messages -->
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 mb-4" role="alert" style="background: #fee2e2; color: #dc2626; font-size: 0.88rem;">
                    <i class="fa-solid fa-circle-exclamation me-2"></i> <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Flash Success Messages -->
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 mb-4" role="alert" style="background: #d1fae5; color: #047857; font-size: 0.88rem;">
                    <i class="fa-solid fa-circle-check me-2"></i> <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="<?php echo base_url('admin/login'); ?>" method="POST">
                
                <!-- Username Input -->
                <div class="mb-3.5 mb-3">
                    <label class="form-label fw-bold text-dark" style="font-size: 0.88rem;">Admin Username / Email</label>
                    <div class="position-relative">
                        <i class="fa-solid fa-user-tie input-group-text-icon"></i>
                        <input type="text" name="username" class="form-control" placeholder="Enter username or email" required>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label fw-bold text-dark mb-0" style="font-size: 0.88rem;">Secret Password</label>
                    </div>
                    <div class="position-relative">
                        <i class="fa-solid fa-lock input-group-text-icon"></i>
                        <input type="password" id="adminPasswordInput" name="password" class="form-control" placeholder="Enter secret password" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-login w-100 mb-4">
                    <i class="fa-solid fa-right-to-bracket me-2"></i> Sign In to Control Portal
                </button>
            </form>

            <!-- Footer Link -->
            <div class="text-center mt-4" style="font-size: 0.82rem;">
                <a href="<?php echo base_url(); ?>" class="text-decoration-none text-muted fw-semibold">
                    <i class="fa-solid fa-arrow-left me-1"></i> Back to Sindhikum Samugam Public Website
                </a>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
