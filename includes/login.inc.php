<?php

session_start();

if (isset($_POST['submit'])) {
    include 'includes/dbc.inc.php';
    $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    $user_name = mysqli_real_escape_string($dbc, $_POST['user_id']);
    $password = mysqli_real_escape_string($dbc, $_POST['password']);

    //Check for errors
    //Check for empty input fields
    if (empty($user_name) || empty($password)) {
        header("Location: index.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM login_system WHERE user_name='$user_name'";
        $result = mysqli_query($dbc, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                $hashedPassCheck = password_verify($password, $row['user_pass']);
                if ($hashedPassCheck == false) {
                    header("Location: index.php?login=cheese");
                    exit();
                } elseif ($hashedPassCheck == true) {
                    // Login user
                    $_SESSION['u_name'] = $row['user_name'];
                    $_SESSION['f_name'] = $row['first_name'];
                    $_SESSION['l_name'] = $row['last_name'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_pass'] = $row['user_pass'];
                    header("Location: index.php?login=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: index.php?login=error");
    exit();
}
?>