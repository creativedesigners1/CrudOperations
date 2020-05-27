<?php session_start(); 
$db = mysqli_connect('localhost', 'root', '', 'registration1');
$query4 = "SELECT * FROM events WHERE id=1";
$data=mysqli_query($db, $query4);
$pay = mysqli_fetch_assoc($data);
$id_event=$pay["id"];
$price=$pay["price"];
$_SESSION["event"]=$id_event;
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Event</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<style>
.pic{
  border-radius:5px;
  padding:3px;
  padding-bottom:10px;
}
</style>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.html"><span class="color-highlight">E</span>xplore Albania</a>
        <div class="nav-collapse">
          <ul class="nav pull-right">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../destinations.php">Destinations</a></li>
            <li><a href="../feedback.php">Feedback</a></li>
            <li><a href="../../index.php">Profile</a></li>
            <?php if (!isset($_SESSION['email']))
            {
              echo "<li>";
              echo '<a href="../../login.php">Login</a>';
              echo "</li>";
            }
            else{
              echo "<li>";
              echo '<a href="../../logout.php">Logout</a>';
              echo "</li>";
            }
            ?>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <?php 
 $firstname  = "";
 $lastname   = "";
 $text       = "";
 $errors = array();
 
 // connect to the database

 if (!isset($_SESSION['email'])){
   array_push($errors, "You need to login first");
 }
 if (isset($_SESSION['email'])){

$email      = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$email'";
$data=mysqli_query($db, $query);
$user = mysqli_fetch_assoc($data);
$userid  =$user['id'];

if (isset($_POST['up_comm'])) {
  $text = mysqli_real_escape_string($db, $_POST['text']);
  
 if (empty($text)) { array_push($errors, "You need to enter a comment"); }
  if (count($errors) == 0) {
    $date=date("Y-m-d h:i:sa");
    $query10 = "INSERT INTO comments (post_id, userid, text, date) 
          VALUES(5, '$userid', '$text','$date')";
    mysqli_query($db, $query10);
    $_SESSION['text']=$text;
    $_SESSION['success'] = "Comment added";
    header('location:event0.php');
 
  }
 }
}

		?>
<div class="container">
  <hr>
  <div class="row">
    <div class="span8">
      <div class="well">
        <h1>Fieri Event</h1>
        <p>Spend an amazing weekend in Fieri with your friends.</p>
        <img src="https://www.ancient-origins.net/sites/default/files/field/image/apollonia.jpg" alt=""  class="pic">
        <p>Apollonia was an ancient Greek colony city and former bishopric in Illyria , located on the right bank of the Aous river (modern-day Vjosa). Its ruins are situated in the Fier region, near the village of Pojani (Polina), in modern-day Albania.
        The ancient city of Apollonia is situated in southwestern Albania, about 13 miles from the city of Fier. The fascinating landscape of the archeological park, which has been preserved in an exceptionally intact condition, comprises a successful combination between the beauty of monuments and nature, attractive through its long history, in an atmosphere of relaxation and meditation. Its foundation took place immediately after the foundation of Epidamnus – Dyrrachium and quickly became one of the most eminent cities of the Adriatic basin, which was mentioned more frequently from the other 30 (thirty) cities bearing the same name during Antiquity. The city lay in the territory of the political communion of the Taulantii and was broadly known as Apollonia of Illyria. According to the tradition it was founded during the first half of the 6th century BC by Greek colonist from Corfu and Corinth, led by Gylax, which named the city after his name (Gylakeia). After its quick establishment the city changed its name to Apollonia, according to the powerful divinity Apollo. It stands on a hilly plateau from where expands the fertile plain of Musacchia with the Adriatic Sea and the hills of Mallakastra. The ruins of Apollonia are discovered in the beginning of the 19th century.</p>
        <br>
        <img src="https://previews.123rf.com/images/milosk/milosk1408/milosk140800142/30695756-monastery-of-saint-mary-in-apollonia-albania.jpg">
        <p>The city flourished during the 4th century AD as an important economic and trade center. Over time it was expanded over the whole hilly slope including an area of ca. 81 ha, surrounded by a large wall of 3 km of length and 3 m of width. Although Apollonia was situated few kilometers away from the Adriatic Sea, its position on the right bank of the Aoos River (modern Vjosë) enabled its communication with the coastal part of the territory. In the two hilltops dominating the city stands the temenos area (the sacred area around the temple of Apollo) and the Arx (military citadel). Between the two hilltops were situated the public buildings of the ancient city, which continued to experience a period of grandeur and splendor under the successive roman rule (since 229 BC). The fame of the city attracted many personalities of the largest empire of the ancient world as the eminent roman philosopher and orator Cicero, which noted Apollonia in his Philippics as magna urbs et gravis (a great and important city). During this period the city became one of the most important gateways of the transbalkanic Via Egnatia, while in its famous Academy has studied and underwent military training Octavianus, accompanied by Agrippas, the eminent general and statesman of the Roman Empire. After a long period of continuous economic and cultural development, Apollonia fell into decline until its total abandonment during the medieval period. The culture and the general development of the city maintained a clear Greek character throughout its existence. However, the independent economic and politic activity as well as the close relationships with the Illyrian hinterland determined a distinctive physiognomy of the apollonian culture.</p><br>
        <ol>
          <li>Event Name: <?php $pay["name"]; ?> </li>
          <li>Time: 3 days</li>
          <li>Hotel: <?php 
          $id_h=$pay["id_hotel"];
          $query42 = "SELECT * FROM hotels WHERE id=$id_h";
          $data125=mysqli_query($db, $query42);
          $hotel = mysqli_fetch_assoc($data125);
          echo $hotel["name"];
          ?></li>
          <li>Price: <?php echo "€",$pay["price"]; ?></li>
          <li>
          For how Many <br><input type="number" name="nr" id="spo" value="1" onmouseout="mouseOut()">
          </li>
        </ol>
        <p>You need to log in to make a payment. </p>
        <p id="test"></p> 
        <div id="paypal-button-container"></div>

