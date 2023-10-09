<?php
include('includes/connect.php');


if (isset($_GET['ops'])) {
    $option = $_GET['ops'];
    $cart_id = $_GET['cart'];
    $select_carts = "Select * from `cart_table` where cart_id=$cart_id";
    $result = mysqli_query($conn, $select_carts);
    if ($result) {
        $row_data = mysqli_fetch_assoc($result);
        $quantity = $row_data['quantity'];
        $quantity = $quantity + $option;
        if ($quantity < 1 && $option == -1) {
            $delete_query = "Delete from `cart_table` where cart_id=$cart_id";
            $result = mysqli_query($conn, $delete_query);
        } else {
            $update_query = "Update `cart_table` set quantity='$quantity' where cart_id=$cart_id";
            $result = mysqli_query($conn, $update_query);

        }
    }


}








$select_carts = "Select * from `cart_table` where user_id=3";
$result = mysqli_query($conn, $select_carts);
$rows = mysqli_num_rows($result);
if ($rows > 0) {
    $total_amount = 0;
    echo "<div class='cart'>
            <div class='heading'>Picture</div>
            <div class='heading'>Name</div>
            <div class='heading'>Quantity</div>
            <div class='heading'>Price</div>
            <div></div>
        </div>";
    while ($row_data = mysqli_fetch_assoc($result)) {
        $id = $row_data['food_id'];
        $quantity = $row_data['quantity'];
        $cart_id = $row_data['cart_id'];
        $select_foods = "Select * from `foods_table` where id=$id";
        $result_foods = mysqli_query($conn, $select_foods);
        $food_data = mysqli_fetch_assoc($result_foods);


        $food_name = $food_data['food_name'];
        $food_price = $food_data['price'];
        $image_path = $food_data['image_path'];
        $total = $food_price * $quantity;
        $total_amount += $total;
        echo "<div class='cart' class='$cart_id'>
                <div><div class='cart-img'><img src='uploads/$image_path' alt=''></div></div> 
                 <div>$food_name</div>
                <div>
                 <a href='index.php?cart=$cart_id&ops=-1'><button class='btn-quantity btn-primary'>-</button></a>
                <div class='quantity'>$quantity</div>
                <a href='index.php?cart=$cart_id&ops=+1'><button class='btn-quantity btn-primary'>+</button></a>
                 </div>
                <div>&#8377; $total</div>
                <div><button class='btn-remove btn-danger'>x</button></div>
            </div>";

    }
    echo "<div class='cart'>
            <div></div>
            <div></div>
            <div class='heading'>Total</div>
            <div class='heading'>&#8377; $total_amount</div>
            <div><button class='btn-primary btn-place-order'>Place order</button></div>
        </div>";
} else {
    echo "<div class='cart-msg'>
            <h2>Cart is empty</h2>
        </div>";
}

?>