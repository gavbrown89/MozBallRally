<?php
require_once('session.inc.php'); /** Include the session start file */

/** Check the login submit button has been clicked */
if (isset($_POST['submit'])) {
    require_once('dbc.inc.php');
    /** Connect to the database */
    $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    /** Create variables to store the username and password inputs using the sql escape string for security to stop users inputting malicious data */
    $user_id = mysqli_real_escape_string($dbc, $_POST['user_id']);
    $pass = mysqli_real_escape_string($dbc, $_POST['password']);

    //Check for errors
    //Check for empty input fields
    if (empty($user_id) || empty($pass)) {
        header("Location: ../index.php?login=empty"); /** If one or more fields are empty then send the user back to the homepage and include error message in the url */
        exit();
    } else {
        $sql = "SELECT * FROM login_system WHERE user_name='$user_id'"; /** Select all usernames which match the one inputted */
        $result = mysqli_query($dbc, $sql); /** Create a query to run the sql check in the database */
        $resultCheck = mysqli_num_rows($result); /** Check if there was any results from the sql query and how many rows in the database matched*/

        if ($resultCheck < 1) { /** If the result check came back as less than 1 */
            header("Location: ../index.php?login=error"); /** User has inputted the wrong username / email then send the user back to the homepage and include error message in the url */
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) { /** Create a function and take the result data from the check above and store in a variable called $row */
            /**
             * De hash the password from the database
             */
                $hashedPassCheck = password_verify($pass, $row['user_pass']);
                if ($hashedPassCheck == false) { /** If the user inputted password does not match the password stored in the database */
                    header("Location: ../index.php?login=error"); /** User has inputted the wrong password then send the user back to the homepage and include error message in the url */
                    exit();
                } elseif ($hashedPassCheck == true) { /** If the password the user has inputted matches the one in the database */
                    /**
                     * Log in the user
                     * Create session super global variables to store the data stored in the database which can be accessed from any page by calling the super global variable
                     */
                    $_SESSION['u_name'] = $row['user_name'];
                    $_SESSION['f_name'] = $row['first_name'];
                    $_SESSION['l_name'] = $row['last_name'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_pass'] = $row['user_pass'];
                    header("Location: ../index.php?login=success"); /** If both the username & password are correct then send the user back to the homepage and include a success message in the url */
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../index.php?login=error"); /** If the user hasnt clicked the submit button then send back to the homepage with an error message in the URL */
    exit();
}
?>
