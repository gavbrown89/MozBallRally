<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <img src="img/logo-white.png" alt="Moz ball rally logo" style="width:50px">&nbsp;
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="vip_area.php">VIP Area</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Create an account</a>
            </li>
        </ul>
        <?php
        if (isset($_SESSION['u_name'])) {
            echo ">" . " " . " &nbsp; " . " " . "{$_SESSION['u_name']}";
        }
        ?> &nbsp;&nbsp;
        <?php
            if (isset($_SESSION['u_name'])) {
                echo ';
            } else {
               echo '<form class="form-inline my-2 my-lg-0" action="login.php" method="post">
                    <input type="text" name="user_id" placeholder="Username / Email"> &nbsp;
                     <input type="password" name="password" placeholder="Password">
                     <button type="submit" name="submit" class="login_submit"><i class="fa fa-sign-in fa-lg" aria-hidden="true" style="color:#ffb500;"></i> Login</button>
                    </form>';
            }
        ?>
    </div>
</nav>