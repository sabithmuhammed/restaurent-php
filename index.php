<?php
include('partials/header.php');
?>
<?php
include('includes/connect.php');
?>
<main>
    <div class="container">
        <?php
        if (isset($_GET['orders'])) {
            include('orders.php');
        } elseif (isset($_GET['cart'])) {
            include('cart.php');
        } elseif (isset($_GET['profile'])) {
            include('profile.php');
        } else {
            include('home.php');
            if (isset($_GET['home'])) {

                $food_id = $_GET['home'];

                $cart = "Select * from `cart_table` where food_id='$food_id' and user_id=3";
                $result = mysqli_query($conn, $cart);
                $rows = mysqli_num_rows($result);
                if ($rows > 0) {
                    $row_data = mysqli_fetch_assoc($result);
                    $quantity=$row_data['quantity'];
                    $cart_id=$row_data['cart_id'];
                    $quantity=$quantity+1;
                    $update_query = "Update `cart_table` set quantity='$quantity' where cart_id=$cart_id";
                    $result = mysqli_query($conn, $update_query);
                    if($result){
                        echo "<script>window.location.href='#$food_id';</script>";
                    }
                }else{
                    $insert_query = "insert into `cart_table` (user_id,food_id,quantity) values (3,$food_id,1)";
                    $cart = mysqli_query($conn, $insert_query);
                        echo "<script>window.location.href='#$food_id';</script>";
                }


                
            }
        }
        ?>
    </div>
    </div>
</main>

<?php
                    $select_carts = "Select * from `cart_table` where user_id=3";
                    $result = mysqli_query($conn, $select_carts);
                    $rows = mysqli_num_rows($result);
                    if($rows){
                        if($rows==1){
                            echo "<div class='cart-hover'><h2>$rows</h2><p>Item in your cart</p></div>";
                        }else{
                            echo "<div class='cart-hover'><h2>$rows</h2><p>Items in your cart</p></div>";
                            
                        }
                        
                    }
                    ?>

<?php
include('partials/footer.php');
?>