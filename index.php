<?php
include ("Database.php");
$crud=new Database("api_db");
?>
<html>

<head>
  <title>banjica shop</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          
          <h1><a href="index.html">banjica<span class="logo_colour">shop</span></a></h1>
          <h2>Fast. Simple. Cheap.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          
          <li class="selected"><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="sell_product.php">Sell stuff</a></li>
          <li><a href="edit.php">My sales</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        
        <h3>News</h3>
        <h4>CLOCK</h4>
        <h5><?php echo date("h:i:sa")?></h5>
        <h4>DATE</h4>
        <b><?php echo date("d.m.Y")?></b>
        <h3>Useful Links</h3>
        <ul>
          <li><a href="https://www.facebook.com/">Facebook</a></li>
          <li><a href="https://www.facebook.com/">Instagram</a></li>
          <li><a href="https://twitter.com/">Twitter</a></li>
          <li><a href="https://www.youtube.com/">You Tube</a></li>
        </ul>
      </div>
      <div id="content">
        
        <h1>Welcome to banjica shop</h1>
       
        <h2>Categories of product that you can find in our shop:</h2>
        <?php
          $crud->select("categories","*",null,null);
        ?>
        <ul>
        <?php
          while ($red=$crud->getResult()->fetch_object()){
            echo "<li>".$red->name."</li>";
          }
        ?>
        </ul>
      </div>
    </div>
    <div id="footer">
      Copyright: Vukasin Vranic
    </div>
  </div>
</body>
</html>
