<?php
  include 'Database.php';
  $crud = new Database("api_db");
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
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">banjica<span class="logo_colour">shop</span></a></h1>
          <h2>Fast. Simple. Cheap.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li class="selected"><a href="sell_product.php">Sell stuff</a></li>
          <li><a href="edit.php">My sales</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        
        <h3>NEWS</h3>
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

      <div id="edit_form" style="padding-bottom:50px">
          <form action="#" method="post">
            <div class="form_settings">
              <p><span>Name:</span><input type="text" name="p_name" value="" /></p>
              <p><span>Description:</span><textarea rows="8" cols="50" name="desc"></textarea></p>
              <p><span>Price:</span><input type="text" name="price" value="" /></p>
              <p><span>CategoryID:</span><select id="name" name="cat_id">
                <option value="1">Fashion</option>
                <option value="2">Electronic</option>
                <option value="3">Shoes</option>
                <option value="4">Movies</option>
                <option value="5">Books</option>
                <option value="6">Sports</option></select></p>
              <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="btn_submit" value="submit" /></p>
            </div>
          </form>
        </div>
        <?php
          if (isset($_POST["btn_submit"]))
          {
            $data = array($_POST["p_name"], $_POST["desc"], $_POST["price"], $_POST["cat_id"]);
            if ($crud->insertProduct("products", "name, description, price, category_id, created", $data))
            echo "<span style='color:green'>Successfuly added product</span>";
            else
            echo "<span style='color:red'>There was a mistake!</span>";
          }

        ?>
      <div id="content">
      </div>
    <div id="footer">
      Copyright: Vukasin Vranic
    </div>
  </div>
</body>
</html>
