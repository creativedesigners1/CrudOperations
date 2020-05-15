<!DOCTYPE html>
<html>
<head>
<title>PHP CRUD </title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../crud/php/main.js"></script>
</head>
<body>
	<?php require_once 'process.php';?>
	<?php 
if(isset($_SESSION['message'])): ?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">
	<?php 
echo $_SESSION['message'];
unset ($_SESSION['message']);
?>
</div>
<?php endif ?>

	<div class = "container">
	<?php
   $mysqli= new mysqli('localhost','root','','crud') or die(mysqli_error($myslqi));
   $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
   //pre_r($result);
   ?>
   <div class="row justify-conten-center">
   <table class="table">
  <thead>
  <tr>
  <th>Emer</th>
  <th>Mbiemer</th>
<th>Password</th>
<th>Email</th>
<th>Kontakti</th>
<th colspan="2">Action</th>
</tr>
</thead>
<?php
while($row = $result->fetch_assoc()): ?>
<tr>
<td><?php echo $row['name']; ?> </td>
<td><?php echo $row['surname']; ?> </td>
<td><?php echo $row['password']; ?> </td>
<td><?php echo $row['email']; ?> </td>
<td><?php echo $row['kontakt']; ?> </td>
<td>
	<a href="index.php?edit=<?php echo $row['id'];?>"
class = "btn btn-info">Edit</a>
<a href="process.php?delete=<?php echo $row['id'];?>" class = "btn btn-danger">Delete</a>

</td>
</tr>
<?php endwhile; ?>
</table>
</div>

   <?php
  function pre_r($array)
 {
    echo '<pre>';
  print_r($array);
   echo '</pre>';
  }
  ?>


<div class="row justify-content-center">
<form action="process.php" method="Post">
	<input type = "hidden" name="id" value ="<?php echo $id; ?>">
	<div class="form-group">
<label>Emer</label>
<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Name">
</div>
<div class="form-group">
<label>Mbiemer</label>
<input type="text" name="surname" class="form-control" value="<?php echo $surname; ?>"placeholder="Surname">
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control"value="<?php echo $password; ?>" placeholder="Password">
</div>
<div class="form-group">
<label>Email</label>
<input type="email" name="email"class="form-control"value="<?php echo $email; ?>"  placeholder="Email">
</div>
<div class="form-group">
<label>Kontakti</label>
<input type="text" name="kontakt" class="form-control"value="<?php echo $kontakt; ?>" placeholder="Kontakt">
</div>
<div class="form-group">
<?php
if($update == true):
?>
<button type = "submit" class="btn btn-info"
name = "update" >Update</button>
<?php else: ?>
<button type = "submit" class="btn btn-info"
name = "save">Save</button>
<?php endif; ?>
</div>
</form>
</div>
</div>
</body>
</html>
