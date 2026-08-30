<?php
session_start();
if (!isset($_SESSION['adminName'])) {
    header("Location: login.php");
    exit();
}
require_once('../configure.php');

// Verify connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetch dynamic counts for sidebar badges
$count_unverified = 0;
$count_verified = 0;
$count_unverified_query = "SELECT COUNT(*) as total FROM `registration_26to27` WHERE isVerified ='0'";
$res_un = mysqli_query($conn, $count_unverified_query);
if ($res_un) {
    $count_unverified = mysqli_fetch_assoc($res_un)['total'];
}

$count_verified_query = "SELECT COUNT(*) as total FROM `registration_26to27` WHERE isVerified ='1'";
$res_v = mysqli_query($conn, $count_verified_query);
if ($res_v) {
    $count_verified = mysqli_fetch_assoc($res_v)['total'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Watim Medical College - Admin Panel</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome 6 icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts - Outfit & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-bg: #0f172a;
            --secondary-bg: #1e293b;
            --accent-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            --accent-color: #6366f1;
            --accent-hover: #4f46e5;
            --body-bg: #f8fafc;
            --card-border: rgba(226, 232, 240, 0.8);
            --text-main: #334155;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-main);
            overflow-x: hidden;
            display: flex;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6, .brand-text {
            font-family: 'Outfit', sans-serif;
        }

        /* Layout Structure */
        #admin-wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        #admin-content {
            flex-grow: 1;
            padding: 2rem;
            min-width: 0;
            transition: all 0.3s ease;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--primary-bg) 0%, var(--secondary-bg) 100%);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #fff;
        }

        .sidebar-brand:hover {
            color: #fff;
        }

        .sidebar-brand i {
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 2rem;
        }

        .brand-text {
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            list-style: none;
            padding: 1.5rem 0.75rem;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .sidebar-item-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            padding: 0.75rem 1rem 0.25rem 1rem;
            font-weight: 700;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.85rem 1rem;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-link-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-link i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }

        .sidebar-link:hover i {
            color: #ffffff;
            transform: scale(1.1);
        }

        .sidebar-link.active {
            background: var(--accent-gradient);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .sidebar-link.active i {
            color: #ffffff;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.15);
        }

        .admin-profile-box {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1rem;
        }

        .admin-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--accent-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-family: 'Outfit', sans-serif;
            font-size: 1.1rem;
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.25);
        }

        .admin-info {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .admin-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #f8fafc;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .admin-role {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* Top Header Styling */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            background: #ffffff;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--card-border);
        }

        .topbar-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-bg);
            margin: 0;
        }

        /* Card and Table styling */
        .admin-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid var(--card-border);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.02), 0 4px 6px -4px rgba(0, 0, 0, 0.02);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .admin-card-header {
            padding: 1.5rem 2rem;
            background: #ffffff;
            border-bottom: 1px solid var(--card-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .admin-card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-bg);
            margin: 0;
        }

        .table-responsive-custom {
            overflow-x: auto;
            width: 100%;
        }

        .table-custom {
            width: 100%;
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table-custom th {
            background-color: #f8fafc;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 1rem 1.25rem;
            border-bottom: 2px solid var(--card-border);
        }

        .table-custom td {
            padding: 1rem 1.25rem;
            font-size: 0.875rem;
            border-bottom: 1px solid var(--card-border);
            color: var(--text-main);
            transition: background 0.15s ease;
        }

        .table-custom tbody tr:hover td {
            background-color: #f1f5f9;
        }

        /* Custom scrollbar for tables */
        .table-responsive-custom::-webkit-scrollbar {
            height: 8px;
        }
        .table-responsive-custom::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .table-responsive-custom::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .table-responsive-custom::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Action Buttons */
        .btn-action-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: 500;
            font-size: 0.75rem;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            transition: all 0.15s ease;
            text-decoration: none;
            width: 100%;
            border: none;
        }

        .btn-action-edit {
            background-color: #eff6ff;
            color: #2563eb;
        }
        .btn-action-edit:hover {
            background-color: #2563eb;
            color: #ffffff;
        }

        .btn-action-print {
            background-color: #f0fdf4;
            color: #16a34a;
        }
        .btn-action-print:hover {
            background-color: #16a34a;
            color: #ffffff;
        }

        .btn-action-delete {
            background-color: #fef2f2;
            color: #dc2626;
        }
        .btn-action-delete:hover {
            background-color: #dc2626;
            color: #ffffff;
        }

        /* Status Badge */
        .badge-custom {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 0.35em 0.65em;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 9999px;
            text-transform: uppercase;
        }

        .badge-success-light {
            background-color: #dcfce7;
            color: #15803d;
        }

        .badge-danger-light {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        /* Search input styling */
        .search-container {
            position: relative;
            max-width: 320px;
            width: 100%;
        }

        .search-input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            font-size: 0.875rem;
            border-radius: 8px;
            border: 1px solid var(--card-border);
            outline: none;
            transition: all 0.15s ease;
        }

        .search-input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }

        .search-icon {
            position: absolute;
            left: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
        }

        /* Smooth page transition animations */
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* --- Mobile Responsive Layout Styles --- */
        .admin-mobile-header {
            display: none !important;
        }

        .sidebar-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(15, 23, 42, 0.6); /* Slate dark matching admin theme */
            backdrop-filter: blur(4px);
            z-index: 1040;
            display: none;
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .sidebar-backdrop.show-backdrop {
            display: block;
            opacity: 1;
        }

        @media (max-width: 991.98px) {
            body {
                flex-direction: column !important;
            }

            #admin-wrapper {
                flex-direction: column !important;
            }

            .admin-mobile-header {
                display: flex !important;
                background-color: var(--primary-bg);
                color: #ffffff;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            }

            .sidebar {
                position: fixed !important;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 1050;
                transform: translateX(-100%);
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .sidebar.show-sidebar {
                transform: translateX(0) !important;
            }

            #admin-content {
                padding: 1.25rem !important;
            }

            .topbar {
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 15px !important;
                padding: 1rem !important;
                margin-bottom: 1.5rem !important;
            }

            .topbar-title-section {
                text-align: center;
            }

            .search-container {
                max-width: 100% !important;
            }

            /* Adjust stats cards */
            .row.mb-4 > div {
                margin-bottom: 1rem;
            }
            .row.mb-4 > div:last-child {
                margin-bottom: 0;
            }
            
            /* Form columns */
            .form-group.row > div {
                margin-bottom: 1rem;
            }
            .form-group.row > div:last-child {
                margin-bottom: 0;
            }
            
            /* Banner alignments */
            .admin-card.p-4.mb-4 .text-md-end {
                text-align: left !important;
                margin-top: 1rem;
            }
            .admin-card.p-4.mb-4 button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div id="admin-wrapper">
        <!-- Mobile View Header Bar -->
        <div class="admin-mobile-header d-flex d-lg-none align-items-center justify-content-between p-3 position-sticky top-0" style="z-index: 1040; width: 100%;">
            <button class="btn btn-outline-light border-0" id="adminSidebarToggle">
                <i class="fa-solid fa-bars fa-lg"></i>
            </button>
            <div class="brand-text fw-bold" style="font-size: 1.1rem; letter-spacing: 0.5px;">WMDC Admin</div>
            <div style="width: 40px;"></div> <!-- Balanced spacer -->
        </div>

        <!-- Sidebar Mobile Backdrop -->
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>
