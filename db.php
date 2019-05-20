<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'new_app'
) or die(mysqli_erro($mysqli));

?>