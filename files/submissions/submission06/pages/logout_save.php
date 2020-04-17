<?php
//logout_save.php
session_start();
if ($_SESSION["customer_id"] == "") $notLoggedin = $true;
session_unset();
session_destroy();
include("../common/document_head.html");
?>
  <body>
    <header>
      <?php
      include("../common/banner.php");
      include("../common/menus.html");
      ?>
    </header>
    <main>
      <article class="Logout">
        <h4>Logout</h4>
        <?php if ($notLoggedIn) { ?>
        <p><br>Thank you for visiting JaCoT.<br>
          You are not logged in.</p>
        <p>To log in, <a href="pages/formLogin.php">Click here</a></p>
        <?php } else { ?>
        <p><br>Thanks for visiting our e-store.<br>
        Toy have successfully logged out.</p>
        <p>To log back in, <a href=formLogin.php">Click here</a></p>
        <?php } ?>
        <p>To browse our product catalog,
          <a href="pages/catalog.php">click here</a>.</p>
      </article>
    </main>
    <footer>
      <?php
      include("../common/footer_content.html");
      ?>
    </footer>
  </body>
</html>

