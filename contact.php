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
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="sell_product.php">Sell stuff</a></li>
          <li><a href="edit.php">My sales</a></li>
          <li class="selected"><a href="contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">>
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
        <h1>Contact Us</h1>
        <p>Tell us about what you thing of our shop, what would you change or what new you would like to see in the future:</p>
        <form action="#" method="post">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="your_name" value="" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="" /></p>
            <p><span>Message</span><textarea class="contact textarea" rows="8" cols="50" name="your_enquiry"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" /></p>
          </div>
        </form>

        <?php
          if (isset($_POST["contact_submitted"]))
          {
            $data = array($_POST["your_name"], $_POST["your_email"], $_POST["your_enquiry"]);
            if ($crud->insertContact("contact", "name, email, message", $data))
            echo "Successfuly added comment";
            else
            echo "There was a mistake!";
          }

        ?>

        <p><br /><br />NOTE: We like to be in close touch with our clients so, well anser you as soon as we can.</p>
        <h4>Here you can see which email providers, our clients are using</h4>
        <table style="width:100%; border-spacing:0;">
          <tr><th>User</th><th>email provider</th></tr>
          <?php
          $crud->select("contact","*",null,null);
          while ($row=$crud->getResult()->fetch_object()){
            echo "<tr>";
            echo "<td>".$row->name."</td>";
            echo "<td>".explode(".",explode("@",$row->email)[1])[0]."</td>";
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
