
<?php
session_start();
$mysqli= new mysqli('localhost','root','','crud')or die(mysqli_error($myslqi));
$name='';
$surname='';
$password='';
$email='';
$kontakt = ''; 
$update = false;
$id = 0;
if(isset($_POST['save']))
{
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $kontakt = $_POST['kontakt'];
 $mysqli->query("INSERT INTO data(name,surname ,email,password,kontakt) VALUES ('$name', '$surname', '$email','$password','$kontakt')") or die($mysqli->error);
$_SESSION['message'] = "Record has been saved!";
$_SESSION['msg_type'] = "success";
header("location:index.php");
}
if(isset($_GET['delete']))
{
  $id = $_GET['delete'];
 $mysqli->query("DELETE FROM data WHERE id=$id")
or die($mysqli->error());
$_SESSION['message'] = "Record has been deleted!";
$_SESSION['msg_type'] = "danger";
header("location:index.php");

}

if(isset($_GET['edit']))
{
$id = $_GET['edit'];
$update = true;
$result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());

if(mysqli_num_rows($result)==1)
{
  $row = $result->fetch_array();
  $name = $row['name'];
 $surname =$row['surname']; 
 $password = $row['password'];
 $email = $row['email']; 
 $kontakt = $row['kontakt']; 
}
}
if(isset($_POST['update']))
{
$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$password = $_POST['password'];
$email = $_POST['email'];
$kontakt = $_POST['kontakt'];
$mysqli->query("UPDATE data SET name= '$name',
surname= '$surname',password= '$password',
email= '$email',kontakt= '$kontakt'WHERE id=$id")
or die($mysqli->error);
$_SESSION['message'] = "Record has been updated!";
$_SESSION['msg_type'] = "warning";
header("location:index.php");
}


?>


