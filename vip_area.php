<?php
include('includes/session.inc.php');
include('includes/head.inc.php');
include('nav.inc.php');
?>
    <section class="header_background" style="background-image: url('img/header_img.jpg');">
        <section class="header_title">
            <img src="img/logo_vip.png" alt="Moz ball rally logo">
        </section>
    </section>

<?php // Make sure the user is logged in before going any further.
if (!isset($_SESSION['u_name'])) {

    echo '<h2>MEMBERS ONLY</h2>';

    echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
    exit();
}
else {
    echo('<p class="login">You are logged in as ' . $_SESSION['u_name'] . '. <a href="logout.php">Log out</a>.</p>');
    echo('<p>You are more than welcome to be here, as this site is secured by sessions and cookies<p> 
        <p>Even if you accidentally close your browser, the cookie should let you back in until you <strong>logout</strong></p>');
}

?>
<?php include("includes/footer.php"); ?>