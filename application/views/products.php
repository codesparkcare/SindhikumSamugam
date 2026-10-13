<?php $this->load->view('includes/header'); ?>

<!-- Custom Styles for Products Marketplace Page -->
<style>
    :root {
        --prod-primary: #059669;
        --prod-primary-hover: #047857;
        --prod-accent: #d97706;
        --prod-dark: #0f172a;
        --prod-slate: #334155;
        --prod-light: #f8fafc;
        --prod-border: #e2e8f0;
        --prod-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.08), 0 8px 10px -6px rgba(15, 23, 42, 0.04);
        --prod-shadow-lg: 0 20px 35px -10px rgba(15, 23, 42, 0.15);
    }

    /* Hero Slider Container */
    .product-slider-hero {
        position: relative;
        background: #0f172a;
        color: #ffffff;
        overflow: hidden;
        padding-top: 5rem;
    }

    .slider-wrapper {
        position: relative;
        width: 100%;
        min-height: 480px;
        overflow: hidden;
    }

    .slider-track {
        display: flex;
        width: 300%;
        transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    }

    .slide-item {
        width: 100%;
        min-height: 480px;
        padding: 4rem 1.5rem 5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background-size: cover;
        background-position: center;
    }

    .slide-item::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 20% 50%, rgba(5, 150, 105, 0.4) 0%, rgba(15, 23, 42, 0.92) 80%);
        z-index: 1;
    }

    .slide-item.slide-2::before {
        background: radial-gradient(circle at 80% 50%, rgba(217, 119, 6, 0.35) 0%, rgba(15, 23, 42, 0.92) 80%);
    }

    .slide-item.slide-3::before {
        background: radial-gradient(circle at 50% 30%, rgba(16, 185, 129, 0.35) 0%, rgba(15, 23, 42, 0.92) 80%);
    }

    .slide-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        text-align: center;
        margin: 0 auto;
    }

    .slide-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.45rem 1.25rem;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(8px);
        font-size: 0.88rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
        color: #34d399;
    }

    .slide-title {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.15;
        margin-bottom: 1rem;
        letter-spacing: -0.02em;
    }

    .slide-title .highlight-text {
        background: linear-gradient(135deg, #34d399 0%, #fbbf24 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .slide-desc {
        font-size: 1.2rem;
        color: #cbd5e1;
        line-height: 1.6;
        max-width: 680px;
        margin: 0 auto 2rem;
    }

    .slide-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-slide-upload {
        display: inline-flex;
        align-items: center;
        gap: 0.65rem;
        padding: 0.9rem 2rem;
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: #ffffff;
        font-weight: 700;
        font-size: 1.05rem;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        box-shadow: 0 10px 25px rgba(5, 150, 105, 0.4);
        transition: all 0.3s ease;
    }

    .btn-slide-upload:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(5, 150, 105, 0.55);
        color: #ffffff;
    }

    .btn-slide-secondary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.9rem 1.8rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        color: #ffffff;
        font-weight: 600;
        font-size: 1.05rem;
        border-radius: 50px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-slide-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }

    /* Slider Navigation Controls */
    .slider-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .slider-nav-btn:hover {
        background: #059669;
        border-color: #059669;
        transform: translateY(-50%) scale(1.1);
    }

    .slider-nav-prev { left: 1.5rem; }
    .slider-nav-next { right: 1.5rem; }

    .slider-dots {
        position: absolute;
        bottom: 1.5rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        display: flex;
        gap: 0.6rem;
    }

    .slider-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .slider-dot.active {
        width: 32px;
        border-radius: 20px;
        background: #34d399;
    }

    /* Floating Action Button (FAB) */
    .floating-upload-btn {
        position: fixed;
        bottom: 2.25rem;
        right: 2.25rem;
        z-index: 999;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        color: #ffffff;
        padding: 0.85rem 1.4rem;
        border-radius: 50px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 12px 28px rgba(5, 150, 105, 0.45), 0 0 0 0 rgba(16, 185, 129, 0.7);
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        animation: fabPulse 2.5s infinite;
    }

    .floating-upload-btn:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 16px 36px rgba(5, 150, 105, 0.65);
        background: linear-gradient(135deg, #047857 0%, #065f46 100%);
    }

    .fab-icon-wrap {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
    }

    @keyframes fabPulse {
        0% { box-shadow: 0 12px 28px rgba(5, 150, 105, 0.45), 0 0 0 0 rgba(16, 185, 129, 0.6); }
        70% { box-shadow: 0 12px 28px rgba(5, 150, 105, 0.45), 0 0 0 14px rgba(16, 185, 129, 0); }
        100% { box-shadow: 0 12px 28px rgba(5, 150, 105, 0.45), 0 0 0 0 rgba(16, 185, 129, 0); }
    }

    /* Modal Popup Styling */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.75);
        backdrop-filter: blur(8px);
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .modal-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .modal-window {
        background: #ffffff;
        border-radius: 24px;
        width: 100%;
        max-width: 680px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 25px 60px -15px rgba(15, 23, 42, 0.35);
        transform: scale(0.92) translateY(20px);
        transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
    }

    .modal-overlay.active .modal-window {
        transform: scale(1) translateY(0);
    }

    .modal-header {
        position: sticky;
        top: 0;
        background: #ffffff;
        z-index: 5;
        padding: 1.5rem 2rem 1.25rem;
        border-bottom: 1px solid var(--prod-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .modal-header-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .modal-header-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #ecfdf5;
        color: #059669;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }

    .modal-header h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--prod-dark);
        margin: 0;
    }

    .modal-header p {
        font-size: 0.88rem;
        color: #64748b;
        margin: 0;
    }

    .modal-close-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #f1f5f9;
        border: none;
        color: #475569;
        font-size: 1.4rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .modal-close-btn:hover {
        background: #e2e8f0;
        color: #0f172a;
        transform: rotate(90deg);
    }

    .modal-body {
        padding: 1.75rem 2rem 2.5rem;
    }

    /* Form Fields Inside Modal */
    .form-group-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.2rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-label {
        display: block;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--prod-dark);
        margin-bottom: 0.4rem;
    }

    .form-label .req {
        color: #ef4444;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid var(--prod-border);
        border-radius: 12px;
        font-size: 0.95rem;
        font-family: inherit;
        background: #ffffff;
        color: var(--prod-dark);
        transition: all 0.2s ease;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: var(--prod-primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.15);
    }

    .form-help {
        font-size: 0.78rem;
        color: #64748b;
        margin-top: 0.35rem;
    }

    /* Image Dropzone Preview */
    .image-dropzone {
        border: 2px dashed #cbd5e1;
        border-radius: 14px;
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        background: #f8fafc;
        transition: all 0.2s ease;
        position: relative;
    }

    .image-dropzone:hover {
        border-color: var(--prod-primary);
        background: #ecfdf5;
    }

    .image-dropzone input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .dropzone-preview {
        display: none;
        max-height: 180px;
        border-radius: 10px;
        margin: 0 auto;
        object-fit: cover;
    }

    /* Notice Box */
    .admin-notice-box {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 12px;
        padding: 0.9rem 1.1rem;
        display: flex;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .admin-notice-icon {
        font-size: 1.25rem;
        color: #059669;
        flex-shrink: 0;
    }

    .admin-notice-text {
        font-size: 0.82rem;
        color: #166534;
        line-height: 1.45;
    }

    /* Section Header and Filter Bar */
    .products-main-section {
        padding: 4rem 1.5rem;
        background: #f8fafc;
        min-height: 600px;
    }

    .products-container {
        max-width: 1240px;
        margin: 0 auto;
    }

    .products-header-bar {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        gap: 1.25rem;
        margin-bottom: 2.5rem;
    }

    .products-header-title {
        text-align: center;
    }

    .products-header-title h2 {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--prod-dark);
        margin: 0 0 0.35rem;
    }

    .products-header-title p {
        color: #64748b;
        font-size: 1rem;
        margin: 0;
    }

    /* Search & Filter Controls */
    .filter-search-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        width: 100%;
        max-width: 440px;
    }

    .search-box-wrap {
        position: relative;
        width: 100%;
    }

    .search-box-wrap input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.6rem;
        border: 1.5px solid var(--prod-border);
        border-radius: 50px;
        background: #ffffff;
        font-size: 0.92rem;
        font-family: inherit;
        outline: none;
        transition: all 0.2s ease;
    }

    .search-box-wrap input:focus {
        border-color: var(--prod-primary);
        box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.12);
    }

    .search-icon-svg {
        position: absolute;
        left: 0.95rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        pointer-events: none;
    }

    .category-pills {
        display: flex;
        gap: 0.5rem;
        overflow-x: auto;
        padding-bottom: 0.5rem;
        margin-bottom: 2rem;
        justify-content: center;
    }

    .category-pill {
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        background: #ffffff;
        border: 1px solid var(--prod-border);
        color: #475569;
        font-size: 0.88rem;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
        transition: all 0.2s ease;
    }

    .category-pill:hover, .category-pill.active {
        background: var(--prod-primary);
        color: #ffffff;
        border-color: var(--prod-primary);
    }

    /* Product Cards Grid */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
    }

    .product-card {
        background: #ffffff;
        border-radius: 22px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.08), 0 4px 6px -4px rgba(15, 23, 42, 0.03);
        transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1);
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 22px 38px -10px rgba(15, 23, 42, 0.16);
        border-color: #cbd5e1;
    }

    .product-img-wrap {
        position: relative;
        width: 100%;
        height: 225px;
        background: #f1f5f9;
        overflow: hidden;
    }

    .product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.55s ease;
    }

    .product-card:hover .product-img {
        transform: scale(1.08);
    }

    /* Live Countdown / Timelimit Text after Image - Red Color, No Background */
    .card-timelimit, .countdown-badge {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        margin-top: 0;
        margin-bottom: 0.75rem;
        font-size: 1.15rem;
        font-weight: 800;
        color: #dc2626 !important;
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
        padding: 0 !important;
        text-shadow: none !important;
        letter-spacing: 0.02em;
        position: static !important;
    }

    .card-timelimit svg, .countdown-badge svg {
        flex-shrink: 0;
        color: #dc2626;
        stroke: #dc2626;
        width: 20px;
        height: 20px;
    }

    .card-timelimit.urgent, .countdown-badge.urgent {
        color: #ef4444 !important;
        font-weight: 800;
        animation: pulseRedText 1.5s infinite ease-in-out;
    }

    @keyframes pulseRedText {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.75; transform: scale(1.04); }
    }

    .condition-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 2;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(8px);
        color: #0f172a;
        padding: 0.35rem 0.85rem;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 800;
        border: 1px solid rgba(255, 255, 255, 0.8);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    }

    .btn-apply-product {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        width: 100%;
        padding: 0.92rem 1.4rem;
        border-radius: 14px;
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: #ffffff;
        font-weight: 700;
        font-size: 1.02rem;
        border: none;
        cursor: pointer;
        box-shadow: 0 6px 18px rgba(5, 150, 105, 0.28);
        transition: all 0.25s ease;
        margin-top: auto;
    }

    .btn-apply-product:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(5, 150, 105, 0.45);
        background: linear-gradient(135deg, #047857 0%, #059669 100%);
        color: #ffffff;
    }

    .btn-apply-product:active {
        transform: translateY(0);
    }

    .apply-card-preview {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.85rem 1rem;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        margin-bottom: 1.25rem;
    }

    .apply-card-thumb {
        width: 65px;
        height: 65px;
        border-radius: 10px;
        object-fit: cover;
        flex-shrink: 0;
        background: #e2e8f0;
        border: 1px solid #e2e8f0;
    }

    .apply-card-details h4 {
        margin: 0 0 0.25rem;
        font-size: 0.98rem;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.3;
    }

    .apply-card-details span {
        font-size: 0.78rem;
        color: #059669;
        font-weight: 700;
        text-transform: uppercase;
    }

    .product-info {
        padding: 1.4rem 1.4rem 1.4rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .product-category-tag {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--prod-primary);
        letter-spacing: 0.05em;
        margin-bottom: 0.35rem;
    }

    .product-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--prod-dark);
        margin: 0 0 0.6rem;
        line-height: 1.35;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-desc {
        font-size: 0.88rem;
        color: #64748b;
        line-height: 1.5;
        margin-bottom: 1.25rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-seller-meta {
        padding-top: 1rem;
        border-top: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.25rem;
        font-size: 0.82rem;
        color: #64748b;
        margin-top: auto;
    }

    .seller-location {
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .product-card-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.75rem;
    }

    .btn-contact-seller {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        padding: 0.65rem 1rem;
        border-radius: 10px;
        background: #059669;
        color: #ffffff;
        font-weight: 600;
        font-size: 0.88rem;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-contact-seller:hover {
        background: #047857;
        color: #ffffff;
    }

    .btn-view-details {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.65rem 1rem;
        border-radius: 10px;
        background: #f1f5f9;
        color: #334155;
        font-weight: 600;
        font-size: 0.88rem;
        border: 1px solid #e2e8f0;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-view-details:hover {
        background: #e2e8f0;
        color: #0f172a;
    }

    /* Empty state */
    .empty-products-card {
        grid-column: 1 / -1;
        text-align: center;
        padding: 5rem 2rem;
        background: #ffffff;
        border-radius: 24px;
        border: 2px dashed #cbd5e1;
    }

    .empty-products-icon {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: #ecfdf5;
        color: #059669;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        margin: 0 auto 1.5rem;
    }

    /* Toast Notification */
    .toast-popup {
        position: fixed;
        top: 2rem;
        right: 2rem;
        z-index: 10001;
        background: #0f172a;
        color: #ffffff;
        padding: 1rem 1.5rem;
        border-radius: 14px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transform: translateY(-40px);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .toast-popup.show {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }

    @media (max-width: 768px) {
        .slide-title { font-size: 2.1rem; }
        .slide-desc { font-size: 1rem; }
        .slider-wrapper { min-height: 420px; }
        .slide-item { padding: 3rem 1rem 4rem; min-height: 420px; }
        .form-group-grid { grid-template-columns: 1fr; }
        .floating-upload-btn {
            bottom: 1.5rem;
            right: 1.5rem;
            padding: 0.75rem 1.2rem;
            font-size: 0.9rem;
        }
    }
</style>

<!-- ==============================================
     1. UPLOAD YOUR PRODUCT SLIDER HERO
     ============================================== -->
<section class="product-slider-hero">
    <div class="slider-wrapper" style="min-height: auto;">
        <div class="slide-item slide-1" style="width: 100%; min-height: 420px; padding: 4.5rem 1.5rem 4rem;">
            <div class="slide-content">
                <span class="slide-badge">⚡ Affordable Access to Essential Products</span>
                <h1 class="slide-title">Get the Resources You <br><span class="highlight-text">Need to Learn</span></h1>
                <p class="slide-desc" style="margin-bottom: 0;">Need textbooks, school supplies, or educational equipment? Find useful products shared by generous donors and get the support you need to continue your education.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==============================================
     2. FLOATING ACTION ICON (FAB)
     ============================================== -->
<a href="<?php echo base_url('products/upload'); ?>" class="floating-upload-btn" aria-label="Upload Your Product">
    <div class="fab-icon-wrap">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
            <polyline points="17 8 12 3 7 8"></polyline>
            <line x1="12" y1="3" x2="12" y2="15"></line>
        </svg>
    </div>
    <span>Upload Product</span>
</a>

<!-- ==============================================
     3. PRODUCT UPLOAD FORM POPUP (MODAL)
     ============================================== -->
<div class="modal-overlay" id="productUploadModal">
    <div class="modal-window">
        <!-- Header -->
        <div class="modal-header">
            <div class="modal-header-title">
                <div class="modal-header-icon">📦</div>
                <div>
                    <h3>Upload Your Product</h3>
                    <p>Submissions go live after quick admin verification</p>
                </div>
            </div>
            <button class="modal-close-btn" id="closeUploadModalBtn" aria-label="Close Modal">&times;</button>
        </div>

        <!-- Body / Form -->
        <div class="modal-body">
            <!-- Notice Box -->
            <div class="admin-notice-box">
                <div class="admin-notice-icon">🛡️</div>
                <div class="admin-notice-text">
                    <strong>Admin Verification Policy:</strong> To keep this platform safe and trustworthy for students, your product will be approved by an administrator before appearing live with your specified countdown duration.
                </div>
            </div>

            <form id="productUploadForm" enctype="multipart/form-data">
                <input type="hidden" name="is_ajax" value="1">

                <!-- Product Details -->
                <div class="form-group">
                    <label class="form-label" for="prodTitle">Product Name / Title <span class="req">*</span></label>
                    <input type="text" class="form-control" id="prodTitle" name="title" required>
                </div>

                <div class="form-group-grid">
                    <div class="form-group">
                        <label class="form-label" for="prodCategory">Category <span class="req">*</span></label>
                        <select class="form-control" id="prodCategory" name="category" required>
                            <option value="Books & Study Materials">Books & Study Materials</option>
                            <option value="Laptops & Gadgets">Laptops & Gadgets</option>
                            <option value="Uniforms & Lab Coats">Uniforms & Lab Coats</option>
                            <option value="Stationery & Engineering Tools">Stationery & Engineering Tools</option>
                            <option value="Transport & Cycles">Transport & Cycles</option>
                            <option value="Other Essentials">Other Essentials</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="prodCondition">Condition <span class="req">*</span></label>
                        <select class="form-control" id="prodCondition" name="condition_type" required>
                            <option value="Brand New">Brand New (Unused)</option>
                            <option value="Like New" selected>Like New (Barely used)</option>
                            <option value="Good">Good (Minor usage marks)</option>
                            <option value="Fair">Fair (Fully functional)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="prodDuration">Requested Showcase Time Limit <span class="req">*</span></label>
                    <select class="form-control" id="prodDuration" name="duration_hours" required>
                        <option value="24">24 Hours (Flash Listing)</option>
                        <option value="48">48 Hours (2 Days)</option>
                        <option value="72" selected>72 Hours (3 Days - Recommended)</option>
                        <option value="168">7 Days (1 Week)</option>
                        <option value="360">15 Days</option>
                    </select>
                    <div class="form-help">Countdown timer starts the moment admin approves the listing</div>
                </div>

                <!-- Product Photo -->
                <div class="form-group">
                    <label class="form-label">Product Photo</label>
                    <div class="image-dropzone" id="dropzoneArea">
                        <input type="file" id="productImageInput" name="product_image" accept="image/jpeg,image/png,image/webp">
                        <div id="dropzonePlaceholder">
                            <div style="font-size: 2rem; margin-bottom: 0.35rem;">📷</div>
                            <p style="font-weight: 600; font-size: 0.92rem; color: #334155; margin: 0 0 0.2rem;">Click or drag product photo here</p>
                            <span style="font-size: 0.78rem; color: #94a3b8;">PNG, JPG, WEBP up to 5MB</span>
                        </div>
                        <img id="imagePreview" class="dropzone-preview" alt="Product Preview">
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label class="form-label" for="prodDesc">Description & Details <span class="req">*</span></label>
                    <textarea class="form-control" id="prodDesc" name="description" rows="3" required></textarea>
                </div>

                <hr style="border: none; border-top: 1px solid var(--prod-border); margin: 1.5rem 0;">

                <h4 style="font-size: 1rem; font-weight: 700; color: var(--prod-dark); margin-bottom: 1rem;">Contributor / Contact Details</h4>

                <div class="form-group-grid">
                    <div class="form-group">
                        <label class="form-label" for="sellerName">Your Name <span class="req">*</span></label>
                        <input type="text" class="form-control" id="sellerName" name="seller_name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="sellerPhone">WhatsApp / Mobile Phone <span class="req">*</span></label>
                        <input type="tel" class="form-control" id="sellerPhone" name="seller_phone" required>
                        <div class="form-help">Interested students will call or WhatsApp this number</div>
                    </div>
                </div>

                <div class="form-group-grid">
                    <div class="form-group">
                        <label class="form-label" for="sellerCity">Location / City <span class="req">*</span></label>
                        <input type="text" class="form-control" id="sellerCity" name="seller_city" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="sellerEmail">Email Address (Optional)</label>
                        <input type="email" class="form-control" id="sellerEmail" name="seller_email">
                    </div>
                </div>

                <!-- Submit Button -->
                <div style="margin-top: 1.5rem;">
                    <button type="submit" id="submitProductBtn" class="btn-slide-upload" style="width: 100%; justify-content: center; border-radius: 14px;">
                        <span id="btnText">Submit for Admin Approval 🚀</span>
                        <span id="btnSpinner" style="display: none;">⏳ Uploading...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ==============================================
     4. TOAST NOTIFICATION
     ============================================== -->
<div class="toast-popup" id="toastNotification">
    <span style="font-size: 1.3rem;" id="toastIcon">✅</span>
    <span id="toastMessage">Product uploaded successfully!</span>
</div>

<!-- ==============================================
     5. APPLY FOR PRODUCT POPUP (MODAL)
     ============================================== -->
<div class="modal-overlay" id="applyProductModal">
    <div class="modal-window" style="max-width: 640px;">
        <!-- Header -->
        <div class="modal-header">
            <div class="modal-header-title">
                <div class="modal-header-icon" style="background: #ecfdf5; color: #059669;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 12v10H4V12"></path>
                        <path d="M2 7h20v5H2z"></path>
                        <path d="M12 22V7"></path>
                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                    </svg>
                </div>
                <div>
                    <h3 style="font-size: 1.25rem;">Apply for this Product</h3>
                    <p style="font-size: 0.85rem; color: #64748b; margin: 0;">Fill in your details to receive this educational item</p>
                </div>
            </div>
            <button class="modal-close-btn" id="closeApplyModalBtn" aria-label="Close Modal">&times;</button>
        </div>

        <!-- Body / Form -->
        <div class="modal-body" style="padding: 1.5rem 1.75rem 2rem;">
            <!-- Selected Product Preview -->
            <div class="apply-card-preview" id="applyProductPreview">
                <img id="modalProductThumb" src="" alt="Product" class="apply-card-thumb">
                <div class="apply-card-details" style="flex: 1;">
                    <span id="modalProductCategory" style="font-size: 0.72rem; color: #059669; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 0.2rem;">CATEGORY</span>
                    <h4 id="modalProductTitle" style="margin: 0 0 0.35rem; font-size: 1.05rem; font-weight: 700; color: #0f172a; line-height: 1.3;">Product Title</h4>
                    <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                        <span style="display: inline-flex; align-items: center; gap: 0.3rem; background: #ecfdf5; color: #059669; font-size: 0.75rem; font-weight: 700; padding: 0.2rem 0.6rem; border-radius: 50px;">
                            <span>✓</span> 100% Free Resource
                        </span>
                        <span id="modalProductCondition" style="display: inline-block; background: #f1f5f9; color: #475569; font-size: 0.75rem; font-weight: 700; padding: 0.2rem 0.6rem; border-radius: 50px;">Condition</span>
                    </div>
                </div>
            </div>

            <form id="applyProductForm">
                <input type="hidden" id="applyProductId" name="product_id" value="">
                <input type="hidden" id="applyProductTitleInput" name="product_title" value="">

                <div class="form-group-grid">
                    <div class="form-group">
                        <label class="form-label" for="applicantName">Your Full Name <span class="req">*</span></label>
                        <input type="text" class="form-control" id="applicantName" name="applicant_name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="applicantPhone">Phone / WhatsApp <span class="req">*</span></label>
                        <input type="tel" class="form-control" id="applicantPhone" name="applicant_phone" required>
                    </div>
                </div>

                <div class="form-group-grid">
                    <div class="form-group">
                        <label class="form-label" for="applicantEmail">Email Address</label>
                        <input type="email" class="form-control" id="applicantEmail" name="applicant_email">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="applicantInstitution">School / College / Institute <span class="req">*</span></label>
                        <input type="text" class="form-control" id="applicantInstitution" name="institution" required>
                    </div>
                </div>

                <div class="form-group-grid">
                    <div class="form-group">
                        <label class="form-label" for="applicantCourseYear">Course / Grade / Year <span class="req">*</span></label>
                        <input type="text" class="form-control" id="applicantCourseYear" name="course_year" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="applicantAddress">City / Delivery Address <span class="req">*</span></label>
                        <input type="text" class="form-control" id="applicantAddress" name="address" required>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label class="form-label" for="applicantReason">Why do you need this item? <span class="req">*</span></label>
                    <textarea class="form-control" id="applicantReason" name="reason" rows="2" style="resize: vertical;" required></textarea>
                    <div class="form-help">Helps the donor & trustees verify that the item reaches a deserving student</div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" id="submitApplyBtn" class="btn-slide-upload" style="width: 100%; justify-content: center; border-radius: 12px; padding: 0.85rem 1.5rem;">
                        <span id="applyBtnText">Submit Product Application 🚀</span>
                        <span id="applyBtnSpinner" style="display: none;">⏳ Submitting...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ==============================================
     6. ACTIVE PRODUCTS LISTING SECTION
     ============================================== -->
<section class="products-main-section" id="activeListings">
    <div class="products-container">
        <!-- Header Bar -->
        <div class="products-header-bar">
            <div class="products-header-title">
                <h2>Verified Community Products</h2>
                <p>Showing currently approved items with active countdown timers.</p>
            </div>

            <!-- Search (Centered) -->
            <div class="filter-search-wrap">
                <form method="GET" action="<?php echo base_url('products#activeListings'); ?>" class="search-box-wrap">
                    <svg class="search-icon-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" name="search" placeholder="Search products or city..." value="<?php echo htmlspecialchars($search_query ?? ''); ?>">
                    <?php if (!empty($selected_category) && $selected_category !== 'All'): ?>
                        <input type="hidden" name="category" value="<?php echo htmlspecialchars($selected_category); ?>">
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <!-- Category Filter Pills -->
        <div class="category-pills">
            <?php 
                $categories = array('All', 'Books & Study Materials', 'Laptops & Gadgets', 'Uniforms & Lab Coats', 'Stationery & Engineering Tools', 'Transport & Cycles', 'Other Essentials');
                foreach ($categories as $cat): 
                    $isActive = ($selected_category === $cat) || (empty($selected_category) && $cat === 'All');
                    $catUrl = base_url('products?category=' . urlencode($cat) . '#activeListings');
            ?>
                <a href="<?php echo $catUrl; ?>" class="category-pill <?php echo $isActive ? 'active' : ''; ?>">
                    <?php echo htmlspecialchars($cat); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $p): ?>
                    <div class="product-card" data-expires="<?php echo $p['expires_at']; ?>" data-id="<?php echo $p['id']; ?>">
                        <!-- Image Wrap -->
                        <div class="product-img-wrap">
                            <span class="condition-badge"><?php echo htmlspecialchars($p['condition_type']); ?></span>

                            <?php 
                                $imgSrc = !empty($p['image']) && file_exists('./uploads/products/' . $p['image']) 
                                    ? base_url('uploads/products/' . $p['image']) 
                                    : 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600&auto=format&fit=crop&q=80';
                            ?>
                            <img src="<?php echo $imgSrc; ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" class="product-img" loading="lazy">
                        </div>

                        <!-- Product Info -->
                        <div class="product-info">
                            <!-- Time Limit immediately after Image in Red Color Text (No Background) -->
                            <div class="card-timelimit countdown-badge" id="timer-<?php echo $p['id']; ?>">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span class="timer-digits">Calculating...</span>
                            </div>

                            <span class="product-category-tag"><?php echo htmlspecialchars($p['category']); ?></span>
                            <h3 class="product-title" title="<?php echo htmlspecialchars($p['title']); ?>"><?php echo htmlspecialchars($p['title']); ?></h3>
                            <p class="product-desc"><?php echo htmlspecialchars($p['description']); ?></p>

                            <button type="button" class="btn-apply-product open-apply-modal-btn" 
                                    data-id="<?php echo $p['id']; ?>" 
                                    data-title="<?php echo htmlspecialchars($p['title']); ?>" 
                                    data-category="<?php echo htmlspecialchars($p['category']); ?>" 
                                    data-image="<?php echo $imgSrc; ?>"
                                    data-condition="<?php echo htmlspecialchars($p['condition_type']); ?>">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 12v10H4V12"></path>
                                    <path d="M2 7h20v5H2z"></path>
                                    <path d="M12 22V7"></path>
                                    <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                                    <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                                </svg>
                                <span>Apply for this Product</span>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-products-card">
                    <div class="empty-products-icon">📦</div>
                    <h3 style="font-size: 1.4rem; font-weight: 700; color: #0f172a; margin-bottom: 0.5rem;">No Active Products Found</h3>
                    <p style="color: #64748b; max-width: 450px; margin: 0 auto 1.5rem; font-size: 0.95rem;">
                        <?php if (!empty($search_query) || (!empty($selected_category) && $selected_category !== 'All')): ?>
                            No products match your current search or category filter. Try clearing your filters.
                        <?php else: ?>
                            Be the first to share an educational tool, book, or gadget with the student community!
                        <?php endif; ?>
                    </p>
                    <a href="<?php echo base_url('products/upload'); ?>" class="btn-slide-upload" style="text-decoration: none;">
                        <span>+ Upload Your Product</span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ==============================================
     7. JAVASCRIPT: SLIDER, MODAL & COUNTDOWN LOGIC
     ============================================== -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ----------------------------------------------------
    // 2. MODAL POPUP (UPLOAD FORM)
    // ----------------------------------------------------
    const uploadModal = document.getElementById('productUploadModal');
    const closeUploadModalBtn = document.getElementById('closeUploadModalBtn');
    const openUploadBtns = document.querySelectorAll('.open-upload-modal-btn');

    function openModal() {
        if (uploadModal) {
            uploadModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal() {
        if (uploadModal) {
            uploadModal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    openUploadBtns.forEach(btn => {
        btn.addEventListener('click', openModal);
    });

    if (closeUploadModalBtn) closeUploadModalBtn.addEventListener('click', closeModal);

    // Close on click outside modal window
    if (uploadModal) {
        uploadModal.addEventListener('click', function (e) {
            if (e.target === uploadModal) closeModal();
        });
    }

    // ESC key close
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
            closeApplyModal();
        }
    });

    // ----------------------------------------------------
    // 2B. APPLY PRODUCT MODAL HANDLERS
    // ----------------------------------------------------
    const applyModal = document.getElementById('applyProductModal');
    const closeApplyModalBtn = document.getElementById('closeApplyModalBtn');
    const openApplyBtns = document.querySelectorAll('.open-apply-modal-btn');
    const applyForm = document.getElementById('applyProductForm');
    const applyBtnText = document.getElementById('applyBtnText');
    const applyBtnSpinner = document.getElementById('applyBtnSpinner');
    const submitApplyBtn = document.getElementById('submitApplyBtn');

    function openApplyModal(data) {
        if (!applyModal) return;
        const idInput = document.getElementById('applyProductId');
        const titleInput = document.getElementById('applyProductTitleInput');
        const modalTitle = document.getElementById('modalProductTitle');
        const modalCategory = document.getElementById('modalProductCategory');
        const modalThumb = document.getElementById('modalProductThumb');
        const modalCondition = document.getElementById('modalProductCondition');

        if (idInput) idInput.value = data.id || '';
        if (titleInput) titleInput.value = data.title || '';
        if (modalTitle) modalTitle.textContent = data.title || 'Product';
        if (modalCategory) modalCategory.textContent = data.category || 'Category';
        if (modalThumb) modalThumb.src = data.image || '';
        if (modalCondition) modalCondition.textContent = data.condition || 'Good';

        applyModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeApplyModal() {
        if (!applyModal) return;
        applyModal.classList.remove('active');
        document.body.style.overflow = '';
    }

    openApplyBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const data = {
                id: this.getAttribute('data-id'),
                title: this.getAttribute('data-title'),
                category: this.getAttribute('data-category'),
                image: this.getAttribute('data-image'),
                condition: this.getAttribute('data-condition')
            };
            openApplyModal(data);
        });
    });

    if (closeApplyModalBtn) closeApplyModalBtn.addEventListener('click', closeApplyModal);

    if (applyModal) {
        applyModal.addEventListener('click', function (e) {
            if (e.target === applyModal) closeApplyModal();
        });
    }

    // Apply Form AJAX submission
    if (applyForm) {
        applyForm.addEventListener('submit', function (e) {
            e.preventDefault();

            if (applyBtnText && applyBtnSpinner && submitApplyBtn) {
                applyBtnText.style.display = 'none';
                applyBtnSpinner.style.display = 'inline';
                submitApplyBtn.disabled = true;
            }

            const formData = new FormData(applyForm);

            fetch('<?php echo base_url("welcome/apply_product"); ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    showToast('🎉 ' + data.message, true);
                    applyForm.reset();
                    closeApplyModal();
                } else {
                    showToast('⚠️ ' + (data.message || 'Error submitting application.'), false);
                }
            })
            .catch(err => {
                console.error(err);
                showToast('❌ Submission failed. Please check your connection.', false);
            })
            .finally(() => {
                if (applyBtnText && applyBtnSpinner && submitApplyBtn) {
                    applyBtnText.style.display = 'inline';
                    applyBtnSpinner.style.display = 'none';
                    submitApplyBtn.disabled = false;
                }
            });
        });
    }

    // ----------------------------------------------------
    // 3. IMAGE PREVIEW HANDLER
    // ----------------------------------------------------
    const imageInput = document.getElementById('productImageInput');
    const imagePreview = document.getElementById('imagePreview');
    const dropzonePlaceholder = document.getElementById('dropzonePlaceholder');

    if (imageInput) {
        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (imagePreview) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }
                    if (dropzonePlaceholder) dropzonePlaceholder.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // ----------------------------------------------------
    // 4. AJAX FORM SUBMISSION
    // ----------------------------------------------------
    const form = document.getElementById('productUploadForm');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    const submitBtn = document.getElementById('submitProductBtn');

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(form);

            if (btnText && btnSpinner && submitBtn) {
                btnText.style.display = 'none';
                btnSpinner.style.display = 'inline';
                submitBtn.disabled = true;
            }

            fetch('<?php echo base_url("welcome/upload_product"); ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    showToast('🎉 ' + data.message, true);
                    form.reset();
                    if (imagePreview) imagePreview.style.display = 'none';
                    if (dropzonePlaceholder) dropzonePlaceholder.style.display = 'block';
                    closeModal();
                } else {
                    showToast('⚠️ ' + (data.message || 'Error uploading product.'), false);
                }
            })
            .catch(err => {
                console.error(err);
                showToast('❌ Submission failed. Please check your connection.', false);
            })
            .finally(() => {
                if (btnText && btnSpinner && submitBtn) {
                    btnText.style.display = 'inline';
                    btnSpinner.style.display = 'none';
                    submitBtn.disabled = false;
                }
            });
        });
    }

    // ----------------------------------------------------
    // 5. TOAST NOTIFICATION UTILITY
    // ----------------------------------------------------
    function showToast(msg, isSuccess = true) {
        const toast = document.getElementById('toastNotification');
        const toastMsg = document.getElementById('toastMessage');
        const toastIcon = document.getElementById('toastIcon');

        if (toast && toastMsg) {
            toastMsg.innerText = msg;
            if (toastIcon) toastIcon.innerText = isSuccess ? '✅' : '⚠️';
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 5500);
        }
    }

    // ----------------------------------------------------
    // 6. LIVE REAL-TIME COUNTDOWN TIMERS
    // ----------------------------------------------------
    function updateTimers() {
        const cards = document.querySelectorAll('.product-card[data-expires]');
        const now = new Date().getTime();

        cards.forEach(card => {
            const expireStr = card.getAttribute('data-expires');
            if (!expireStr) return;

            // Parse MySQL DATETIME string: YYYY-MM-DD HH:MM:SS
            const t = expireStr.split(/[- :]/);
            const expireTime = new Date(t[0], t[1] - 1, t[2], t[3] || 0, t[4] || 0, t[5] || 0).getTime();
            const diff = expireTime - now;
            const timerElem = card.querySelector('.countdown-badge');
            const digitsElem = card.querySelector('.timer-digits');

            if (!timerElem || !digitsElem) return;

            if (diff <= 0) {
                digitsElem.innerHTML = "Expired";
                timerElem.classList.add('urgent');
                card.style.opacity = '0.55';
            } else {
                const totalSeconds = Math.floor(diff / 1000);
                const days = Math.floor(totalSeconds / 86400);
                const hours = Math.floor((totalSeconds % 86400) / 3600);
                const minutes = Math.floor((totalSeconds % 3600) / 60);
                const seconds = totalSeconds % 60;

                let displayText = '';
                if (days > 0) {
                    displayText = `${days}d ${hours}h ${minutes}m left`;
                } else if (hours > 0) {
                    displayText = `${hours}h ${minutes}m ${seconds}s left`;
                } else {
                    displayText = `${minutes}m ${seconds}s left`;
                    timerElem.classList.add('urgent');
                }

                digitsElem.innerHTML = displayText;
            }
        });
    }

    setInterval(updateTimers, 1000);
    updateTimers();
});
</script>

<?php $this->load->view('includes/footer'); ?>
