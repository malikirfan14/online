<?php
// Include custom header which also handles authentication check and configure.php import
require_once('header.php');
include_once('sidebar.php');

// Define pagination parameters
$records_per_page = 50; // Performance: set to 50 records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $records_per_page;

// Search query
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$total_records = 0;
$connect = false;

if ($search !== '') {
    // Count query for pagination with search criteria
    $count_query = "SELECT COUNT(*) as total FROM `registration_26to27` WHERE isVerified ='0' AND (`name` LIKE ? OR `fname` LIKE ? OR `cnic` LIKE ? OR `id` LIKE ? OR `uhs_application_id` LIKE ?)";
    if ($stmt_count = mysqli_prepare($conn, $count_query)) {
        $search_param = "%$search%";
        mysqli_stmt_bind_param($stmt_count, "sssss", $search_param, $search_param, $search_param, $search_param, $search_param);
        mysqli_stmt_execute($stmt_count);
        $result_count = mysqli_stmt_get_result($stmt_count);
        $total_records = mysqli_fetch_assoc($result_count)['total'];
        mysqli_stmt_close($stmt_count);
    }
    
    // Main query with search criteria and pagination
    $var = "SELECT * FROM `registration_26to27` WHERE isVerified ='0' AND (`name` LIKE ? OR `fname` LIKE ? OR `cnic` LIKE ? OR `id` LIKE ? OR `uhs_application_id` LIKE ?) LIMIT ?, ?";
    if ($stmt = mysqli_prepare($conn, $var)) {
        $search_param = "%$search%";
        mysqli_stmt_bind_param($stmt, "sssssii", $search_param, $search_param, $search_param, $search_param, $search_param, $offset, $records_per_page);
        mysqli_stmt_execute($stmt);
        $connect = mysqli_stmt_get_result($stmt);
    }
} else {
    // Normal count query for pagination
    $count_query = "SELECT COUNT(*) as total FROM `registration_26to27` WHERE isVerified ='0'";
    $result_count = mysqli_query($conn, $count_query);
    if ($result_count) {
        $total_records = mysqli_fetch_assoc($result_count)['total'];
    }
    
    // Normal query with pagination
    $var = "SELECT * FROM `registration_26to27` WHERE isVerified ='0' LIMIT ?, ?";
    if ($stmt = mysqli_prepare($conn, $var)) {
        mysqli_stmt_bind_param($stmt, "ii", $offset, $records_per_page);
        mysqli_stmt_execute($stmt);
        $connect = mysqli_stmt_get_result($stmt);
    }
}

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);
?>

