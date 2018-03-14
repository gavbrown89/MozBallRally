<?php include('includes/head.inc.php'); ?>
<body>
<?php include('nav.inc.php'); ?>
<section class="header_background" style="background-image: url('img/header_img.jpg');">
    <section class="header_title">
        <img src="img/signup_vip.png" alt="Moz ball rally logo">
    </section>
</section>
<div class="container">
        <h1>Mozball VIP registration</h1>
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
            <dd><input type="email" id="confirm_email" placeholder="Confirm Email" onblur="validateNonEmpty(this,document.getElementById('confirm_email_help'))" required /></dd>
            <span id="confirm_email_help" class="help"></span>
            <dt><label for="password">Password<span class="red"> *</span></label></dt>
            <dd><input type="password" id="password" name="user_pass" onblur="validateNonEmpty(this,document.getElementById('password_help'))" required /></dd>
            <span id="password_help" class="help"></span>
            <button type="submit" name="submit" class="reg_submit">Register</button>
        </form>



</div><!-- /.container -->
</body>

<?php include('includes/footer.inc.php'); ?>
</html>