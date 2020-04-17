<?php
//shoppingCart.php
session_start();
$customerID = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : "";
$productID = $_GET['productID'];
if ($customerID == "")
{
  $_SESSION['purchasePending'] = $productID;
  header("Location: formLogin.php");
}
include("../common/document_head.html");
?>
  <body class="Body w3-auto">
    <header class="w3-container">
      <?php
      include("../common/banner.php");
      include("../common/menus.html");
      include("../scripts/connectToDatabase.php");
      ?>
    </header>
    <main class="w3-container">
      <div class="w3-container w3-border-left w3-border-right
        w3-border-black w3-yellow w3-center">
        <article>
          <h4 class="ShoppingCartHeader">Shopping Cart</h4>
          <?php
          include("../scripts/shoppingCartProcess.php");
          ?>
        </article>
      </div>
    </main>
    <footer class="w3-container">
      <div class="w3-bar w3-center w3-teal">
        <?php
        include("../common/footer_content.html");
        ?>
      </div>
    </footer>
  </body>
</html>
