<?php
function getUserIP()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    return ($ip == '::1') ? '127.0.0.1' : $ip;
}

function updatePageView($page_name)
{
    include '../../dash-app/app/config/koneksi.php';
    global $koneksi;

    if (!$koneksi) {
        error_log("Koneksi gagal: " . mysqli_connect_error());
    }

    $ip = getUserIP();
    $one_hour_ago = date('Y-m-d H:i:s', time() - 3600);

    $stmt = $koneksi->prepare("SELECT id_visitor FROM visitor_logs WHERE name_visitor = ? AND ip_address = ? AND visit_time > ?");
    $stmt->bind_param("sss", $page_name, $ip, $one_hour_ago);
    if (!$stmt->execute()) {
        error_log("Error checking visitor_logs: " . $stmt->error);
    }
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $stmt = $koneksi->prepare("INSERT INTO page_views (page_name, views) 
                                   VALUES (?, 1) 
                                   ON DUPLICATE KEY UPDATE views = views + 1");
        $stmt->bind_param("s", $page_name);
        if (!$stmt->execute()) {
            error_log("Error updating page_views: " . $stmt->error);
        }

        $stmt = $koneksi->prepare("INSERT INTO visitor_logs (name_visitor, ip_address, visit_time) 
                                   VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $page_name, $ip);
        if (!$stmt->execute()) {
            error_log("Error inserting visitor_logs: " . $stmt->error);
        }
    }

    $stmt = $koneksi->prepare("SELECT views FROM page_views WHERE page_name = ?");
    $stmt->bind_param("s", $page_name);
    if (!$stmt->execute()) {
        error_log("Error getting page_views: " . $stmt->error);
    }
    $stmt->close();
}

function totalViews()
{
    include '../../dash-app/app/config/koneksi.php';
    global $koneksi;

    if (!$koneksi) {
        error_log("Koneksi gagal: " . mysqli_connect_error());
    }

    $result = $koneksi->query("SELECT SUM(views) AS total FROM page_views");
    if (!$result) {
        error_log("Error getting total views: " . $koneksi->error);
    }
    $row = $result->fetch_assoc();

    $total = ($row['total'] ?? 0);
    $koneksi->close();

    return $total;
}

function getVisitorStats()
{
    include '../../dash-app/app/config/koneksi.php';
    global $koneksi;

    if (!$koneksi) {
        error_log("Koneksi gagal: " . mysqli_connect_error());
    }

    $today = date('Y-m-d');
    $yesterday = date('Y-m-d', strtotime('-1 day'));
    $monday_this_week = date('Y-m-d 00:00:00', strtotime('monday this week'));
    $first_day_of_month = date('Y-m-01 00:00:00');

    $monday_last_week = date('Y-m-d 00:00:00', strtotime('monday last week'));
    $sunday_last_week = date('Y-m-d 23:59:59', strtotime('sunday last week'));

    $first_day_last_month = date('Y-m-01 00:00:00', strtotime('first day of last month'));
    $last_day_last_month = date('Y-m-t 23:59:59', strtotime('last month'));

    $stats = [
        'today' => 0,
        'yesterday' => 0,
        'this_week' => 0,
        'last_week' => 0,
        'this_month' => 0,
        'last_month' => 0,
        'total' => 0,
    ];

    // Hari ini
    $stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM visitor_logs WHERE DATE(visit_time) = ?");
    $stmt->bind_param("s", $today);
    $stmt->execute();
    $result = $stmt->get_result();
    $stats['today'] = $result->fetch_assoc()['total'] ?? 0;
    $stmt->close();

    // Kemarin
    $stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM visitor_logs WHERE DATE(visit_time) = ?");
    $stmt->bind_param("s", $yesterday);
    $stmt->execute();
    $result = $stmt->get_result();
    $stats['yesterday'] = $result->fetch_assoc()['total'] ?? 0;
    $stmt->close();

    // Minggu ini
    $stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM visitor_logs WHERE visit_time >= ?");
    $stmt->bind_param("s", $monday_this_week);
    $stmt->execute();
    $result = $stmt->get_result();
    $stats['this_week'] = $result->fetch_assoc()['total'] ?? 0;
    $stmt->close();

    // Minggu lalu
    $stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM visitor_logs WHERE visit_time BETWEEN ? AND ?");
    $stmt->bind_param("ss", $monday_last_week, $sunday_last_week);
    $stmt->execute();
    $result = $stmt->get_result();
    $stats['last_week'] = $result->fetch_assoc()['total'] ?? 0;
    $stmt->close();

    // Bulan ini
    $stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM visitor_logs WHERE visit_time >= ?");
    $stmt->bind_param("s", $first_day_of_month);
    $stmt->execute();
    $result = $stmt->get_result();
    $stats['this_month'] = $result->fetch_assoc()['total'] ?? 0;
    $stmt->close();

    // Bulan lalu
    $stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM visitor_logs WHERE visit_time BETWEEN ? AND ?");
    $stmt->bind_param("ss", $first_day_last_month, $last_day_last_month);
    $stmt->execute();
    $result = $stmt->get_result();
    $stats['last_month'] = $result->fetch_assoc()['total'] ?? 0;
    $stmt->close();

    // Total semua
    $stmt = $koneksi->query("SELECT COUNT(*) AS total FROM visitor_logs");
    $row = $stmt->fetch_assoc();
    $stats['total'] = $row['total'] ?? 0;

    // $koneksi->close();
    return $stats;
}

// Fungsi individual
function viewsToday()
{
    $stats = getVisitorStats();
    return $stats['today'];
}

function viewsYesterday()
{
    $stats = getVisitorStats();
    return $stats['yesterday'];
}

function viewsThisWeek()
{
    $stats = getVisitorStats();
    return $stats['this_week'];
}

function viewsLastWeek()
{
    $stats = getVisitorStats();
    return $stats['last_week'];
}

function viewsThisMonth()
{
    $stats = getVisitorStats();
    return $stats['this_month'];
}

function viewsLastMonth()
{
    $stats = getVisitorStats();
    return $stats['last_month'];
}

function viewsTotal()
{
    $stats = getVisitorStats();
    return $stats['total'];
}
