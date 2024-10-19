<?php
# Include navigation 
include('includes/nav.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require('connect_db.php');

  $errors = array();

  # Check for item ID.
  if (empty($_POST['item_id'])) {
    $errors[] = 'Update item ID.';
  } else {
    $id = mysqli_real_escape_string($link, trim($_POST['item_id']));
  }

  # Check for item name.
  if (empty($_POST['item_name'])) {
    $errors[] = 'Update item name.';
  } else {
    $n = mysqli_real_escape_string($link, trim($_POST['item_name']));
  }

  # Check for item description.
  if (empty($_POST['item_desc'])) {
    $errors[] = 'Update item description.';
  } else {
    $d = mysqli_real_escape_string($link, trim($_POST['item_desc']));
  }

  # Check for image path.
  if (empty($_POST['item_img'])) {
    $errors[] = 'Update image address.';
  } else {
    $img = mysqli_real_escape_string($link, trim($_POST['item_img']));
  }

  # Check for item price.
  if (empty($_POST['item_price'])) {
    $errors[] = 'Update item price.';
  } else {
    $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
  }

  if (empty($errors)) {
    $q = "UPDATE products SET item_name='$n', item_desc='$d', item_img='$img', item_price='$p' WHERE item_id='$id'";
    $r = @mysqli_query($link, $q);
    if ($r) {
      header("Location: read.php");
      exit();
    } else {
      echo "Error updating record: " . mysqli_error($link);
    }
  } else {
    foreach ($errors as $error) {
      echo "<p>$error</p>";
    }
  }

  mysqli_close($link);
}
?>

<div class="forms">
  <h4>Update Item</h4>
  <form action="update.php" method="post">
    <label for="id">Item ID:</label>
    <input type="text" id="item_id" class="form-control" name="item_id" required
      value="<?php if (isset($_POST['item_id']))
        echo $_POST['item_id']; ?>"><br>

    <label for="name">Update item name:</label>
    <input type="text" id="item_name" class="form-control" name="item_name" required
      value="<?php if (isset($_POST['item_name']))
        echo $_POST['item_name']; ?>"><br>

    <label for="description">Update item description:</label>
    <textarea id="item_desc" class="form-control" name="item_desc"
      required><?php if (isset($_POST['item_desc']))
        echo $_POST['item_desc']; ?></textarea><br>

    <label for="image">Update image address:</label>
    <input type="text" id="item_img" class="form-control" name="item_img" required
      value="<?php if (isset($_POST['item_img']))
        echo $_POST['item_img']; ?>"><br>

    <label for="price">Update item price:</label>
    <input type="number" id="item_price" class="form-control" name="item_price" min="0" step="0.01" required
      value="<?php if (isset($_POST['item_price']))
        echo $_POST['item_price']; ?>"><br>

    <input type="submit" class="btn btn-dark" value="Submit">
  </form>
</div>

<?php include('includes/footer.php'); ?>