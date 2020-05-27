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
        <p>Spend an amazing weekend in Skrapar.</p>
        <p>Skrapar (definite Albanian form: Skrapari) is a municipality in Berat County, southern Albania. It was created in 2015 by the merger of the former municipalities Bogovë, Çepan, Çorovodë, Gjerbës, Leshnjë, Potom, Qendër Skrapar, Vendreshë and Zhepë. The seat of the municipality is the town Çorovodë.[1] The total population is 12,403 (2011 census),[2] in a total area of 832.04 km2.[3] It covers part of the area of the former Skrapar District, without the town Poliçan. It is also roughly contiguous with the Albanian "ethnographic region" of Skrapar which is known for its folklore, its raki production, its high rate of those belonging to the Bektashi order and its scenic mountains.</p>
        <img src="https://i.pinimg.com/originals/8e/b5/d0/8eb5d04caec636e3aa0f7b588fcf5b72.jpg">
        <p>Go hiking in the largest canyon of Albania which is around 18 km with . Private transport will give you the opportunity to stop in several view points and walk on top of the canyons . Do swimming ,walking and click the best pictures of the canyon . Visit Polican a small town founded during communist time to produce weapons . Guided by a professional tour guide learn more about the history and the religious of the area . See amazing nature and see the Foot print of Abaz Ali The hole of Bride Canyon view point Mulliri i Babait The old bridge of canyons Skrapar the city of Raki Polican the city of weapons</p>
        <img src="https://visitskrapar.com/wp-content/uploads/photo-gallery/Skrapar/Co1.jpg">
        ItineraryThis is a typical itinerary for this productStop At: Osum Canyon (Kanioni i Osumit), Corovode, Berat CountyThe largest canyon in Albania which is 26 km long The edges of the canyon have an unusual ecosystem that preserves the greenery on both sides of the canyon year-round. Mediterranean bushes like heath and briar flourish along with rich flora and fauna. On the slopes of the canyon, erosion has created pockmarked cavern walls with small caves. Some of the rock formations in the canyon have fanciful names such as the Cathedral, the Eye, and the Demon’s Door. The canyons are 26 km (16 miles) long, at an altitude of 450 m. They are thought to have been formed 2-3 million years ago by water erosion.
        <img src="https://argjirolajm.net/wp-content/uploads/2018/08/auto_tomorri1508666048-2.jpg">
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