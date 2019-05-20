<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message']?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php session_unset(); } ?>

        <!-- ADD TASK FORM -->
        <div class="card card-body">
          <form action="create.php" method="POST">
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Name" autofocus>
            </div>
            <div class="form-group">
              <input type="text" name="lastname" rows="2" class="form-control" placeholder="Lastname"></input>
            </div>
            <div class="form-group">
              <input type="text" name="phone_number" rows="2" class="form-control" placeholder="Phone Number"></input>
            </div>
            <input type="submit" name="create" class="btn btn-success btn-block" value="Create User">
          </form>
        </div>
      </div>
      <div class="col-md-8">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Lastname</th>
              <th>Phone Number</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $query = "SELECT * FROM users";
            $result_users = mysqli_query($conn, $query);    

            while($row = mysqli_fetch_assoc($result_users)) { ?>
              <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td>
                  <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                  </a>
                  <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card card-body">
          <form action="search.php" method="POST" class="form-inline">
            <input type="text" name="search" class="form-control" placeholder="..." autofocus>
            <button class="btn btn-primary" type="submit">Search</button>
          </form>

        </div>
      </div>
    </div>
  </main>
<?php include('includes/footer.php'); ?>


