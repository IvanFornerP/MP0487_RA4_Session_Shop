<?php
session_start();
if (!isset($_SESSION['milk'])) {
    $_SESSION['milk'] = 0;
}
if (!isset($_SESSION['softDrink'])) {
    $_SESSION['softDrink'] = 0;
}
if (!isset($_SESSION['nombre'])) {
    $_SESSION['nombre'] = '';
}

if (isset($_POST['action'])) {
    if (isset($_POST['nombre'])) {
        $_SESSION['nombre'] = $_POST['nombre'];
    }
    $cantidad = $_POST['number'];
    $producto = $_POST['product'];
    if ($_POST['action'] === 'add') {
        if ($producto === 'milk') {
            $_SESSION['milk'] += $cantidad;
        }
        if ($producto === 'softDrink') {
            $_SESSION['softDrink'] += $cantidad;
        }
    }

    if($_POST['action'] === 'remove'){
        if($producto === 'milk'){
            if($_SESSION['milk'] < $cantidad){
                echo "Eror, no se puede quitar mas de lo que haya";
            } else {
                $_SESSION['milk'] -= $cantidad;
            }
        }

        if($producto === 'softDrink'){
            if($_SESSION['softDrink'] < $cantidad){
                echo "Eror, no se puede quitar mas de lo que haya";
            } else {
                $_SESSION['softDrink'] -= $cantidad;
            }
        }
    }

    if($_POST['action'] === 'reset'){
        $_SESSION['nombre'] = '';
        $_SESSION['milk'] = 0;
        $_SESSION['softDrink'] = 0;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <h2>Supermarket management</h2>
</head>

<body>
    <form method="post">
        <label for="nombre">Worker name:</label>
        <input id="nombre" name="nombre" type="text" value=<?php echo $_SESSION['nombre']; ?>><br><br>
        <h3>Choose product:</h3>
        <select name="product">
            <option value="milk">Milk</option>
            <option value="softDrink">Soft Drink</option>
        </select><br><br>
        <h3>Product quantity:</h3>
        <input name="number" type="number"><br>
        <button type="submit" name="action" value="add">add</button>
        <button type="submit" name="action" value="remove">remove</button>
        <button type="submit" name="action" value="reset">reset</button>
        <br><br>
    </form>
    <h3>Iventory:</h3>
    <p>worker: <?php echo $_SESSION['nombre']; ?>
    </p>
    <p>units milk: <?php echo $_SESSION['milk']; ?>
    </p>
    <p>units soft drink: <?php echo $_SESSION['softDrink']; ?>
    </p>
</body>

</html>