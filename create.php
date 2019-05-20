<?php

include('db.php');

if (isset($_POST['create'])) {
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $phone_number = $_POST['phone_number'];
  $query = "INSERT INTO users(name, lastname, phone_number) VALUES ('$name', '$lastname', '$phone_number')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'User Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}


