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
  <script src="script/jquery-3.2.1.min.js"></script>
  <script src="script/myScript.js"></script>
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
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="sell_product.php">Sell stuff</a></li>
          <li class="selected"><a href="edit.php">My sales</a></li>
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
      <div id="content">
        <!-- FORMA ZA EDIT -->
        <h2>Form Elements</h2>
        <div class="form_settings">
          <p><span>I want to: </span><select id="select_action" name="edit_or_delete"><option value="1">Remove my product</option><option value="2">Edit my product</option></select></p>
        </div>
        <div id="edit_form">
          <form action="#" method="post">
            <div class="form_settings">
              <p><span>Product ID:</span><input type="text" name="edit_id" value="" /></p>
              <p><span>Name:</span><input type="text" name="p_name" value="" /></p>
              <p><span>Description:</span><textarea rows="8" cols="50" name="desc"></textarea></p>
              <p><span>Price:</span><input type="text" name="price" value="" /></p>
              <p><span>Notify potential costumers:</span><input class="checkbox" type="checkbox" name="n_cos" value="" /></p>
              <p><span>CategoryID:</span><select id="name" name="cat_id">
                <option value="1">Clothes</option>
                <option value="2">Tablets</option>
                <option value="3">Smartphones</option>
                <option value="4">Glasses</option>
                <option value="5">Shoes</option>
                <option value="6">Accessories</option></select></p>
              <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="btn_edit" value="edit" /></p>
            </div>
          </form>
        </div>
        <?php
          if (isset($_POST["btn_edit"]))
		      {
		        $data=array($_POST["edit_id"],$_POST["p_name"], $_POST["desc"], $_POST["price"], $_POST["cat_id"]);
			      if ($crud->update("products",$data))
			        echo "<script>alert('Successfuly updated product info')</script>";
			      else
			        echo "<script>alert('Error eccurred during update!')</script>";
          }
        ?>

        <div id="delete_form">
          <form action="#" method="post">
              <div class="form_settings">
                <p><span>Product ID:</span><input type="text" name="delete_id" value="" /></p>
                <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="btn_delete" value="delete" /></p>
              </div>
          </form>
        </div>
          <?php
          if (isset($_POST["btn_delete"]))
		      {
		        $data=array($_POST["delete_id"]);
			    if ($crud->delete("products",$data))
			      echo "<span style='color:green'>You successfuly deleted product</span>";
			    else
			      echo "<span style='color:red'>Wrong id!</span>";
          }
        ?>

        <!--product table-->
        <table style="width:100%; border-spacing:0;">
          <tr><th>Product ID</th><th>Name</th><th>Description</th><th>Price</th></tr>
          <?php
          $crud->select("products","*",null,null);
          while ($row=$crud->getResult()->fetch_object()){
            echo "<tr>";
            echo "<td>".$row->id."</td>";
            echo "<td>".$row->name."</td>";
            echo "<td>".$row->description."</td>";
            echo "<td>".$row->price."</td>";
            echo "</tr>";
          }
        ?>
        </table>
        </div>
    </div>
    <div id="footer">
      Copyright: Vukasin Vranic
    </div>
  </div>
</body>
</html>
