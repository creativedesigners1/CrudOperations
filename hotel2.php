<?php session_start(); 
$db = mysqli_connect('localhost', 'root', '', 'registration1');
$query4 = "SELECT * FROM hotels WHERE id=1";
$data=mysqli_query($db, $query4);
$pay = mysqli_fetch_assoc($data);
$id_hotel=$pay["id"];
$price=$pay["price"];
$_SESSION["hotel"]=$id_hotel;
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Respond | Services</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.html"><span class="color-highlight">E</span>xplore Albania</a>
        <div class="nav-collapse">
          <ul class="nav pull-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="destinations.php">Destinations</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="../index.php">Profile</a></li>
            <?php if (!isset($_SESSION['email']))
            {
              echo "<li>";
              echo '<a href="../login.php">Login</a>';
              echo "</li>";
            }
            else{
              echo "<li>";
              echo '<a href="../logout.php">Logout</a>';
              echo "</li>";
            }
            ?>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </div>
  </div>
<div class="container">
  <hr>
  <div class="row">
    <div class="span8">
      <div class="well">
    
		
        <h1>Hotel </h1>
        <p>Spend an amazing weekend in Berat.</p>
        <p>Located in the southern part of the Albanian Riviera lies the coastal city of Saranda/Sarandë.  During the summer months, Saranda is buzzing with people, in fact, apparently the usual Saranda population is around 30,000, but during the summer that figure can spiral up to 300,000.
        Great restaurants, a beautiful coastline and the perfect base to explore other breath-taking places nearby, is the main reasons tourists flock here during the summer.  It’s very affordable so if you’re a backpacker this place is heaven.  The crystal clear turquoise water and affordability make this the perfect holiday destination for solo travellers, couples, and families.</p>
        <img src="https://www.anitahendrieka.com/wp-content/uploads/2017/10/DJI_0425-2-800x600.jpg">
        <p>Visit Lëkurësi Castle at sunset
        Nestled at the top of the hill and overlooking Saranda is Lëkurësi Castle.  Although the castle is not that impressive as it has now been turned into a restaurant, the views overlooking Saranda and even into the farmland nearby, are stunning and well worth the trip.  It’s one of the best Saranda attractions that you can see!

      You can hike up which takes about 45 minutes to an hour. I took a taxi, just remember to haggle for the price as I was overcharged on the way there.  A lot of travellers even hitchhike back to the city centre. This is one of Saranda’s top sunset spots!
 </p>
      <img src="https://www.anitahendrieka.com/wp-content/uploads/2017/10/DJI_0459-2-800x600.jpg"><br>
      <p>Butrint (UNESCO site)
     Butrint is a site full of ancient ruins located not far from Ksamil.  It was habited before the Greeks settled, and after that, the Romans took over.  It will take 2 or 3 hours to explore and costs 700 Lek entry.  You will want to visit in the morning or late afternoon as the sun can be overbearing in the summer, and you will appreciate it a lot more in the cooler weather. 
    The bus to Butrint cost 100 Lek.  It’s the same bus that stops off at Ksamil beforehand.</p>
    <br>
        <ol>
          <li>Hotel Name:<?php echo $pay["name"]?></li>
          <li>Time:</li>
          <li>Hotel:</li>
          <li>Price: <?php echo $pay["price"]?></li>
        </ol>
        <p>You will be asked to enter your paypal account</p>
        <div id="paypal-button-container"></div>

<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=EUR"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({style: {
      shape: 'pill',
      color: 'gold',
      layout: 'horizontal',
      label: 'paypal',
      
  },

 // Set up the transaction
 createOrder: function(data, actions) {
     return actions.order.create({
     purchase_units: [{
     amount: {
     value: '<?php echo $price?>'
   },
    payee: {
     email_address: 'sb-ij4pt1876392@business.example.com'
   }
  }],
   application_context: {
      shipping_preference: 'NO_SHIPPING'
    },
  });
},

// Finalize the transaction
onApprove: function(data, actions) {
return actions.order.capture().then(function(details) {
 // Show a success message to the buyer
alert('Transaction completed by ' + details.payer.name.given_name + '!');
window.location = "payh.php";
});
}


}).render('#paypal-button-container');
</script>
      </div>
       
    </div>
    <div class="span4">
      <h3>Deep Sky <small> By <a href="#">Srawat56</a></small></h3>
      <a href="#"><img src="img/thumb1.jpg" alt=""></a>
      <h3>Deep Sky <small> By <a href="#">Srawat56</a></small></h3>
      <a href="#"><img src="img/thumb1.jpg" alt=""></a> </div>
  </div>
  <!--Start second row of columns-->
  <div class="row">
    <div class="span4">
      <h3>Column One</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat sem vel nibh bibendum auctor. Nullam non magna in quam egestas blandit a a justo. Integer vel rhoncus tellus. Vivamus et iaculis tortor. Quisque fermentum arcu dolor. Duis mollis libero et ipsum euismod sed gravida sem pretium. Aliquam eu eros at velit laoreet rhoncus. Nulla a urna eu diam cursus tempor.</p>
    </div>
    <div class="span4">
      <h3>Column Two</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat sem vel nibh bibendum auctor. Nullam non magna in quam egestas blandit a a justo. Integer vel rhoncus tellus. Vivamus et iaculis tortor. Quisque fermentum arcu dolor. Duis mollis libero et ipsum euismod sed gravida sem pretium. Aliquam eu eros at velit laoreet rhoncus. Nulla a urna eu diam cursus tempor.</p>
    </div>
    <div class="span4">
      <h3>Column Three</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed placerat sem vel nibh bibendum auctor. Nullam non magna in quam egestas blandit a a justo. Integer vel rhoncus tellus. Vivamus et iaculis tortor. Quisque fermentum arcu dolor. Duis mollis libero et ipsum euismod sed gravida sem pretium. Aliquam eu eros at velit laoreet rhoncus. Nulla a urna eu diam cursus tempor.</p>
    </div>
  </div>
  <hr>
  <footer class="row">
    <div>
      <div class="span4">
        <div class="is-padded">
          <nav>
            <h2>Navigation</h2>
            <hr>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Portfolio</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">About</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="span4">
        <div class="is-padded">
          <h2>Twitter</h2>
          <hr>
          <a href="#">@AwfulMedia</a>
          <p>This is what my tweet looks like on this website. Tweet tweet. Twitter Twatter.</p>
          <em>3 days ago</em><br>
          <br>
          <a href="#">@AwfulMedia</a>
          <p>This is what my tweet looks like on this website. Tweet tweet. Twitter Twatter.</p>
          <em>3 days ago</em> </div>
      </div>
      <div class="span4">
        <div class="is-padded">
          <h2>Details</h2>
          <blockquote>Respond is a fully responsive website template utilizing Twitter's Bootstrap framework. What does that mean? First of all, the website will respond according to the size of the viewers browser window. Go on, try it out. Resize your window. On top of that, the framework offers loads of ready-to-go features. Check it out with the button below. <br>
            <br>
            <em>- explorealbania.com</em> </blockquote>
        </div>
      </div>
    </div>
    <p> &copy;2020 Creative Designers.<br>
      Design by <a href="http://www.creative.com">creativedesigners.com</a> </p>
  </footer>
</div>
<!-- /container -->
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/bootstrap-alert.js"></script>
<script src="js/bootstrap-modal.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>
<script src="js/bootstrap-button.js"></script>
<script src="js/bootstrap-collapse.js"></script>
<script src="js/bootstrap-typeahead.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.smooth-scroll.min.js"></script>
<script src="js/lightbox.js"></script>
</body>
</html>