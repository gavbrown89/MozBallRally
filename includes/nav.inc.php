<?php
session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'glbrown2');
define('DB_PASSWORD', 'okxwfvb');
define('DB_NAME', 'glbrown2');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if (isset($_POST['submit'])) {
    include 'dbc.inc.php';
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

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="user_id" placeholder="Username / Email"> &nbsp;
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
        </form>
        <!--          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">-->
        <!--          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
    </div>
</nav>