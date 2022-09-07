<?php

include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($mysqli,"DELETE FROM product WHERE id = '$id'");

if($result){
  header('location: index.php');
}
?>