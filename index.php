 <?php
 require_once('includes/session.inc.php'); /** Include the session start file */
 include('includes/head.inc.php');
 include('includes/nav.inc.php');
 ?>

 <body>
  <section class="header_background" style="background-image: url('img/header_img.jpg');">
      <section class="header_title">
          <img src="img/logo-white-large.png" alt="Moz ball rally logo">
      </section>
  </section>
      <div class="container">
          <section class="col-7 rally">
              <img src="img/rallies/rally_1.jpg" alt="Koenigsegg CCXR">
          </section>
          <section class="col-4 rally">
              <h2>Europe - London - Paris - Lyon - Monaco (2 Nights) - Private race track - Venice - Vienna</h2>
              <hr>
              <p>Saturday June 23rd - Saturday June 30th - From £3495 Per Person</p>
              <a href="#" class="enter_rally">Enter the rally</a>
          </section>

          <section class="col-4 rally">
              <h2>Mozball rally usa</h2>
              <p style="font-weight:bold;">Thursday October 25 - Monday October 29 2018</p>
              <hr>
              <p>SAN FRANCISCO - HOLLYWOOD (LOS ANGELES) – SAN DIEGO – SKYDIVING – LAS VEGAS – FINISHING IN TIME FOR SEMA. From $2995pp</p>
              <a href="#" class="enter_rally">Enter the rally</a>
          </section>
          <section class="col-7 rally">
              <img src="img/rallies/rally_2.jpg" alt="Gumball 3000 stock photo">
          </section>

          <section class="col-7 rally">
              <img src="img/rallies/rally_3.jpg" alt="Gumball 3000 stock photo">
          </section>
          <section class="col-4 rally">
              <h2>Mozball Australia</h2>
              <p style="font-weight:bold;">Next Event TBC</p>
              <hr>
              <p>The next Modball Rally in Australia is to be announced soon. To enter please fill out the sign up form and pay your deposit to guarantee your entry, further details will be sent to you once the date and route is announced.</p>
              <a href="#" class="enter_rally">Enter the rally</a>
          </section>


      </div><!-- /.container -->
  </body>

    <?php include('includes/footer.inc.php'); ?>

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