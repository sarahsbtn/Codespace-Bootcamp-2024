<?php
include 'includes/nav.php';
?>

<div class="forms">
  <h4>Add Item</h4>
  <form action="create.php" method="post">
    <!-- Input box for item ID -->
    <label for="id">Item ID:</label>
    <input type="text" 
           id="item_id" 
           class="form-control" 
           name="item_id" 
           required 
           value="<?php if (isset($_POST['item_id'])) echo $_POST['item_id']; ?>"><br>

    <!-- Input box for item name  -->
    <label for="name">Item name:</label>
    <input type="text" 
           id="item_name" 
           class="form-control" 
           name="item_name" 
           required 
           value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>"><br>

    <!-- Input box for item description -->  
    <label for="description">Description:</label>
    <textarea id="item_desc" 
              class="form-control" 
              name="item_desc" 
              required><?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?></textarea><br>

    <!-- Input box for image path -->
    <label for="image">Image:</label>
    <input type="text" 
           id="item_img" 
           class="form-control" 
           name="item_img" 
           required 
           value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>"><br>

    <!-- Input box for item price -->
    <label for="price">Price:</label>
    <input type="number" 
           id="item_price" 
           class="form-control" 
           name="item_price" 
           min="0" step="0.01" 
           required 
           value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>"><br>

    <!-- Submit button -->
    <input type="submit" class="btn btn-dark" value="Submit">
  </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('connect_db.php');

    # Initialize an error array.
    $errors = array();

    # Check for item ID.
    if (empty($_POST['item_id'])) {
        $errors[] = 'Enter the item ID.';
    } else {
        $id = mysqli_real_escape_string($link, trim($_POST['item_id']));
    }

    # Check for item name.
    if (empty($_POST['item_name'])) {
        $errors[] = 'Enter the item name.';
    } else {
        $n = mysqli_real_escape_string($link, trim($_POST['item_name']));
    }

    # Check for item description.
    if (empty($_POST['item_desc'])) {
        $errors[] = 'Enter the item description.';
    } else {
        $d = mysqli_real_escape_string($link, trim($_POST['item_desc']));
    }

    # Check for item image.
    if (empty($_POST['item_img'])) {
        $errors[] = 'Enter the item image.';
    } else {
        $img = mysqli_real_escape_string($link, trim($_POST['item_img']));
    }

    # Check for item price.
    if (empty($_POST['item_price'])) {
        $errors[] = 'Enter the item price.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
    }

    # On success, insert data into products table.
    if (empty($errors)) {
        $q = "INSERT INTO products (item_id, item_name, item_desc, item_img, item_price) VALUES ('$id', '$n', '$d', '$img', '$p')";
        $r = @mysqli_query($link, $q);
        if ($r) {
            echo '<p>New record created successfully</p>';
        } else {
            echo '<p>Error inserting record: ' . mysqli_error($link) . '</p>';
        }
        mysqli_close($link); 
        exit();
    } else {
        echo '<p>The following error(s) occurred:</p>';
        foreach ($errors as $msg) {
            echo "$msg<br>";
        }
        echo '<p>Please try again.</p>';
        mysqli_close($link);
    }
}
include 'includes/footer.php';
?>
