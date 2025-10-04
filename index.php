<?php
require_once("include/initialize.php");

// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect to landing page if accessed directly via localhost/brgy
if ($_SERVER['REQUEST_URI'] == '/brgy184/') {
    redirect(WEB_ROOT . "main.php");
    exit(); // Ensure no further code is executed after redirect
}

// Check if the user is logged in
if (!isset($_SESSION['UID'])) {
    // Redirect to landing page if not logged in
    redirect(WEB_ROOT . "main.php");
    exit(); // Ensure no further code is executed after redirect
}

// Redirect if the user is a Resident
if ($_SESSION['TYPE'] == 'Resident' || $_SESSION['TYPE'] == 'Treasurer') {
    header("Location: http://localhost/brgy184/view/res_announcement/");
    exit(); // Ensure no further code is executed after redirect
}elseif ($_SESSION['TYPE'] == 'Lupon ng Tagapamayapa'){
    header("Location: http://localhost/brgy184/view/blotter/");
    exit(); // Ensure no further code is executed after redirect) {
    # code...
}
// elseif ($_SESSION['TYPE'] == 'Kagawad'){
//     header("Location: http://localhost/brgy/view/res_announcement/");
//     exit(); // Ensure no further code is executed after redirect) {
//     # code...
// }

// Default content and title for non-Resident users
$content = 'home.php';
$title = "Dashboard";
$view = isset($_GET['page']) && $_GET['page'] != '' ? $_GET['page'] : '';

// Determine which content to display based on the view
switch ($view) {
    case '1':
        $title = "Announcement"; 
        $content = 'home.php'; 
        break;

    default:
        $content = 'home.php'; 
}

// Load the template
require_once("theme/template.php");
?>
