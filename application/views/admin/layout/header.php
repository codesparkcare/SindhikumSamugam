<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sindhikum Samugam | Admin Executive Portal</title>
    <meta name="author" content="CODESPARK SOFTWARE DEVELOPMENT TIRUNELVELI">
    <meta name="developer" content="CODESPARK SOFTWARE DEVELOPMENT TIRUNELVELI">
    <meta name="designer" content="CODESPARK SOFTWARE DEVELOPMENT TIRUNELVELI">
    <link rel="author" href="https://codespark.online/" title="CODESPARK SOFTWARE DEVELOPMENT TIRUNELVELI">
    <link rel="publisher" href="https://codespark.online/" title="CODESPARK SOFTWARE DEVELOPMENT TIRUNELVELI">
    <meta property="og:developer" content="CODESPARK SOFTWARE DEVELOPMENT TIRUNELVELI">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/faviicon.png?v=' . time()); ?>">
    <!-- Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-indigo: #6366f1;
            --primary-emerald: #10b981;
            --accent-violet: #8b5cf6;
            --accent-amber: #f59e0b;
            --dark-midnight: #0b0f19;
            --dark-surface: #0f172a;
            --light-bg: #f8fafc;
            --card-border: #e2e8f0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #0f172a;
            overflow-x: hidden;
        }

        /* Wrapper */
        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
            min-height: 100vh;
        }

        /* Cyber-SaaS Sidebar */
        #sidebar {
            min-width: 270px;
            max-width: 270px;
            background: #0b0f19;
            color: #fff;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 1000;
            border-right: 1px solid rgba(255, 255, 255, 0.08);
        }

        #sidebar.collapsed {
            margin-left: -270px;
        }

        .sidebar-header {
            padding: 24px;
            background: #0f172a;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .sidebar-menu {
            padding: 15px 0;
            list-style: none;
            margin: 0;
        }

        .sidebar-menu li {
            padding: 4px 18px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            color: #94a3b8;
            padding: 12px 16px;
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.25s ease;
            font-weight: 600;
            gap: 12px;
            font-size: 0.92rem;
        }

        .sidebar-menu a:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(4px);
        }

        .sidebar-menu a.active {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: #ffffff;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.35);
        }

        .menu-title {
            color: #64748b;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 18px 22px 6px;
            font-weight: 700;
        }

        /* Main Content area */
        #content {
            width: 100%;
            min-height: 100vh;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            background: #f8fafc;
        }

        /* Top Executive Navbar */
        .top-navbar {
            background: #ffffff;
            padding: 16px 30px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        }

        .navbar-btn {
            background: #f1f5f9;
            border: none;
            font-size: 1.1rem;
            color: #475569;
            cursor: pointer;
            padding: 8px 14px;
            border-radius: 10px;
            transition: all 0.2s;
        }

        .navbar-btn:hover {
            background: #e2e8f0;
            color: #0f172a;
        }
    </style>
</head>
<body>
    <div class="wrapper">
