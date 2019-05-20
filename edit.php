<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM users WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $lastname = $row['lastname'];
    $phone_number = $row['phone_number'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone_number = $_POST['phone_number'];

  $query = "UPDATE users set name = '$name', lastname = '$lastname', phone_number ='$phone_number' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'User Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <input name="lastname" class="form-control" cols="30" rows="10"><?php echo $lastname;?></input>
        </div>
        <div class="form-group">
          <input name="phone_number" type="text" class="form-control" value="<?php echo $phone_number; ?>" placeholder="Update Title">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
