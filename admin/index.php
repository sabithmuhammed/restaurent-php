<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="sidemenu">
        <div class="heading-div">
            <h1>Admin Panel</h1>
        </div>

        <a href="index.php?orders">
            <button>Orders</button>
        </a>
        <a href="index.php?manage_foods">
            <button>Manage food items</button>

        </a>
        <a href="index.php?users">
            <button>View Users</button>

        </a>
        <a href="index.php?payment">
            <button>View Payments</button>

        </a>
        <a href="index.php?feedbacks">
            <button>View feedbacks</button>

        </a><a href="index.php?settings">
            <button>Settings</button>

        </a>
    </div>
    <div class="main-container">
        <?php
        if (isset($_GET['manage_foods'])) {
            include('manage-foods.php');
        } elseif (isset($_GET['payment'])) {
            include('payments.php');
        } elseif (isset($_GET['feedbacks'])) {
            include('feedbacks.php');
        } elseif (isset($_GET['users'])) {
            include('view-users.php');
        } elseif (isset($_GET['settings'])) {
            include('settings.php');
        } elseif (isset($_GET['addfoods'])) {
            include('addfoods.php');
        } else {
            include('manage-orders.php');
        }
        ?>
    </div>
</body>

</html>