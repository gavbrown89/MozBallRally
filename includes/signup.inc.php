<?php
include 'includes/session.inc.php';
define('DB_HOST', 'localhost');
define('DB_USER', 'glbrown2');
define('DB_PASSWORD', 'okxwfvb');
define('DB_NAME', 'glbrown2');
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (isset($_POST['submit'])) { /** a for loop to check if the submit button exists */
    include 'includes/db.php'; /** Include the database connection file */


    /**
     *
     * Create the variables for each input field on the registration form
     *
     */
    $user_name = mysqli_real_escape_string($dbc, trim($_POST['user_name']));
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['user_email']));
    $confirm_email = mysqli_real_escape_string($dbc, trim($_POST['confirm_email']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['user_pass']));

    /**
     *
     *  Validation
     *
     */
    /** Check for empty fields */
    if (empty($user_name) || empty($first_name) || empty($last_name) || empty($email) || empty($password)) { /** check if the first field is empty or the next field and repeat */
        header("Location: ../register.php?register=empty"); /** If one or more fields are empty then send the user back to the registration page and inlcude error message in the url */
        exit(); /** Stop this script from running */
    } else {
        /** Check for correct input characters */
        if (!preg_match("/^[a-zA-Z]*$/", $user_name) || !preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name)) { /** Use the php function (preg_match) to check if not the specified characters have been entered within the input fields */
            header("Location: ../register.php?register=invalid"); /** If one or more fields contain incorrect characters then send the user back to the registration page and inlcude error message in the url */
            exit(); /** Stop this script from running */
        } else {
            /** Check for email validation */
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../register.php?register=invalidemail"); /** If one or more fields contain incorrect characters then send the user back to the registration page and inlcude error message in the url */
                exit(); /** Stop this script from running */
            } else {
                if (!filter_var($confirm_email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../register.php?register=invalidemail"); /** If one or more fields contain incorrect characters then send the user back to the registration page and inlcude error message in the url */
                    exit(); /** Stop this script from running */

                    /**
                     *
                     *  Check to see if anyone already has the same username
                     *
                     */
                } else {
                    $sql = "SELECT * FROM login_system WHERE user_name='$user_name'";
                    $result = mysqli_query($dbc, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) { /** Check if the username is greater than 0 in the database, if it is then show an error message */

                        header("Location: ../register.php?register=usernametaken"); /** If the username already exists then send the user back to the registration page and inlcude error message in the url */
                        exit(); /** Stop this script from running */
                    } else {
                        /**
                         *
                         * Hash the passwordword for security
                         *
                         */
                        $hashedpass = password_hash($password, PASSWORD_DEFAULT);
                        /** Insert the user into the database */
                        echo $sql = "INSERT INTO login_system (user_name, first_name, last_name, user_email, user_pass) VALUES ('$user_name', '$first_name', '$last_name', '$email', '$hashedpass');";
                        mysqli_query($dbc, $sql);
                        header("Location: ../register.php?register=success"); /** enter a success message into the url */
                        exit(); /** Stop this script from running */
                    }
                }
            }
        }
    }

    /**
     *
     * If the user hasn't clicked the submit button then send back to the registration form page
     *
     */
} else {
    header("Location: ../register.php");
    exit(); /** Stop this script from running */
}
?>