<?php
include('includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo"></div>
            <ul>
                <li><a href="index.php?home"><button class="nav-item">Home</button></a></li>
                <li><a href="index.php?orders"><button class="nav-item">Orders</button> </a></li>
                <li><a href="index.php?cart"><button class="nav-item">Cart
                </button>  </a></li>
                <li><a href="index.php?profile"><button class="nav-item">Profile</button> </a></li>
            </ul>
        </nav>
    </header>