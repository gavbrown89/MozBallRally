<?php include('includes/head.inc.php'); ?>
<body>
<?php include('nav.inc.php'); ?>
<div class="container">

    <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Register</p>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="user_name" placeholder="User name">
            <input type="text" name="first_name" placeholder="First name">
            <input type="text" name="last_name" placeholder="Last name">
            <input type="email" name="user_email" placeholder="Email">
            <input type="email" name="confirm_email" placeholder="Confirm Email">
            <input type="password" name="user_pass" placeholder="Password">
            <button type="submit" name="submit">Register</button>
        </form>
    </div>



</div><!-- /.container -->
</body>

<?php include('includes/footer.inc.php'); ?>
</html>