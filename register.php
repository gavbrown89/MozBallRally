<?php
require_once ('includes/session.inc.php');
include('includes/head.inc.php');
include('includes/nav.inc.php');
?>

<section class="container">
        <h1 class="member_title">Mozball VIP Registration</h1>
    <div class="form_container">
        <p>Please fill in all the required fields below to gain access to our VIP area</p>
        <p class="lead">Register</p>
        <form class="register_form" action="includes/signup.inc.php" method="post">
            <dt><label for="user_name">Username<span class="red"> *</span></label></dt>
            <dd><input type="text" id="user_name" name="user_name" onblur="validateNonEmpty(this,document.getElementById('user_name_help'))" required /></dd>
            <span id="user_name_help" class="help"></span>
            <dt><label for="first_name">First Name<span class="red"> *</span></label></dt>
            <dd><input type="text" id="first_name" name="first_name" onblur="validateNonEmpty(this,document.getElementById('first_name_help'))" required /></dd>
            <span id="first_name_help" class="help"></span>
            <dt><label for="last_name">Last Name<span class="red"> *</span></label></dt>
            <dd><input type="text" id="last_name" name="last_name" onblur="validateNonEmpty(this,document.getElementById('last_name_help'))" required /></dd>
            <span id="last_name_help" class="help"></span>
            <dt><label for="email">Email<span class="red"> *</span></label></dt>
            <dd><input type="email" id="email" name="user_email" onblur="validateNonEmpty(this,document.getElementById('email_help'))" required /></dd>
            <span id="email_help" class="help"></span>
            <dt><label for="confirm_email">Confirm email<span class="red"> *</span></label></dt>
            <dd><input type="email" id="confirm_email" name="confirm_email" onblur="validateNonEmpty(this,document.getElementById('confirm_email_help'))" required /></dd>
            <span id="confirm_email_help" class="help"></span>
            <dt><label for="password">Password<span class="red"> *</span></label></dt>
            <dd><input type="password" id="password" name="user_pass" onblur="validateNonEmpty(this,document.getElementById('password_help'))" required /></dd>
            <span id="password_help" class="help"></span><br>
            <button type="submit" name="submit" class="reg_submit">Register</button>
        </form>
    </div>
</section><!-- /.container -->
<?php include('includes/footer.inc.php'); ?>
<?php
/*
*
 * Display errors messages based on the errors set in the URL by getting the register = "errors message"
 * Using JavaScript inside the php echo scripts I can set an alert box to display the relevant error message
*/
if (!isset($_GET['register'])) {
    exit();
} else {
    $regCheck = $_GET['register'];

    if ($regCheck == "usernametaken") {
        echo '<script type="text/javascript"> window.onload = function() {alert("Username already taken!")};</script>';
        exit();
    } elseif ($regCheck == "success") {
        echo '<script type="text/javascript"> window.onload = function() {alert("Your account has been created! You my now log in")};</script>';
        exit();
    }
}
?>

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