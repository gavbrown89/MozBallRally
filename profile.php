<?php
require_once('includes/session.inc.php');
include('includes/head.inc.php');
include('nav.inc.php');
?>

<section class="container">
    <img src="img/profile.png" class="profile_img"  alt="Profile picture">
    <h1 class="member_title">Your Profile</h1>
    <section class="form_container">
    <?php
    require_once('includes/dbc.inc.php');

    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Grab the profile data from the database
    if (!isset($_GET['user_id'])) {
        $query = "SELECT user_name,  first_name, last_name, user_email FROM login_system WHERE user_name = '". $_SESSION['u_name'] . "'";
    }
    else {
        $query = "SELECT user_name,  first_name, last_name, user_email FROM login_system WHERE user_name = '" . $_GET['user_name'] . "'";
    }

    $data = mysqli_query($dbc, $query);

    if (mysqli_num_rows($data) == 1) {
        // The user row was found so display the user data
        $row = mysqli_fetch_array($data);

        echo '<table>';
        if (!empty($row['user_name']))
        {
            echo '<tr><td class="label">User name:</td><td>' . $row['user_name'] . '</td></tr>';
        }
        if (!empty($row['first_name']))
        {
            echo '<tr><td class="label">First name:</td><td>' . $row['first_name'] . '</td></tr>';
        }

        if (!empty($row['last_name']))
        {
            echo '<tr><td class="label">Last name:</td><td>' . $row['last_name'] . '</td></tr>';
        }
        if (!empty($row['user_email']))
        {
            echo '<tr><td class="label">Your Email:</td><td>' . $row['user_email'] . '</td></tr>';
        }
        echo '</table>';
    }

    if (isset($_GET['user_id']) || ($_SESSION['$user_name'] == $_GET['user_name']))
    {
        echo '<br><p class="center">Would you like to <a href="edit_profile.php">edit your profile</a>?</p>';
    }
    // End of check for a single row of user results
    else
    {
        echo '<p class="error" >There was a problem accessing your profile ' . $_SESSION['u_name'] .  '.</p>';
    }
    mysqli_close($dbc);

    ?>
    </section>
</section>
    <?php include("includes/footer.inc.php"); ?>