<?php include("../common/document_head.html"); ?>
  <!-- estore.php -->
  <body class="Body w3-auto">
    <header class="w3-container">
      <?php
        include("../common/banner.php");
        include("../common/menus.html");
        include("../scripts/connectToDatabase.php");
      ?>
  </header>
    <main class="w3-container">
      <div class="w3-center w3-padding-16 w3-container w3-border-left w3-border-right w3-border-black w3-yellow">
        <article>
          <h2>Product Categories</h2>
          <?php
          include("../scripts/displayListOfCategories.php");
          ?>
        </article>
      </div>
    </main>
    <footer class="w3-container">
      <div class="w3-bar w3-center w3-teal">
        <?php include("../common/footer_content.html"); ?>
      </div>
    </footer>
  </body>
</html>