<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=EUR"></script>
<script >
    var nr=document.getElementById("spo").value;
    var price=<?php echo $price?>*nr;
    document.getElementById("test").innerHTML=price;
    var price;

function mouseOut() {
 nr=document.getElementById("spo").value;
  price=<?php echo $price?>*nr;

  if(nr==0)
  price=<?php echo $price?>
}
</script>



<script>

    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({style: {
      shape: 'pill',
      color: 'gold',
      layout: 'horizontal',
      label: 'paypal',
      
  },
<?php 
  if(!isset($_SESSION['email']))
  echo 1
?>
 // Set up the transaction
 createOrder: function(data, actions) {
     return actions.order.create({
     purchase_units: [{
     amount: {
     value: price
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
 Swal.fire({
  title: 'Succesfully paid',
  text: 'Click okay to finish payment',
  icon: 'success',

})
window.location = "../pay.php?price="+price;
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
  <form class="well" action="event0.php" method="post">
      <?php include('../../errors.php'); ?>
      <div class="input-group">
  	  <label>Feedback</label>
  	  <textarea type="text" name="text" value="<?php echo $text; ?>"></textarea>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="up_comm">Comment</button>
      <hr>
  	</div>
    <?php 
      $query4 = "SELECT * FROM comments WHERE post_id=5 ORDER BY id DESC";
      $data10=mysqli_query($db, $query4);

       if (mysqli_num_rows($data10) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($data10)) {
          $id=$row['userid'];
          $query52 = "SELECT * FROM users WHERE id='$id'";
          $data8=mysqli_query($db, $query52);
          while($row1 = mysqli_fetch_assoc($data8)) {
            echo "DATE:    ",$row['date'], '<br>', "EMAIL:    ", $row1['email'],'<br>'; 
          }
          echo "COMMENT: " , $row["text"], '<hr>';
        }
      } else {
        echo "0 Comments";
      }

      ?>
      </form>
  <hr>
  <footer class="row">
    <div>
      <div class="span4">
        <div class="is-padded">
          <nav>
            <h2>Navigation</h2>
            <hr>
            <ul>
              <li><a href="../index.php">Home</a></li>
              <li><a href="../destinations.php">Destinations</a></li>
              <li><a href="../feedback.php">Feedback</a></li>
              <li><a href="../../index.php">Profile</a></li>
              <?php if (!isset($_SESSION['email']))
            {
              echo "<li>";
              echo '<a href="../../login.php">Login</a>';
              echo "</li>";
            }
            else{
              echo "<li>";
              echo '<a href="../../logout.php">Logout</a>';
              echo "</li>";
            }
            ?>
            </ul>
          </nav>
        </div>
      </div>
      <div class="span4">
        <div class="is-padded">
          <h2>Notes</h2>
          <hr>
          <a href="#">@Explore Albania</a>
          <p>Remember you need to log in for the payment button to show up</p>
          <em></em><br>
          <br>
          <a href="#">@Explore Albania</a>
          <p>We need you to be logged in so we can track you purchases and offer you better events in the future</p>
          <em></em> </div>


      </div>
      <div class="span4">
        <div class="is-padded">
          <h2>Details</h2>
          <blockquote style="color:black">We are partnered with resorts and hotels all over Albania so if you choose us, you choose a safe and reliable way to have amazing vacations!<br>
            <br>
            <em>- explorealbania.com</em> </blockquote>
        </div>
      </div>
    </div>
    <p> &copy;2020 Creative Designers.<br>
      Design by <a href="index.php">creativedesigners.com</a> </p>
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