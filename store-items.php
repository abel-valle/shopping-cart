<?php
session_start();

if (isset($_POST['total_cart_items'])) {
    echo count($_SESSION['name']);
    exit();
}

if (isset($_POST['item_src'])) {
    $_SESSION['name'][] = $_POST['item_name'];
    $_SESSION['price'][] = $_POST['item_price'];
    $_SESSION['src'][] = $_POST['item_src'];
    echo count($_SESSION['name']);
    exit();
}

if (isset($_POST['remove'])) {
    $i = count($_SESSION['name']);
    $i = $i - 1;
    session_unset($_SESSION['name'][$i]);
    session_unset($_SESSION['price'][$i]);
    session_unset($_SESSION['src'][$i]);
}

if (isset($_POST['showcart'])) {
    for ($i = 0; $i < count($_SESSION['src']); $i++) {
        echo "<div class='cart-items'>";
        echo "<img src='" . $_SESSION['src'][$i] . "'>";
        echo "<p>" . $_SESSION['name'][$i] . "</p>";
        echo "<p>" . $_SESSION['price'][$i] . "</p>";
        echo "</div>";
    }
    exit();
}

