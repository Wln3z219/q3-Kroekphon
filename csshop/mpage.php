<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <script src="mpage.js"></script>
  </head>

  <body>

    <header>
      <div class="logo">
        <img src="cslogo.jpg" width="200" alt="Site Logo">
      </div>
      <div class="search">
        <form>
          <input type="search" placeholder="Search the site...">
          <button>Search</button>
        </form>
      </div>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
      <article id="dynamicArticle">
        <h1>Article</h1>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit libero sit amet nunc ultricies, eu feugiat diam placerat. Phasellus tincidunt nisi et lectus pulvinar, quis tincidunt lacus viverra. Phasellus in aliquet massa. Integer iaculis massa id dolor venenatis scelerisque. Morbi non eros a ex interdum molestie in eget leo. Proin pulvinar facilisis eros, sed porta ante imperdiet ut. Suspendisse tincidunt facilisis metus non faucibus. Integer posuere vehicula congue. Sed pharetra felis sapien, at imperdiet diam lacinia quis.
          <br><br>
        </p>
      </article>
      <nav id="menu">
        <h2>Navigation</h2>
        <ul class="menu">

          <li><a href="./mpage.php">Home</a></li>
          <?php
          session_start();
          if (isset($_SESSION['username'])) {
              echo '<li id="li-Login" class="disabled"><a>LoginForm</a></li>';
          } else {
              echo '<li id="li-Login"><a href="#" onclick="updateArticle(\'./LoginForm.php\');" id="Login">LoginForm</a></li>';
          }
          ?>
          <li><a href="#" onclick="updateArticle('./product/allProduct.php');">All Products</a></li>
          <li><a href="#" onclick="updateArticle('./product/tbProduct.php');">Table of All Products</a></li>
          <li><a href="#" onclick="updateArticle('./product/Product.php');">Product-Detail</a></li>
          <li><a href="#" onclick="updateArticle('./product/Addproduct.php');">Add Product</a></li>
          <li><a href="#" onclick="updateArticle('./product/showOrder.php');">Show Order</a></li>
          <li><a href="#" onclick="updateArticle('./member/register.php');">Register</a></li>
          <li><a href="#" onclick="updateArticle('./member/Member.php');">Member-Detail</a></li>
          <li><a href="#">Page 08</a></li>
          <li><a href="#">Page 09</a></li>
          <li><a href="#">Page 10</a></li>
          <li><a href="#">Page 11</a></li>
          <?php
          if (isset($_SESSION['username'])) {
              echo '<li><a href="#" onclick="updateArticle(\'./api/logout.php\');">Logout</a></li>';
          } else {
              echo '<li id="li-Login" class="disabled"><a>Logout</a></li>';
          }
          ?>
          
        </ul>
      </nav>
      <aside>

        <h2><?=$_SESSION["fullname"]?></h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit libero sit amet nunc ultricies, eu feugiat diam placerat. Phasellus tincidunt nisi et lectus pulvinar, quis tincidunt lacus viverra. Phasellus in aliquet massa. Integer iaculis massa id dolor venenatis scelerisque.
          <br><br>
        </p>
      </aside>
    </main>
    <footer>
      <a href="#">Sitemap</a>
      <a href="#">Contact</a>
      <a href="#">Privacy</a>
    </footer>
  </body>
</html>