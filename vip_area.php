<?php
require_once('includes/session.inc.php');
include('includes/head.inc.php');
include('includes/nav.inc.php');
?>
    <section class="header_background" style="background-image: url('img/header_img.jpg');">
        <section class="header_title">
            <img src="img/logo_vip.png" alt="Moz ball rally logo">
        </section>
    </section>
<section class="container">
<?php // Make sure the user is logged in before going any further.
if (!isset($_SESSION['u_name'])) {

    echo '<h1 class="member_title">MEMBERS ONLY</h1>';

    echo '<p class="login">Please login to access this page. If you are not a member then please register <a href="register.php">here</a> </p>';
    exit();
}
else {
    echo ('<h1 class="member_title">Members VIP Area</h1>');
    echo('<h2 class="login">Welcome, ' . $_SESSION['u_name'] . '.</h2>');
    echo('<p>Only you can see this area ' . $_SESSION['f_name'] . ' . <p> 
        <p>If you would like to view / amend you profile then click <a href="profile.php">here</a></p>');
}

?>
</section>
<?php include('includes/footer.inc.php'); ?>

<?php
/*
*
 * Display errors messages based on the errors set in the URL by getting the login = "errors message"
 * Using JavaScript inside the php echo scripts I can set an alert box to display the relevant error message
*/
if (!isset($_GET['login'])) {
    exit();
} else {
    $regCheck = $_GET['login'];

    if ($regCheck == "empty") {
        echo '<script type="text/javascript"> window.onload = function() {alert("Please fill in both fields!")};</script>';
        exit();
    } elseif ($regCheck == "error") {
        echo '<script type="text/javascript"> window.onload = function() {alert("Incorrect username or password!")};</script>';
        exit();
    }
}
?>