<div id="admin-content" class="animate-fade-in">
    <!-- Topbar -->
    <div class="topbar">
        <div class="topbar-title-section">
            <h1 class="topbar-title">Unverified Students</h1>
            <p class="text-muted small mb-0">Manage and verify new applicant registrations</p>
        </div>
        
        <!-- Live Search Box -->
        <form method="GET" action="unverified.php" class="search-container">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
            <input type="text" name="search" class="search-input" placeholder="Search Name, CNIC, ID..." value="<?php echo htmlspecialchars($search); ?>">
            <?php if ($search !== ''): ?>
                <a href="unverified.php" class="position-absolute end-0 top-50 translate-middle-y me-2 text-muted" title="Clear Search">
                    <i class="fa-solid fa-circle-xmark"></i>
                </a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Stats Summary Card -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="admin-card p-3 d-flex align-items-center justify-content-between mb-0">
                <div>
                    <span class="text-muted small uppercase font-weight-bold">Total Unverified</span>
                    <h3 class="mb-0 mt-1 font-weight-bold text-danger"><?php echo $count_unverified; ?></h3>
                </div>
                <div class="bg-danger-light p-3 rounded-circle text-danger">
                    <i class="fa-solid fa-user-clock fa-xl"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-card p-3 d-flex align-items-center justify-content-between mb-0">
                <div>
                    <span class="text-muted small uppercase font-weight-bold">Total Verified</span>
                    <h3 class="mb-0 mt-1 font-weight-bold text-success"><?php echo $count_verified; ?></h3>
                </div>
                <div class="bg-success-light p-3 rounded-circle text-success">
                    <i class="fa-solid fa-user-check fa-xl"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-card p-3 d-flex align-items-center justify-content-between mb-0">
                <div>
                    <span class="text-muted small uppercase font-weight-bold">Showing Page</span>
                    <h3 class="mb-0 mt-1 font-weight-bold text-primary"><?php echo "$page of " . ($total_pages > 0 ? $total_pages : 1); ?></h3>
                </div>
                <div class="bg-primary-light p-3 rounded-circle text-primary" style="background-color: #eff6ff; color: #2563eb;">
                    <i class="fa-solid fa-file-invoice fa-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h5 class="admin-card-title">Registration Records</h5>
            <span class="badge bg-secondary">Total Records: <?php echo $total_records; ?></span>
        </div>
        
        <div class="table-responsive-custom">
            <table class="table-custom table table-hover">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>U.ID</th>                             
                        <th>ID</th>    
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>CNIC</th>
                        <th>Matric</th>
                        <th>FSc</th>
                        <th>MDCAT</th>
                        <th>Agg</th>
                        <th>Year</th>                                    
                        <th>P/C/B</th> 
                        <th>Program</th>
                        <th style="min-width: 110px;">Actions</th>
                        <th>MBBS</th>
                        <th>BDS</th>
                        <th>Doc</th>
                        <th>Verified</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($connect && mysqli_num_rows($connect) > 0) {
                        $sn = $offset + 1;
                        while ($row = mysqli_fetch_array($connect)) {
                            echo '<tr>';
                            echo '<td>' . $sn++ . '</td>';
                            echo '<td class="font-weight-bold">' . htmlspecialchars($row['uhs_application_id'] ?? '') . '</td>';                                
                            echo '<td>' . htmlspecialchars($row['id'] ?? '') . '</td>';
                            echo '<td class="font-weight-bold text-dark">' . htmlspecialchars($row['name'] ?? '') . '</td>';
                            echo '<td>' . htmlspecialchars($row['fname'] ?? '') . '</td>';
                            echo '<td>' . htmlspecialchars($row['gender'] ?? '') . '</td>';
                            echo '<td>' . htmlspecialchars($row['stdPhone'] ?? '') . '</td>';
                            echo '<td>' . htmlspecialchars($row['cnic'] ?? '') . '</td>';
                            echo '<td>' . htmlspecialchars($row['matricMarks'] ?? '') . '</td>';
                            echo '<td>' . htmlspecialchars($row['fscmarks'] ?? '') . '</td>';
                            echo '<td>' . htmlspecialchars($row['mcatr'] ?? '') . '</td>';
                            echo '<td class="font-weight-bold text-primary">' . htmlspecialchars($row['aggregatePer'] ?? '') . '%</td>';
                            echo '<td>' . htmlspecialchars($row['comYear'] ?? '') . '</td>';
                            echo '<td>' . htmlspecialchars($row['physics'] ?? '') . '</td>';
                            echo '<td><span class="badge bg-secondary">' . htmlspecialchars($row['program'] ?? '') . '</span></td>';

                            // Action buttons
                            echo '<td>';
                            echo '<div class="btn-action-group">';
                            echo '<a href="edit.php?cnic=' . urlencode($row['cnic']) . '" class="btn-action btn-action-edit"><i class="fa-solid fa-pen-to-square"></i> Update</a>';
                            echo '<a href="print.php?cnic=' . urlencode($row['cnic']) . '&id=' . urlencode($row['id']) . '" target="_blank" class="btn-action btn-action-print"><i class="fa-solid fa-print"></i> Print</a>';
                            echo '<a href="delete.php?cnic=' . urlencode($row['cnic']) . '&id=' . urlencode($row['id']) . '" onclick="return confirm(\'Are you sure you want to delete ' . htmlspecialchars($row['name']) . '\\\'s record?\');" class="btn-action btn-action-delete"><i class="fa-solid fa-trash-can"></i> Delete</a>';
                            echo '</div>';
                            echo '</td>';

                            // MBBS status
                            echo '<td>';
                            if ($row['program'] == 'MBBS' || $row['program'] == 'BOTH') {
                                if ($row['isChallanDone'] == '1') {
                                    echo '<span class="badge-custom badge-success-light"><i class="fa-solid fa-circle-check"></i> Paid</span>';
                                } else {
                                    echo '<span class="badge-custom badge-danger-light"><i class="fa-solid fa-circle-xmark"></i> Pending</span>';
                                }
                            } else {
                                echo '<span class="text-muted small">-</span>';
                            }
                            echo '</td>';

                            // BDS status
                            echo '<td>';
                            if ($row['program'] == 'BDS' || $row['program'] == 'BOTH') {
                                if ($row['isChallanDone'] == '1') {
                                    echo '<span class="badge-custom badge-success-light"><i class="fa-solid fa-circle-check"></i> Paid</span>';
                                } else {
                                    echo '<span class="badge-custom badge-danger-light"><i class="fa-solid fa-circle-xmark"></i> Pending</span>';
                                }
                            } else {
                                echo '<span class="text-muted small">-</span>';
                            }
                            echo '</td>';

                            // Documents status
                            echo '<td>';
                            if ($row['isDocumentsDone'] == '1') {
                                echo '<span class="badge-custom badge-success-light"><i class="fa-solid fa-cloud-arrow-up"></i> Uploaded</span>';
                            } else {
                                echo '<span class="badge-custom badge-danger-light"><i class="fa-solid fa-clock"></i> Pending</span>';
                            }
                            echo '</td>';

                            // Verification status
                            echo '<td>';
                            if ($row['isVerified'] == '1') {
                                echo '<span class="badge-custom badge-success-light"><i class="fa-solid fa-shield-check"></i> Verified</span>';
                            } else {
                                echo '<span class="badge-custom badge-danger-light"><i class="fa-solid fa-shield-xmark"></i> Unverified</span>';
                            }
                            echo '</td>';

                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="20" class="text-center py-4 text-muted"><i class="fa-solid fa-triangle-exclamation"></i> No unverified records found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination Section -->
        <?php if ($total_pages > 1): ?>
            <div class="d-flex justify-content-between align-items-center p-3 border-top flex-wrap gap-2">
                <span class="text-muted small">Showing <?php echo min($total_records, $offset + 1); ?> to <?php echo min($total_records, $offset + $records_per_page); ?> of <?php echo $total_records; ?> records</span>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <!-- Previous Page -->
                        <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="unverified.php?page=<?php echo $page - 1; ?><?php echo ($search !== '') ? '&search=' . urlencode($search) : ''; ?>">Previous</a>
                        </li>
                        
                        <!-- Page Numbers -->
                        <?php
                        $start_page = max(1, $page - 2);
                        $end_page = min($total_pages, $page + 2);
                        
                        if ($start_page > 1) {
                            echo '<li class="page-item"><a class="page-link" href="unverified.php?page=1' . (($search !== '') ? '&search=' . urlencode($search) : '') . '">1</a></li>';
                            if ($start_page > 2) {
                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                            }
                        }
                        
                        for ($i = $start_page; $i <= $end_page; $i++) {
                            echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="unverified.php?page=' . $i . (($search !== '') ? '&search=' . urlencode($search) : '') . '">' . $i . '</a></li>';
                        }
                        
                        if ($end_page < $total_pages) {
                            if ($end_page < $total_pages - 1) {
                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                            }
                            echo '<li class="page-item"><a class="page-link" href="unverified.php?page=' . $total_pages . (($search !== '') ? '&search=' . urlencode($search) : '') . '">' . $total_pages . '</a></li>';
                        }
                        ?>
                        
                        <!-- Next Page -->
                        <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="unverified.php?page=<?php echo $page + 1; ?><?php echo ($search !== '') ? '&search=' . urlencode($search) : ''; ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}
// Include custom footer layout
include_once('footer.php');
?>
