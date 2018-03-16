<?php
require_once('includes/session.inc.php');
include('includes/head.inc.php');
include('nav.inc.php');
?>
<?php
include('includes/dbc.inc.php');

// Make sure the user is logged in before going any further.
if (!isset($_SESSION['u_name'])) {
    echo '<p class="login">Please <a href="login.php">log in </a> to access this page.</p>';
    exit();
}
else {
    echo('<p class="login">You are logged in as ' . $_SESSION['u_name'] .  '. <a href="logout.php">Log out</a>.</p>');
}

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $user_name = mysqli_real_escape_string($dbc, trim($_POST['user_name']));
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $error = false;


    // Update the users data in the database
    if (!$error) {
        if (!empty($user_name) && !empty($first_name) && !empty($last_name) && !empty($email)) {
            $query = "UPDATE login_system SET user_name = '$user_name', first_name = '$first_name', last_name = '$last_name', " .
                " user_email = '$email' WHERE user_name = '" . $_SESSION['u_name'] . "'";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Your profile has been successfully updated. Would you like to <a href="profile.php">view your profile</a>?</p>';

            mysqli_close($dbc);
            exit();
        }
        else {
            echo '<p class="error">You must enter all of the profile data</p>';
        }
    }
} // End of check for form submission
else {
    // Grab the user profile data from the database
    $query = "SELECT user_name, first_name, last_name, user_email FROM login_system WHERE user_name= '" .                 $_SESSION['u_name'] . "'";
    $data = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($data);

    if ($row != NULL) {
        $user_name = $row['user_name'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['user_email'];
    }
    else {
        echo '<p class="error">There was a problem accessing your Profile.</p>';
        echo '<p>Why not create your <a href="profile.php">Profile</a>?</p>';
    }
}

mysqli_close($dbc);

?>

    <section class="container">
        <img src="img/profile.png" class="profile_img"  alt="Profile picture">
        <h1 class="member_title">Your Profile</h1>
    <section class="form_container">
            <form class="register_form" enctype="multipart/form-data" method="post">
                <fieldset>
                    <legend>Edit your details</legend>
                    <dt><label for="user_name">User name:</label></dt>
                    <dd><input type="text" id="user_name" name="user_name" value="<?php if (!empty($user_name)) echo $user_name; ?>" /></dd><br />
                    <dt><label for="first_name">First name:</label></dt>
                    <dd><input type="text" id="first_name" name="first_name" value="<?php if (!empty($first_name)) echo $first_name; ?>" /></dd><br />
                    <dt><label for="last_name">Last Name:</label></dt>
                    <dd><input type="text" id="last_name" name="last_name" value="<?php if (!empty($last_name)) echo $last_name; ?>" /></dd><br />
                    <dt><label for="email">Email:</label></dt>
                    <dd><input type="email" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" /></dd><br />
                </fieldset>
                <button type="submit" name="submit" class="reg_submit">Update Profile</button>
            </form>
    </section>
        </section>
<?php include("includes/footer.inc.php"); ?>