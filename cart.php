<?php

include 'settings.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:loginpage.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      $insert_cart = mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
   }
};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:cart.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['proceed'])){
    $new_quantity = 0;
    
    $select_inventory = mysqli_query($conn, "SELECT * FROM `inventory`") or die('Inventory query failed: ' . mysqli_error($conn));
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '{$_SESSION['user_id']}'") or die('Cart query failed: ' . mysqli_error($conn));

    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
        $found = false; // Flag to check if the item was found in the inventory
        $new_quantity = 0; // Reset new_quantity for each cart item
        
        mysqli_data_seek($select_inventory, 0); // Reset the pointer to the beginning of the result set

        while ($row = mysqli_fetch_assoc($select_inventory)) {
            if ($row['name'] == $fetch_cart['name']) {
                $new_quantity = $row['quantity'] - $fetch_cart['quantity'];
                $found = true; // Set the flag to true since the item is found in the inventory
                
                $updateQuery = "UPDATE `inventory` SET quantity = '$new_quantity' WHERE name = '{$fetch_cart['name']}'";
                if (mysqli_query($conn, $updateQuery)) {
                    $message[] = 'Product added to cart!';
                } else {
                    die('Update inventory query failed: ' . mysqli_error($conn));
                }
                break; // Break the loop once the item is found and updated
            }
        }

        if (!$found) {
            $message[] = 'Item not found in inventory: ' . $fetch_cart['name'];
            // You may want to handle this case accordingly (e.g., remove the item from the cart)
        }
    }
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lil Apple Hair Salon</title>
   
   <link rel="icon" href="./img/core-img/Lilapple.png">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="cartstyles.css">

</head>
<body>
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

    <!-- Header Area Start -->
    <header class="header-area">

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="akameNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="loggedinindex.php"><img width="100" src="./img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="./loggedinindex.php">Home</a></li>
                                    <li class="active"><a href="./loggedinshopping.php">Shopping</a></li>
                                    <li><a href="./loggedinabout.php">About Us</a></li>
                                    <li><a href="./loggedinservices.php">Services</a></li>
                                    <li><a href="./loggedincontact.php">Contact</a></li>
                                </ul>

                                <!-- Cart Icon -->
                                <div class="cart-icon ml-5 mt-4 mt-lg-0">
                                    <a href="cart.php"><i class="icon_cart"></i></a>
                                </div>

                                <?php
                                if ($_SESSION["loggedin"] == true)
                                {
                                    echo "<!-- Logout Icon -->
                                    <div class='book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4'>
                                    <form action='logoutverification.php' method='post'>
                                    <button type='submit' name='login' class='btn akame-btn'>Log Out</button>
                                    </form>
                                    </div>
                                    <div class='login_creds'>
                                    <p>"; echo $_SESSION["identity"]; echo " logged in.</p>
                                    <p>Username: "; echo $_SESSION["username"]; echo"</p></div>";
                                }
                                else
                                {
                                    echo " <!-- Login Icon -->
                                    <div class='book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4'>
                                    <a href='index.php' class='btn akame-btn'>Logout</a>
                                    </div>";
                                }
                                ?>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

<div class="container">

<div class="user-profile">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

   <p> Username: <span><?php echo $fetch_user['customerusername']; ?></span> </p>
   <p> Email: <span><?php echo $fetch_user['email']; ?></span> </p>

</div>

<div class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>
      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td class="custom-class"><img src="<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>$<?php echo $fetch_cart['price']; ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="update" class="option-btn">
               </form>
            </td>
            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">grand total :</td>
         <td>$<?php echo $grand_total; ?>/-</td>
         <td><a href="cart.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
      </tr>
   </tbody>
   </table>

   <div class="cart-btn">  
   <a href="cart.php?proceed" onclick="return confirm('Confirm checkout?');" class="proceedbutton <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
        
   </div>


</div>

</div>

</body>
</html>