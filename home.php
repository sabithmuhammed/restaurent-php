
<div class="food-menu">
<h2 class="food-menu-heading">Food Menu</h2>

<?php
include('includes/connect.php');

$select_foods = "Select * from `foods_table`";
$result_foods = mysqli_query($conn, $select_foods);


while ($row_data = mysqli_fetch_assoc($result_foods)) {
    $food_id = $row_data['id'];
    $food_name = $row_data['food_name'];
    $food_price = $row_data['price'];
    $image_path = $row_data['image_path'];
    $food_description = $row_data['food_description'];
    $food_id = $row_data['id'];
    echo "<div class='food-items' id='$food_id'>
                <div class='food-image'>
                    <img src='uploads/$image_path' alt=''>
                </div>
                <div class='food-text'>
                    <h2 class='food-heading'>$food_name</h2>
                    <p class='food-description'>
                    $food_description
                    </p>
                    <div class='price'>
                        <h3 class='rate'>&#8377; $food_price</h3><a href='index.php?home=$food_id'><button class='btn--add-to-cart'>Add to cart</button></a>
                    </div>
                </div>
            </div>";
}
?>
</div>
