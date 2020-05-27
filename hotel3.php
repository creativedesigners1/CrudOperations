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
        <p>Spend an amazing weekend in Theth.</p>
        <p>Theth (Albanian: Thethi) is a small village within Shkodër County, Albania.[1] Following the 2015 local government reform it became part of the municipality Shkodër, and has been declared a Protected Historic Center by the Albanian Government.[2][3] The community is at the centre of the Theth National Park, an area of outstanding natural beauty. 
        A new official information center on Rruga Fushe near the Thethi bridge is set to open by the Albanian Protected Areas Agency (AKZM), and administered by the Shkoder County Protected Areas Administration</p>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Theth_Church_Albania.jpg/800px-Theth_Church_Albania.jpg">
        <p>Nestled amongst the Albanian Alps, Theth National Park covers a vast and sprawling area of 26.3km2. It must be said that Theth is not for the weak-hearted, and we do mean that! Getting there is the trick and any enthusiastic tourist can choose one of two quite varied journeys. The first is the most comfortable, this route is by car and takes you through Shkodra. You do get the views from your vehicle but it’s not exactly the full Theth experience. That brings us to the second journey, this one is by foot, it’s much more demanding but unquestionably more rewarding. This 6 to 7-hour journey involves climbing the Valbona Pass by foot, and do not take it lightly when we tell you, it takes you mountain high (literally and figuratively).
        You’ve arrived, and here begins the part where you may need to pinch yourself. Two spectacular peaks loom above Theth National Park: Jezerca and the Accursed Mountains. Once upon a time the latter was famed for housing nymphs, goddesses and other mythical beings. To the more cynical minded traveller these myths might seem farcical, but what cannot be denied is the magical and otherworldly views that inhabit Theth National Park</p>
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/Ujvara._Theth.jpg">
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