<?php
// Get current page to set active class
$current_page = basename($_SERVER['PHP_SELF']);
$admin_name = isset($_SESSION['adminName']) ? $_SESSION['adminName'] : 'Admin';
$avatar_letter = strtoupper(substr($admin_name, 0, 1));
?>
<!-- Sidebar -->
<aside class="sidebar">
    <a href="unverified.php" class="sidebar-brand">
        <i class="fa-solid fa-user-doctor"></i>
        <div class="brand-text">WMDC Admin</div>
    </a>
    
    <ul class="sidebar-menu">
        <div class="sidebar-item-label">Student Management</div>
        
        <li>
            <a href="unverified.php" class="sidebar-link <?php echo ($current_page == 'unverified.php') ? 'active' : ''; ?>">
                <div class="sidebar-link-content">
                    <i class="fa-solid fa-user-clock"></i>
                    <span>Unverified Students</span>
                </div>
                <span class="badge bg-danger rounded-pill"><?php echo $count_unverified; ?></span>
            </a>
        </li>
        
        <li>
            <a href="verified.php" class="sidebar-link <?php echo ($current_page == 'verified.php') ? 'active' : ''; ?>">
                <div class="sidebar-link-content">
                    <i class="fa-solid fa-user-check"></i>
                    <span>Verified Students</span>
                </div>
                <span class="badge bg-success rounded-pill"><?php echo $count_verified; ?></span>
            </a>
        </li>
    </ul>
    
    <div class="sidebar-footer">
        <div class="admin-profile-box">
            <div class="admin-avatar">
                <?php echo $avatar_letter; ?>
            </div>
            <div class="admin-info">
                <span class="admin-name" title="<?php echo htmlspecialchars($admin_name); ?>"><?php echo htmlspecialchars($admin_name); ?></span>
                <span class="admin-role">Portal Admin</span>
            </div>
        </div>
        <a href="logout.php" class="btn btn-outline-danger w-100 btn-sm d-flex align-items-center justify-content-center gap-2">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Log Out</span>
        </a>
    </div>
</aside>
