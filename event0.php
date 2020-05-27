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
          VALUES(2, '$userid', '$text','$date')";
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
    
		
        <h1>Gjirokastra Event</h1>
        <p>Spend an amazing weekend in Gjirokaster with your friends.</p>
        <ul>
          <li>Wood crafting experience in Gjirokastra.</li>
          <li>Fast guide to the fields</li>
          <li>A visit to Artisan's handmade workshop.</li>
          <li>Visiting the castle.</li>
        </ul>
        <img src="../img/5.jpg" alt="" class="pic">
        <p>Gjirokastër is a city in southern Albania, in a valley between the Gjerë mountains and the Drino, at 300 metres above sea level. Its old town is a UNESCO World Heritage Site, described as "a rare example of a well-preserved Ottoman town, built by farmers of large estate". The city is overlooked by Gjirokastër Fortress, where the Gjirokastër National Folklore Festival is held every five years.
          <br> <strong>Fast guide to the fields </strong>
          <br>
        Fast guide to the fields starts at 8:00 am from Cerciz Topulli Square. From there we will take the car to go to the horse stable in the village of Asim Zeneli where we will meet with the guide and the horses.
     At 9:00 AM we will start from the stable.
     This guide is only for the experienced ones who like to go through the adrenaline of riding a fast horse across the fields.
     This tour requires to have a good physique and also to have good skills in horse riding. For those who don’t have experience in horse-riding it can be dangerous. </p>
     <img src="https://www.visit-gjirokastra.com/wp-content/uploads/2019/12/fAST-rIDE.jpg">
    <strong> A visit to Artisan's handmade workshop.</strong>
          <br>
    <p>During this experience we will have the pleasure to visit and to talk with some artisans of the city and to learn more about their “traditional mastery” and why not,  to make together some small souvenirs, like a memory by our city for your home decoration. With our guide you will have the opportunity to know more about the historical values of the Old Bazaar, the mixed architecture and the traditions of the city of the stone with Ottoman origins.
   Together we will discover the wood, the iron and the stone work and we will look a lot of tapestry and carpets full of different colors.
  We will be acquainted with the hardships and beauty of craftsmanship handmade products, made by the masters of our city.
  It’s their great dedication to work, that keeps alive the traditions of our city. You will meet people who love their work and who can create miracles with their hands.
  Come and enjoy our traditional souvenirs, produced in stone and wood… and for sure you gonna be suprised!</p>
  <img src="https://www.visit-gjirokastra.com/wp-content/uploads/2019/05/Neck-of-Bazaar-Gjirokastra-1.jpg">
  <br> <strong> Wood crafting experience in Gjirokastra..</strong>
  <p>Take home a cool souvenir from Albania with this 3 hour wood crafting class in Gjirokaster. Learn how to make small wood works like small wooden signs with text or drawings, small necklaces, key hangers and even small mirrors. (you choose) Make everything you want from what mentioned above and take it home as a souvenir or a gift for your loved ones.
  After meeting your host in Cerciz Topulli square we head toward Master Nurce Workshop. (3 min walk) First you will become familiar with the wood and types of it and get some general information. After choosing what you will create, you will design it first on a white paper and after that you will start carving always under the surveillance of master Nurce. While working, you can enjoy some glasses of Rakia or homemade wine depending on your choice.
  Congratulations on the piece of art you made yourself.
  You enjoy more the things you create yourself!</p>
  <img src="https://www.visit-gjirokastra.com/wp-content/uploads/2019/04/Wood-carver-1.png">
   <br><br>
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
      $query4 = "SELECT * FROM comments WHERE post_id=2 ORDER BY id DESC";
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