<?php
// Para usar los datos de sesión, siempre ejecutar la siguiente función.
session_start();

if (isset($_POST['total_cart_items'])) {
    // count([arreglo]) es una función de PHP que cuenta los elementos que hay
    // en el arreglo.
    echo count($_SESSION['name']);
    // exit() o die() impiden ejecutar el código posterior.
    exit(); 
}

if (isset($_POST['item_src'])) {
    // $_SESSION['arreglo'][] = valor; sirve para agregar un nuevo elemento al arreglo. 
    $_SESSION['name'][] = $_POST['item_name'];
    $_SESSION['price'][] = $_POST['item_price'];
    $_SESSION['src'][] = $_POST['item_src'];
    echo count($_SESSION['name']);
    exit();
}

if (isset($_POST['showcart'])) {
    // Se cuentan los items que hay en sesión.
    $numItems = count($_SESSION['name']);
    
    // Se iteran todos los elementos de los arreglos haciendo echo de un <div> por cada item.
    for ($i = 0; $i < $numItems; $i++) {
        echo "
            <div class='cart-items'>
                <button type='button' class='btn btn-danger' onclick='removeOneItem($i)'>
                    <i class='fas fa-minus-circle'></i>
                </button>
                <img src='" . $_SESSION['src'][$i] . "'>
                <p>" . $_SESSION['name'][$i] . "</p>
                <p>$ " . $_SESSION['price'][$i] . "</p>
            </div>";
    }
    exit();
}

if (isset($_POST['remove'])) {
    // (int) sirve para forzar que la variable sea un número entero en caso de que sea cadena.
    // $_POST['position'] es una variable enviada desde la función removeOneItem(pos).
    $i = (int) $_POST['position'];
    unset($_SESSION['name'][$i]);
    unset($_SESSION['price'][$i]);
    unset($_SESSION['src'][$i]);

    // Se puede quitar un elemento de enmedio del arreglo y queda un hueco con un valor indefinido.
    // array_values([arreglo]) es una función que devuelve los valores reordenando
    // el arreglo quitando los huecos.
    $_SESSION['name'] = array_values($_SESSION['name']);
    $_SESSION['price'] = array_values($_SESSION['price']);
    $_SESSION['src'] = array_values($_SESSION['src']);
    
    echo count($_SESSION['name']);
    exit();
}

if (isset($_POST['destroy'])) {
    session_unset();
    session_destroy();
    echo "0";
    exit();
}
