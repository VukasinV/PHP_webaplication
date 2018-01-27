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
  <script src="script/ajax.js"></script>
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
          <li class="selected"><a href="products.php">Products</a></li>
          <li><a href="sell_product.php">Sell stuff</a></li>
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
      <div id="content">
        
        <?php
        $sql="SELECT * FROM categories";
        $crud -> ExecuteQuery($sql);
        $rezultat = $crud->getResult();
        ?>
        <form> 
          <b>Choose category:</b>
          <select name="kategorije" onchange="PrikaziProizvod(this.value)">
          <?php
            while($red = $rezultat->fetch_object()){
          ?>
          <option value="<?php echo $red->id;?>"><?php echo $red->name;?></option>
          <?php
            }
          ?>
          </select>
        </form>
        <p><div id="popuni"><b>Products from selected category will be shown here.</b></div></p>

        
        <h2>Some of our products</h2>
        <p>You can see in our galery some of products that our clients are selling, feel free to explore and order:</p>
        <h4>User selling: <b>Marko344</b></h4>
        <span class="left"><img src="style/huawei-mate-9.jpg" alt="example graphic" width="90" height="90"/></span>
        <p>
        It's a Note in that it's a large-screened device, which instantly pushes it into 
        the realm of 'power user' and the enterprise space, a claim backed up by the fact 
        that it features the newest, most powerful chipset, also from Huawei.
        But it's also aiming for the consumer-friendliness of the iPhone, offering strong cameras,
        long battery life and increased day to day usability in the long term, something Huawei is 
        keen to talk up. 
        This is Huawei's big effort to break into the US market, and push itself from being 
        the world's third-biggest phone manufacturer to second place by the end of 2018.</p>
        <h4> User selling: <b>NIKOLA56</b></h4>
        <span class="right"><img src="style/graphic.png" alt="example graphic" width="90" height="90"/></span>
        <p>
        Rolex is one of the world’s largest luxury watch brands. Rolex was founded in 1905 in London 
        by Hans Wilsdorf, eventually Rolex moved to Switzerland in 1919. The Tudor watch brand 
        is a subsidiary of Rolex. In 1914 Rolex obtained a chronometer certificate (Class A precision certificate)
         and thus became the first manufacturer of a chronometer wristwatch.
        </p>
      </div>
    </div>
    <div id="footer">
      Copyright: Vukasin Vranic
    </div>
  </div>
</body>
</html>
